# Auto Apply Mailer

**Auto Apply Mailer** adalah aplikasi web berbasis Laravel untuk membantu pencari kerja mengelola proses lamaran kerja dari satu tempat.

Pengguna dapat mengelola profil dan biodata, menyimpan dokumen lamaran, menyiapkan email lamaran, mengirim lamaran melalui akun Gmail yang terhubung (via Google/Gmail API), serta melantau riwayat lamaran yang telah dikirim.

## Fitur Utama

- Landing page untuk memperkenalkan aplikasi
- Registrasi dan login akun
- Pengelolaan profil dan biodata pelamar
- Pengelolaan berkas/CV dan dokumen pendukung
- Form pembuatan lamaran baru
- Pemilihan lampiran saat mengirim lamaran
- Template dan isi email lamaran
- Pengiriman lamaran menggunakan Gmail pengirim yang terhubung (Google OAuth + Gmail API, bukan SMTP)
- Riwayat lamaran yang telah dikirim
- Status dan informasi pengiriman lamaran

## Teknologi yang Digunakan

- **Backend:** Laravel 13 (PHP 8.3+)
- **Autentikasi:** Laravel Breeze
- **Database:** MySQL
- **Frontend build tools:** Vite, Tailwind CSS
- **Pengiriman email:** Google API Client (Gmail API) dengan OAuth 2.0
- **Pembuatan dokumen:** barryvdh/laravel-dompdf
- **Testing:** Pest (pestphp/pest, pestphp/pest-plugin-laravel)
- **Tooling pengembangan:** Laravel Sail, Laravel Pail, Laravel Pint

## Tampilan Aplikasi

### Homepage

Halaman awal yang menjelaskan fungsi utama Auto Apply Mailer dan menyediakan akses untuk masuk atau membuat akun.

<img src="docs/screenshots/homepage.png" alt="Homepage Auto Apply Mailer" width="100%">

### Login

Halaman login untuk masuk ke akun Auto Apply Mailer.

<img src="docs/screenshots/login.png" alt="Halaman Login" width="100%">

### Register

Halaman pendaftaran akun baru.

<img src="docs/screenshots/register.png" alt="Halaman Register" width="100%">

### Dashboard

Dashboard menjadi pusat pengelolaan profil, berkas, Gmail pengirim, template, dan riwayat lamaran.

<img src="docs/screenshots/dashboard.png" alt="Dashboard Auto Apply Mailer" width="100%">

### Profile

Halaman profil digunakan untuk melengkapi biodata yang nantinya dapat digunakan secara otomatis pada template email dan surat lamaran.

<img src="docs/screenshots/profil.png" alt="Profil Pelamar" width="100%">

### Apply Job

Halaman pembuatan lamaran baru. Pengguna dapat memasukkan email HRD, nama perusahaan, posisi yang dilamar, memilih lampiran, dan menyesuaikan isi lamaran.

<img src="docs/screenshots/apply.png" alt="Apply Job" width="100%">

### File Manager / Berkas

Halaman pengelolaan dokumen yang akan digunakan sebagai lampiran lamaran, seperti CV dan dokumen pendukung lainnya.

<img src="docs/screenshots/file-manager.png" alt="File Manager" width="100%">

### History / Riwayat Lamaran

Riwayat menampilkan daftar lamaran yang telah dikirim, termasuk waktu, perusahaan, posisi, email HRD, status, subjek, dan aksi pengiriman ulang.

<img src="docs/screenshots/history.png" alt="Riwayat Lamaran" width="100%">

## Alur Penggunaan

```text
Buat Akun
   ↓
Lengkapi Profil
   ↓
Upload CV / Dokumen
   ↓
Hubungkan Akun Gmail Pengirim
   ↓
Buat Lamaran
   ↓
Isi Informasi Perusahaan & Posisi
   ↓
Pilih Lampiran
   ↓
Sesuaikan Isi Email
   ↓
Kirim Lamaran
   ↓
Pantau Riwayat & Status
```

## Struktur Fitur

| Modul | Fungsi |
| --- | --- |
| Homepage | Informasi dan pengenalan aplikasi |
| Authentication | Registrasi dan login pengguna |
| Dashboard | Pusat pengelolaan aplikasi |
| Profile | Biodata dan informasi akun pelamar |
| Berkas | Upload dan pengelolaan dokumen |
| Apply Job | Membuat dan mengirim lamaran |
| Gmail Pengirim | Akun Gmail yang digunakan untuk pengiriman (Google OAuth) |
| Riwayat Lamaran | Melihat dan mengelola lamaran yang telah dikirim |

## Instalasi & Menjalankan Proyek

### Prasyarat

- PHP >= 8.3
- Composer
- Node.js & npm
- MySQL
- Akun Google Cloud dengan Gmail API diaktifkan (untuk fitur pengiriman lamaran)

### Langkah Instalasi

1. Clone repository

   ```bash
   git clone https://github.com/stevent4/auto-apply-mailer.git
   cd auto-apply-mailer
   ```

2. Install dependency PHP dan JavaScript

   ```bash
   composer install
   npm install
   ```

3. Siapkan file environment

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Konfigurasikan koneksi database pada `.env` (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`), lalu jalankan migrasi

   ```bash
   php artisan migrate
   ```

5. Konfigurasikan kredensial Google OAuth / Gmail API pada `.env`

   ```env
   GOOGLE_CLIENT_ID=
   GOOGLE_CLIENT_SECRET=
   GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
   ```

   Kredensial ini diperoleh dari [Google Cloud Console](https://console.cloud.google.com/) dengan mengaktifkan Gmail API dan membuat OAuth Client ID bertipe Web Application.

6. Build asset frontend

   ```bash
   npm run build
   ```

   atau untuk mode pengembangan:

   ```bash
   npm run dev
   ```

7. Jalankan server aplikasi

   ```bash
   php artisan serve
   ```

   Aplikasi dapat diakses melalui `http://localhost:8000`.

### Menjalankan Test

Proyek ini menggunakan Pest untuk pengujian.

```bash
php artisan test
```

## Catatan

- Auto Apply Mailer menggunakan akun Gmail pengguna (melalui Google OAuth dan Gmail API) untuk proses pengiriman lamaran, bukan konfigurasi SMTP biasa.
- Pastikan akun Gmail pengirim sudah terhubung dan kredensial Google OAuth pada `.env` sudah diisi dengan benar sebelum melakukan pengiriman lamaran.
- Dokumen lamaran (seperti surat lamaran) dapat dihasilkan dalam format PDF menggunakan `barryvdh/laravel-dompdf`.

## Screenshot

Seluruh screenshot pada README ini disimpan di:

```text
docs/screenshots/
├── homepage.png
├── login.png
├── register.png
├── dashboard.png
├── profil.png
├── apply.png
├── file-manager.png
└── history.png
```
