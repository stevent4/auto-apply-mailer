<?php

namespace App\Services;

use App\Models\GoogleAccount;
use Google\Client;
use Google\Service\Gmail;
use Google\Service\Gmail\Message;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

class GmailService
{
    /**
     * Kirim email melalui Gmail API menggunakan akun Gmail
     * yang terhubung dengan user.
     *
     * @param GoogleAccount $googleAccount
     * @param string $to
     * @param string $subject
     * @param string $htmlBody
     * @param string $pdfContent
     * @param string $pdfFilename
     * @param array $lampiranFiles
     * @return array
     */
    public function send(
        GoogleAccount $googleAccount,
        string $to,
        string $subject,
        string $htmlBody,
        string $pdfContent,
        string $pdfFilename,
        array $lampiranFiles = []
    ): array {
        $client = $this->makeClient($googleAccount);

        $gmail = new Gmail($client);

        $rawMessage = $this->buildRawMessage(
            from: $googleAccount->google_email,
            to: $to,
            subject: $subject,
            htmlBody: $htmlBody,
            pdfContent: $pdfContent,
            pdfFilename: $pdfFilename,
            lampiranFiles: $lampiranFiles
        );

        $message = new Message();
        $message->setRaw($rawMessage);

        $result = $gmail->users_messages->send(
            'me',
            $message
        );

        return [
            'id' => $result->getId(),
            'thread_id' => $result->getThreadId(),
        ];
    }

    /**
     * Buat Google Client dan pastikan access token masih valid.
     */
    private function makeClient(GoogleAccount $googleAccount): Client
    {
        $client = new Client();

        $client->setClientId(
            config('services.google.client_id')
        );

        $client->setClientSecret(
            config('services.google.client_secret')
        );

        $client->setAccessType('offline');

        $client->setAccessToken([
            'access_token' => $googleAccount->access_token,
            'expires_in' => max(
                0,
                now()->diffInSeconds(
                    $googleAccount->token_expires_at,
                    false
                )
            ),
            'created' => now()->timestamp,
        ]);

        /*
         * Access token sudah expired.
         * Gunakan refresh token untuk mendapatkan token baru.
         */
        if (
            $client->isAccessTokenExpired() &&
            !empty($googleAccount->refresh_token)
        ) {
            $newToken = $client->fetchAccessTokenWithRefreshToken(
                $googleAccount->refresh_token
            );

            if (isset($newToken['error'])) {
                throw new RuntimeException(
                    'Token Gmail sudah tidak valid. Silakan hubungkan ulang akun Gmail.'
                );
            }

            if (empty($newToken['access_token'])) {
                throw new RuntimeException(
                    'Google tidak memberikan access token baru.'
                );
            }

            $googleAccount->access_token = $newToken['access_token'];

            $expiresIn = $newToken['expires_in'] ?? 3600;

            $googleAccount->token_expires_at = now()->addSeconds(
                $expiresIn
            );

            /*
             * Biasanya Google tidak memberikan refresh_token
             * setiap kali refresh. Jangan menimpa refresh_token lama.
             */
            $googleAccount->save();

            $client->setAccessToken($newToken);
        }

        /*
         * Kalau access token expired tetapi tidak mempunyai
         * refresh token, user harus connect Gmail ulang.
         */
        if ($client->isAccessTokenExpired()) {
            throw new RuntimeException(
                'Token Gmail sudah expired. Silakan hubungkan ulang akun Gmail.'
            );
        }

        return $client;
    }

    /**
     * Membuat MIME email dan encode ke base64url,
     * sesuai format yang dibutuhkan Gmail API.
     */
    private function buildRawMessage(
        string $from,
        string $to,
        string $subject,
        string $htmlBody,
        string $pdfContent,
        string $pdfFilename,
        array $lampiranFiles
    ): string {
        $boundary = '=_AutoApplyMailer_' . bin2hex(random_bytes(16));

        $headers = [
            'From: ' . $from,
            'To: ' . $to,
            'Subject: ' . $this->encodeHeader($subject),
            'MIME-Version: 1.0',
            'Content-Type: multipart/mixed; boundary="' . $boundary . '"',
        ];

        $message = implode("\r\n", $headers);
        $message .= "\r\n\r\n";

        /*
         * Body email HTML
         */
        $message .= '--' . $boundary . "\r\n";
        $message .= "Content-Type: text/html; charset=UTF-8\r\n";
        $message .= "Content-Transfer-Encoding: 8bit\r\n";
        $message .= "\r\n";
        $message .= $htmlBody . "\r\n\r\n";

        /*
         * PDF surat lamaran
         */
        $message .= '--' . $boundary . "\r\n";
        $message .= 'Content-Type: application/pdf; name="' .
            $this->escapeHeader($pdfFilename) .
            "\"\r\n";
        $message .= 'Content-Disposition: attachment; filename="' .
            $this->escapeHeader($pdfFilename) .
            "\"\r\n";
        $message .= "Content-Transfer-Encoding: base64\r\n";
        $message .= "\r\n";
        $message .= chunk_split(
            base64_encode($pdfContent),
            76,
            "\r\n"
        );
        $message .= "\r\n";

        /*
         * Attachment CV / dokumen pendukung.
         */
        foreach ($lampiranFiles as $file) {
            $path = storage_path(
                'app/public/berkas/' . $file
            );

            if (!is_file($path)) {
                throw new RuntimeException(
                    "File lampiran tidak ditemukan: {$file}"
                );
            }

            $mimeType = mime_content_type($path)
                ?: 'application/octet-stream';

            $filename = basename($path);

            $message .= '--' . $boundary . "\r\n";
            $message .= 'Content-Type: ' . $mimeType .
                '; name="' .
                $this->escapeHeader($filename) .
                "\"\r\n";
            $message .= 'Content-Disposition: attachment; filename="' .
                $this->escapeHeader($filename) .
                "\"\r\n";
            $message .= "Content-Transfer-Encoding: base64\r\n";
            $message .= "\r\n";
            $message .= chunk_split(
                base64_encode(
                    file_get_contents($path)
                ),
                76,
                "\r\n"
            );
            $message .= "\r\n";
        }

        $message .= '--' . $boundary . "--\r\n";

        /*
         * Gmail API membutuhkan base64url,
         * bukan base64 biasa.
         */
        return rtrim(
            strtr(
                base64_encode($message),
                '+/',
                '-_'
            ),
            '='
        );
    }

    /**
     * Encode subject agar aman untuk karakter UTF-8.
     */
    private function encodeHeader(string $value): string
    {
        return '=?UTF-8?B?' .
            base64_encode($value) .
            '?=';
    }

    /**
     * Amankan nama file/header dari karakter yang tidak diinginkan.
     */
    private function escapeHeader(string $value): string
    {
        return str_replace(
            ['"', "\r", "\n"],
            ['_', '', ''],
            $value
        );
    }
}
