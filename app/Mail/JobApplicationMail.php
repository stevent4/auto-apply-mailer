<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class JobApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $subjectString;
    public string $bodyMessage;
    public array $lampiranFiles;
    public string $pdfContent; // Tambahkan ini

    // Tambahkan $pdfContent di dalam construct
    public function __construct(string $subjectString, string $bodyMessage, array $lampiranFiles, string $pdfContent)
    {
        $this->subjectString = $subjectString;
        $this->bodyMessage = $bodyMessage;
        $this->lampiranFiles = $lampiranFiles ?? [];
        $this->pdfContent = $pdfContent; // Simpan file PDF mentahnya
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subjectString,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.lamaran',
        );
    }

    public function attachments(): array
    {
        $attachments = [];

        // 1. Lampirkan PDF Surat Lamaran yang baru saja di-generate otomatis
        $attachments[] = Attachment::fromData(fn() => $this->pdfContent, 'Surat_Lamaran_Ahmad_Stevent.pdf')
            ->withMime('application/pdf');

        // 2. Lampirkan sisa file pendukung (CV, dll) yang dicentang dari form
        foreach ($this->lampiranFiles as $file) {
            $attachments[] = Attachment::fromPath(storage_path('app/public/berkas/' . $file));
        }

        return $attachments;
    }
}
