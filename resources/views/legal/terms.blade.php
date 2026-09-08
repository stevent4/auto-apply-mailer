<x-guest-layout title="Terms — Auto Apply Mailer">

    {{-- =========================================================
        FONT & TOKEN SISTEM HALAMAN INI
        Disamakan dengan halaman Template surat & email dan
        Kebijakan Privasi: Lora untuk judul, Inter untuk UI.
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

        .pp-badge {
            background: var(--accent);
            box-shadow: 0 10px 25px -5px rgba(47, 111, 78, 0.35);
        }

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
                            d="M6 3h9l4 4v14H6V3Z" />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 3v5h5" />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12h6M9 16h6" />
                    </svg>
                </div>

                <h1 class="pp-serif mt-5 text-2xl font-semibold" style="color: var(--ink)">
                    Ketentuan Layanan
                </h1>

                <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                    Ketentuan penggunaan Auto Apply Mailer.
                </p>
            </div>

            <div class="space-y-4 text-sm leading-7">

                <div class="pp-section">
                    <span class="pp-num">01</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Penerimaan Ketentuan
                    </h2>

                    <p class="mt-2">
                        Dengan membuat akun atau menggunakan Auto Apply Mailer
                        ("Aplikasi"), Anda menyetujui Ketentuan Layanan ini dan
                        Kebijakan Privasi kami.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">02</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Tentang Auto Apply Mailer
                    </h2>

                    <p class="mt-2">
                        Auto Apply Mailer adalah aplikasi yang membantu pencari kerja
                        mengelola informasi profil, CV, template, dan proses pengiriman
                        lamaran secara lebih terstruktur.
                    </p>

                    <p class="mt-3">
                        Aplikasi dapat menyediakan kemampuan pengiriman email melalui
                        akun Gmail yang secara sukarela dihubungkan oleh pengguna.
                    </p>
                </div>

                <div class="pp-section pp-section--clay">
                    <span class="pp-num">03</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Akun Auto Apply Mailer
                    </h2>

                    <p class="mt-2">
                        Akun aplikasi menggunakan email dan password yang tersimpan
                        dalam sistem Auto Apply Mailer.
                    </p>

                    <p class="mt-3">
                        Google OAuth tidak digunakan sebagai metode login utama ke
                        akun Auto Apply Mailer.
                    </p>

                    <p class="mt-3">
                        Pengguna bertanggung jawab menjaga kerahasiaan password dan
                        bertanggung jawab atas aktivitas yang dilakukan menggunakan
                        akun mereka.
                    </p>
                </div>

                <div class="pp-section pp-section--clay">
                    <span class="pp-num">04</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Integrasi Gmail
                    </h2>

                    <p class="mt-2">
                        Pengguna dapat secara sukarela menghubungkan akun Gmail melalui
                        Google OAuth untuk mengirim email lamaran menggunakan akun Gmail
                        tersebut.
                    </p>

                    <p class="mt-3">
                        Pengguna hanya boleh menghubungkan akun Gmail yang mereka miliki
                        atau yang secara sah mereka berwenang untuk gunakan.
                    </p>

                    <p class="mt-3">
                        Pengguna bertanggung jawab atas izin yang diberikan kepada
                        aplikasi dan dapat mencabut akses tersebut melalui aplikasi
                        atau pengaturan akun Google.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">05</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Tanggung Jawab atas Lamaran
                    </h2>

                    <p class="mt-2">
                        Pengguna bertanggung jawab penuh atas:
                    </p>

                    <ul>
                        <li>isi CV dan surat lamaran;</li>
                        <li>alamat email penerima;</li>
                        <li>identitas pengirim;</li>
                        <li>subjek dan isi email;</li>
                        <li>lampiran yang dikirim; dan</li>
                        <li>frekuensi serta waktu pengiriman.</li>
                    </ul>

                    <p class="mt-3">
                        Auto Apply Mailer hanya menyediakan alat bantu. Aplikasi tidak
                        menjamin bahwa penerima akan menerima, membaca, atau menanggapi
                        lamaran yang dikirim.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">06</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Larangan Penggunaan
                    </h2>

                    <p class="mt-2">
                        Pengguna dilarang menggunakan aplikasi untuk:
                    </p>

                    <ul>
                        <li>Mengirim spam atau email yang tidak diminta secara melanggar hukum.</li>
                        <li>Melakukan penipuan atau impersonasi.</li>
                        <li>Menggunakan alamat email pihak lain tanpa wewenang.</li>
                        <li>Menyebarkan malware atau konten berbahaya.</li>
                        <li>Mengirim konten yang melanggar hukum atau hak pihak lain.</li>
                        <li>Menyalahgunakan Gmail API atau layanan Google.</li>
                        <li>Mencoba mengakses akun atau data pengguna lain.</li>
                        <li>Menghindari atau merusak mekanisme keamanan aplikasi.</li>
                        <li>Menggunakan layanan dengan cara yang dapat membebani atau mengganggu infrastruktur.</li>
                    </ul>
                </div>

                <div class="pp-section pp-section--clay">
                    <span class="pp-num">07</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Kepatuhan Google dan Layanan Pihak Ketiga
                    </h2>

                    <p class="mt-2">
                        Penggunaan fitur Gmail harus tetap mematuhi ketentuan Google,
                        termasuk kebijakan Google API Services, Gmail API, dan aturan
                        terkait penggunaan data pengguna.
                    </p>

                    <p class="mt-3">
                        Pembatasan kuota, perubahan API, penolakan pengiriman, atau
                        perubahan kebijakan penyedia pihak ketiga dapat memengaruhi
                        kemampuan aplikasi. Gmail API sendiri memiliki batas penggunaan
                        yang dapat berubah berdasarkan kebijakan Google.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">08</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        File, Dokumen, dan Konten Pengguna
                    </h2>

                    <p class="mt-2">
                        Pengguna tetap memiliki tanggung jawab atas dokumen, CV,
                        template, dan konten yang mereka masukkan ke dalam aplikasi.
                    </p>

                    <p class="mt-3">
                        Pengguna menjamin bahwa mereka memiliki hak atau izin yang
                        diperlukan untuk menggunakan dan mengirimkan konten tersebut.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">09</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Email Reset Password
                    </h2>

                    <p class="mt-2">
                        Auto Apply Mailer dapat mengirim email reset password melalui
                        penyedia email transactional pihak ketiga.
                    </p>

                    <p class="mt-3">
                        Pengguna memahami bahwa pengiriman email dapat bergantung pada
                        konektivitas, reputasi pengirim, penyedia email, dan faktor lain
                        di luar kendali langsung Auto Apply Mailer.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">10</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Ketersediaan Layanan
                    </h2>

                    <p class="mt-2">
                        Kami berupaya menjaga aplikasi tetap tersedia, tetapi tidak
                        menjamin layanan akan selalu bebas dari gangguan, kesalahan,
                        pemeliharaan, downtime, atau keterbatasan yang berasal dari
                        penyedia layanan pihak ketiga.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">11</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Penghentian atau Pembatasan Akun
                    </h2>

                    <p class="mt-2">
                        Kami dapat membatasi, menangguhkan, atau menghentikan akun apabila
                        terdapat dugaan penyalahgunaan, pelanggaran ketentuan, ancaman
                        keamanan, atau alasan operasional maupun hukum yang sah.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">12</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Perubahan Fitur dan Ketentuan
                    </h2>

                    <p class="mt-2">
                        Fitur, integrasi, limit, atau ketentuan aplikasi dapat berubah
                        dari waktu ke waktu.
                    </p>

                    <p class="mt-3">
                        Ketentuan terbaru akan dipublikasikan di halaman ini.
                    </p>
                </div>

                <div class="pp-section pp-section--clay">
                    <span class="pp-num">13</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Batasan Tanggung Jawab
                    </h2>

                    <p class="mt-2">
                        Sejauh diizinkan oleh hukum yang berlaku, Auto Apply Mailer dan
                        pengelolanya tidak bertanggung jawab atas kerugian yang muncul
                        karena:
                    </p>

                    <ul>
                        <li>kesalahan informasi yang diberikan pengguna;</li>
                        <li>kesalahan alamat email penerima;</li>
                        <li>isi lamaran yang dibuat atau dikirim pengguna;</li>
                        <li>gangguan Gmail, Google, Brevo, hosting, atau layanan pihak ketiga lainnya;</li>
                        <li>email yang gagal diterima atau masuk spam; atau</li>
                        <li>penggunaan aplikasi yang melanggar ketentuan ini.</li>
                    </ul>
                </div>

                <div class="pp-section">
                    <span class="pp-num">14</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Hubungan dengan Layanan Pihak Ketiga
                    </h2>

                    <p class="mt-2">
                        Google, Gmail, Brevo, dan layanan pihak ketiga lainnya merupakan
                        layanan terpisah. Auto Apply Mailer tidak menyatakan sebagai
                        bagian dari Google, Gmail, atau Brevo.
                    </p>

                    <p class="mt-3">
                        Penggunaan layanan tersebut tetap tunduk pada ketentuan masing-masing
                        penyedia.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">15</span>
                    <h2 class="text-base font-semibold mt-2" style="color: var(--ink)">
                        Hukum yang Berlaku
                    </h2>

                    <p class="mt-2">
                        Ketentuan ini dimaksudkan untuk ditafsirkan sesuai dengan hukum
                        yang berlaku pada lokasi pengelola aplikasi, dengan tetap tunduk
                        pada ketentuan wajib yang berlaku kepada pengguna.
                    </p>

                    <p class="mt-3">
                        Sebelum publikasi, bagian ini sebaiknya disesuaikan secara final
                        dengan yurisdiksi dan struktur hukum pengelola aplikasi.
                    </p>
                </div>

                <div class="pp-section">
                    <span class="pp-num">16</span>
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