<?php

namespace App\Http\Controllers;

use App\Models\ApplicationHistory;
use App\Models\Template;
use App\Services\GmailService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ApplyController extends Controller
{
    private function userFiles(): array
    {
        $disk = Storage::disk('public');

        $folder = 'berkas/' . Auth::id();

        $files = [];

        if (!$disk->exists($folder)) {
            return $files;
        }

        foreach ($disk->files($folder) as $path) {
            $name = basename($path);

            if (
                str_contains($name, 'Zone.Identifier') ||
                str_starts_with($name, '.')
            ) {
                continue;
            }

            $files[] = $name;
        }

        sort($files, SORT_NATURAL | SORT_FLAG_CASE);

        return $files;
    }

    public function index()
    {
        $files = $this->userFiles();

        $histories = ApplicationHistory::query()
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        $emailTemplates = Template::query()
            ->where('type', 'email')
            ->where(function ($query) {
                $query->whereNull('user_id')
                    ->orWhere('user_id', Auth::id());
            })
            ->orderByDesc('is_default')
            ->orderBy('name')
            ->get();

        $pdfTemplates = Template::query()
            ->where('type', 'pdf')
            ->where(function ($query) {
                $query->whereNull('user_id')
                    ->orWhere('user_id', Auth::id());
            })
            ->orderByDesc('is_default')
            ->orderBy('name')
            ->get();

        return view('apply', compact(
            'files',
            'histories',
            'emailTemplates',
            'pdfTemplates'
        ));
    }

    public function send(
        Request $request,
        GmailService $gmailService
    ) {
        /*
         * User yang sedang login.
         */
        $user = Auth::user();

        /*
         * Pastikan Gmail sudah terhubung.
         */
        $googleAccount = $user->googleAccount;

        if (!$googleAccount) {
            return back()
                ->withInput()
                ->withErrors([
                    'google' => 'Silakan hubungkan akun Gmail terlebih dahulu melalui Profile.',
                ]);
        }

        /*
         * Ambil nama pelamar dari Profile,
         * bukan lagi hardcode Ahmad.
         */
        $namaPelamar = $user->name;

        /*
         * Subject.
         */
        $subject = $request->tipe_subjek === 'auto'
            ? "{$request->posisi} - {$namaPelamar} - Jombang"
            : $request->subjek_custom;

        /*
         * Data perusahaan dan posisi.
         */
        $namaPt = $request->nama_pt;
        $posisiUpper = strtoupper($request->posisi);

        /*
         * Replace variable template.
         */
        $bodyEmailFinal = str_replace(
            ['[NAMA_PT]', '[POSISI]'],
            [$namaPt, $posisiUpper],
            $request->body_email
        );

        $bodyPdfFinal = str_replace(
            ['[NAMA_PT]', '[POSISI]'],
            [$namaPt, $posisiUpper],
            $request->body_pdf
        );

        /*
         * Generate PDF surat lamaran.
         */
        $pdf = Pdf::loadView(
            'pdf.lamaran',
            [
                'content' => $bodyPdfFinal,
            ]
        );

        $pdfContent = $pdf->output();

        /*
         * Nama file PDF dibuat dinamis berdasarkan nama user.
         */
        $safeName = preg_replace(
            '/[^A-Za-z0-9_-]+/',
            '_',
            $namaPelamar
        );

        $pdfFilename = 'Surat_Lamaran_' .
            trim($safeName, '_') .
            '.pdf';

        try {
            /*
             * KIRIM MELALUI GMAIL API.
             *
             * Bukan lagi:
             *
             * Mail::to(...)
             *
             * Gmail API akan mengirim dari akun Gmail
             * yang sedang terhubung dengan user.
             */
            $gmailResult = $gmailService->send(
                googleAccount: $googleAccount,
                to: $request->email_hrd,
                subject: $subject,
                htmlBody: nl2br(
                    e($bodyEmailFinal)
                ),
                pdfContent: $pdfContent,
                pdfFilename: $pdfFilename,
                lampiranFiles: $request->lampiran ?? []
            );
        } catch (Throwable $e) {
            report($e);

            return back()
                ->withInput()
                ->withErrors([
                    'email' => 'Email gagal dikirim melalui Gmail: ' .
                        $e->getMessage(),
                ]);
        }

        /*
         * SIMPAN KE DATABASE RIWAYAT.
         */
        ApplicationHistory::create([
            'user_id' => $user->id,
            'email_hrd' => $request->email_hrd,
            'nama_pt' => $namaPt,
            'posisi' => $posisiUpper,
            'subjek' => $subject,
        ]);

        return back()->with(
            'success',
            "Email lamaran berhasil dikirim dari {$googleAccount->google_email} ke {$namaPt}!"
        );
    }

    public function updateStatus(Request $request, int $id)
    {
        $history = ApplicationHistory::query()
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        $history->status = $request->status;
        $history->save();

        return back()->with(
            'success',
            "Status lamaran untuk {$history->nama_pt} berhasil diperbarui!"
        );
    }

    public function destroyHistory(int $id)
    {
        $history = ApplicationHistory::query()
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        $history->delete();

        return back()->with(
            'success',
            'Riwayat lamaran berhasil dihapus!'
        );
    }

    public function resendHistory(int $id)
    {
        $selectedHistory = ApplicationHistory::query()
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        $files = $this->userFiles();

        $histories = ApplicationHistory::query()
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view(
            'apply',
            compact(
                'files',
                'histories',
                'selectedHistory'
            )
        );
    }
}
