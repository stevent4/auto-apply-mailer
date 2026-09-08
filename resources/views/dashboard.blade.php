<x-app-layout title="Dashboard — Auto Apply Mailer">

    {{-- =========================================================
        FONT & TOKEN SISTEM — disamakan dengan halaman Template
        (Lora untuk judul/kesan surat, Inter untuk UI/body).
    ========================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;0,600;1,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .dash-page {
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
            --danger: #B3402E;
            --danger-soft: #F7E6E2;
            font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
            background: var(--paper);
        }

        .dash-serif {
            font-family: 'Lora', Georgia, serif;
        }

        .dash-page ::selection {
            background: var(--accent-soft);
        }

        /* Kartu umum — kesan kertas, bukan shadow generik */
        .dash-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 1rem;
        }

        .dash-card--tinted {
            background: var(--paper-soft);
            border: 1px solid var(--line);
            border-radius: 1rem;
        }

        /* Kartu dengan garis putus di atas, seperti tpl-compose */
        .dash-card--letter {
            position: relative;
        }

        .dash-card--letter::before {
            content: '';
            position: absolute;
            top: -1px;
            left: 1.5rem;
            right: 1.5rem;
            height: 1px;
            background-image: repeating-linear-gradient(90deg, var(--line) 0 6px, transparent 6px 12px);
        }

        .dash-eyebrow {
            font-size: 0.8125rem;
            font-weight: 600;
            letter-spacing: 0.01em;
        }

        .dash-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.75rem;
            font-size: 1.125rem;
            background: #fff;
            border: 1px solid var(--line);
        }

        .dash-icon--accent {
            background: var(--accent-soft);
            border-color: var(--accent-soft);
        }

        .dash-icon--clay {
            background: var(--clay-soft);
            border-color: var(--clay-soft);
        }

        .dash-icon--neutral {
            background: var(--paper-soft);
        }

        .dash-icon--danger {
            background: var(--danger-soft);
            border-color: var(--danger-soft);
        }

        /* Feature / quick-access card, tab warna di kiri seperti tpl-row */
        .dash-feature {
            background: #fff;
            border: 1px solid var(--line);
            border-left-width: 3px;
            border-radius: 0.85rem;
            padding: 1.5rem;
            transition: border-color 0.15s ease, transform 0.15s ease;
            display: block;
        }

        .dash-feature:hover {
            border-color: var(--ink-soft);
            transform: translateY(-2px);
        }

        .dash-feature--accent {
            border-left-color: var(--accent);
        }

        .dash-feature--clay {
            border-left-color: var(--clay);
        }

        .dash-feature--neutral {
            border-left-color: var(--ink-soft);
        }

        .dash-feature--danger {
            border-left-color: var(--danger);
        }

        .dash-feature-link {
            font-size: 0.75rem;
            font-weight: 600;
        }

        .dash-feature-link--accent {
            color: var(--accent-ink);
        }

        .dash-feature-link--clay {
            color: var(--clay);
        }

        .dash-feature-link--neutral {
            color: var(--ink-soft);
        }

        .dash-chevron {
            color: var(--line);
            transition: color 0.15s ease;
        }

        .dash-feature:hover .dash-chevron {
            color: var(--ink-soft);
        }

        /* Tag kecil, sama gaya dengan tpl-tag */
        .dash-tag {
            font-size: 0.6875rem;
            font-weight: 600;
            padding: 0.2rem 0.55rem;
            border-radius: 0.4rem;
            letter-spacing: 0.01em;
        }

        .dash-tag--accent {
            background: var(--accent-soft);
            color: var(--accent-ink);
        }

        .dash-tag--clay {
            background: var(--clay-soft);
            color: var(--clay);
        }

        /* Chip variable-style, dipakai untuk daftar variable & step number */
        .dash-chip {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.3rem 0.65rem;
            border-radius: 0.5rem;
            background: var(--paper-soft);
            color: var(--ink-soft);
            border: 1px solid var(--line);
        }

        .dash-btn-primary {
            background: var(--accent);
            color: #fff;
            font-size: 0.875rem;
            font-weight: 600;
            padding: 0.65rem 1.25rem;
            border-radius: 0.65rem;
            transition: background 0.15s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dash-btn-primary:hover {
            background: var(--accent-ink);
        }

        .dash-btn-dark {
            background: var(--ink);
            color: var(--paper);
            font-size: 0.875rem;
            font-weight: 600;
            padding: 0.65rem 1.15rem;
            border-radius: 0.65rem;
            transition: background 0.15s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dash-btn-dark:hover {
            background: #000;
        }

        .dash-btn-paper {
            background: var(--paper);
            color: var(--ink);
            font-size: 0.875rem;
            font-weight: 600;
            padding: 0.65rem 1.25rem;
            border-radius: 0.65rem;
            transition: background 0.15s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dash-btn-paper:hover {
            background: var(--paper-soft);
        }

        .dash-step-num {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 2.25rem;
            width: 2.25rem;
            border-radius: 0.6rem;
            background: var(--accent-soft);
            color: var(--accent-ink);
            font-size: 0.8125rem;
            font-weight: 700;
            font-family: 'Lora', Georgia, serif;
        }

        .dash-checklist-num {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 1.75rem;
            width: 1.75rem;
            flex-shrink: 0;
            border-radius: 0.5rem;
            background: #fff;
            border: 1px solid var(--line);
            font-size: 0.8125rem;
            color: var(--ink-soft);
        }

        /* Panel gelap untuk CTA utama — kontras hangat, bukan biru/ungu generik */
        .dash-cta {
            background: var(--ink);
            border-radius: 1rem;
        }

        .dash-cta-badge {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.08);
            color: var(--accent-soft);
            border: 1px solid rgba(255, 255, 255, 0.12);
        }

        /* FAQ accordion, gaya sama seperti detail/summary tpl */
        .dash-faq {
            border: 1px solid var(--line);
            border-radius: 0.85rem;
            padding: 1rem;
        }

        .dash-faq summary {
            cursor: pointer;
            list-style: none;
            font-weight: 600;
            color: var(--ink);
        }

        .dash-alert-note {
            background: var(--paper-soft);
            border: 1px dashed var(--line);
            border-radius: 0.85rem;
            padding: 1.1rem 1.25rem;
        }

        .dash-reminder {
            background: var(--clay-soft);
            border: 1px solid var(--clay);
            border-radius: 1rem;
            padding: 1.25rem 1.5rem;
        }
    </style>

    <div class="dash-page min-h-[calc(100vh-4rem)]">

        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- =========================================================
                 HEADER
            ========================================================== --}}
            <div class="mb-8">

                <div class="flex flex-col justify-between gap-5 md:flex-row md:items-center">

                    <div>
                        <p class="dash-eyebrow mb-1" style="color: var(--accent-ink)">
                            Dashboard
                        </p>

                        <h1 class="dash-serif text-2xl font-semibold tracking-tight sm:text-3xl" style="color: var(--ink)">
                            Halo, {{ Auth::user()->name }} 👋
                        </h1>

                        <p class="mt-2 max-w-2xl text-sm leading-6" style="color: var(--ink-soft)">
                            Kelola profil, Gmail pengirim, template, berkas,
                            lamaran, dan riwayat dari satu tempat.
                        </p>
                    </div>

                    @if (Route::has('apply.index'))
                    <a
                        href="{{ route('apply.index') }}"
                        class="dash-btn-primary">
                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            aria-hidden="true">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>

                        Buat Lamaran
                    </a>
                    @endif

                </div>

            </div>


            {{-- =========================================================
                 GAMBARAN SINGKAT SISTEM
            ========================================================== --}}
            <div class="dash-card mb-8 overflow-hidden" style="border-color: var(--line); background: var(--accent-soft);">

                <div class="p-6 sm:p-7">

                    <div class="flex flex-col gap-5 sm:flex-row sm:items-start">

                        <div class="dash-icon h-12 w-12 shrink-0">
                            🚀
                        </div>

                        <div class="min-w-0 flex-1">

                            <p class="dash-eyebrow" style="color: var(--accent-ink)">
                                Auto Apply Mailer
                            </p>

                            <h2 class="dash-serif mt-1 text-xl font-semibold" style="color: var(--ink)">
                                Semua kebutuhan lamaran kerja dalam satu alur.
                            </h2>

                            <p class="mt-3 max-w-4xl text-sm leading-6" style="color: var(--ink-soft)">
                                Siapkan profil dan Gmail pengirim, simpan CV serta
                                dokumen pendukung, buat template email atau cover letter,
                                lalu gunakan semuanya ketika membuat dan mengirim lamaran.
                            </p>

                            <div class="mt-5 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">

                                <div class="dash-card p-4">
                                    <div class="text-lg">👤</div>

                                    <p class="mt-2 text-sm font-semibold" style="color: var(--ink)">
                                        Profile
                                    </p>

                                    <p class="mt-1 text-xs leading-5" style="color: var(--ink-soft)">
                                        Biodata dan akun pengirim.
                                    </p>
                                </div>

                                <div class="dash-card p-4">
                                    <div class="text-lg">📝</div>

                                    <p class="mt-2 text-sm font-semibold" style="color: var(--ink)">
                                        Template
                                    </p>

                                    <p class="mt-1 text-xs leading-5" style="color: var(--ink-soft)">
                                        Email dan cover letter.
                                    </p>
                                </div>

                                <div class="dash-card p-4">
                                    <div class="text-lg">📎</div>

                                    <p class="mt-2 text-sm font-semibold" style="color: var(--ink)">
                                        Berkas
                                    </p>

                                    <p class="mt-1 text-xs leading-5" style="color: var(--ink-soft)">
                                        CV dan dokumen pendukung.
                                    </p>
                                </div>

                                <div class="dash-card p-4">
                                    <div class="text-lg">📋</div>

                                    <p class="mt-2 text-sm font-semibold" style="color: var(--ink)">
                                        History
                                    </p>

                                    <p class="mt-1 text-xs leading-5" style="color: var(--ink-soft)">
                                        Pantau lamaran terkirim.
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================================================
                 GMAIL INFORMATION
            ========================================================== --}}
            <div class="dash-card mb-8 overflow-hidden">

                <div class="px-6 py-5 sm:px-7" style="border-bottom: 1px solid var(--line); background: var(--paper-soft);">

                    <div class="flex items-start gap-4">

                        <div class="dash-icon dash-icon--clay h-11 w-11 shrink-0">
                            ✉️
                        </div>

                        <div>
                            <p class="dash-eyebrow" style="color: var(--clay)">
                                Gmail Pengirim
                            </p>

                            <h2 class="dash-serif mt-1 text-lg font-semibold" style="color: var(--ink)">
                                Email akun dan Gmail pengirim memiliki fungsi berbeda.
                            </h2>

                            <p class="mt-2 max-w-3xl text-sm leading-6" style="color: var(--ink-soft)">
                                Email akun digunakan untuk identitas dan data profil,
                                sedangkan Gmail yang ditautkan digunakan sebagai alamat
                                pengirim ketika lamaran dikirim.
                            </p>
                        </div>

                    </div>

                </div>

                <div class="grid gap-4 p-6 sm:p-7 md:grid-cols-2">

                    {{-- Email akun --}}
                    <div class="dash-card--tinted p-5">

                        <div class="flex items-center gap-3">

                            <div class="dash-icon dash-icon--neutral h-10 w-10">
                                👤
                            </div>

                            <div>
                                <p class="text-xs font-bold uppercase tracking-wide" style="color: var(--ink-soft)">
                                    Email akun / profil
                                </p>

                                <p class="mt-1 font-semibold" style="color: var(--ink)">
                                    Identitas pengguna
                                </p>
                            </div>

                        </div>

                        <p class="mt-3 text-sm leading-6" style="color: var(--ink-soft)">
                            Digunakan untuk login, identitas akun, dan informasi
                            profil pelamar.
                        </p>

                    </div>


                    {{-- Gmail pengirim --}}
                    <div class="dash-card--tinted p-5">

                        <div class="flex items-center gap-3">

                            <div class="dash-icon dash-icon--clay h-10 w-10">
                                ✉️
                            </div>

                            <div>
                                <p class="text-xs font-bold uppercase tracking-wide" style="color: var(--ink-soft)">
                                    Gmail pengirim
                                </p>

                                <p class="mt-1 font-semibold" style="color: var(--ink)">
                                    Untuk mengirim lamaran
                                </p>
                            </div>

                        </div>

                        <p class="mt-3 text-sm leading-6" style="color: var(--ink-soft)">
                            Akun Gmail yang ditautkan digunakan sebagai alamat
                            <strong>From</strong> saat lamaran dikirim melalui Gmail API.
                        </p>

                    </div>

                </div>

                <div class="px-6 py-5 sm:px-7" style="border-top: 1px solid var(--line);">

                    <div class="dash-card--tinted p-4">

                        <p class="text-sm font-semibold" style="color: var(--ink)">
                            Contoh
                        </p>

                        <p class="mt-1 text-sm leading-6" style="color: var(--ink-soft)">
                            Kamu login menggunakan
                            <strong>nama@contoh.com</strong>,
                            lalu menautkan
                            <strong>kamu@gmail.com</strong>
                            melalui Profile.
                            Saat lamaran dikirim, penerima akan menerima email
                            dari <strong>kamu@gmail.com</strong>.
                        </p>

                    </div>

                    @if (Route::has('profile.edit'))

                    <div class="mt-4 flex flex-wrap items-center gap-3">

                        <a
                            href="{{ route('profile.edit') }}"
                            class="dash-btn-dark">
                            Kelola Gmail di Profile

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>

                        <span class="text-sm" style="color: var(--ink-soft)">
                            Penautan Gmail dilakukan melalui halaman Profile.
                        </span>

                    </div>

                    @endif

                </div>

            </div>


            {{-- =========================================================
                 FEATURE CARDS
            ========================================================== --}}
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

                {{-- Apply --}}
                @if (Route::has('apply.index'))
                <a
                    href="{{ route('apply.index') }}"
                    class="dash-feature dash-feature--accent">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium" style="color: var(--ink-soft)">
                                Kirim Lamaran
                            </p>

                            <h2 class="dash-serif mt-2 text-lg font-semibold" style="color: var(--ink)">
                                Lebih Cepat
                            </h2>

                        </div>

                        <div class="dash-icon dash-icon--accent h-11 w-11">
                            🚀
                        </div>

                    </div>

                    <p class="mt-4 text-sm leading-6" style="color: var(--ink-soft)">
                        Masukkan tujuan lamaran, pilih template,
                        surat lamaran, dan berkas, kemudian kirim
                        melalui Gmail yang sudah ditautkan.
                    </p>

                    <div class="dash-feature-link dash-feature-link--accent mt-4">
                        Buat lamaran →
                    </div>

                </a>
                @endif


                {{-- Template --}}
                @if (Route::has('templates.index'))
                <a
                    href="{{ route('templates.index') }}"
                    class="dash-feature dash-feature--accent">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium" style="color: var(--ink-soft)">
                                Template
                            </p>

                            <h2 class="dash-serif mt-2 text-lg font-semibold" style="color: var(--ink)">
                                Email & Cover Letter
                            </h2>

                        </div>

                        <div class="dash-icon dash-icon--accent h-11 w-11">
                            📝
                        </div>

                    </div>

                    <p class="mt-4 text-sm leading-6" style="color: var(--ink-soft)">
                        Simpan template email dan cover letter,
                        gunakan variable untuk mengisi data secara
                        otomatis, dan tentukan template default.
                    </p>

                    <div class="dash-feature-link dash-feature-link--accent mt-4">
                        Kelola template →
                    </div>

                </a>
                @endif


                {{-- Berkas --}}
                @if (Route::has('files.index'))
                <a
                    href="{{ route('files.index') }}"
                    class="dash-feature dash-feature--clay">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium" style="color: var(--ink-soft)">
                                Berkas
                            </p>

                            <h2 class="dash-serif mt-2 text-lg font-semibold" style="color: var(--ink)">
                                Terorganisir
                            </h2>

                        </div>

                        <div class="dash-icon dash-icon--clay h-11 w-11">
                            📎
                        </div>

                    </div>

                    <p class="mt-4 text-sm leading-6" style="color: var(--ink-soft)">
                        Simpan CV dan dokumen pendukung agar
                        mudah dipilih sebagai lampiran ketika
                        membuat lamaran.
                    </p>

                    <div class="dash-feature-link dash-feature-link--clay mt-4">
                        Kelola berkas →
                    </div>

                </a>
                @endif


                {{-- Profile --}}
                @if (Route::has('profile.edit'))
                <a
                    href="{{ route('profile.edit') }}"
                    class="dash-feature dash-feature--neutral">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium" style="color: var(--ink-soft)">
                                Profile
                            </p>

                            <h2 class="dash-serif mt-2 text-lg font-semibold" style="color: var(--ink)">
                                Data Pelamar
                            </h2>

                        </div>

                        <div class="dash-icon dash-icon--neutral h-11 w-11">
                            👤
                        </div>

                    </div>

                    <p class="mt-4 text-sm leading-6" style="color: var(--ink-soft)">
                        Lengkapi biodata dan informasi Gmail
                        agar dapat digunakan pada proses
                        pembuatan lamaran.
                    </p>

                    <div class="dash-feature-link dash-feature-link--neutral mt-4">
                        Buka profile →
                    </div>

                </a>
                @endif

            </div>


            {{-- =========================================================
                 TEMPLATE FEATURE
            ========================================================== --}}
            @if (Route::has('templates.index'))

            <div class="dash-card mt-8 overflow-hidden">

                <div class="px-6 py-6 sm:px-7" style="border-bottom: 1px solid var(--line); background: var(--paper-soft);">

                    <div class="flex flex-col gap-5 md:flex-row md:items-center md:justify-between">

                        <div class="flex items-start gap-4">

                            <div class="dash-icon dash-icon--accent h-12 w-12 shrink-0">
                                📝
                            </div>

                            <div>

                                <p class="dash-eyebrow" style="color: var(--accent-ink)">
                                    Fitur Template
                                </p>

                                <h2 class="dash-serif mt-1 text-xl font-semibold" style="color: var(--ink)">
                                    Tulis sekali, gunakan kembali.
                                </h2>

                                <p class="mt-2 max-w-3xl text-sm leading-6" style="color: var(--ink-soft)">
                                    Template membantu kamu menyimpan pola tulisan
                                    yang sering digunakan pada proses lamaran.
                                    Data pelamar dan lowongan dapat disisipkan
                                    menggunakan variable.
                                </p>

                            </div>

                        </div>

                        <a
                            href="{{ route('templates.index') }}"
                            class="dash-btn-dark shrink-0">
                            Kelola Template

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>

                    </div>

                </div>


                <div class="grid gap-4 p-6 sm:p-7 md:grid-cols-2">

                    {{-- Email --}}
                    <div class="p-5 rounded-xl" style="border: 1px solid var(--line); background: var(--accent-soft);">

                        <div class="flex items-start gap-3">

                            <div class="dash-icon h-10 w-10 shrink-0">
                                ✉️
                            </div>

                            <div>

                                <p class="text-xs font-bold uppercase tracking-wide" style="color: var(--accent-ink)">
                                    Email
                                </p>

                                <h3 class="dash-serif mt-1 font-semibold" style="color: var(--ink)">
                                    Template Email
                                </h3>

                                <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                                    Simpan subject dan isi email yang sering
                                    digunakan. Template email dapat dipersonalisasi
                                    dengan variable sebelum dikirim.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Cover Letter --}}
                    <div class="p-5 rounded-xl" style="border: 1px solid var(--line); background: var(--clay-soft);">

                        <div class="flex items-start gap-3">

                            <div class="dash-icon h-10 w-10 shrink-0">
                                📄
                            </div>

                            <div>

                                <p class="text-xs font-bold uppercase tracking-wide" style="color: var(--clay)">
                                    Cover Letter
                                </p>

                                <h3 class="dash-serif mt-1 font-semibold" style="color: var(--ink)">
                                    Template Surat Lamaran
                                </h3>

                                <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                                    Buat template surat lamaran dengan formatting
                                    yang dapat digunakan sebagai dasar pembuatan
                                    cover letter PDF.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Variable --}}
                <div class="px-6 py-5 sm:px-7" style="border-top: 1px solid var(--line); background: var(--paper-soft);">

                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                        <div>

                            <p class="text-sm font-semibold" style="color: var(--ink)">
                                Gunakan variable untuk personalisasi
                            </p>

                            <p class="mt-1 text-sm leading-6" style="color: var(--ink-soft)">
                                Template dapat menggunakan data pelamar,
                                lowongan, dan informasi waktu.
                            </p>

                        </div>

                        <div class="flex flex-wrap gap-2">

                            <span class="dash-chip">@{{nama}}</span>
                            <span class="dash-chip">@{{perusahaan}}</span>
                            <span class="dash-chip">@{{posisi}}</span>
                            <span class="dash-chip">@{{tanggal}}</span>

                        </div>

                    </div>

                </div>

            </div>

            @endif


            {{-- =========================================================
                 QUICK ACCESS
            ========================================================== --}}
            <div class="mt-8">

                <div class="mb-4">

                    <h2 class="dash-serif text-lg font-semibold" style="color: var(--ink)">
                        Akses cepat
                    </h2>

                    <p class="mt-1 text-sm" style="color: var(--ink-soft)">
                        Akses langsung ke bagian utama Auto Apply Mailer.
                    </p>

                </div>


                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

                    @if (Route::has('profile.edit'))
                    <a
                        href="{{ route('profile.edit') }}"
                        class="dash-feature dash-feature--neutral">

                        <div class="flex items-center justify-between">

                            <div class="dash-icon dash-icon--neutral h-10 w-10">
                                👤
                            </div>

                            <svg
                                class="dash-chevron h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>

                        </div>

                        <h3 class="mt-4 font-semibold" style="color: var(--ink)">
                            Profile
                        </h3>

                        <p class="mt-1 text-sm leading-6" style="color: var(--ink-soft)">
                            Biodata dan pengaturan Gmail.
                        </p>

                    </a>
                    @endif


                    @if (Route::has('templates.index'))
                    <a
                        href="{{ route('templates.index') }}"
                        class="dash-feature dash-feature--accent">

                        <div class="flex items-center justify-between">

                            <div class="dash-icon dash-icon--accent h-10 w-10">
                                📝
                            </div>

                            <svg
                                class="dash-chevron h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>

                        </div>

                        <h3 class="mt-4 font-semibold" style="color: var(--ink)">
                            Template
                        </h3>

                        <p class="mt-1 text-sm leading-6" style="color: var(--ink-soft)">
                            Email dan cover letter.
                        </p>

                    </a>
                    @endif


                    @if (Route::has('files.index'))
                    <a
                        href="{{ route('files.index') }}"
                        class="dash-feature dash-feature--clay">

                        <div class="flex items-center justify-between">

                            <div class="dash-icon dash-icon--clay h-10 w-10">
                                📎
                            </div>

                            <svg
                                class="dash-chevron h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>

                        </div>

                        <h3 class="mt-4 font-semibold" style="color: var(--ink)">
                            Berkas
                        </h3>

                        <p class="mt-1 text-sm leading-6" style="color: var(--ink-soft)">
                            CV dan dokumen pendukung.
                        </p>

                    </a>
                    @endif


                    @if (Route::has('apply.index'))
                    <a
                        href="{{ route('apply.index') }}"
                        class="dash-feature dash-feature--accent">

                        <div class="flex items-center justify-between">

                            <div class="dash-icon dash-icon--accent h-10 w-10">
                                🚀
                            </div>

                            <svg
                                class="dash-chevron h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>

                        </div>

                        <h3 class="mt-4 font-semibold" style="color: var(--ink)">
                            Buat Lamaran
                        </h3>

                        <p class="mt-1 text-sm leading-6" style="color: var(--ink-soft)">
                            Mulai proses pengiriman lamaran.
                        </p>

                    </a>
                    @endif

                </div>


                <div class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

                    @if (Route::has('feedback.index'))
                    <a
                        href="{{ route('feedback.index') }}"
                        class="dash-feature dash-feature--danger">

                        <div class="flex items-center justify-between">

                            <div class="dash-icon dash-icon--danger h-10 w-10">
                                💬
                            </div>

                            <svg
                                class="dash-chevron h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>

                        </div>

                        <h3 class="mt-4 font-semibold" style="color: var(--ink)">
                            Feedback
                        </h3>

                        <p class="mt-1 text-sm leading-6" style="color: var(--ink-soft)">
                            Kirim masukan terkait aplikasi.
                        </p>

                    </a>
                    @endif


                    @if (Route::has('google.connect'))
                    <a
                        href="{{ route('profile.edit') }}"
                        class="dash-feature dash-feature--clay">

                        <div class="flex items-center justify-between">

                            <div class="dash-icon dash-icon--clay h-10 w-10">
                                ✉️
                            </div>

                            <svg
                                class="dash-chevron h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>

                        </div>

                        <h3 class="mt-4 font-semibold" style="color: var(--ink)">
                            Gmail Pengirim
                        </h3>

                        <p class="mt-1 text-sm leading-6" style="color: var(--ink-soft)">
                            Kelola Gmail melalui Profile.
                        </p>

                    </a>
                    @endif


                    <div class="dash-alert-note">

                        <div class="dash-icon dash-icon--neutral h-10 w-10">
                            ✓
                        </div>

                        <h3 class="mt-4 font-semibold" style="color: var(--ink)">
                            Siap Apply
                        </h3>

                        <p class="mt-1 text-sm leading-6" style="color: var(--ink-soft)">
                            Profil, Gmail, template, dan berkas siap digunakan.
                        </p>

                    </div>

                </div>

            </div>


            {{-- =========================================================
                 CTA APPLY
            ========================================================== --}}
            <div class="dash-cta mt-8 overflow-hidden">

                <div class="relative px-6 py-8 sm:px-8 lg:px-10">

                    <div class="relative z-10 max-w-2xl">

                        <span class="dash-cta-badge">
                            Auto Apply Mailer
                        </span>

                        <h2 class="dash-serif mt-4 text-2xl font-semibold tracking-tight text-white sm:text-3xl">
                            Siap mengirim lamaran hari ini?
                        </h2>

                        <p class="mt-3 text-sm leading-6 sm:text-base" style="color: #C9C2B4;">
                            Pastikan Gmail pengirim sudah ditautkan di Profile,
                            kemudian masukkan informasi perusahaan dan posisi,
                            pilih template email atau surat lamaran, lalu tentukan
                            berkas yang ingin dikirim.
                        </p>

                        @if (Route::has('apply.index'))

                        <a
                            href="{{ route('apply.index') }}"
                            class="dash-btn-paper mt-6">
                            Mulai Apply

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>

                        </a>

                        @endif

                    </div>


                    <div class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full blur-3xl" style="background: rgba(47,111,78,0.25);"></div>

                    <div class="pointer-events-none absolute -bottom-24 right-20 h-56 w-56 rounded-full blur-3xl" style="background: rgba(156,90,60,0.18);"></div>

                </div>

            </div>


            {{-- =========================================================
                 QUICK GUIDE
            ========================================================== --}}
            <div class="mt-8">

                <div class="mb-4">

                    <h2 class="dash-serif text-lg font-semibold" style="color: var(--ink)">
                        Cara menggunakan
                    </h2>

                    <p class="mt-1 text-sm" style="color: var(--ink-soft)">
                        Ikuti alur berikut untuk menyiapkan dan mengirim lamaran.
                    </p>

                </div>


                <div class="grid gap-4 md:grid-cols-5">

                    {{-- Step 1 --}}
                    <div class="dash-card p-5">

                        <div class="dash-step-num mb-4">
                            01
                        </div>

                        <h3 class="font-semibold" style="color: var(--ink)">
                            Lengkapi Profile
                        </h3>

                        <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                            Isi nama, email, pendidikan, alamat,
                            nomor HP, dan data lain yang diperlukan.
                        </p>

                    </div>


                    {{-- Step 2 --}}
                    <div class="dash-card p-5">

                        <div class="dash-step-num mb-4">
                            02
                        </div>

                        <h3 class="font-semibold" style="color: var(--ink)">
                            Hubungkan Gmail
                        </h3>

                        <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                            Tautkan Gmail pengirim melalui Profile
                            menggunakan Google OAuth.
                        </p>

                    </div>


                    {{-- Step 3 --}}
                    <div class="dash-card p-5">

                        <div class="dash-step-num mb-4">
                            03
                        </div>

                        <h3 class="font-semibold" style="color: var(--ink)">
                            Siapkan Template
                        </h3>

                        <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                            Buat template Email atau Cover Letter
                            dan gunakan variable untuk personalisasi.
                        </p>

                    </div>


                    {{-- Step 4 --}}
                    <div class="dash-card p-5">

                        <div class="dash-step-num mb-4">
                            04
                        </div>

                        <h3 class="font-semibold" style="color: var(--ink)">
                            Siapkan Berkas
                        </h3>

                        <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                            Upload CV dan dokumen pendukung
                            yang akan digunakan sebagai lampiran.
                        </p>

                    </div>


                    {{-- Step 5 --}}
                    <div class="dash-card p-5">

                        <div class="dash-step-num mb-4">
                            05
                        </div>

                        <h3 class="font-semibold" style="color: var(--ink)">
                            Kirim & Pantau
                        </h3>

                        <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                            Kirim lamaran melalui Gmail dan
                            pantau hasil pengiriman melalui History.
                        </p>

                    </div>

                </div>

            </div>


            {{-- =========================================================
                 FEATURE EXPLANATION
            ========================================================== --}}
            <div class="mt-8">

                <div class="mb-4">

                    <h2 class="dash-serif text-lg font-semibold" style="color: var(--ink)">
                        Apa fungsi setiap fitur?
                    </h2>

                    <p class="mt-1 text-sm" style="color: var(--ink-soft)">
                        Ringkasan fungsi setiap bagian utama aplikasi.
                    </p>

                </div>


                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                    {{-- Profile --}}
                    <div class="dash-card p-6">

                        <div class="dash-icon dash-icon--neutral h-10 w-10">
                            👤
                        </div>

                        <h3 class="mt-4 font-semibold" style="color: var(--ink)">
                            Profile
                        </h3>

                        <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                            Menyimpan identitas, biodata, informasi pelamar,
                            dan pengaturan Gmail pengirim.
                        </p>

                    </div>


                    {{-- Gmail --}}
                    <div class="dash-card p-6">

                        <div class="dash-icon dash-icon--clay h-10 w-10">
                            ✉️
                        </div>

                        <h3 class="mt-4 font-semibold" style="color: var(--ink)">
                            Gmail Pengirim
                        </h3>

                        <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                            Akun Gmail yang telah ditautkan digunakan
                            untuk mengirim email lamaran melalui Gmail API.
                        </p>

                    </div>


                    {{-- Template --}}
                    <div class="dash-card p-6">

                        <div class="dash-icon dash-icon--accent h-10 w-10">
                            📝
                        </div>

                        <h3 class="mt-4 font-semibold" style="color: var(--ink)">
                            Template
                        </h3>

                        <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                            Menyimpan pola email dan cover letter.
                            Variable dapat digunakan untuk mengisi data secara otomatis.
                        </p>

                    </div>


                    {{-- Berkas --}}
                    <div class="dash-card p-6">

                        <div class="dash-icon dash-icon--clay h-10 w-10">
                            📎
                        </div>

                        <h3 class="mt-4 font-semibold" style="color: var(--ink)">
                            Berkas
                        </h3>

                        <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                            Tempat menyimpan CV dan dokumen pendukung
                            yang dapat dipilih sebagai lampiran.
                        </p>

                    </div>


                    {{-- Apply --}}
                    <div class="dash-card p-6">

                        <div class="dash-icon dash-icon--accent h-10 w-10">
                            🚀
                        </div>

                        <h3 class="mt-4 font-semibold" style="color: var(--ink)">
                            Apply Job
                        </h3>

                        <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                            Tempat memasukkan informasi perusahaan,
                            posisi, email HRD, template, surat, dan lampiran.
                        </p>

                    </div>


                    {{-- History --}}
                    <div class="dash-card p-6">

                        <div class="dash-icon dash-icon--neutral h-10 w-10">
                            📋
                        </div>

                        <h3 class="mt-4 font-semibold" style="color: var(--ink)">
                            History
                        </h3>

                        <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                            Mencatat lamaran yang telah dikirim sehingga
                            proses pengiriman dapat dipantau dan dikelola.
                        </p>

                    </div>

                </div>

            </div>


            {{-- =========================================================
                 FAQ
            ========================================================== --}}
            <div class="mt-8 grid gap-6 lg:grid-cols-2">

                {{-- FAQ --}}
                <div class="dash-card p-6">

                    <h2 class="dash-serif text-lg font-semibold" style="color: var(--ink)">
                        Pertanyaan yang sering muncul
                    </h2>

                    <div class="mt-5 space-y-3">

                        {{-- FAQ 1 --}}
                        <details class="dash-faq group">

                            <summary>

                                Kenapa saya perlu menautkan Gmail?

                                <span class="float-right transition group-open:rotate-180" style="color: var(--ink-soft)">
                                    ⌄
                                </span>

                            </summary>

                            <p class="mt-3 text-sm leading-6" style="color: var(--ink-soft)">
                                Email akun digunakan sebagai identitas akun.
                                Gmail yang ditautkan memberikan izin kepada
                                aplikasi untuk mengirim lamaran menggunakan
                                akun Gmail tersebut.
                            </p>

                        </details>


                        {{-- FAQ 2 --}}
                        <details class="dash-faq group">

                            <summary>

                                Apakah password Gmail disimpan aplikasi?

                                <span class="float-right transition group-open:rotate-180" style="color: var(--ink-soft)">
                                    ⌄
                                </span>

                            </summary>

                            <p class="mt-3 text-sm leading-6" style="color: var(--ink-soft)">
                                Tidak. Proses penautan Gmail dilakukan melalui
                                Google OAuth sehingga aplikasi tidak meminta
                                password Gmail secara langsung.
                            </p>

                        </details>


                        {{-- FAQ 3 --}}
                        <details class="dash-faq group">

                            <summary>

                                Apa perbedaan Template Email dan Cover Letter?

                                <span class="float-right transition group-open:rotate-180" style="color: var(--ink-soft)">
                                    ⌄
                                </span>

                            </summary>

                            <p class="mt-3 text-sm leading-6" style="color: var(--ink-soft)">
                                Template Email digunakan untuk menyiapkan
                                isi email lamaran, sedangkan Cover Letter
                                digunakan untuk menyiapkan surat lamaran
                                yang dapat diproses sebagai PDF.
                            </p>

                        </details>


                        {{-- FAQ 4 --}}
                        <details class="dash-faq group">

                            <summary>

                                Apa fungsi variable pada template?

                                <span class="float-right transition group-open:rotate-180" style="color: var(--ink-soft)">
                                    ⌄
                                </span>

                            </summary>

                            <p class="mt-3 text-sm leading-6" style="color: var(--ink-soft)">
                                Variable memungkinkan template menggunakan
                                data seperti nama pelamar, perusahaan, posisi,
                                kota, tanggal, dan informasi profil lainnya
                                tanpa harus mengetik ulang setiap kali.
                            </p>

                        </details>


                        {{-- FAQ 5 --}}
                        <details class="dash-faq group">

                            <summary>

                                Apakah saya bisa memiliki template default?

                                <span class="float-right transition group-open:rotate-180" style="color: var(--ink-soft)">
                                    ⌄
                                </span>

                            </summary>

                            <p class="mt-3 text-sm leading-6" style="color: var(--ink-soft)">
                                Bisa. Template yang kamu miliki dapat ditentukan
                                sebagai template default sesuai kebutuhan.
                            </p>

                        </details>

                    </div>

                </div>


                {{-- Preparation --}}
                <div class="dash-card p-6">

                    <h2 class="dash-serif text-lg font-semibold" style="color: var(--ink)">
                        Sebelum mengirim lamaran
                    </h2>

                    <p class="mt-1 text-sm" style="color: var(--ink-soft)">
                        Checklist singkat agar lamaran siap dikirim.
                    </p>


                    <div class="mt-5 space-y-3">

                        <div class="flex gap-3 dash-card--tinted p-4">

                            <div class="dash-checklist-num">
                                1
                            </div>

                            <div>
                                <p class="font-semibold" style="color: var(--ink)">
                                    Profile sudah lengkap
                                </p>

                                <p class="mt-1 text-sm leading-5" style="color: var(--ink-soft)">
                                    Pastikan biodata pelamar sudah benar.
                                </p>
                            </div>

                        </div>


                        <div class="flex gap-3 dash-card--tinted p-4">

                            <div class="dash-checklist-num">
                                2
                            </div>

                            <div>
                                <p class="font-semibold" style="color: var(--ink)">
                                    Gmail sudah terhubung
                                </p>

                                <p class="mt-1 text-sm leading-5" style="color: var(--ink-soft)">
                                    Pastikan akun Gmail pengirim tersedia.
                                </p>
                            </div>

                        </div>


                        <div class="flex gap-3 dash-card--tinted p-4">

                            <div class="dash-checklist-num">
                                3
                            </div>

                            <div>
                                <p class="font-semibold" style="color: var(--ink)">
                                    Template sudah diperiksa
                                </p>

                                <p class="mt-1 text-sm leading-5" style="color: var(--ink-soft)">
                                    Pastikan subject dan isi sesuai dengan posisi.
                                </p>
                            </div>

                        </div>


                        <div class="flex gap-3 dash-card--tinted p-4">

                            <div class="dash-checklist-num">
                                4
                            </div>

                            <div>
                                <p class="font-semibold" style="color: var(--ink)">
                                    Lampiran sudah benar
                                </p>

                                <p class="mt-1 text-sm leading-5" style="color: var(--ink-soft)">
                                    Pastikan CV dan dokumen pendukung yang dipilih sesuai.
                                </p>
                            </div>

                        </div>


                        <div class="flex gap-3 dash-card--tinted p-4">

                            <div class="dash-checklist-num">
                                5
                            </div>

                            <div>
                                <p class="font-semibold" style="color: var(--ink)">
                                    Email HRD benar
                                </p>

                                <p class="mt-1 text-sm leading-5" style="color: var(--ink-soft)">
                                    Periksa kembali alamat email penerima sebelum mengirim.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================================================
                 FINAL REMINDER
            ========================================================== --}}
            <div class="dash-reminder mt-8">

                <div class="flex gap-4">

                    <div class="text-xl">
                        💡
                    </div>

                    <div>

                        <h2 class="font-semibold" style="color: var(--ink)">
                            Gunakan template sebagai pusat personalisasi
                        </h2>

                        <p class="mt-1 text-sm leading-6" style="color: var(--ink)">
                            Dengan menyimpan template email dan cover letter,
                            kamu tidak perlu membuat isi lamaran dari awal.
                            Gunakan variable untuk memasukkan data pelamar
                            dan informasi lowongan secara konsisten.
                        </p>

                    </div>

                </div>

            </div>


        </div>

    </div>

</x-app-layout>