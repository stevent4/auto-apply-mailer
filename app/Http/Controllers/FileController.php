<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Disk penyimpanan berkas user.
     */
    private function disk()
    {
        return Storage::disk('public');
    }

    /**
     * Folder berkas milik user yang sedang login.
     */
    private function userFolder(): string
    {
        return 'berkas/' . Auth::id();
    }

    /**
     * Menampilkan halaman kelola berkas.
     */
    public function index()
    {
        $disk = $this->disk();

        $folder = $this->userFolder();

        $files = [];

        if ($disk->exists($folder)) {

            $paths = $disk->files($folder);

            foreach ($paths as $path) {

                $name = basename($path);

                // Abaikan file tersembunyi dan Zone.Identifier
                if (
                    str_contains($name, 'Zone.Identifier') ||
                    str_starts_with($name, '.')
                ) {
                    continue;
                }

                $files[] = [
                    'name' => $name,
                    'size' => $disk->size($path),
                    'last_modified' => $disk->lastModified($path),
                ];
            }
        }

        // Urutkan berdasarkan nama file
        usort($files, function ($a, $b) {
            return strcasecmp($a['name'], $b['name']);
        });

        return view('files.index', compact('files'));
    }


    /**
     * Upload satu atau beberapa berkas.
     */
    public function store(Request $request)
    {
        $request->validate([
            'files' => [
                'required',
                'array',
                'min:1',
            ],

            'files.*' => [
                'required',
                'file',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                'max:10240',
            ],
        ], [
            'files.required' => 'Pilih minimal satu berkas.',
            'files.array' => 'Format upload tidak valid.',
            'files.*.file' => 'Berkas yang dipilih tidak valid.',
            'files.*.mimes' => 'Format yang diperbolehkan: PDF, DOC, DOCX, JPG, JPEG, PNG.',
            'files.*.max' => 'Ukuran setiap file maksimal 10 MB.',
        ]);

        $disk = $this->disk();

        $folder = $this->userFolder();

        /*
         * Pastikan folder user tersedia.
         */
        $disk->makeDirectory($folder);

        foreach ($request->file('files') as $file) {

            $originalName = $file->getClientOriginalName();

            /*
             * Bersihkan nama file.
             */
            $cleanName = preg_replace(
                '/[^A-Za-z0-9._ -]/',
                '',
                $originalName
            );

            $cleanName = trim($cleanName);

            /*
             * Jika nama file kosong,
             * buat nama otomatis.
             */
            if ($cleanName === '') {

                $cleanName =
                    'berkas-' .
                    time() .
                    '-' .
                    uniqid() .
                    '.' .
                    $file->extension();
            }

            /*
             * Hindari nama file yang sama
             * khusus di folder user ini.
             */
            $finalName = $cleanName;

            $counter = 1;

            while (
                $disk->exists(
                    $folder . '/' . $finalName
                )
            ) {

                $pathInfo = pathinfo($cleanName);

                $baseName =
                    $pathInfo['filename'] ?? 'berkas';

                $extension =
                    isset($pathInfo['extension'])
                    ? '.' . $pathInfo['extension']
                    : '';

                $finalName =
                    $baseName .
                    '-' .
                    $counter .
                    $extension;

                $counter++;
            }

            /*
             * Simpan file ke:
             *
             * storage/app/public/berkas/{user_id}/
             */
            $file->storeAs(
                $folder,
                $finalName,
                'public'
            );
        }

        return redirect()
            ->route('files.index')
            ->with(
                'success',
                'Berkas berhasil diunggah.'
            );
    }


    /**
     * Download berkas.
     */
    public function download(string $filename)
    {
        /*
         * basename() mencegah path traversal.
         */
        $filename = basename($filename);

        $disk = $this->disk();

        $path =
            $this->userFolder() .
            '/' .
            $filename;

        /*
         * Hanya file milik user yang boleh diakses.
         */
        if (!$disk->exists($path)) {
            abort(404);
        }

        /*
         * Ambil path fisik file dari disk public.
         */
        $fullPath = $disk->path($path);

        return response()->download(
            $fullPath,
            $filename
        );
    }


    /**
     * Hapus berkas.
     */
    public function destroy(string $filename)
    {
        /*
         * basename() mencegah path traversal.
         */
        $filename = basename($filename);

        $disk = $this->disk();

        $path =
            $this->userFolder() .
            '/' .
            $filename;

        /*
         * Hanya file milik user yang boleh dihapus.
         */
        if ($disk->exists($path)) {

            $disk->delete($path);
        }

        return redirect()
            ->route('files.index')
            ->with(
                'success',
                'Berkas berhasil dihapus.'
            );
    }
}
