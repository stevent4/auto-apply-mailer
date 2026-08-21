# Auto Apply Mailer

**Auto Apply Mailer** adalah aplikasi web untuk membantu pencari kerja mengelola proses lamaran kerja dari satu tempat.

Pengguna dapat mengelola profil dan biodata, menyimpan dokumen lamaran, menyiapkan email lamaran, mengirim lamaran melalui akun Gmail yang terhubung, serta melihat riwayat lamaran yang telah dikirim.

## Fitur Utama

- Landing page untuk memperkenalkan aplikasi
- Registrasi dan login akun
- Pengelolaan profil dan biodata pelamar
- Pengelolaan berkas/CV dan dokumen pendukung
- Form pembuatan lamaran baru
- Pemilihan lampiran saat mengirim lamaran
- Template dan isi email lamaran
- Pengiriman lamaran menggunakan Gmail pengirim yang terhubung
- Riwayat lamaran yang telah dikirim
- Status dan informasi pengiriman lamaran

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
| Gmail Pengirim | Akun Gmail yang digunakan untuk pengiriman |
| Riwayat Lamaran | Melihat dan mengelola lamaran yang telah dikirim |

## Catatan

Auto Apply Mailer menggunakan akun email pengguna untuk proses pengiriman lamaran. Pastikan akun pengirim dan konfigurasi yang diperlukan sudah disiapkan sebelum melakukan pengiriman.

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

## Lisensi

Silakan sesuaikan bagian lisensi ini dengan lisensi yang digunakan pada repository.
