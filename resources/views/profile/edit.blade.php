<x-app-layout title="Profile — Auto Apply Mailer">

    {{-- =========================================================
        PROFILE PAGE
        Visual system mengikuti halaman Template
        Backend / route / field tetap sama
    ========================================================== --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;0,600;1,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .profile-page {
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
            color: var(--ink);
        }

        .profile-page ::selection {
            background: var(--accent-soft);
        }

        .profile-serif {
            font-family: 'Lora', Georgia, serif;
        }

        /* =====================================================
           CARD
        ====================================================== */

        .profile-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 1rem;
            position: relative;
        }

        .profile-card::before {
            content: '';
            position: absolute;
            top: -1px;
            left: 1.5rem;
            right: 1.5rem;
            height: 1px;
            background-image:
                repeating-linear-gradient(90deg,
                    var(--line) 0 6px,
                    transparent 6px 12px);
        }

        /* =====================================================
           SECTION HEADER
        ====================================================== */

        .profile-section-header {
            border-bottom: 1px solid var(--line);
            padding: 1.25rem 1.5rem;
        }

        .profile-section-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.7rem;
            background: var(--paper-soft);
            border: 1px solid var(--line);
            color: var(--accent-ink);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 1rem;
        }

        .profile-section-title {
            font-family: 'Lora', Georgia, serif;
            font-size: 1rem;
            font-weight: 600;
            color: var(--ink);
        }

        .profile-section-description {
            margin-top: 0.25rem;
            font-size: 0.75rem;
            line-height: 1.5;
            color: var(--ink-soft);
        }

        /* =====================================================
           FORM
        ====================================================== */

        .profile-label {
            display: block;
            margin-bottom: 0.375rem;

            font-size: 0.8125rem;
            font-weight: 500;

            color: var(--ink-soft);
        }

        .profile-input {
            width: 100%;

            border: 1px solid var(--line);
            background: var(--paper);

            border-radius: 0.65rem;

            padding: 0.65rem 0.85rem;

            font-size: 0.875rem;
            line-height: 1.5;
            color: var(--ink);

            transition:
                border-color 0.15s ease,
                background 0.15s ease,
                box-shadow 0.15s ease;
        }

        .profile-input::placeholder {
            color: #AAA095;
        }

        .profile-input:focus {
            outline: none;
            border-color: var(--accent);
            background: #fff;
            box-shadow: 0 0 0 3px var(--accent-soft);
        }

        textarea.profile-input {
            min-height: 96px;
        }

        /* =====================================================
           PRIMARY BUTTON
        ====================================================== */

        .profile-btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;

            background: var(--accent);
            color: #fff;

            font-size: 0.875rem;
            font-weight: 600;

            padding: 0.65rem 1.25rem;

            border-radius: 0.65rem;

            transition:
                background 0.15s ease,
                transform 0.15s ease;
        }

        .profile-btn-primary:hover {
            background: var(--accent-ink);
        }

        .profile-btn-primary:focus {
            outline: none;
            box-shadow: 0 0 0 3px var(--accent-soft);
        }

        /* =====================================================
           ALERT
        ====================================================== */

        .profile-alert {
            border-radius: 0.85rem;
            padding: 0.85rem 1.1rem;

            font-size: 0.8125rem;
            font-weight: 500;

            border: 1px solid;
        }

        .profile-alert-success {
            background: var(--accent-soft);
            border-color: var(--accent);
            color: var(--accent-ink);
        }

        .profile-alert-danger {
            background: var(--danger-soft);
            border-color: #E6B8AE;
            color: var(--danger);
        }

        .profile-alert-icon {
            width: 1.75rem;
            height: 1.75rem;

            border-radius: 999px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            font-size: 0.75rem;
            font-weight: 700;
        }

        /* =====================================================
           INFO BOX
        ====================================================== */

        .profile-info {
            background: var(--paper-soft);
            border: 1px solid var(--line);
            border-radius: 0.85rem;
            padding: 1rem 1.1rem;
        }

        .profile-info-icon {
            width: 2rem;
            height: 2rem;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 0.55rem;

            background: var(--accent-soft);
            color: var(--accent-ink);

            flex-shrink: 0;
        }

        /* =====================================================
           GMAIL
        ====================================================== */

        .gmail-connected {
            background: var(--accent-soft);
            border: 1px solid #BBD3C1;
            border-radius: 0.75rem;
            padding: 0.9rem 1rem;
        }

        .gmail-status {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;

            font-size: 0.8125rem;
            font-weight: 600;

            color: var(--accent-ink);
        }

        .gmail-email {
            margin-top: 0.3rem;

            font-size: 0.8125rem;
            color: var(--accent-ink);

            word-break: break-word;
        }

        .gmail-connect {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;

            background: var(--accent);
            color: #fff;

            border-radius: 0.65rem;

            padding: 0.6rem 1rem;

            font-size: 0.8125rem;
            font-weight: 600;

            transition: background 0.15s ease;
        }

        .gmail-connect:hover {
            background: var(--accent-ink);
        }

        .gmail-disconnect {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            background: transparent;
            color: var(--danger);

            border: 1px solid #DDB0A7;

            border-radius: 0.6rem;

            padding: 0.5rem 0.85rem;

            font-size: 0.75rem;
            font-weight: 600;

            transition:
                background 0.15s ease,
                border-color 0.15s ease;
        }

        .gmail-disconnect:hover {
            background: var(--danger-soft);
            border-color: var(--danger);
        }

        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 640px) {
            .profile-card {
                border-radius: 0.85rem;
            }

            .profile-section-header {
                padding: 1rem;
            }

            .profile-card-content {
                padding: 1rem !important;
            }

            .profile-btn-primary {
                width: 100%;
            }

            .profile-action {
                display: block;
            }
        }
    </style>


    <div class="profile-page min-h-screen py-8">

        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

            {{-- =====================================================
                PAGE HEADER
            ====================================================== --}}

            <div class="mb-7">

                <div class="flex items-start gap-3">

                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl"
                        style="
                            background: var(--paper-soft);
                            border: 1px solid var(--line);
                            color: var(--accent-ink);
                        ">
                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a8.25 8.25 0 0 1 15 0" />
                        </svg>
                    </div>

                    <div>

                        <p
                            class="text-xs font-semibold uppercase tracking-wide"
                            style="color: var(--accent);">
                            Account Settings
                        </p>

                        <h1
                            class="profile-serif mt-0.5 text-2xl font-semibold sm:text-3xl"
                            style="color: var(--ink);">
                            Profil Saya
                        </h1>

                    </div>

                </div>

                <p
                    class="mt-3 max-w-2xl text-sm leading-6"
                    style="color: var(--ink-soft);">
                    Lengkapi biodata agar template email dan surat lamaran
                    dapat menyesuaikan dengan akun yang sedang login.
                </p>

            </div>


            {{-- =====================================================
                GOOGLE ERROR
            ====================================================== --}}

            @if ($errors->has('google'))

            <div class="profile-alert profile-alert-danger mb-6">

                <div class="flex items-start gap-3">

                    <div
                        class="profile-alert-icon"
                        style="
                                background: #F2D7D2;
                                color: var(--danger);
                            ">
                        !
                    </div>

                    <div>

                        <p class="font-semibold">
                            Gagal menghubungkan Gmail
                        </p>

                        <p class="mt-1 leading-5">
                            {{ $errors->first('google') }}
                        </p>

                    </div>

                </div>

            </div>

            @endif


            {{-- =====================================================
                SUCCESS
            ====================================================== --}}

            @if (session('status') === 'profile-updated')

            <div class="profile-alert profile-alert-success mb-6">

                <div class="flex items-center gap-3">

                    <div
                        class="profile-alert-icon"
                        style="
                                background: #D1E5D6;
                                color: var(--accent-ink);
                            ">
                        ✓
                    </div>

                    <p>
                        Profil berhasil diperbarui.
                    </p>

                </div>

            </div>

            @endif


            {{-- =====================================================
                MAIN PROFILE FORM
            ====================================================== --}}

            <form
                method="post"
                action="{{ route('profile.update') }}"
                class="space-y-6">

                @csrf
                @method('patch')


                {{-- =================================================
                    ACCOUNT
                ================================================== --}}

                <div class="profile-card overflow-hidden">

                    <div class="profile-section-header">

                        <div class="flex items-center gap-3">

                            <div class="profile-section-icon">
                                <svg
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.6"
                                        d="M21 10.5v8.25A2.25 2.25 0 0 1 18.75 21h-13.5A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6h5.25M16.5 3v6m-3-3h6" />
                                </svg>
                            </div>

                            <div>

                                <h2 class="profile-section-title">
                                    Informasi Akun
                                </h2>

                                <p class="profile-section-description">
                                    Digunakan untuk login dan informasi dasar akun.
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="profile-card-content grid gap-5 p-6 md:grid-cols-2">

                        {{-- Nama --}}
                        <div>

                            <label
                                for="name"
                                class="profile-label">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $user->name) }}"
                                required
                                autocomplete="name"
                                class="profile-input">

                            @error('name')
                            <p class="mt-1 text-xs" style="color: var(--danger);">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>


                        {{-- Email --}}
                        <div>

                            <label
                                for="email"
                                class="profile-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email', $user->email) }}"
                                required
                                autocomplete="email"
                                class="profile-input">

                            @error('email')
                            <p class="mt-1 text-xs" style="color: var(--danger);">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- =================================================
                    BIODATA
                ================================================== --}}

                <div class="profile-card overflow-hidden">

                    <div class="profile-section-header">

                        <div class="flex items-center gap-3">

                            <div class="profile-section-icon">
                                <svg
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.6"
                                        d="M9 5.25h6M9 8.25h6M6.75 3h10.5A2.25 2.25 0 0 1 19.5 5.25v13.5A2.25 2.25 0 0 1 17.25 21H6.75a2.25 2.25 0 0 1-2.25-2.25V5.25A2.25 2.25 0 0 1 6.75 3Z" />
                                </svg>
                            </div>

                            <div>

                                <h2 class="profile-section-title">
                                    Biodata Lamaran
                                </h2>

                                <p class="profile-section-description">
                                    Data ini akan digunakan otomatis pada surat lamaran.
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="profile-card-content space-y-5 p-6">

                        {{-- Tempat + Tanggal Lahir --}}
                        <div class="grid gap-5 md:grid-cols-2">

                            <div>

                                <label
                                    for="birth_place"
                                    class="profile-label">
                                    Tempat Lahir
                                </label>

                                <input
                                    type="text"
                                    name="birth_place"
                                    id="birth_place"
                                    value="{{ old('birth_place', $user->birth_place) }}"
                                    placeholder="Jombang"
                                    class="profile-input">

                                @error('birth_place')
                                <p class="mt-1 text-xs" style="color: var(--danger);">
                                    {{ $message }}
                                </p>
                                @enderror

                            </div>


                            <div>

                                <label
                                    for="birth_date"
                                    class="profile-label">
                                    Tanggal Lahir
                                </label>

                                <input
                                    type="date"
                                    name="birth_date"
                                    id="birth_date"
                                    value="{{ old('birth_date', optional($user->birth_date)->format('Y-m-d')) }}"
                                    class="profile-input">

                                @error('birth_date')
                                <p class="mt-1 text-xs" style="color: var(--danger);">
                                    {{ $message }}
                                </p>
                                @enderror

                            </div>

                        </div>


                        {{-- Pendidikan --}}
                        <div>

                            <label
                                for="education"
                                class="profile-label">
                                Pendidikan Terakhir
                            </label>

                            <input
                                type="text"
                                name="education"
                                id="education"
                                value="{{ old('education', $user->education) }}"
                                placeholder="S1 Teknik Informatika"
                                class="profile-input">

                            @error('education')
                            <p class="mt-1 text-xs" style="color: var(--danger);">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>


                        {{-- Alamat --}}
                        <div>

                            <label
                                for="address"
                                class="profile-label">
                                Alamat
                            </label>

                            <textarea
                                name="address"
                                id="address"
                                rows="3"
                                placeholder="Ds. Gajah, Kecamatan Ngoro, Kabupaten Jombang"
                                class="profile-input resize-y">{{ old('address', $user->address) }}</textarea>

                            @error('address')
                            <p class="mt-1 text-xs" style="color: var(--danger);">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>


                        {{-- Nomor HP --}}
                        <div>

                            <label
                                for="phone"
                                class="profile-label">
                                Nomor HP
                            </label>

                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                value="{{ old('phone', $user->phone) }}"
                                placeholder="089620276245"
                                class="profile-input">

                            @error('phone')
                            <p class="mt-1 text-xs" style="color: var(--danger);">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- =================================================
                    INFO
                ================================================== --}}

                <div class="profile-info">

                    <div class="flex items-start gap-3">

                        <div class="profile-info-icon">

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M12 8.25h.008v.008H12V8.25ZM10.875 11.25H12v5.25m0 0h1.125M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                        </div>

                        <div>

                            <h3
                                class="text-sm font-semibold"
                                style="color: var(--ink);">
                                Biodata digunakan pada template otomatis
                            </h3>

                            <p
                                class="mt-1 text-sm leading-6"
                                style="color: var(--ink-soft);">
                                Setelah profil disimpan, nama, pendidikan,
                                tempat dan tanggal lahir, alamat, nomor HP,
                                serta email akan otomatis digunakan ketika
                                membuat email dan surat lamaran.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                    ACTION
                ================================================== --}}

                <div class="profile-action flex justify-end">

                    <button
                        type="submit"
                        class="profile-btn-primary">

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>

                        Simpan Profil

                    </button>

                </div>

            </form>


            {{-- =====================================================
                GMAIL CONNECTION
            ====================================================== --}}

            <div class="profile-card mt-8 overflow-hidden">

                <div class="profile-section-header">

                    <div class="flex items-center gap-3">

                        <div class="profile-section-icon">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.6"
                                    d="M3.75 6.75 12 12.75l8.25-6M5.25 5.25h13.5A2.25 2.25 0 0 1 21 7.5v9a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 16.5v-9a2.25 2.25 0 0 1 2.25-2.25Z" />
                            </svg>

                        </div>

                        <div>

                            <h2 class="profile-section-title">
                                Gmail Pengiriman
                            </h2>

                            <p class="profile-section-description">
                                Hubungkan akun Gmail untuk mengirim surat lamaran
                                menggunakan alamat email kamu sendiri.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="profile-card-content p-6">

                    @if (auth()->user()->googleAccount)

                    {{-- Gmail sudah terhubung --}}

                    <div class="gmail-connected">

                        <div class="gmail-status">

                            <span
                                class="flex h-5 w-5 items-center justify-center rounded-full"
                                style="
                                        background: #D1E5D6;
                                        color: var(--accent-ink);
                                    ">
                                ✓
                            </span>

                            Gmail Terhubung

                        </div>

                        <p class="gmail-email">
                            {{ auth()->user()->googleAccount->google_email }}
                        </p>

                    </div>


                    <form
                        method="POST"
                        action="{{ route('google.disconnect') }}"
                        class="mt-4">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="gmail-disconnect">
                            Putuskan Gmail
                        </button>

                    </form>

                    @else

                    {{-- Gmail belum terhubung --}}

                    <div>

                        <a
                            href="{{ route('google.connect') }}"
                            class="gmail-connect">

                            <svg
                                class="h-4 w-4"
                                viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M21.35 12.27c0-.71-.06-1.39-.18-2.05H12v3.88h5.23a4.47 4.47 0 0 1-1.94 2.93v2.43h3.14c1.84-1.69 2.92-4.18 2.92-7.19Z" />
                                <path d="M12 21.75c2.63 0 4.84-.87 6.45-2.35l-3.14-2.43c-.87.58-1.98.92-3.31.92-2.54 0-4.69-1.72-5.46-4.03H3.3v2.5A9.75 9.75 0 0 0 12 21.75Z" />
                                <path d="M6.54 13.86A5.86 5.86 0 0 1 6.23 12c0-.65.11-1.28.31-1.86v-2.5H3.3A9.75 9.75 0 0 0 2.25 12c0 1.57.38 3.05 1.05 4.36l3.24-2.5Z" />
                                <path d="M12 6.11c1.43 0 2.71.49 3.72 1.46l2.79-2.79C16.84 3.14 14.63 2.25 12 2.25A9.75 9.75 0 0 0 3.3 7.64l3.24 2.5C7.31 7.83 9.46 6.11 12 6.11Z" />
                            </svg>

                            Connect Gmail

                        </a>

                        <p
                            class="mt-2 text-xs leading-5"
                            style="color: var(--ink-soft);">
                            Kamu akan diarahkan ke Google untuk memberikan izin
                            pengiriman email melalui Gmail.
                        </p>

                    </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</x-app-layout>