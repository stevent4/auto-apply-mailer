# Auto Apply Mailer

Auto Apply Mailer adalah aplikasi web berbasis Laravel untuk membantu pengguna mengelola profil pelamar, menyimpan dokumen, menyiapkan template email dan surat lamaran, menghubungkan akun Gmail, mengirim lamaran melalui Gmail API, serta mencatat riwayat lamaran.

Aplikasi ini menggunakan email akun untuk autentikasi dan profil, sedangkan akun Gmail yang ditautkan melalui Google OAuth digunakan sebagai alamat pengirim lamaran.

---

## Fitur

### Autentikasi
- Register dan login
- Logout
- Verifikasi email
- Lupa password dan reset password
- Konfirmasi password

### Profil Pelamar
Profil menyimpan informasi:
- Nama lengkap
- Email
- Tempat lahir
- Tanggal lahir
- Pendidikan terakhir
- Alamat
- Nomor HP

Profil harus diselesaikan sebelum alur aplikasi dapat digunakan sesuai kebutuhan aplikasi.

### Google OAuth / Gmail
Pengguna dapat menghubungkan akun Gmail melalui halaman Profile.

Aplikasi meminta akses:
- `https://www.googleapis.com/auth/gmail.send`
- `https://www.googleapis.com/auth/userinfo.email`

Akun Google yang terhubung disimpan sebagai satu akun Gmail untuk setiap user.

Access token dan refresh token disimpan menggunakan encrypted cast pada model `GoogleAccount`.

Jika access token kedaluwarsa, aplikasi mencoba memperbaruinya menggunakan refresh token. Jika refresh token tidak tersedia atau sudah tidak valid, pengguna harus menghubungkan Gmail kembali.

### Pengiriman Lamaran
Halaman Apply menyediakan alur untuk:
- Mengisi email HRD
- Mengisi nama perusahaan
- Mengisi posisi
- Memilih subjek otomatis atau subjek custom
- Memilih template email
- Memilih template surat lamaran PDF
- Menyesuaikan isi email
- Menyesuaikan isi surat lamaran
- Memilih dokumen lampiran
- Mengirim email melalui Gmail API

Subjek otomatis menggunakan format:

```text
{posisi} - {nama pelamar} - Jombang
```

Surat lamaran PDF dibuat menggunakan DomPDF sebelum email dikirim.

Email dikirim dari alamat Gmail yang sedang terhubung dengan akun pengguna.

### Template
Aplikasi menyediakan template bawaan melalui `TemplateSeeder`.

Template dibedakan menjadi:
- `email`
- `pdf`

Template bawaan yang tersedia di source saat ini mencakup:
- Formal Profesional
- Singkat & Profesional
- Fresh Graduate
- IT / Programmer
- Formal Standar
- Profesional Modern

Template sistem menggunakan `user_id = NULL`, sedangkan struktur database juga mendukung template milik user.

### Berkas
Pengguna dapat mengunggah satu atau beberapa file.

Format yang diperbolehkan:
- PDF
- DOC
- DOCX
- JPG
- JPEG
- PNG

Ukuran maksimum setiap file adalah 10 MB.

Berkas disimpan berdasarkan user:

```text
storage/app/public/berkas/{user_id}/
```

Aplikasi juga membatasi akses download dan penghapusan agar file hanya berasal dari folder user yang sedang login.

### History
Setiap pengiriman lamaran yang berhasil dicatat ke `application_histories`.

Data yang dicatat:
- Email HRD
- Nama perusahaan
- Posisi
- Subjek
- User pemilik history
- Status
- Waktu pengiriman

Status awal:

```text
Terkirim
```

History dapat:
- Mengubah status
- Menghapus riwayat
- Membuka kembali data untuk pengiriman ulang

---

## Teknologi

### Backend

- PHP `^8.3`
- Laravel `^13.17`
- Laravel Breeze
- Laravel Eloquent
- Laravel Blade
- Laravel Sail
- Laravel Tinker

### Google / Email

- `google/apiclient ^2.19`
- Gmail API
- Google OAuth 2.0

### PDF

- `barryvdh/laravel-dompdf ^3.1`

### Frontend

- Blade
- Vite
- Tailwind CSS
- Alpine.js
- Laravel Vite Plugin

---

## Persyaratan

Pastikan environment sudah memiliki:

- PHP 8.3 atau lebih baru
- Composer
- Node.js dan npm
- Database yang didukung Laravel
- Google Cloud Project jika ingin menggunakan Gmail OAuth
- Extension PHP yang dibutuhkan Laravel dan Google API Client

---

# Instalasi

## 1. Clone repository

```bash
git clone https://github.com/stevent4/auto-apply-mailer.git
cd auto-apply-mailer
```

## 2. Install dependency PHP

```bash
composer install
```

## 3. Buat file environment

```bash
cp .env.example .env
```

## 4. Generate application key

```bash
php artisan key:generate
```

## 5. Konfigurasi database

Atur database pada `.env`.

Contoh menggunakan SQLite:

```env
DB_CONNECTION=sqlite
```

Kemudian buat file database jika belum ada:

```bash
touch database/database.sqlite
```

Atau gunakan MySQL/PostgreSQL sesuai environment yang digunakan.

## 6. Jalankan migration dan seeder

```bash
php artisan migrate
php artisan db:seed
```

Seeder akan menjalankan `TemplateSeeder` dan membuat template bawaan aplikasi.

## 7. Install dependency frontend

```bash
npm install
```

## 8. Build asset

```bash
npm run build
```

## 9. Buat symbolic link storage

```bash
php artisan storage:link
```

## 10. Jalankan aplikasi

```bash
php artisan serve
```

Kemudian buka:

```text
http://127.0.0.1:8000
```

---

# Konfigurasi Google OAuth

Fitur Gmail membutuhkan Google OAuth 2.0.

## 1. Buat Google Cloud Project

Buat atau pilih project pada Google Cloud Console.

Aktifkan Gmail API untuk project tersebut.

## 2. Buat OAuth Client

Buat OAuth Client ID dengan application type yang sesuai untuk aplikasi web.

Tambahkan redirect URI yang sama dengan konfigurasi aplikasi.

Untuk development lokal, source project menggunakan:

```text
http://localhost:8000/auth/google/callback
```

## 3. Isi `.env`

Tambahkan:

```env
GOOGLE_CLIENT_ID=your-client-id
GOOGLE_CLIENT_SECRET=your-client-secret
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
```

Jangan memasukkan `GOOGLE_CLIENT_SECRET` ke repository.

## 4. Bersihkan cache konfigurasi

Setelah mengubah `.env`:

```bash
php artisan optimize:clear
```

---

# Google OAuth dan Status "App belum diverifikasi"

Saat aplikasi OAuth masih dalam tahap development/testing dan belum diverifikasi oleh Google, Google dapat menampilkan halaman:

```text
Google belum memverifikasi aplikasi ini
```

Hal ini berkaitan dengan status OAuth consent screen dan scope yang diminta aplikasi.

Source aplikasi saat ini meminta scope Gmail:

```text
https://www.googleapis.com/auth/gmail.send
```

serta:

```text
https://www.googleapis.com/auth/userinfo.email
```

Scope `gmail.send` digunakan agar aplikasi dapat mengirim email melalui akun Gmail yang telah dihubungkan.

Untuk development pribadi, pengguna yang diizinkan pada OAuth consent screen dapat digunakan sebagai test user sesuai konfigurasi Google Cloud.

Untuk penggunaan publik, konfigurasi OAuth consent screen, branding, authorized domains, dan proses verifikasi Google perlu diselesaikan sesuai persyaratan Google.

---

# Alur Gmail

Alur koneksi Gmail pada aplikasi:

```text
User Login
    ↓
Profile
    ↓
Hubungkan Gmail
    ↓
Google OAuth
    ↓
Google memberikan authorization code
    ↓
Laravel menukarkan code menjadi token
    ↓
Email Google diambil
    ↓
GoogleAccount disimpan
    ↓
User kembali ke Profile
```

Saat mengirim lamaran:

```text
Apply
    ↓
Validasi Gmail terhubung
    ↓
Ambil GoogleAccount user
    ↓
Periksa access token
    ↓
Refresh token jika diperlukan
    ↓
Generate PDF surat lamaran
    ↓
Build MIME message
    ↓
Gmail API users.messages.send()
    ↓
Simpan ApplicationHistory
```

---

# Email Akun vs Gmail Pengirim

Aplikasi sengaja memisahkan dua fungsi email.

### Email akun

Digunakan untuk:
- Login
- Identitas akun
- Data profil pelamar

### Gmail pengirim

Digunakan untuk:
- Otorisasi Gmail API
- Mengirim lamaran
- Menjadi alamat `From` email

Contoh:

```text
Email akun:
nama@contoh.com

Gmail pengirim:
nama@gmail.com
```

Email lamaran akan dikirim menggunakan Gmail yang telah ditautkan melalui Profile.

---

# Penyimpanan Token

Model `GoogleAccount` menyimpan:

```text
google_id
google_email
access_token
refresh_token
token_expires_at
```

`access_token` dan `refresh_token` menggunakan Laravel encrypted cast.

Jangan pernah membagikan:
- `.env`
- `GOOGLE_CLIENT_SECRET`
- access token
- refresh token

Jangan commit file credential atau token ke repository.

---

# Struktur Project

Struktur penting project:

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── ApplyController.php
│   │   ├── FileController.php
│   │   ├── GoogleAuthController.php
│   │   └── ProfileController.php
│   ├── Middleware/
│   │   └── EnsureProfileCompleted.php
│   └── Requests/
│
├── Mail/
│   └── JobApplicationMail.php
│
├── Models/
│   ├── ApplicationHistory.php
│   ├── GoogleAccount.php
│   ├── Template.php
│   └── User.php
│
└── Services/
    └── GmailService.php

database/
├── migrations/
└── seeders/
    ├── DatabaseSeeder.php
    └── TemplateSeeder.php

resources/
├── css/
├── js/
└── views/
    ├── apply.blade.php
    ├── dashboard.blade.php
    ├── files/
    ├── profile/
    ├── auth/
    ├── emails/
    ├── pdf/
    └── legal/

routes/
├── web.php
└── auth.php
```

---

# Route Utama

## Public

```text
GET /
GET /privacy-policy
GET /terms
```

## Authentication

Route authentication berasal dari `routes/auth.php`, termasuk:

```text
GET  /login
POST /login
GET  /register
POST /register
GET  /forgot-password
POST /forgot-password
GET  /reset-password/{token}
POST /reset-password
POST /logout
```

## Profile

```text
GET    /profile
PATCH  /profile
DELETE /profile
```

## Apply

```text
GET  /apply
POST /send
```

## History

```text
PATCH  /history/{id}/status
DELETE /history/{id}
GET    /history/resend/{id}
```

## Files

```text
GET    /files
POST   /files
GET    /files/download/{filename}
DELETE /files/{filename}
```

## Google OAuth

```text
GET    /auth/google
GET    /auth/google/callback
DELETE /auth/google
```

---

# Database

Database utama aplikasi terdiri dari tabel Laravel standar dan tabel fitur aplikasi.

Tabel fitur utama:

### `users`

Menyimpan akun dan profil pelamar.

Field profil tambahan:

```text
birth_place
birth_date
education
address
phone
profile_completed
```

### `google_accounts`

Menyimpan hubungan user dengan akun Google/Gmail.

Relasi:

```text
User hasOne GoogleAccount
```

### `templates`

Menyimpan template email dan PDF.

Tipe:

```text
email
pdf
```

### `application_histories`

Menyimpan riwayat pengiriman lamaran.

Relasi:

```text
User hasMany ApplicationHistory
```

---

# Template dan Variabel

Template email/PDF dapat menggunakan placeholder yang diproses oleh aplikasi.

Contoh yang digunakan pada template bawaan:

```text
{{nama}}
{{email}}
{{phone}}
{{pendidikan}}
{{perusahaan}}
{{posisi}}
{{alamat}}
{{tempat_lahir}}
{{tanggal_lahir}}
{{kota}}
{{tanggal}}
```

Pada proses pengiriman, data lowongan dan profil digunakan untuk menghasilkan konten final.

---

# Lampiran

Lampiran yang dipilih dari halaman Apply berasal dari folder user yang sedang login.

Struktur penyimpanan:

```text
storage/app/public/berkas/{user_id}/
```

Aplikasi menggunakan `basename()` saat memproses nama file untuk mengurangi risiko path traversal.

Sebelum lampiran dikirim, aplikasi juga memastikan file berada pada folder user yang sesuai.

---

# PDF Surat Lamaran

Surat lamaran dibuat menggunakan:

```text
barryvdh/laravel-dompdf
```

Template PDF dirender melalui view:

```text
resources/views/pdf/lamaran.blade.php
```

PDF kemudian dikirim sebagai attachment bersama email.

Nama PDF dibuat berdasarkan nama pelamar, dengan format:

```text
Surat_Lamaran_{Nama_Pelamar}.pdf
```

Karakter yang tidak diperbolehkan dibersihkan terlebih dahulu.

---

# Pengiriman Email

Pengiriman utama aplikasi tidak menggunakan SMTP Laravel.

`GmailService` membuat MIME message dan mengirimkannya melalui:

```text
Gmail API
users.messages.send()
```

Email berisi:
- HTML body
- Surat lamaran PDF
- Lampiran dokumen pendukung yang dipilih

MIME message kemudian di-encode ke Base64URL sesuai format Gmail API.

---

# Environment Variables

Minimal konfigurasi yang perlu diperhatikan:

```env
APP_NAME="Auto Apply Mailer"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database

FILESYSTEM_DISK=local

GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback

MAIL_MAILER=log
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

Catatan: konfigurasi database dapat disesuaikan dengan environment deployment.

Pengiriman lamaran menggunakan Gmail API, sehingga konfigurasi `MAIL_MAILER` SMTP Laravel bukan jalur pengiriman utama fitur Apply.

---

# Development

Untuk menjalankan Vite dalam mode development:

```bash
npm run dev
```

Untuk build production:

```bash
npm run build
```

Untuk menjalankan Laravel:

```bash
php artisan serve
```

Jika menggunakan Laravel Sail:

```bash
./vendor/bin/sail up
```

---

# Perintah Laravel yang Berguna

Membersihkan seluruh cache aplikasi:

```bash
php artisan optimize:clear
```

Melihat daftar route:

```bash
php artisan route:list
```

Menjalankan migration:

```bash
php artisan migrate
```

Menjalankan ulang migration:

```bash
php artisan migrate:fresh
```

Menjalankan seeder:

```bash
php artisan db:seed
```

Menjalankan migration sekaligus seeder:

```bash
php artisan migrate --seed
```

Membuat symbolic link storage:

```bash
php artisan storage:link
```

Menjalankan test:

```bash
php artisan test
```

---

# Troubleshooting

## Gmail tidak bisa terhubung

Periksa:

1. `GOOGLE_CLIENT_ID` sudah benar.
2. `GOOGLE_CLIENT_SECRET` sudah benar.
3. `GOOGLE_REDIRECT_URI` sama persis dengan redirect URI di Google Cloud.
4. Gmail API sudah diaktifkan.
5. Akun Google yang digunakan termasuk test user jika OAuth consent screen masih testing.
6. Jalankan:

```bash
php artisan optimize:clear
```

## Access token Gmail expired

Aplikasi mencoba menggunakan refresh token secara otomatis.

Jika refresh token tidak tersedia atau tidak valid, hubungkan kembali Gmail melalui halaman Profile.

## Email gagal dikirim

Periksa:
- Gmail sudah terhubung.
- Token Google masih valid.
- Gmail API aktif.
- Email tujuan valid.
- Lampiran benar-benar berada pada folder user.
- Log Laravel untuk detail exception.

Log biasanya tersedia di:

```text
storage/logs/laravel.log
```

## File tidak muncul

Pastikan storage link sudah dibuat:

```bash
php artisan storage:link
```

dan file berada pada:

```text
storage/app/public/berkas/{user_id}/
```

---

# Keamanan

Beberapa perlindungan yang sudah diterapkan pada source:

- Password menggunakan Laravel hashed cast.
- Access token dan refresh token Google menggunakan encrypted cast.
- File dibatasi berdasarkan user.
- Nama file menggunakan `basename()` saat download/delete/pengiriman.
- Lampiran diverifikasi agar berada di folder user yang benar.
- Upload dibatasi pada tipe file tertentu.
- Ukuran upload dibatasi maksimal 10 MB per file.
- Google account tidak boleh digunakan oleh user lain jika `google_id` sudah terhubung.
- Credential Google tidak seharusnya disimpan di repository.

Tetap gunakan HTTPS pada deployment production dan jangan membagikan credential OAuth.

---

# Status Project

Project ini merupakan aplikasi Laravel yang dikembangkan untuk alur manajemen dan pengiriman lamaran kerja.

Fokus utama saat ini:

```text
Profil
   ↓
Hubungkan Gmail
   ↓
Siapkan berkas & template
   ↓
Apply
   ↓
Generate surat PDF
   ↓
Kirim melalui Gmail API
   ↓
Simpan History
```

---

# Lisensi

Project menggunakan struktur aplikasi Laravel dan package dengan lisensi masing-masing.

Untuk source project ini, sesuaikan lisensi repository sesuai keputusan pemilik project sebelum dipublikasikan sebagai project open-source.
