<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Auto Apply Mailer — Manajemen Lamaran Kerja</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">

    {{-- Basic metadata --}}
    <meta name="application-name" content="Auto Apply Mailer">
    <meta name="description"
        content="Auto Apply Mailer adalah aplikasi web untuk membantu pencari kerja mengelola lowongan kerja, dokumen lamaran, email lamaran, dan proses pengiriman lamaran melalui akun email pengguna.">
    <meta name="author" content="Auto Apply Mailer">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#2563eb">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Auto Apply Mailer">
    <meta property="og:title" content="Auto Apply Mailer — Manajemen Lamaran Kerja">
    <meta property="og:description"
        content="Aplikasi web untuk membantu pencari kerja mengelola informasi lowongan, dokumen lamaran, email lamaran, dan proses pengiriman lamaran.">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ asset('og-image.png') }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Auto Apply Mailer — Manajemen Lamaran Kerja">
    <meta name="twitter:description"
        content="Aplikasi untuk membantu pencari kerja mengelola dan mengirim lamaran kerja.">
    <meta name="twitter:image" content="{{ asset('og-image.png') }}">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url('/') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: #f8fafc;
            color: #0f172a;
            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
            line-height: 1.6;
        }

        a {
            color: inherit;
        }

        .container {
            width: min(1100px, calc(100% - 40px));
            margin: 0 auto;
        }

        header {
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .nav {
            min-height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            font-weight: 750;
            font-size: 18px;
        }

        .brand img {
            width: 36px;
            height: 36px;
            object-fit: contain;
            border-radius: 10px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 18px;
            font-size: 14px;
        }

        .nav-links a {
            text-decoration: none;
            color: #475569;
        }

        .nav-links a:hover {
            color: #0f172a;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 11px 18px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: 650;
            font-size: 14px;
            border: 1px solid transparent;
        }

        .button-primary {
            background: #2563eb;
            color: white !important;
        }

        .button-primary:hover {
            background: #1d4ed8;
        }

        .button-secondary {
            background: white;
            color: #1e293b !important;
            border-color: #cbd5e1;
        }

        .hero {
            padding: 30px 0 30px;
            background:
                radial-gradient(circle at top right, #dbeafe 0, transparent 36%),
                linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .hero-content {
            max-width: 850px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 11px;
            border-radius: 999px;
            background: #eff6ff;
            color: #1d4ed8;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        h1 {
            margin: 0;
            max-width: 850px;
            font-size: clamp(40px, 6vw, 66px);
            line-height: 1.05;
            letter-spacing: -0.04em;
        }

        .hero-description {
            max-width: 800px;
            margin: 24px 0 0;
            font-size: 19px;
            color: #475569;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
        }

        .trust-note {
            margin-top: 18px;
            font-size: 13px;
            color: #64748b;
        }

        section {
            padding: 36px 0;
        }

        .section-title {
            max-width: 780px;
            margin-bottom: 36px;
        }

        .section-title h2 {
            margin: 0 0 12px;
            font-size: 32px;
            line-height: 1.2;
            letter-spacing: -0.025em;
        }

        .section-title p {
            margin: 0;
            color: #64748b;
            font-size: 16px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 26px;
            box-shadow: 0 8px 30px rgba(15, 23, 42, 0.04);
        }

        .card-number {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            border-radius: 9px;
            background: #eff6ff;
            color: #1d4ed8;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .card h3 {
            margin: 0 0 9px;
            font-size: 18px;
        }

        .card p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
        }

        .google-section {
            background: white;
            border-top: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
        }

        .info-box {
            max-width: 900px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 28px;
        }

        .info-box h3 {
            margin: 0 0 12px;
            font-size: 20px;
        }

        .info-box p {
            margin: 0 0 14px;
            color: #475569;
            font-size: 15px;
        }

        .info-box p:last-child {
            margin-bottom: 0;
        }

        .privacy-notice {
            margin-top: 20px;
            padding: 20px;
            border-radius: 12px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
        }

        .privacy-notice strong {
            display: block;
            margin-bottom: 6px;
            color: #1e3a8a;
        }

        .privacy-notice p {
            margin: 0;
            color: #334155;
            font-size: 14px;
        }

        .cta {
            text-align: center;
            padding: 78px 0;
        }

        .cta h2 {
            margin: 0 0 14px;
            font-size: 34px;
            letter-spacing: -0.025em;
        }

        .cta p {
            max-width: 700px;
            margin: 0 auto;
            color: #64748b;
        }

        footer {
            border-top: 1px solid #e2e8f0;
            background: white;
            padding: 28px 0;
        }

        .footer-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .footer-copy {
            color: #64748b;
            font-size: 13px;
        }

        .footer-links {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            font-size: 13px;
        }

        .footer-links a {
            color: #475569;
            text-decoration: none;
        }

        .footer-links a:hover {
            color: #0f172a;
            text-decoration: underline;
        }

        @media (max-width: 760px) {
            .container {
                width: min(100% - 28px, 1100px);
            }

            .nav {
                min-height: 64px;
            }

            .nav-links a:not(.button) {
                display: none;
            }

            .hero {
                padding: 60px 0 52px;
            }

            .hero-description {
                font-size: 17px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            section {
                padding: 56px 0;
            }

            .footer-inner {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="container nav">

        <a href="{{ url('/') }}" class="brand">
            <img
                src="{{ asset('favicon.png') }}"
                alt="Auto Apply Mailer"
            >

            <span>Auto Apply Mailer</span>
        </a>

        <nav class="nav-links">

            @auth

                <a href="{{ route('dashboard') }}"
                   class="button button-primary">
                    Masuk
                </a>

            @else

                <a href="{{ route('login') }}">
                    Masuk
                </a>

                @if (Route::has('register'))

                    <a href="{{ route('register') }}"
                       class="button button-primary">
                        Daftar
                    </a>

                @endif

            @endauth

        </nav>

    </div>
</header>


<main>

    {{-- =========================================================
         HERO
    ========================================================== --}}
    <section class="hero">

        <div class="container">

            <div class="hero-content">

                <div class="eyebrow">
                    Manajemen Lamaran Kerja
                </div>

                <h1>
                    Auto Apply Mailer
                </h1>

                <p class="hero-description">
                    <strong>Auto Apply Mailer</strong> adalah aplikasi web
                    untuk membantu pencari kerja mengelola proses lamaran
                    kerja dari satu tempat. Pengguna dapat mengelola
                    informasi lowongan, menyiapkan dokumen lamaran,
                    membuat email lamaran yang dipersonalisasi, dan
                    mengirim lamaran menggunakan akun email milik pengguna.
                </p>

                <div class="hero-actions">

                    @auth

                        <a href="{{ route('dashboard') }}"
                           class="button button-primary">
                            Buka Dasbor
                        </a>

                    @else

                        <a href="{{ route('login') }}"
                           class="button button-primary">
                            Masuk ke Auto Apply Mailer
                        </a>

                        @if (Route::has('register'))

                            <a href="{{ route('register') }}"
                               class="button button-secondary">
                                Buat Akun
                            </a>

                        @endif

                    @endauth

                </div>

                <p class="trust-note">
                    Auto Apply Mailer adalah aplikasi independen dan
                    tidak berafiliasi, disponsori, atau didukung oleh Google.
                </p>

            </div>

        </div>

    </section>


    {{-- =========================================================
         PURPOSE
    ========================================================== --}}
    <section id="tentang-aplikasi">

        <div class="container">

            <div class="section-title">

                <h2>
                    Tentang Auto Apply Mailer
                </h2>

                <p>
                    Auto Apply Mailer dibuat untuk membantu pencari kerja
                    mengatur dan mengelola proses lamaran kerja dengan lebih
                    terorganisir.
                </p>

            </div>

            <div class="info-box">

                <h3>
                    Tujuan aplikasi
                </h3>

                <p>
                    Auto Apply Mailer memungkinkan pengguna menyimpan
                    informasi lowongan pekerjaan, perusahaan, posisi yang
                    dilamar, kontak perekrut, serta status proses lamaran.
                </p>

                <p>
                    Pengguna juga dapat mengelola materi lamaran seperti
                    resume, surat lamaran, dan template email yang digunakan
                    untuk berkomunikasi dengan perusahaan.
                </p>

                <p>
                    Aplikasi menyediakan fitur untuk membantu pengguna
                    membuat email lamaran yang dipersonalisasi dan,
                    apabila pengguna memberikan izin yang diperlukan,
                    mengirim email tersebut melalui akun email pengguna.
                </p>

            </div>

        </div>

    </section>


    {{-- =========================================================
         FEATURES
    ========================================================== --}}
    <section id="cara-kerja">

        <div class="container">

            <div class="section-title">

                <h2>
                    Fitur Auto Apply Mailer
                </h2>

                <p>
                    Berikut fungsi utama yang tersedia untuk membantu
                    pengguna dalam proses pencarian kerja.
                </p>

            </div>

            <div class="grid">

                <div class="card">

                    <div class="card-number">
                        1
                    </div>

                    <h3>
                        Mengelola informasi lowongan
                    </h3>

                    <p>
                        Pengguna dapat menyimpan informasi perusahaan,
                        posisi pekerjaan, status lamaran, alamat email
                        perekrut, dan informasi lain yang diperlukan
                        untuk mengelola proses pencarian kerja.
                    </p>

                </div>


                <div class="card">

                    <div class="card-number">
                        2
                    </div>

                    <h3>
                        Menyiapkan dokumen lamaran
                    </h3>

                    <p>
                        Pengguna dapat mengelola resume, surat lamaran,
                        materi lamaran, dan template email yang digunakan
                        selama proses pencarian kerja.
                    </p>

                </div>


                <div class="card">

                    <div class="card-number">
                        3
                    </div>

                    <h3>
                        Membuat dan mengirim email lamaran
                    </h3>

                    <p>
                        Pengguna dapat menyiapkan email lamaran yang
                        dipersonalisasi dan mengirimkannya kepada perusahaan
                        menggunakan akun email yang telah dihubungkan dan
                        diotorisasi oleh pengguna.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
         GOOGLE DATA USE
    ========================================================== --}}
    <section class="google-section" id="google-data">

        <div class="container">

            <div class="section-title">

                <h2>
                    Penggunaan akun Google dan data pengguna
                </h2>

                <p>
                    Penjelasan ini membantu pengguna memahami mengapa
                    Auto Apply Mailer meminta akses ke akun Google.
                </p>

            </div>


            <div class="info-box">

                <h3>
                    Mengapa Auto Apply Mailer meminta akses Google?
                </h3>

                <p>
                    Auto Apply Mailer dapat menggunakan Google OAuth
                    agar pengguna dapat masuk ke aplikasi menggunakan
                    akun Google mereka dan, jika fitur email digunakan,
                    memberikan izin kepada aplikasi untuk melakukan
                    tindakan email yang diperlukan oleh fitur tersebut.
                </p>

                <p>
                    Jika pengguna memberikan izin untuk akses email,
                    akses tersebut digunakan untuk membantu pengguna
                    mengirim email lamaran kerja melalui akun email
                    pengguna sendiri.
                </p>

                <p>
                    Auto Apply Mailer tidak menggunakan akses Google
                    untuk tujuan yang tidak berkaitan dengan fungsi
                    aplikasi. Akses hanya digunakan untuk menyediakan
                    fitur yang dipilih dan diotorisasi oleh pengguna.
                </p>

                <p>
                    Pengguna tetap mengendalikan akun Google mereka
                    dan dapat meninjau atau mencabut akses aplikasi
                    melalui pengaturan Akun Google mereka.
                </p>

                <div class="privacy-notice">

                    <strong>
                        Pemberitahuan privasi
                    </strong>

                    <p>
                        Auto Apply Mailer adalah aplikasi independen.
                        Aplikasi ini tidak berafiliasi, disponsori,
                        atau didukung oleh Google. Informasi mengenai
                        pengumpulan, penggunaan, penyimpanan, dan
                        perlindungan data pengguna dijelaskan dalam
                        Kebijakan Privasi Auto Apply Mailer.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
         USER CONTROL
    ========================================================== --}}
    <section>

        <div class="container">

            <div class="section-title">

                <h2>
                    Pengguna tetap memiliki kendali
                </h2>

                <p>
                    Auto Apply Mailer dirancang untuk membantu proses
                    lamaran tanpa mengambil alih kendali pengguna atas
                    akun dan informasi mereka.
                </p>

            </div>


            <div class="grid">

                <div class="card">

                    <h3>
                        Informasi lamaran
                    </h3>

                    <p>
                        Pengguna menentukan lowongan, perusahaan,
                        posisi, kontak, dan informasi lamaran yang
                        mereka kelola di aplikasi.
                    </p>

                </div>


                <div class="card">

                    <h3>
                        Isi email
                    </h3>

                    <p>
                        Pengguna dapat menyiapkan dan menyesuaikan
                        isi email lamaran sebelum menggunakannya
                        untuk menghubungi perusahaan.
                    </p>

                </div>


                <div class="card">

                    <h3>
                        Akun email
                    </h3>

                    <p>
                        Email dikirim melalui akun email yang
                        dihubungkan dan diotorisasi oleh pengguna,
                        bukan melalui alamat email milik Auto Apply Mailer.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
         PRIVACY + TERMS
    ========================================================== --}}
    <section>

        <div class="container">

            <div class="section-title">

                <h2>
                    Informasi hukum dan privasi
                </h2>

                <p>
                    Pengguna dapat membaca informasi lengkap mengenai
                    penggunaan data dan layanan sebelum menggunakan
                    aplikasi.
                </p>

            </div>

            <div class="info-box">

                <h3>
                    Kebijakan Privasi dan Ketentuan Layanan
                </h3>

                <p>
                    Kebijakan Privasi menjelaskan bagaimana Auto Apply
                    Mailer mengakses, menggunakan, menyimpan, dan
                    melindungi informasi pengguna, termasuk data yang
                    diperoleh melalui layanan Google apabila pengguna
                    memberikan izin.
                </p>

                <p>
                    Ketentuan Layanan menjelaskan aturan penggunaan
                    aplikasi dan layanan yang disediakan oleh
                    Auto Apply Mailer.
                </p>

                <div class="hero-actions">

                    <a href="{{ url('/privacy-policy') }}"
                       class="button button-secondary">
                        Baca Kebijakan Privasi
                    </a>

                    <a href="{{ url('/terms') }}"
                       class="button button-secondary">
                        Baca Ketentuan Layanan
                    </a>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
         CTA
    ========================================================== --}}
    <section class="cta">

        <div class="container">

            <h2>
                Mulai kelola lamaran kerja Anda
            </h2>

            <p>
                Buat akun atau masuk untuk menggunakan
                Auto Apply Mailer.
            </p>

            <div
                class="hero-actions"
                style="justify-content:center;">

                @auth

                    <a href="{{ route('dashboard') }}"
                       class="button button-primary">
                        Buka Dasbor
                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="button button-primary">
                        Masuk
                    </a>

                    @if (Route::has('register'))

                        <a href="{{ route('register') }}"
                           class="button button-secondary">
                            Buat Akun
                        </a>

                    @endif

                @endauth

            </div>

        </div>

    </section>

</main>


{{-- =========================================================
     FOOTER
========================================================== --}}
<footer>

    <div class="container footer-inner">

        <div class="footer-copy">
            © {{ date('Y') }} Auto Apply Mailer
        </div>

        <div class="footer-links">

            <a href="{{ url('/privacy-policy') }}">
                Kebijakan Privasi
            </a>

            <a href="{{ url('/terms') }}">
                Ketentuan Layanan
            </a>

        </div>

    </div>

</footer>

</body>
</html>