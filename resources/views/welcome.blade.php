<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Auto Apply Mailer — Manajemen Lamaran Kerja</title>

    <meta
        name="description"
        content="Auto Apply Mailer adalah aplikasi web untuk membantu pengguna mengelola lamaran kerja, menyiapkan dokumen lamaran, membuat email lamaran yang dipersonalisasi, dan mengirim lamaran melalui email.">

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

        .brand-mark {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            background: #2563eb;
            color: white;
            font-weight: 800;
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
            padding: 86px 0 72px;
            background:
                radial-gradient(circle at top right, #dbeafe 0, transparent 36%),
                linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
        }

        .hero-content {
            max-width: 820px;
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
            max-width: 760px;
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
            padding: 72px 0;
        }

        .section-title {
            max-width: 720px;
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
            max-width: 850px;
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
            margin: 0 0 12px;
            color: #475569;
            font-size: 15px;
        }

        .info-box p:last-child {
            margin-bottom: 0;
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
            max-width: 650px;
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
                <span class="brand-mark">A</span>
                <span>Auto Apply Mailer</span>
            </a>

            <nav class="nav-links"> @auth <a href="{{ route('dashboard') }}" class="button button-primary"> Masuk </a> @else <a href="{{ route('login') }}"> Masuk </a> @if (Route::has('register')) <a href="{{ route('register') }}" class="button button-primary"> Daftar </a> @endif @endauth </nav>
        </div>
    </header>

    <main>

        {{-- PENJELASAN UTAMA UNTUK GOOGLE BRANDING --}}
        <section class="hero">

            <div class="container">

                <div class="hero-content">

                    <div class="eyebrow">
                        Manajemen Lamaran Kerja
                    </div>

                    <h1>
                        Kelola dan kirim lamaran kerja yang dipersonalisasi dari satu tempat.
                    </h1>

                    <p class="hero-description">
                        <strong>Auto Apply Mailer</strong> adalah aplikasi web untuk
                        pencari kerja yang membantu mengelola informasi lowongan,
                        menyiapkan dokumen lamaran, membuat email lamaran yang
                        dipersonalisasi, dan mengirim lamaran melalui akun email
                        milik pengguna.
                    </p>

                    <div class="hero-actions">

                        @auth

                        <a href="{{ route('dashboard') }}" class="button button-primary">
                            Buka Dasbor
                        </a>

                        @else

                        <a href="{{ route('login') }}" class="button button-primary">
                            Masuk ke Auto Apply Mailer
                        </a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="button button-secondary">
                            Buat Akun
                        </a>
                        @endif

                        @endauth

                    </div>

                    <p class="trust-note">
                        Auto Apply Mailer adalah aplikasi independen dan tidak
                        berafiliasi, disponsori, atau didukung oleh Google.
                    </p>

                </div>

            </div>

        </section>


        {{-- FUNGSI UTAMA APLIKASI --}}
        <section id="cara-kerja">

            <div class="container">

                <div class="section-title">

                    <h2>
                        Apa yang dilakukan Auto Apply Mailer?
                    </h2>

                    <p>
                        Auto Apply Mailer membantu pengguna mengelola proses
                        lamaran kerja secara lebih terorganisir, mulai dari
                        mencatat lowongan hingga menyiapkan dan mengirim email
                        lamaran.
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
                            Pengguna dapat mengelola informasi dan materi
                            yang digunakan dalam proses lamaran, termasuk
                            resume, surat lamaran, dan template email.
                        </p>

                    </div>


                    <div class="card">

                        <div class="card-number">
                            3
                        </div>

                        <h3>
                            Mengirim lamaran melalui email
                        </h3>

                        <p>
                            Pengguna dapat menyiapkan email lamaran yang
                            dipersonalisasi dan mengirimkannya kepada
                            perusahaan menggunakan akun email yang telah
                            mereka hubungkan.
                        </p>

                    </div>

                </div>

            </div>

        </section>


        {{-- GOOGLE / GMAIL --}}
        <section class="google-section" id="google">

            <div class="container">

                <div class="section-title">

                    <h2>
                        Integrasi Google dan Gmail
                    </h2>

                    <p>
                        Auto Apply Mailer menggunakan layanan Google hanya
                        ketika pengguna memilih untuk menghubungkan akun
                        Google mereka dengan aplikasi.
                    </p>

                </div>


                <div class="info-box">

                    <h3>
                        Bagaimana koneksi Google digunakan?
                    </h3>

                    <p>
                        Auto Apply Mailer dapat menggunakan autentikasi Google
                        agar pengguna dapat masuk ke aplikasi menggunakan
                        akun Google mereka.
                    </p>

                    <p>
                        Ketika pengguna mengaktifkan fitur email, aplikasi
                        dapat menggunakan izin yang diberikan oleh pengguna
                        untuk mengirim email lamaran kerja melalui akun
                        Gmail yang telah mereka hubungkan.
                    </p>

                    <p>
                        Koneksi ke akun Google dikendalikan oleh pengguna.
                        Pengguna dapat meninjau atau mencabut akses aplikasi
                        melalui pengaturan Akun Google mereka.
                    </p>

                    <p>
                        Auto Apply Mailer bukan produk Google dan tidak
                        berafiliasi dengan Google.
                    </p>

                </div>

            </div>

        </section>


        {{-- PENJELASAN TAMBAHAN --}}
        <section>

            <div class="container">

                <div class="section-title">

                    <h2>
                        Dibuat untuk membantu pencari kerja
                    </h2>

                    <p>
                        Auto Apply Mailer dirancang untuk mengurangi pekerjaan
                        berulang selama proses pencarian kerja sekaligus tetap
                        memberikan kendali kepada pengguna atas informasi dan
                        lamaran yang mereka kirim.
                    </p>

                </div>


                <div class="grid">

                    <div class="card">

                        <h3>
                            Satu tempat untuk mengelola lamaran
                        </h3>

                        <p>
                            Simpan informasi lowongan, data perusahaan,
                            status lamaran, dan materi lamaran dalam satu
                            tempat yang terorganisir.
                        </p>

                    </div>


                    <div class="card">

                        <h3>
                            Komunikasi yang dipersonalisasi
                        </h3>

                        <p>
                            Gunakan template email sebagai dasar sambil
                            menyesuaikan isi lamaran berdasarkan perusahaan
                            dan posisi pekerjaan yang dituju.
                        </p>

                    </div>


                    <div class="card">

                        <h3>
                            Email dikendalikan pengguna
                        </h3>

                        <p>
                            Fitur pengiriman email menggunakan akun email
                            yang dihubungkan dan diotorisasi oleh pengguna,
                            bukan alamat email milik Auto Apply Mailer.
                        </p>

                    </div>

                </div>

            </div>

        </section>


        {{-- CTA --}}
        <section class="cta">

            <div class="container">

                <h2>
                    Mulai kelola lamaran kerja Anda
                </h2>

                <p>
                    Buat akun atau masuk untuk menggunakan Auto Apply Mailer.
                    Anda juga dapat membaca Kebijakan Privasi dan Ketentuan
                    Layanan sebelum menggunakan aplikasi.
                </p>

                <div
                    class="hero-actions"
                    style="justify-content:center;">

                    @auth

                    <a href="{{ route('dashboard') }}" class="button button-primary">
                        Buka Dasbor
                    </a>

                    @else

                    <a href="{{ route('login') }}" class="button button-primary">
                        Masuk
                    </a>

                    @if (Route::has('register'))

                    <a href="{{ route('register') }}" class="button button-secondary">
                        Buat Akun
                    </a>

                    @endif

                    @endauth

                </div>

            </div>

        </section>

    </main>


    <footer>

        <div class="container footer-inner">

            <div class="footer-copy">
                © {{ date('Y') }} Auto Apply Mailer
            </div>

            <div class="footer-links">

                @if (Route::has('privacy-policy'))

                <a href="{{ route('privacy-policy') }}">
                    Kebijakan Privasi
                </a>

                @endif


                @if (Route::has('terms'))

                <a href="{{ route('terms') }}">
                    Ketentuan Layanan
                </a>

                @endif

            </div>

        </div>

    </footer>

</body>

</html>