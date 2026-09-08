<x-app-layout title="Lamaran — Auto Apply Mailer">

    {{-- =========================================================
        FONT & TOKEN SISTEM HALAMAN INI
        Mengikuti gaya halaman Template: Lora untuk judul (kesan surat),
        Inter untuk UI. Warna dikendalikan lewat CSS variable, bukan
        palet Tailwind bawaan, supaya konsisten dengan halaman Template.
    ========================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;0,600;1,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .tpl-page {
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

        .tpl-serif {
            font-family: 'Lora', Georgia, serif;
        }

        .tpl-page ::selection {
            background: var(--accent-soft);
        }

        /* Kartu generik pengganti bg-white + border + shadow */
        .tpl-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 1rem;
            overflow: hidden;
        }

        .tpl-card-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--line);
        }

        .tpl-card-body {
            padding: 1.5rem;
        }

        .tpl-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.85rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.05rem;
            flex-shrink: 0;
        }

        .tpl-icon--meta {
            background: var(--paper-soft);
        }

        .tpl-icon--accent {
            background: var(--accent-soft);
        }

        .tpl-icon--clay {
            background: var(--clay-soft);
        }

        .tpl-icon--danger {
            background: var(--danger-soft);
        }

        .tpl-label {
            font-size: 0.8125rem;
            font-weight: 500;
            color: var(--ink-soft);
            margin-bottom: 0.375rem;
            display: block;
        }

        .tpl-input {
            width: 100%;
            border: 1px solid var(--line);
            background: var(--paper);
            border-radius: 0.65rem;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            color: var(--ink);
            transition: border-color 0.15s ease, background 0.15s ease;
        }

        .tpl-input:focus {
            outline: none;
            border-color: var(--accent);
            background: #fff;
        }

        .tpl-input[readonly] {
            background: var(--paper-soft);
            color: var(--ink-soft);
        }

        .tpl-input--icon {
            padding-left: 2.75rem;
        }

        textarea.tpl-input {
            resize: vertical;
            line-height: 1.6;
        }

        .tpl-chip {
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.45rem 0.8rem;
            border-radius: 0.55rem;
            background: #fff;
            color: var(--ink-soft);
            border: 1px solid var(--line);
            transition: background 0.15s ease, color 0.15s ease, border-color 0.15s ease;
        }

        .tpl-chip:hover {
            background: var(--paper-soft);
            color: var(--ink);
            border-color: var(--ink-soft);
        }

        .tpl-btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            background: var(--accent);
            color: #fff;
            font-size: 0.875rem;
            font-weight: 600;
            padding: 0.7rem 1.35rem;
            border-radius: 0.7rem;
            transition: background 0.15s ease;
        }

        .tpl-btn-primary:hover {
            background: var(--accent-ink);
        }

        .tpl-btn-primary--clay {
            background: var(--clay);
        }

        .tpl-btn-primary--clay:hover {
            background: #7d4830;
        }

        .tpl-btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border: 1px solid var(--line);
            background: #fff;
            color: var(--ink-soft);
            font-size: 0.8125rem;
            font-weight: 600;
            padding: 0.65rem 1.1rem;
            border-radius: 0.7rem;
            transition: border-color 0.15s ease, background 0.15s ease, color 0.15s ease;
        }

        .tpl-btn-secondary:hover {
            border-color: var(--ink-soft);
            background: var(--paper-soft);
            color: var(--ink);
        }

        .tpl-tag {
            display: inline-flex;
            font-size: 0.6875rem;
            font-weight: 600;
            padding: 0.25rem 0.6rem;
            border-radius: 0.45rem;
            letter-spacing: 0.01em;
        }

        .tpl-tag--accent {
            background: var(--accent-soft);
            color: var(--accent-ink);
        }

        .tpl-tag--clay {
            background: var(--clay-soft);
            color: var(--clay);
        }

        .tpl-tag--meta {
            background: var(--paper-soft);
            color: var(--ink-soft);
        }

        .tpl-alert {
            border-radius: 0.85rem;
            padding: 0.9rem 1.1rem;
            border: 1px solid var(--line);
        }

        .tpl-alert--accent {
            background: var(--accent-soft);
            border-color: var(--accent);
        }

        .tpl-alert--clay {
            background: var(--clay-soft);
            border-color: var(--clay);
        }

        .tpl-alert--danger {
            background: var(--danger-soft);
            border-color: var(--danger);
        }

        .tpl-alert-icon {
            width: 2.25rem;
            height: 2.25rem;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            flex-shrink: 0;
        }

        .tpl-option {
            display: flex;
            gap: 0.75rem;
            align-items: flex-start;
            padding: 1rem;
            border-radius: 0.85rem;
            border: 1px solid var(--line);
            background: #fff;
            cursor: pointer;
            transition: border-color 0.15s ease, background 0.15s ease;
        }

        .tpl-option:hover {
            border-color: var(--ink-soft);
        }

        .tpl-option--selected {
            border-color: var(--accent);
            background: var(--accent-soft);
        }

        .tpl-attachment-row {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.85rem;
            border-radius: 0.85rem;
            border: 1px solid var(--line);
            background: var(--paper);
            cursor: pointer;
            transition: border-color 0.15s ease, background 0.15s ease;
        }

        .tpl-attachment-row:hover {
            border-color: var(--accent);
            background: var(--accent-soft);
        }

        .tpl-row-action {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.45rem 0.75rem;
            border-radius: 0.55rem;
            white-space: nowrap;
            transition: background 0.15s ease;
        }

        .tpl-row-action--accent {
            color: var(--accent-ink);
        }

        .tpl-row-action--accent:hover {
            background: var(--accent-soft);
        }

        .tpl-row-action--clay {
            color: var(--clay);
        }

        .tpl-row-action--clay:hover {
            background: var(--clay-soft);
        }

        .tpl-row-action--danger {
            color: var(--danger);
        }

        .tpl-row-action--danger:hover {
            background: var(--danger-soft);
        }

        .tpl-empty {
            text-align: center;
            padding: 3.5rem 1.5rem;
            background: var(--paper-soft);
            color: var(--ink-soft);
            font-size: 0.875rem;
        }

        .tpl-table thead {
            background: var(--paper-soft);
        }

        .tpl-table th {
            font-size: 0.6875rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: var(--ink-soft);
            padding: 0.9rem 1.1rem;
            text-align: left;
        }

        .tpl-table td {
            padding: 1rem 1.1rem;
            border-top: 1px solid var(--line);
        }

        .tpl-table tbody tr {
            transition: background 0.15s ease;
        }

        .tpl-table tbody tr:hover {
            background: var(--paper-soft);
        }

        .tpl-history-card {
            padding: 1.25rem;
            border-top: 1px solid var(--line);
        }

        .tpl-history-card:first-child {
            border-top: none;
        }

        .tpl-cta {
            background: var(--ink);
            border-radius: 1rem;
            position: relative;
            overflow: hidden;
        }

        .tpl-cta::after {
            content: '';
            position: absolute;
            right: -2.5rem;
            top: -2.5rem;
            height: 9rem;
            width: 9rem;
            border-radius: 9999px;
            background: rgba(47, 111, 78, 0.35);
            filter: blur(40px);
        }

        .tpl-eyebrow {
            display: inline-flex;
            border-radius: 9999px;
            background: rgba(255, 255, 255, 0.1);
            color: var(--accent-soft);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.3rem 0.75rem;
        }
    </style>

    {{-- =========================================================
        DATA PROFILE USER YANG SEDANG LOGIN

        Sengaja menggunakan data-* attribute agar tidak memakai
        @json() di dalam JavaScript.
    ========================================================== --}}
    <div
        id="profile-data"
        class="hidden"
        data-name="{{ Auth::user()->name }}"
        data-email="{{ Auth::user()->email }}"
        data-birth-place="{{ Auth::user()->birth_place ?? '' }}"
        data-birth-date="{{ Auth::user()->birth_date ? \Carbon\Carbon::parse(Auth::user()->birth_date)->translatedFormat('d F Y') : '' }}"
        data-education="{{ Auth::user()->education ?? '' }}"
        data-address="{{ Auth::user()->address ?? '' }}"
        data-phone="{{ Auth::user()->phone ?? '' }}"></div>


    {{-- =========================================================
        PAGE
    ========================================================== --}}
    <div class="tpl-page min-h-[calc(100vh-5rem)]">

        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">


            {{-- =====================================================
                HEADER
            ====================================================== --}}
            <div class="mb-8">

                <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <h1 class="tpl-serif text-2xl font-semibold sm:text-3xl" style="color: var(--ink)">
                            Buat Lamaran Baru
                        </h1>

                        <p class="mt-2 max-w-2xl text-sm leading-6 sm:text-base" style="color: var(--ink-soft)">
                            Isi informasi perusahaan, pilih template,
                            sesuaikan isi lamaran, lalu kirim.
                        </p>

                    </div>


                    <a
                        href="{{ route('dashboard') }}"
                        class="tpl-btn-secondary">

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 19l-7-7 7-7" />
                        </svg>

                        Dashboard

                    </a>

                </div>

            </div>


            {{-- =====================================================
                PROFILE REMINDER
            ====================================================== --}}
            @if (
            !Auth::user()->birth_place ||
            !Auth::user()->birth_date ||
            !Auth::user()->education ||
            !Auth::user()->address ||
            !Auth::user()->phone
            )

            <div class="tpl-alert tpl-alert--clay mb-6">

                <div class="flex items-start gap-3">

                    <div class="tpl-alert-icon" style="background: var(--clay-soft); color: var(--clay)">
                        !
                    </div>


                    <div class="min-w-0 flex-1">

                        <p class="text-sm font-semibold" style="color: var(--clay)">
                            Biodata belum lengkap
                        </p>


                        <p class="mt-1 text-sm leading-5" style="color: var(--ink-soft)">
                            Lengkapi biodata profil agar template email
                            dan surat lamaran dapat terisi otomatis.
                        </p>


                        <a
                            href="{{ route('profile.edit') }}"
                            class="tpl-btn-primary tpl-btn-primary--clay mt-3 text-xs">
                            Lengkapi Profil
                            <span>→</span>
                        </a>

                    </div>

                </div>

            </div>

            @endif


            {{-- =====================================================
                VALIDATION ERROR
            ====================================================== --}}
            @if ($errors->any())

            <div class="tpl-alert tpl-alert--danger mb-6">

                <div class="flex items-start gap-3">

                    <div class="tpl-alert-icon" style="background: var(--danger-soft); color: var(--danger)">
                        !
                    </div>


                    <div>

                        <p class="text-sm font-semibold" style="color: var(--danger)">
                            Ada data yang perlu diperiksa
                        </p>


                        <ul class="mt-2 space-y-1 text-sm" style="color: var(--danger)">

                            @foreach ($errors->all() as $error)

                            <li>
                                • {{ $error }}
                            </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

            @endif


            {{-- =====================================================
                SUCCESS
            ====================================================== --}}
            @if (session('success'))

            <div
                x-data="{ show: true }"
                x-show="show"
                x-transition
                class="tpl-alert tpl-alert--accent mb-6">

                <div class="flex items-start gap-3">

                    <div class="tpl-alert-icon" style="background: var(--accent-soft); color: var(--accent-ink)">
                        ✓
                    </div>


                    <div class="min-w-0 flex-1">

                        <p class="text-sm font-semibold" style="color: var(--accent-ink)">
                            Lamaran berhasil dikirim
                        </p>


                        <p class="mt-1 text-sm" style="color: var(--accent-ink)">
                            {{ session('success') }}
                        </p>

                    </div>


                    <button
                        type="button"
                        @click="show = false"
                        class="rounded-lg p-1 transition"
                        style="color: var(--accent-ink)">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </button>

                </div>

            </div>

            @endif


            {{-- =====================================================
                SESSION ERROR
            ====================================================== --}}
            @if (session('error'))

            <div
                x-data="{ show: true }"
                x-show="show"
                x-transition
                class="tpl-alert tpl-alert--danger mb-6">

                <div class="flex items-start gap-3">

                    <div class="tpl-alert-icon" style="background: var(--danger-soft); color: var(--danger)">
                        !
                    </div>


                    <div class="min-w-0 flex-1">

                        <p class="text-sm font-semibold" style="color: var(--danger)">
                            Lamaran gagal dikirim
                        </p>


                        <p class="mt-1 text-sm" style="color: var(--danger)">
                            {{ session('error') }}
                        </p>

                    </div>


                    <button
                        type="button"
                        @click="show = false"
                        class="rounded-lg p-1 transition"
                        style="color: var(--danger)">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </button>

                </div>

            </div>

            @endif


            {{-- =====================================================
                MAIN FORM
            ====================================================== --}}
            <form
                action="{{ route('apply.send') }}"
                method="POST"
                id="apply-form">

                @csrf


                <div class="grid gap-6 lg:grid-cols-3">


                    {{-- =================================================
                        LEFT COLUMN
                    ================================================== --}}
                    <div class="space-y-6 lg:col-span-2">


                        {{-- =================================================
                            INFORMASI LOWONGAN
                        ================================================== --}}
                        <div class="tpl-card">

                            <div class="tpl-card-header">

                                <div class="flex items-center gap-3">

                                    <div class="tpl-icon tpl-icon--meta">
                                        🏢
                                    </div>


                                    <div>

                                        <h2 class="tpl-serif text-base font-semibold" style="color: var(--ink)">
                                            Informasi Lowongan
                                        </h2>


                                        <p class="mt-1 text-xs" style="color: var(--ink-soft)">
                                            Masukkan informasi perusahaan dan posisi yang dilamar.
                                        </p>

                                    </div>

                                </div>

                            </div>


                            <div class="tpl-card-body space-y-5">

                                {{-- Email HRD --}}
                                <div>

                                    <label
                                        for="email_hrd"
                                        class="tpl-label">
                                        Email HRD Tujuan
                                    </label>


                                    <div class="relative">

                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">

                                            <svg
                                                class="h-5 w-5"
                                                style="color: var(--ink-soft)"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2v10a2 2 0 002 2z" />
                                            </svg>

                                        </div>


                                        <input
                                            type="email"
                                            name="email_hrd"
                                            id="email_hrd"
                                            required
                                            value="{{ old('email_hrd', $selectedHistory->email_hrd ?? '') }}"
                                            placeholder="hrd@perusahaan.com"
                                            class="tpl-input tpl-input--icon">

                                    </div>

                                </div>


                                {{-- Company + Position --}}
                                <div class="grid gap-5 md:grid-cols-2">

                                    <div>

                                        <label
                                            for="nama_pt"
                                            class="tpl-label">
                                            Nama Perusahaan
                                        </label>


                                        <input
                                            type="text"
                                            name="nama_pt"
                                            id="nama_pt"
                                            required
                                            value="{{ old('nama_pt', $selectedHistory->nama_pt ?? '') }}"
                                            placeholder="PT Maju Mundur"
                                            class="tpl-input">

                                    </div>


                                    <div>

                                        <label
                                            for="posisi"
                                            class="tpl-label">
                                            Posisi yang Dilamar
                                        </label>


                                        <input
                                            type="text"
                                            name="posisi"
                                            id="posisi"
                                            required
                                            value="{{ old('posisi', $selectedHistory->posisi ?? '') }}"
                                            placeholder="Backend Developer"
                                            class="tpl-input">

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                            TEMPLATE EMAIL
                        ================================================== --}}
                        <div class="tpl-card">

                            <div class="tpl-card-header">

                                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                                    <div class="flex items-center gap-3">

                                        <div class="tpl-icon tpl-icon--accent">
                                            📝
                                        </div>


                                        <div>

                                            <h2 class="tpl-serif text-base font-semibold" style="color: var(--ink)">
                                                Isi Email
                                            </h2>


                                            <p class="mt-1 text-xs" style="color: var(--ink-soft)">
                                                Pilih template lalu sesuaikan isinya sebelum dikirim.
                                            </p>

                                        </div>

                                    </div>


                                    <button
                                        type="button"
                                        onclick="updateTemplate()"
                                        class="tpl-chip shrink-0">

                                        ↻
                                        Reset Template

                                    </button>

                                </div>


                                {{-- Template selector --}}
                                <div class="mt-5">

                                    <label
                                        for="email_template"
                                        class="tpl-label text-xs font-bold uppercase tracking-wide">
                                        Template Email
                                    </label>


                                    <select
                                        id="email_template"
                                        class="tpl-input font-medium">

                                        @forelse($emailTemplates as $template)

                                        <option
                                            value="{{ $template->id }}"
                                            data-body="{{ e($template->body) }}"
                                            data-subject="{{ e($template->subject ?? '') }}">
                                            {{ $template->name }}
                                            @if($template->is_default)
                                            — Default
                                            @endif
                                        </option>

                                        @empty

                                        <option value="">
                                            Belum ada template email
                                        </option>

                                        @endforelse

                                    </select>

                                </div>


                                {{-- Subject template preview --}}
                                <div class="mt-4">

                                    <label
                                        for="template_subject_preview"
                                        class="tpl-label text-xs font-bold uppercase tracking-wide">
                                        Subjek Template
                                    </label>


                                    <input
                                        type="text"
                                        name="subjek_template"
                                        id="template_subject_preview"
                                        readonly
                                        placeholder="Subjek akan mengikuti template"
                                        class="tpl-input">

                                </div>

                            </div>


                            <div class="tpl-card-body">

                                <textarea
                                    name="body_email"
                                    id="body_email"
                                    rows="17"
                                    required
                                    placeholder="Isi email lamaran..."
                                    class="tpl-input">{{ old('body_email') }}</textarea>


                                <p class="mt-2 text-xs leading-5" style="color: var(--ink-soft)">
                                    Placeholder template akan otomatis diganti dengan
                                    biodata akun dan informasi lowongan.
                                </p>

                            </div>

                        </div>


                        {{-- =================================================
                            SUBJEK EMAIL
                        ================================================== --}}
                        <div class="tpl-card">

                            <div class="tpl-card-header">

                                <div class="flex items-center gap-3">

                                    <div class="tpl-icon tpl-icon--meta">
                                        ✉️
                                    </div>


                                    <div>

                                        <h2 class="tpl-serif text-base font-semibold" style="color: var(--ink)">
                                            Pengaturan Subjek
                                        </h2>


                                        <p class="mt-1 text-xs" style="color: var(--ink-soft)">
                                            Gunakan subjek template atau tentukan sendiri.
                                        </p>

                                    </div>

                                </div>

                            </div>


                            <div class="tpl-card-body space-y-4">

                                {{-- Auto --}}
                                <label
                                    for="subjek_auto"
                                    class="tpl-option tpl-option--selected">

                                    <input
                                        type="radio"
                                        name="tipe_subjek"
                                        id="subjek_auto"
                                        value="auto"
                                        checked
                                        onchange="toggleSubject()"
                                        class="mt-0.5 h-4 w-4"
                                        style="accent-color: var(--accent)">


                                    <span>

                                        <span class="block text-sm font-semibold" style="color: var(--ink)">
                                            Gunakan Subjek Template
                                        </span>


                                        <span class="mt-1 block text-xs leading-5" style="color: var(--ink-soft)">
                                            Subjek akan mengikuti template email yang dipilih.
                                        </span>

                                    </span>

                                </label>


                                {{-- Manual --}}
                                <label
                                    for="subjek_manual"
                                    class="tpl-option">

                                    <input
                                        type="radio"
                                        name="tipe_subjek"
                                        id="subjek_manual"
                                        value="manual"
                                        onchange="toggleSubject()"
                                        class="mt-0.5 h-4 w-4"
                                        style="accent-color: var(--accent)">


                                    <span>

                                        <span class="block text-sm font-semibold" style="color: var(--ink)">
                                            Manual
                                        </span>


                                        <span class="mt-1 block text-xs leading-5" style="color: var(--ink-soft)">
                                            Tentukan sendiri subjek email.
                                        </span>

                                    </span>

                                </label>


                                {{-- Manual Input --}}
                                <div
                                    id="manual_subject_wrapper"
                                    class="hidden">

                                    <label
                                        for="input_subjek_manual"
                                        class="tpl-label">
                                        Subjek Custom
                                    </label>


                                    <input
                                        type="text"
                                        name="subjek_custom"
                                        id="input_subjek_manual"
                                        value="{{ old('subjek_custom') }}"
                                        placeholder="Lamaran Staff Administrasi - Nama Lengkap"
                                        class="tpl-input">

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                            SURAT LAMARAN PDF
                        ================================================== --}}
                        <div class="tpl-card">

                            <div class="tpl-card-header">

                                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                                    <div class="flex items-center gap-3">

                                        <div class="tpl-icon tpl-icon--clay">
                                            📄
                                        </div>


                                        <div>

                                            <h2 class="tpl-serif text-base font-semibold" style="color: var(--ink)">
                                                Surat Lamaran PDF
                                            </h2>


                                            <p class="mt-1 text-xs" style="color: var(--ink-soft)">
                                                Pilih template surat dan sesuaikan sebelum dikirim.
                                            </p>

                                        </div>

                                    </div>

                                </div>


                                {{-- PDF Template Selector --}}
                                <div class="mt-5">

                                    <label
                                        for="pdf_template"
                                        class="tpl-label text-xs font-bold uppercase tracking-wide">
                                        Template Surat
                                    </label>


                                    <select
                                        id="pdf_template"
                                        class="tpl-input font-medium">

                                        @forelse($pdfTemplates as $template)
                                        <option
                                            value="{{ $template->id }}"
                                            data-body-base64="{{ base64_encode($template->body ?? '') }}">
                                            {{ $template->name }}
                                            @if($template->is_default)
                                            — Default
                                            @endif
                                        </option>
                                        @empty

                                        <option value="">
                                            Belum ada template surat
                                        </option>

                                        @endforelse

                                    </select>

                                </div>

                            </div>


                            <div class="tpl-card-body">

                                <textarea
                                    name="body_pdf"
                                    id="body_pdf">{{ old('body_pdf') }}</textarea>


                                <p class="mt-3 text-xs leading-5" style="color: var(--ink-soft)">
                                    Data biodata dan informasi lowongan akan otomatis
                                    mengikuti profil serta form Apply.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                        RIGHT COLUMN
                    ================================================== --}}
                    <div class="space-y-6">


                        {{-- =================================================
                            LAMPIRAN
                        ================================================== --}}
                        <div class="tpl-card">

                            <div class="tpl-card-header">

                                <div class="flex items-center gap-3">

                                    <div class="tpl-icon tpl-icon--meta">
                                        📎
                                    </div>


                                    <div>

                                        <h2 class="tpl-serif text-base font-semibold" style="color: var(--ink)">
                                            Lampiran
                                        </h2>


                                        <p class="mt-1 text-xs" style="color: var(--ink-soft)">
                                            Pilih dokumen yang akan dikirim.
                                        </p>

                                    </div>

                                </div>

                            </div>


                            <div class="space-y-3 p-5">

                                @forelse($files as $file)

                                <label
                                    for="file_{{ $loop->index }}"
                                    class="tpl-attachment-row">

                                    <input
                                        type="checkbox"
                                        name="lampiran[]"
                                        value="{{ $file }}"
                                        id="file_{{ $loop->index }}"
                                        checked
                                        class="h-4 w-4 rounded"
                                        style="accent-color: var(--accent)">


                                    <div class="flex min-w-0 flex-1 items-center gap-3">

                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl text-lg" style="background: #fff; border: 1px solid var(--line)">
                                            📄
                                        </div>


                                        <span
                                            class="truncate text-sm font-medium"
                                            style="color: var(--ink)"
                                            title="{{ $file }}">
                                            {{ $file }}
                                        </span>

                                    </div>

                                </label>

                                @empty

                                <div class="tpl-alert tpl-alert--clay">

                                    <div class="flex gap-3">

                                        <span class="text-lg">
                                            ⚠️
                                        </span>


                                        <div>

                                            <p class="text-sm font-semibold" style="color: var(--clay)">
                                                Belum ada berkas
                                            </p>


                                            <p class="mt-1 text-xs leading-5" style="color: var(--ink-soft)">
                                                Upload CV atau dokumen pendukung
                                                melalui menu Berkas.
                                            </p>

                                        </div>

                                    </div>

                                </div>

                                @endforelse

                            </div>


                            <div class="p-5" style="border-top: 1px solid var(--line)">

                                <a
                                    href="{{ route('files.index') }}"
                                    class="tpl-btn-secondary w-full text-xs">
                                    📁
                                    Kelola Berkas
                                </a>

                            </div>

                        </div>


                        {{-- =================================================
                            PROFILE SUMMARY
                        ================================================== --}}
                        <div class="tpl-card p-5">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <h3 class="tpl-serif text-sm font-semibold" style="color: var(--ink)">
                                        Profil Pelamar
                                    </h3>


                                    <p class="mt-1 text-xs" style="color: var(--ink-soft)">
                                        Data yang digunakan oleh template.
                                    </p>

                                </div>


                                <a
                                    href="{{ route('profile.edit') }}"
                                    class="text-xs font-semibold"
                                    style="color: var(--accent-ink)">
                                    Edit
                                </a>

                            </div>


                            <div class="mt-5 space-y-4">

                                <div>

                                    <p class="text-[11px] font-semibold uppercase tracking-wide" style="color: var(--ink-soft)">
                                        Nama
                                    </p>


                                    <p class="mt-1 text-sm font-semibold" style="color: var(--ink)">
                                        {{ Auth::user()->name }}
                                    </p>

                                </div>


                                <div>

                                    <p class="text-[11px] font-semibold uppercase tracking-wide" style="color: var(--ink-soft)">
                                        Pendidikan
                                    </p>


                                    <p class="mt-1 text-sm" style="color: var(--ink-soft)">
                                        {{ Auth::user()->education ?: 'Belum diisi' }}
                                    </p>

                                </div>


                                <div>

                                    <p class="text-[11px] font-semibold uppercase tracking-wide" style="color: var(--ink-soft)">
                                        Email
                                    </p>


                                    <p class="mt-1 truncate text-sm" style="color: var(--ink-soft)">
                                        {{ Auth::user()->email }}
                                    </p>

                                </div>


                                <div>

                                    <p class="text-[11px] font-semibold uppercase tracking-wide" style="color: var(--ink-soft)">
                                        Nomor HP
                                    </p>


                                    <p class="mt-1 text-sm" style="color: var(--ink-soft)">
                                        {{ Auth::user()->phone ?: 'Belum diisi' }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                            SEND CARD
                        ================================================== --}}
                        <div class="tpl-cta">

                            <div class="relative p-6">

                                <div class="relative z-10">

                                    <span class="tpl-eyebrow">
                                        Siap dikirim?
                                    </span>


                                    <h2 class="tpl-serif mt-4 text-xl font-semibold text-white">
                                        Periksa kembali
                                    </h2>


                                    <p class="mt-2 text-sm leading-6" style="color: #C9C2B4">
                                        Pastikan informasi HRD, posisi,
                                        template, isi email, surat,
                                        dan lampiran sudah benar.
                                    </p>


                                    <button
                                        type="submit"
                                        class="tpl-btn-primary mt-6 w-full py-3.5 text-sm">

                                        <svg
                                            class="h-5 w-5"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 10.5L21 3l-7.5 18-3.5-7-7-3.5z" />
                                        </svg>


                                        Kirim Lamaran

                                    </button>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                            TIPS
                        ================================================== --}}
                        <div class="tpl-card p-5">

                            <h3 class="tpl-serif text-sm font-semibold" style="color: var(--ink)">
                                Tips sebelum mengirim
                            </h3>


                            <div class="mt-4 space-y-3">

                                <div class="flex gap-3">

                                    <span class="text-sm" style="color: var(--accent-ink)">
                                        ✓
                                    </span>


                                    <p class="text-xs leading-5" style="color: var(--ink-soft)">
                                        Pastikan email HRD sudah benar.
                                    </p>

                                </div>


                                <div class="flex gap-3">

                                    <span class="text-sm" style="color: var(--accent-ink)">
                                        ✓
                                    </span>


                                    <p class="text-xs leading-5" style="color: var(--ink-soft)">
                                        Pilih template yang paling sesuai.
                                    </p>

                                </div>


                                <div class="flex gap-3">

                                    <span class="text-sm" style="color: var(--accent-ink)">
                                        ✓
                                    </span>


                                    <p class="text-xs leading-5" style="color: var(--ink-soft)">
                                        Pastikan biodata profil sudah lengkap.
                                    </p>

                                </div>


                                <div class="flex gap-3">

                                    <span class="text-sm" style="color: var(--accent-ink)">
                                        ✓
                                    </span>


                                    <p class="text-xs leading-5" style="color: var(--ink-soft)">
                                        Periksa kembali CV dan dokumen pendukung.
                                    </p>

                                </div>


                                <div class="flex gap-3">

                                    <span class="text-sm" style="color: var(--accent-ink)">
                                        ✓
                                    </span>


                                    <p class="text-xs leading-5" style="color: var(--ink-soft)">
                                        Baca kembali isi email sebelum dikirim.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </form>


            {{-- =====================================================
                RIWAYAT LAMARAN
            ====================================================== --}}
            <div class="mt-10">

                <div class="mb-5">

                    <div class="flex items-center gap-2">

                        <span class="text-lg">
                            📋
                        </span>


                        <h2 class="tpl-serif text-xl font-semibold" style="color: var(--ink)">
                            Riwayat Lamaran
                        </h2>

                    </div>


                    <p class="mt-1 text-sm" style="color: var(--ink-soft)">
                        Daftar lamaran yang telah kamu kirim.
                    </p>

                </div>


                <div class="tpl-card">


                    {{-- =================================================
                        DESKTOP TABLE
                    ================================================== --}}
                    <div class="hidden overflow-x-auto xl:block">

                        <table class="tpl-table min-w-full">

                            <thead>

                                <tr>

                                    <th>
                                        No
                                    </th>


                                    <th>
                                        Waktu
                                    </th>


                                    <th>
                                        Perusahaan
                                    </th>


                                    <th>
                                        Posisi
                                    </th>


                                    <th>
                                        Email HRD
                                    </th>


                                    <th>
                                        Status
                                    </th>


                                    <th>
                                        Subjek
                                    </th>


                                    <th>
                                        Waktu Berlalu
                                    </th>


                                    <th>
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($histories as $history)

                                @php
                                $days = floor($history->created_at->diffInDays(now()));
                                @endphp


                                <tr>

                                    <td class="whitespace-nowrap text-sm" style="color: var(--ink-soft)">
                                        {{ $loop->iteration }}
                                    </td>


                                    <td class="whitespace-nowrap">

                                        <p class="text-sm font-medium" style="color: var(--ink)">
                                            {{ $history->created_at->format('d/m/Y') }}
                                        </p>


                                        <p class="text-xs" style="color: var(--ink-soft)">
                                            {{ $history->created_at->format('H:i') }}
                                        </p>

                                    </td>


                                    <td>

                                        <p class="max-w-[180px] truncate text-sm font-semibold" style="color: var(--ink)">
                                            {{ $history->nama_pt }}
                                        </p>

                                    </td>


                                    <td>

                                        <span class="tpl-tag tpl-tag--accent">
                                            {{ $history->posisi }}
                                        </span>

                                    </td>


                                    <td>

                                        <p class="max-w-[200px] truncate text-sm" style="color: var(--ink-soft)">
                                            {{ $history->email_hrd }}
                                        </p>

                                    </td>


                                    <td>

                                        <form
                                            action="{{ route('history.update-status', $history->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('PATCH')


                                            <select
                                                name="status"
                                                onchange="this.form.submit()"
                                                class="tpl-input py-2 text-xs font-semibold">

                                                <option
                                                    value="Terkirim"
                                                    {{ $history->status === 'Terkirim' ? 'selected' : '' }}>
                                                    📤 Terkirim
                                                </option>


                                                <option
                                                    value="Interview"
                                                    {{ $history->status === 'Interview' ? 'selected' : '' }}>
                                                    🤝 Interview
                                                </option>


                                                <option
                                                    value="Diterima"
                                                    {{ $history->status === 'Diterima' ? 'selected' : '' }}>
                                                    🎉 Diterima
                                                </option>


                                                <option
                                                    value="Ditolak"
                                                    {{ $history->status === 'Ditolak' ? 'selected' : '' }}>
                                                    ❌ Ditolak
                                                </option>

                                            </select>

                                        </form>

                                    </td>


                                    <td>

                                        <p
                                            class="max-w-[220px] truncate text-sm"
                                            style="color: var(--ink-soft)"
                                            title="{{ $history->subjek }}">
                                            {{ $history->subjek }}
                                        </p>

                                    </td>


                                    <td class="whitespace-nowrap">

                                        @if($days === 0)

                                        <span class="tpl-tag tpl-tag--accent">
                                            Hari ini
                                        </span>

                                        @elseif($days === 1)

                                        <span class="tpl-tag tpl-tag--clay">
                                            1 hari lalu
                                        </span>

                                        @else

                                        <span class="tpl-tag tpl-tag--meta">
                                            {{ $days }} hari lalu
                                        </span>

                                        @endif

                                    </td>


                                    <td>

                                        <div class="flex items-center gap-2">

                                            <a
                                                href="{{ route('history.resend', $history->id) }}"
                                                class="tpl-row-action tpl-row-action--clay" style="background: var(--clay-soft)">
                                                ↻ Kirim Ulang
                                            </a>


                                            <form
                                                action="{{ route('history.destroy', $history->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus riwayat ini?')">

                                                @csrf
                                                @method('DELETE')


                                                <button
                                                    type="submit"
                                                    class="tpl-row-action tpl-row-action--danger" style="background: var(--danger-soft)">
                                                    🗑 Hapus
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>


                                @empty

                                <tr>

                                    <td
                                        colspan="9"
                                        class="!border-t-0">

                                        <div class="tpl-empty">

                                            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl text-2xl" style="background: #fff; border: 1px solid var(--line)">
                                                📭
                                            </div>


                                            <h3 class="mt-4 text-sm font-semibold" style="color: var(--ink)">
                                                Belum ada riwayat
                                            </h3>


                                            <p class="mt-1 text-sm leading-6" style="color: var(--ink-soft)">
                                                Lamaran yang berhasil dikirim akan muncul di sini.
                                            </p>

                                        </div>

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


                    {{-- =================================================
                        MOBILE / TABLET
                    ================================================== --}}
                    <div class="xl:hidden">

                        @forelse($histories as $history)

                        @php
                        $days = floor($history->created_at->diffInDays(now()));
                        @endphp


                        <div class="tpl-history-card space-y-4">

                            <div class="flex items-start justify-between gap-4">

                                <div class="min-w-0">

                                    <p class="truncate text-sm font-semibold" style="color: var(--ink)">
                                        {{ $history->nama_pt }}
                                    </p>


                                    <p class="mt-1 text-xs" style="color: var(--ink-soft)">
                                        {{ $history->created_at->format('d/m/Y H:i') }}
                                    </p>

                                </div>


                                @if($days === 0)

                                <span class="tpl-tag tpl-tag--accent shrink-0">
                                    Hari ini
                                </span>

                                @elseif($days === 1)

                                <span class="tpl-tag tpl-tag--clay shrink-0">
                                    1 hari lalu
                                </span>

                                @else

                                <span class="tpl-tag tpl-tag--meta shrink-0">
                                    {{ $days }} hari lalu
                                </span>

                                @endif

                            </div>


                            <div class="grid gap-4 sm:grid-cols-2">

                                <div>

                                    <p class="text-[11px] font-semibold uppercase tracking-wide" style="color: var(--ink-soft)">
                                        Posisi
                                    </p>


                                    <span class="tpl-tag tpl-tag--accent mt-1 inline-flex">
                                        {{ $history->posisi }}
                                    </span>

                                </div>


                                <div>

                                    <p class="text-[11px] font-semibold uppercase tracking-wide" style="color: var(--ink-soft)">
                                        Email HRD
                                    </p>


                                    <p class="mt-1 truncate text-sm" style="color: var(--ink-soft)">
                                        {{ $history->email_hrd }}
                                    </p>

                                </div>

                            </div>


                            <div>

                                <p class="text-[11px] font-semibold uppercase tracking-wide" style="color: var(--ink-soft)">
                                    Subjek
                                </p>


                                <p class="mt-1 text-sm leading-5" style="color: var(--ink-soft)">
                                    {{ $history->subjek }}
                                </p>

                            </div>


                            <div>

                                <p class="tpl-label mb-2">
                                    Status
                                </p>


                                <form
                                    action="{{ route('history.update-status', $history->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('PATCH')


                                    <select
                                        name="status"
                                        onchange="this.form.submit()"
                                        class="tpl-input font-semibold">

                                        <option
                                            value="Terkirim"
                                            {{ $history->status === 'Terkirim' ? 'selected' : '' }}>
                                            📤 Terkirim
                                        </option>


                                        <option
                                            value="Interview"
                                            {{ $history->status === 'Interview' ? 'selected' : '' }}>
                                            🤝 Interview
                                        </option>


                                        <option
                                            value="Diterima"
                                            {{ $history->status === 'Diterima' ? 'selected' : '' }}>
                                            🎉 Diterima
                                        </option>


                                        <option
                                            value="Ditolak"
                                            {{ $history->status === 'Ditolak' ? 'selected' : '' }}>
                                            ❌ Ditolak
                                        </option>

                                    </select>

                                </form>

                            </div>


                            <div class="flex flex-col gap-2 pt-1 sm:flex-row">

                                <a
                                    href="{{ route('history.resend', $history->id) }}"
                                    class="tpl-row-action tpl-row-action--clay flex-1 text-center" style="background: var(--clay-soft)">
                                    ↻ Kirim Ulang
                                </a>


                                <form
                                    action="{{ route('history.destroy', $history->id) }}"
                                    method="POST"
                                    class="flex-1"
                                    onsubmit="return confirm('Yakin ingin menghapus riwayat ini?')">

                                    @csrf
                                    @method('DELETE')


                                    <button
                                        type="submit"
                                        class="tpl-row-action tpl-row-action--danger w-full" style="background: var(--danger-soft)">
                                        🗑 Hapus
                                    </button>

                                </form>

                            </div>

                        </div>


                        @empty

                        <div class="tpl-empty">

                            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl text-2xl" style="background: #fff; border: 1px solid var(--line)">
                                📭
                            </div>


                            <h3 class="mt-4 text-sm font-semibold" style="color: var(--ink)">
                                Belum ada riwayat
                            </h3>


                            <p class="mt-1 text-sm leading-6" style="color: var(--ink-soft)">
                                Lamaran yang berhasil dikirim akan muncul di sini.
                            </p>

                        </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
    TINYMCE JS (self-hosted, tidak perlu API key)
========================================================== --}}
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>

    {{-- =========================================================
    TINYMCE STYLE
========================================================== --}}
    <style>
        .tox-tinymce {
            border: 1px solid #E4DECE !important;
            border-radius: 0.75rem !important;
            overflow: hidden;
            box-shadow: none !important;
        }

        .tox .tox-toolbar,
        .tox .tox-toolbar__overflow,
        .tox .tox-toolbar__primary {
            background: #F2EDE1 !important;
        }

        .tox .tox-edit-area {
            border-top: 1px solid #E4DECE !important;
        }

        .tox .tox-statusbar {
            border-top: 1px solid #E4DECE !important;
            background: #F2EDE1 !important;
        }

        .tox-dialog textarea,
        .tox-textarea {
            color: #23262B !important;
            background-color: #ffffff !important;
            -webkit-text-fill-color: #23262B !important;
            opacity: 1 !important;
        }

        @media (max-width: 640px) {
            .tox .tox-edit-area__iframe {
                min-height: 300px !important;
            }
        }
    </style>


    {{-- =========================================================
    JAVASCRIPT
========================================================== --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            /*
            |--------------------------------------------------------------------------
            | ELEMENT
            |--------------------------------------------------------------------------
            */

            const bodyEmail = document.getElementById('body_email');
            const bodyPdf = document.getElementById('body_pdf');
            const namaPt = document.getElementById('nama_pt');
            const posisi = document.getElementById('posisi');
            const emailTemplateSelect = document.getElementById('email_template');
            const pdfTemplateSelect = document.getElementById('pdf_template');
            const subjectPreview = document.getElementById('template_subject_preview');
            const profileElement = document.getElementById('profile-data');

            let pdfEditorReady = false; // flag: TinyMCE #body_pdf sudah selesai init atau belum

            /*
            |--------------------------------------------------------------------------
            | PROFILE
            |--------------------------------------------------------------------------
            */

            const profile = {
                name: profileElement?.dataset.name || '',
                email: profileElement?.dataset.email || '',
                birthPlace: profileElement?.dataset.birthPlace || '',
                birthDate: profileElement?.dataset.birthDate || '',
                education: profileElement?.dataset.education || '',
                address: profileElement?.dataset.address || '',
                phone: profileElement?.dataset.phone || ''
            };

            /*
            |--------------------------------------------------------------------------
            | TEMPLATE VALUES
            |--------------------------------------------------------------------------
            */

            function getTemplateValues() {
                const perusahaan = namaPt?.value?.trim() || '[NAMA_PT]';
                const posisiLamaran = posisi?.value?.trim() || '[POSISI]';
                const tanggal = new Intl.DateTimeFormat('id-ID', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                }).format(new Date());

                return {
                    ['{' + '{nama}' + '}']: profile.name || 'Nama Lengkap',
                    ['{' + '{email}' + '}']: profile.email || 'Email',
                    ['{' + '{phone}' + '}']: profile.phone || 'Nomor HP',
                    ['{' + '{pendidikan}' + '}']: profile.education || 'Pendidikan',
                    ['{' + '{alamat}' + '}']: profile.address || 'Alamat',
                    ['{' + '{tempat_lahir}' + '}']: profile.birthPlace || 'Tempat Lahir',
                    ['{' + '{tanggal_lahir}' + '}']: profile.birthDate || 'Tanggal Lahir',
                    ['{' + '{perusahaan}' + '}']: perusahaan,
                    ['{' + '{posisi}' + '}']: posisiLamaran,
                    ['{' + '{tanggal}' + '}']: tanggal,
                    ['{' + '{kota}' + '}']: 'Jombang'
                };
            }

            /*
            |--------------------------------------------------------------------------
            | DECODE PDF TEMPLATE
            |--------------------------------------------------------------------------
            | Template HTML dikirim dari Blade menggunakan Base64.
            | Ini mencegah HTML seperti <table>, <div>, <p>, dll
            | berubah menjadi teks di editor.
            */
            function decodeBase64Utf8(base64) {
                if (!base64) {
                    return '';
                }
                try {
                    const binary = atob(base64);
                    const bytes = Uint8Array.from(binary, char => char.charCodeAt(0));
                    return new TextDecoder('utf-8').decode(bytes);
                } catch (error) {
                    console.error('Gagal decode template PDF:', error);
                    return '';
                }
            }

            /*
            |--------------------------------------------------------------------------
            | RENDER TEMPLATE
            |--------------------------------------------------------------------------
            */

            function renderTemplate(template) {
                let result = template || '';
                const values = getTemplateValues();

                Object.entries(values).forEach(function([placeholder, value]) {
                    result = result.split(placeholder).join(value);
                });

                return result;
            }

            /*
            |--------------------------------------------------------------------------
            | GET SELECTED EMAIL / PDF TEMPLATE
            |--------------------------------------------------------------------------
            */

            function getSelectedEmailOption() {
                if (!emailTemplateSelect) return null;
                return emailTemplateSelect.options[emailTemplateSelect.selectedIndex] || null;
            }

            function getSelectedPdfOption() {
                if (!pdfTemplateSelect) return null;
                return pdfTemplateSelect.options[pdfTemplateSelect.selectedIndex] || null;
            }

            /*
            |--------------------------------------------------------------------------
            | LOAD EMAIL TEMPLATE
            |--------------------------------------------------------------------------
            */

            function loadEmailTemplate() {
                if (!bodyEmail) return;

                const option = getSelectedEmailOption();
                if (!option) return;

                const rawBody = option.getAttribute('data-body') || '';
                const rawSubject = option.getAttribute('data-subject') || '';

                bodyEmail.value = renderTemplate(rawBody);

                if (subjectPreview) {
                    subjectPreview.value = renderTemplate(rawSubject);
                }

                const manualSubject = document.getElementById('input_subjek_manual');

                if (manualSubject && document.getElementById('subjek_auto')?.checked) {
                    manualSubject.value = renderTemplate(rawSubject);
                }
            }

            /*
            |--------------------------------------------------------------------------
            | LOAD PDF TEMPLATE (via TinyMCE)
            |--------------------------------------------------------------------------
            */

            function loadPdfTemplate() {
                if (!bodyPdf || !pdfEditorReady) return;

                const option = getSelectedPdfOption();
                if (!option) return;

                const encodedBody = option.getAttribute('data-body-base64') || '';
                const rawBody = decodeBase64Utf8(encodedBody);
                const rendered = renderTemplate(rawBody);

                const editor = tinymce.get('body_pdf');
                if (editor) {
                    editor.setContent(rendered);
                }
            }

            /*
            |--------------------------------------------------------------------------
            | TINYMCE INITIALIZATION
            |--------------------------------------------------------------------------
            */

            if (bodyPdf) {
                tinymce.init({
                    selector: '#body_pdf',
                    license_key: 'gpl',
                    height: 400,
                    menubar: false,
                    branding: false,
                    plugins: 'lists table code fullscreen',
                    toolbar: 'bold italic underline strikethrough removeformat | ' +
                        'bullist numlist | alignleft aligncenter alignright alignjustify | ' +
                        'table | fullscreen code',
                    table_resize_bars: true,
                    table_use_colgroups: true,
                    table_default_attributes: {
                        border: '1'
                    },
                    table_default_styles: {
                        'border-collapse': 'collapse',
                        'width': '100%'
                    },
                    content_style: `
                        body { font-family: sans-serif; font-size: 14px; line-height: 1.7; color: #23262B; }
                        ol { list-style-type: decimal; padding-left: 2rem; }
                        ul { list-style-type: disc; padding-left: 2rem; }

                        /* Tambahan: rapatkan tinggi baris tabel */
                        table { border-collapse: collapse; }
                        table td, table th {
                            padding: 4px 8px !important;
                            vertical-align: top;
                            line-height: 1.4;
                        }
                        table td p, table th p {
                            margin: 0 !important;
                            padding: 0 !important;
                        }
                    `,

                    // Dipanggil sekali setelah editor selesai dimuat
                    init_instance_callback: function(editor) {
                        pdfEditorReady = true;

                        const existingPdf = bodyPdf.value.trim();

                        // Kalau datang dari validation error, pertahankan data lama.
                        if (existingPdf) {
                            editor.setContent(existingPdf);
                        } else {
                            loadPdfTemplate();
                        }
                    }
                });
            }

            /*
            |--------------------------------------------------------------------------
            | INITIAL EMAIL TEMPLATE
            |--------------------------------------------------------------------------
            */

            if (bodyEmail) {
                const existingEmail = bodyEmail.value.trim();

                // Kalau datang dari validation error, jangan menimpa input lama.
                if (!existingEmail) {
                    loadEmailTemplate();
                }
            }

            /*
            |--------------------------------------------------------------------------
            | EMAIL / PDF TEMPLATE CHANGE
            |--------------------------------------------------------------------------
            */

            if (emailTemplateSelect) {
                emailTemplateSelect.addEventListener('change', function() {
                    loadEmailTemplate();
                });
            }

            if (pdfTemplateSelect) {
                pdfTemplateSelect.addEventListener('change', function() {
                    loadPdfTemplate();
                });
            }

            /*
            |--------------------------------------------------------------------------
            | UPDATE SUBJECT WHEN COMPANY / POSITION CHANGES
            |--------------------------------------------------------------------------
            */

            function refreshSubjectPreview() {
                const option = getSelectedEmailOption();
                if (!option) return;

                const rawSubject = option.getAttribute('data-subject') || '';

                if (subjectPreview) {
                    subjectPreview.value = renderTemplate(rawSubject);
                }
            }

            if (namaPt) {
                namaPt.addEventListener('input', refreshSubjectPreview);
            }

            if (posisi) {
                posisi.addEventListener('input', refreshSubjectPreview);
            }

            /*
            |--------------------------------------------------------------------------
            | SUBJECT TOGGLE
            |--------------------------------------------------------------------------
            */

            window.toggleSubject = function() {
                const manualRadio = document.getElementById('subjek_manual');
                const inputManual = document.getElementById('input_subjek_manual');
                const wrapper = document.getElementById('manual_subject_wrapper');

                if (!manualRadio || !inputManual || !wrapper) return;

                if (manualRadio.checked) {
                    wrapper.classList.remove('hidden');
                    inputManual.required = true;

                    if (!inputManual.value.trim()) {
                        const option = getSelectedEmailOption();
                        const rawSubject = option?.getAttribute('data-subject') || '';
                        inputManual.value = renderTemplate(rawSubject);
                    }
                } else {
                    wrapper.classList.add('hidden');
                    inputManual.required = false;
                }
            };

            /*
            |--------------------------------------------------------------------------
            | RESET TEMPLATE
            |--------------------------------------------------------------------------
            */

            window.updateTemplate = function() {
                loadEmailTemplate();
                loadPdfTemplate();
            };

            /*
            |--------------------------------------------------------------------------
            | PASTIKAN ISI EDITOR TERSINKRON SEBELUM SUBMIT
            |--------------------------------------------------------------------------
            */

            const applyForm = document.getElementById('apply-form');
            if (applyForm) {
                applyForm.addEventListener('submit', function() {
                    tinymce.triggerSave();
                });
            }

        });
    </script>

</x-app-layout>