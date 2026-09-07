<?php

namespace App\Services;

class TemplateRenderer
{
    /**
     * Fallback default untuk variable yang datanya kosong/null.
     * Key harus cocok dengan key di $data yang dikirim saat render().
     */
    protected array $fallbacks = [
        'hr_name'  => 'Bapak/Ibu',
        'hr_email' => 'Tim HRD',
    ];

    /**
     * Render isi template: ganti semua {{variable}} dengan data asli.
     *
     * @param  string  $content  Isi template mentah (mengandung {{variable}})
     * @param  array<string, mixed>  $data  Data untuk mengisi variable, key tanpa kurung kurawal
     * @return string
     */
    public function render(string $content, array $data): string
    {
        return preg_replace_callback(
            '/\{\{\s*([a-zA-Z0-9_]+)\s*\}\}/',
            function (array $matches) use ($data) {
                $key = $matches[1];
                $value = $data[$key] ?? null;

                if (filled($value)) {
                    return $value;
                }

                // Pakai fallback kalau ada, kalau tidak biarkan placeholder terlihat
                // supaya kelihatan di preview bahwa data ini belum terisi.
                return $this->fallbacks[$key] ?? $matches[0];
            },
            $content
        );
    }

    /**
     * Cari variable yang masih kosong (tidak ada di $data / null) dan tidak
     * punya fallback — dipakai untuk highlight di halaman Preview.
     *
     * @return string[] daftar nama variable, misal ['linkedin', 'portfolio']
     */
    public function findUnresolvedVariables(string $content, array $data): array
    {
        preg_match_all('/\{\{\s*([a-zA-Z0-9_]+)\s*\}\}/', $content, $matches);

        $unresolved = [];
        foreach (array_unique($matches[1]) as $key) {
            $value = $data[$key] ?? null;
            if (blank($value) && !isset($this->fallbacks[$key])) {
                $unresolved[] = $key;
            }
        }

        return $unresolved;
    }
}
