<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ApplicationHistory; // Panggil model riwayat

class ApplyController extends Controller
{
    public function index()
    {
        $files = [];
        if (Storage::disk('public')->exists('berkas')) {
            $filesPath = Storage::disk('public')->files('berkas');

            foreach ($filesPath as $path) {
                $namaFile = basename($path);
                if (!str_contains($namaFile, 'Zone.Identifier') && !str_starts_with($namaFile, '.')) {
                    $files[] = $namaFile;
                }
            }
        }

        // Ambil data riwayat (diurutkan dari yang paling baru)
        $histories = ApplicationHistory::latest()->get();

        return view('apply', compact('files', 'histories'));
    }

    public function send(Request $request)
    {
        $namaPelamar = "Ahmad Stevent Andreuw";

        $subject = $request->tipe_subjek === 'auto'
            ? "{$request->posisi} - {$namaPelamar} - Jombang"
            : $request->subjek_custom;

        $namaPt = $request->nama_pt;
        $posisiUpper = strtoupper($request->posisi);

        $bodyEmailFinal = str_replace(['[NAMA_PT]', '[POSISI]'], [$namaPt, $posisiUpper], $request->body_email);
        $bodyPdfFinal = str_replace(['[NAMA_PT]', '[POSISI]'], [$namaPt, $posisiUpper], $request->body_pdf);

        $pdf = Pdf::loadView('pdf.lamaran', ['content' => $bodyPdfFinal]);
        $pdfContent = $pdf->output();

        // Kirim email
        \Illuminate\Support\Facades\Mail::to($request->email_hrd)->send(
            new \App\Mail\JobApplicationMail($subject, $bodyEmailFinal, $request->lampiran, $pdfContent)
        );

        // SIMPAN KE DATABASE RIWAYAT
        ApplicationHistory::create([
            'email_hrd' => $request->email_hrd,
            'nama_pt' => $namaPt,
            'posisi' => $posisiUpper,
            'subjek' => $subject,
        ]);

        return back()->with('success', "Email lamaran dan PDF Surat Lamaran berhasil dikirim ke {$namaPt}!");
    }

    public function updateStatus(Request $request, $id)
    {
        $history = \App\Models\ApplicationHistory::findOrFail($id);
        $history->status = $request->status;
        $history->save();

        return back()->with('success', "Status lamaran untuk {$history->nama_pt} berhasil diperbarui!");
    }

    public function destroyHistory($id)
    {
        // Cari data riwayat berdasarkan ID, lalu hapus
        $history = ApplicationHistory::findOrFail($id);
        $history->delete();

        return back()->with('success', 'Riwayat lamaran berhasil dihapus!');
    }

    public function resendHistory($id)
    {
        // Ambil data riwayat yang ingin di-resend
        $selectedHistory = ApplicationHistory::findOrFail($id);

        $files = [];
        if (Storage::disk('public')->exists('berkas')) {
            $filesPath = Storage::disk('public')->files('berkas');

            foreach ($filesPath as $path) {
                $namaFile = basename($path);
                if (!str_contains($namaFile, 'Zone.Identifier') && !str_starts_with($namaFile, '.')) {
                    $files[] = $namaFile;
                }
            }
        }

        $histories = ApplicationHistory::latest()->get();

        // Kirim data riwayat terpilih kembali ke view agar form otomatis terisi
        return view('apply', compact('files', 'histories', 'selectedHistory'));
    }
}
