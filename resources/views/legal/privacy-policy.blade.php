<x-guest-layout title="Privacy Policy — Auto Apply Mailer">

    {{-- =========================================================
        FONT & TOKEN SISTEM HALAMAN INI
        Disamakan dengan halaman Template surat & email:
        Lora untuk judul (kesan surat/dokumen resmi), Inter untuk UI.
    ========================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;0,600;1,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .pp-page {
            --paper: #FAF7F1;
            --paper-soft: #F2EDE1;
            --ink: #23262B;
            --ink-soft: #83796C;
            --line: #E4DECE;
            --accent: #2F6F4E;
            --accent-ink: #1F4D36;
            --accent-soft: #E4EEE6;
            --clay: #9C5A3C;
            --clay-soft: #F2E5DC;
            font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
            background: var(--paper);
        }

        .pp-serif {
            font-family: 'Lora', Georgia, serif;
        }

        .pp-page ::selection {
            background: var(--accent-soft);
        }

        /* Badge ikon di atas — pengganti kotak indigo polos */
        .pp-badge {
            background: var(--accent);
            box-shadow: 0 10px 25px -5px rgba(47, 111, 78, 0.35);
        }

        /* Kartu section — tab warna kiri, senada dgn tpl-row */
        .pp-section {
            background: #fff;
            border: 1px solid var(--line);
            border-left-width: 3px;
            border-left-color: var(--accent);
            border-radius: 0.85rem;
            padding: 1.5rem 1.75rem;
            transition: border-color 0.15s ease;
        }

        .pp-section:hover {
            border-color: var(--ink-soft);
            border-left-width: 3px;
            border-left-color: var(--accent);
        }

        .pp-section--clay {
            border-left-color: var(--clay);
        }

        .pp-num {
            font-size: 0.6875rem;
            font-weight: 600;
            letter-spacing: 0.02em;
            padding: 0.2rem 0.55rem;
            border-radius: 0.4rem;
            background: var(--accent-soft);
            color: var(--accent-ink);
        }

        .pp-section--clay .pp-num {
            background: var(--clay-soft);
            color: var(--clay);
        }

        .pp-section h2 {
            font-family: 'Lora', Georgia, serif;
        }

        .pp-section p,
        .pp-section li {
            color: var(--ink-soft);
        }

        .pp-section ul {
            list-style: disc;
            padding-left: 1.25rem;
        }

        .pp-section li {
            margin-top: 0.5rem;
        }

        .pp-contact {
            background: var(--paper-soft);
            border: 1px dashed var(--line);
            border-radius: 1rem;
            padding: 1.1rem 1.25rem;
        }

        .pp-contact-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--ink-soft);
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .pp-updated {
            font-size: 0.75rem;
            color: var(--ink-soft);
        }

        .pp-back {
            color: var(--accent-ink);
            font-weight: 600;
            transition: color 0.15s ease;
        }

        .pp-back:hover {
            color: var(--accent);
        }
    </style>

    <div class="pp-page py-8 min-h-screen">
        <div class="max-w-3xl mx-auto px-4">

            {{-- Branding --}}
            <div class="text-center mb-10">
                <div class="pp-badge mx-auto flex h-16 w-16 items-center justify-center rounded-2xl">
                    <svg
                        class="h-8 w-8 text-white"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        aria-hidden="true">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 7.5A2.5 2.5 0 0 1 5.5 5h13A2.5 2.5 0 0 1 21 7.5v9a2.5 2.5 0 0 1-2.5 2.5h-13A2.5 2.5 0 0 1 3 16.5v-9Z" />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m4 7 7.1 5.1a1.5 1.5 0 0 0 1.8 0L20 7" />
                    </svg>
                </div>

                <h1 class="pp-serif mt-5 text-2xl font-semibold" style="color: var(--ink)">
                    Kebijakan Privasi
                </h1>

                <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                    Bagaimana Auto Apply Mailer mengelola data dan informasi Anda.
                </p>
            </div>

            <div class="space-y-4 text-sm leading-7">

                <div class="pp-section">
                    <span class="pp-num">01</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Pendahuluan
                    </h2>

                    <p class="mt-2">
                        Kebijakan Privasi ini menjelaskan bagaimana Auto Apply Mailer
                        ("Auto Apply Mailer", "Aplikasi", "kami", atau "kita")
                        mengumpulkan, menggunakan, menyimpan, melindungi, dan menghapus
                        data pribadi ketika Anda membuat akun atau menggunakan layanan.
                    </p>

                    <p class="mt-3">
                        Dengan menggunakan aplikasi, Anda dapat mengelola profil pencari
                        kerja, menyimpan dokumen dan template lamaran, serta mengirim
                        lamaran melalui akun email yang Anda hubungkan.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">02</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Data yang Kami Kumpulkan
                    </h2>

                    <p class="mt-2">
                        Data yang dapat diproses Auto Apply Mailer antara lain:
                    </p>

                    <ul>
                        <li>Nama lengkap.</li>
                        <li>Alamat email akun aplikasi.</li>
                        <li>Tempat dan tanggal lahir.</li>
                        <li>Nomor telepon.</li>
                        <li>Alamat.</li>
                        <li>Informasi pendidikan.</li>
                        <li>CV, surat lamaran, dan dokumen yang Anda unggah.</li>
                        <li>Template email dan konten lamaran yang Anda buat.</li>
                        <li>Alamat email penerima lamaran.</li>
                        <li>Riwayat atau status pengiriman lamaran.</li>
                        <li>Data teknis yang diperlukan untuk keamanan dan operasional aplikasi.</li>
                    </ul>
                </div>

                <div class="pp-section pp-section--clay">
                    <span class="pp-num">03</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Data dari Google dan Gmail
                    </h2>

                    <p class="mt-2">
                        Auto Apply Mailer tidak menggunakan Google untuk login ke akun
                        Auto Apply Mailer. Login aplikasi tetap menggunakan email dan
                        password yang terdaftar pada sistem Auto Apply Mailer.
                    </p>

                    <p class="mt-3">
                        Google OAuth hanya digunakan apabila Anda memilih untuk
                        menghubungkan akun Gmail agar Auto Apply Mailer dapat menjalankan
                        fitur pengiriman lamaran melalui Gmail API.
                    </p>

                    <p class="mt-3">
                        Bergantung pada izin (scope) yang Anda berikan, aplikasi dapat
                        menerima data dan/atau kredensial otorisasi yang diperlukan untuk
                        melakukan tindakan Gmail yang Anda minta, termasuk mengirim email
                        melalui akun Gmail yang telah dihubungkan.
                    </p>

                    <p class="mt-3">
                        Kami tidak menggunakan data Google/Gmail Anda untuk menjual,
                        menyewakan, atau menyediakan iklan yang ditargetkan berdasarkan
                        data tersebut. Penggunaan Google user data dibatasi pada fungsi
                        aplikasi yang dijelaskan dalam Kebijakan Privasi ini dan fitur
                        yang Anda minta. Google mewajibkan penggunaan data API dibatasi
                        pada fungsi yang diungkapkan kepada pengguna.
                    </p>

                    <p class="mt-3">
                        Anda dapat memutuskan koneksi akun Gmail dari Auto Apply Mailer
                        melalui fitur yang tersedia di aplikasi. Anda juga dapat mencabut
                        akses aplikasi melalui pengaturan keamanan akun Google Anda.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">04</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Tujuan Penggunaan Data
                    </h2>

                    <p class="mt-2">
                        Data digunakan untuk menyediakan dan mengoperasikan fitur
                        Auto Apply Mailer, termasuk:
                    </p>

                    <ul>
                        <li>Membuat dan mengelola akun pengguna.</li>
                        <li>Mengautentikasi pengguna.</li>
                        <li>Menyediakan proses lupa dan reset password.</li>
                        <li>Menyimpan profil pencari kerja.</li>
                        <li>Menyimpan CV dan dokumen pendukung.</li>
                        <li>Menyimpan template lamaran.</li>
                        <li>Membantu menyiapkan dan mengirim lamaran kerja.</li>
                        <li>Menyimpan riwayat pengiriman dan status lamaran.</li>
                        <li>Menjaga keamanan, mencegah penyalahgunaan, dan melakukan troubleshooting.</li>
                        <li>Meningkatkan keandalan fitur aplikasi.</li>
                    </ul>
                </div>

                <div class="pp-section pp-section--clay">
                    <span class="pp-num">05</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Email Transaksional dan Brevo
                    </h2>

                    <p class="mt-2">
                        Untuk email sistem seperti email pemulihan password,
                        Auto Apply Mailer menggunakan layanan email transactional
                        pihak ketiga, yaitu Brevo.
                    </p>

                    <p class="mt-3">
                        Brevo dapat memproses data yang diperlukan untuk mengirim email,
                        seperti alamat email penerima, subjek, isi email, serta informasi
                        teknis pengiriman.
                    </p>

                    <p class="mt-3">
                        Brevo digunakan untuk pengiriman email yang dipicu oleh tindakan
                        pengguna dan bukan sebagai sistem login utama Auto Apply Mailer.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">06</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Password dan Keamanan Akun
                    </h2>

                    <p class="mt-2">
                        Password akun Auto Apply Mailer disimpan menggunakan mekanisme
                        hashing dan tidak disimpan sebagai teks biasa.
                    </p>

                    <p class="mt-3">
                        Kami menerapkan langkah keamanan yang wajar untuk melindungi akun,
                        token reset password, koneksi layanan pihak ketiga, dan data yang
                        tersimpan dalam sistem.
                    </p>

                    <p class="mt-3">
                        Namun, tidak ada sistem yang dapat dijamin 100% aman dari seluruh
                        risiko keamanan.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">07</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Dokumen dan Data Lamaran
                    </h2>

                    <p class="mt-2">
                        Dokumen seperti CV dan surat lamaran yang Anda unggah digunakan
                        untuk menyediakan fitur pengelolaan dan pengiriman lamaran kerja.
                    </p>

                    <p class="mt-3">
                        Pengguna bertanggung jawab untuk memastikan bahwa dokumen,
                        informasi, dan konten yang diberikan kepada aplikasi memang
                        diperbolehkan untuk digunakan dan dikirim.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">08</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Data Penerima Lamaran
                    </h2>

                    <p class="mt-2">
                        Ketika Anda menggunakan fitur pengiriman lamaran, Anda dapat
                        memberikan alamat email perusahaan, perekrut, atau penerima
                        lainnya.
                    </p>

                    <p class="mt-3">
                        Alamat email tersebut digunakan untuk tujuan pengiriman lamaran
                        yang Anda minta dan dapat muncul dalam riwayat pengiriman aplikasi.
                    </p>
                </div>

                <div class="pp-section pp-section--clay">
                    <span class="pp-num">09</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Layanan Pihak Ketiga
                    </h2>

                    <p class="mt-2">
                        Auto Apply Mailer dapat menggunakan penyedia layanan pihak ketiga
                        untuk menjalankan infrastrukturnya, termasuk antara lain:
                    </p>

                    <ul>
                        <li>Google dan Gmail API untuk koneksi dan pengiriman melalui Gmail.</li>
                        <li>Brevo untuk email transactional seperti reset password.</li>
                        <li>Penyedia hosting, database, penyimpanan, dan infrastruktur aplikasi.</li>
                    </ul>

                    <p class="mt-3">
                        Setiap penyedia pihak ketiga tunduk pada kebijakan dan ketentuan
                        mereka masing-masing.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">10</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Dasar dan Retensi Pemrosesan Data
                    </h2>

                    <p class="mt-2">
                        Data diproses sejauh diperlukan untuk menyediakan layanan,
                        memenuhi tindakan yang diminta pengguna, menjaga keamanan,
                        memenuhi kewajiban hukum, atau berdasarkan dasar pemrosesan
                        lain yang berlaku.
                    </p>

                    <p class="mt-3">
                        Data disimpan selama diperlukan untuk tujuan tersebut,
                        selama akun masih aktif, selama dibutuhkan untuk menyediakan
                        layanan, atau sepanjang diwajibkan oleh hukum.
                    </p>

                    <p class="mt-3">
                        Detail masa retensi dapat berbeda berdasarkan jenis data.
                        Data yang tidak lagi diperlukan akan dihapus atau dianonimkan
                        sesuai kebijakan operasional dan kewajiban yang berlaku.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">11</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Hak Anda
                    </h2>

                    <p class="mt-2">
                        Tunduk pada hukum yang berlaku, Anda dapat memiliki hak untuk:
                    </p>

                    <ul>
                        <li>Memperoleh informasi mengenai pemrosesan data pribadi Anda.</li>
                        <li>Memperbaiki atau memperbarui data yang tidak akurat.</li>
                        <li>Mengakses data pribadi tertentu yang kami simpan.</li>
                        <li>Meminta penghapusan data atau akun dalam kondisi yang diperbolehkan.</li>
                        <li>Menarik persetujuan atas pemrosesan yang berbasis persetujuan.</li>
                        <li>Meminta pembatasan pemrosesan dalam kondisi tertentu.</li>
                        <li>Mengajukan pertanyaan atau keberatan mengenai pemrosesan data.</li>
                    </ul>

                    <p class="mt-3">
                        Permintaan dapat diajukan melalui alamat kontak yang tercantum
                        pada bagian Kontak.
                    </p>
                </div>

                <div class="pp-section pp-section--clay">
                    <span class="pp-num">12</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Penghapusan Akun dan Data
                    </h2>

                    <p class="mt-2">
                        Jika Anda ingin menghapus akun Auto Apply Mailer atau meminta
                        penghapusan data tertentu, hubungi kami melalui alamat kontak
                        resmi.
                    </p>

                    <p class="mt-3">
                        Jika Anda telah menghubungkan akun Gmail, Anda juga dapat
                        mencabut otorisasi Auto Apply Mailer dari pengaturan akun Google
                        Anda.
                    </p>

                    <p class="mt-3">
                        Penghapusan data dapat tunduk pada kebutuhan untuk menyimpan
                        informasi tertentu apabila diwajibkan atau diperbolehkan oleh
                        hukum, untuk penyelesaian sengketa, keamanan, pencegahan fraud,
                        atau pencatatan transaksi yang sah.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">13</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Perubahan Kebijakan
                    </h2>

                    <p class="mt-2">
                        Kebijakan Privasi dapat diperbarui dari waktu ke waktu untuk
                        mencerminkan perubahan layanan, teknologi, praktik keamanan,
                        atau persyaratan hukum.
                    </p>

                    <p class="mt-3">
                        Versi terbaru akan dipublikasikan pada halaman ini.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">14</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Kontak
                    </h2>

                    <div class="pp-contact mt-3 space-y-1">
                        <p>
                            <span class="pp-contact-label">Nama/Pengelola </span><br>
                            <span style="color: var(--ink)">Stevent</span>
                        </p>

                        <p class="pt-1">
                            <span class="pp-contact-label">Email </span><br>
                            <span style="color: var(--ink)">ahmadstevent3@gmail.com</span>
                        </p>

                        <p class="pt-1">
                            <span class="pp-contact-label">Website </span><br>
                            <span style="color: var(--ink)">https://stevents.my.id/</span>
                        </p>
                    </div>
                </div>

                <p class="pp-updated text-center pt-2">
                    Terakhir diperbarui: 20 Agustus 2026
                </p>
            </div>

            <div class="border-t pt-6 mt-8 text-center" style="border-color: var(--line)">
                <a href="{{ route('login') }}" class="pp-back text-sm hover:underline">
                    Kembali ke login
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>