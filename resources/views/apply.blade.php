<x-app-layout>

    {{-- =========================================================
        DATA USER YANG SEDANG LOGIN
        Tidak menggunakan @json() di dalam JavaScript.
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


    <div class="min-h-[calc(100vh-5rem)] bg-gray-50">

        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- =====================================================
                HEADER
            ====================================================== --}}
            <div class="mb-8">

                <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <div class="mb-3 flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-600 text-lg text-white shadow-sm">
                                ✉
                            </div>

                            <span class="text-sm font-semibold text-indigo-600">
                                Auto Apply Mailer
                            </span>

                        </div>


                        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                            Buat Lamaran Baru
                        </h1>


                        <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-500 sm:text-base">
                            Isi informasi perusahaan, siapkan email lamaran,
                            pilih dokumen yang ingin dilampirkan, lalu kirim.
                        </p>

                    </div>


                    <a
                        href="{{ route('dashboard') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm transition hover:border-gray-300 hover:bg-gray-50">

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

            <div class="mb-6 rounded-2xl border border-amber-200 bg-amber-50 p-4">

                <div class="flex items-start gap-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-amber-100 text-amber-600">
                        !
                    </div>


                    <div class="min-w-0 flex-1">

                        <p class="text-sm font-semibold text-amber-800">
                            Lengkapi biodata profil
                        </p>

                        <p class="mt-1 text-sm leading-5 text-amber-700">
                            Beberapa data profil belum diisi.
                            Lengkapi profil agar template surat lamaran
                            dapat terisi secara otomatis.
                        </p>


                        <a
                            href="{{ route('profile.edit') }}"
                            class="mt-3 inline-flex items-center gap-2 rounded-lg bg-amber-600 px-3 py-2 text-xs font-semibold text-white transition hover:bg-amber-700">
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

            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 shadow-sm">

                <div class="flex items-start gap-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-red-100 font-bold text-red-600">
                        !
                    </div>


                    <div>

                        <p class="text-sm font-semibold text-red-800">
                            Ada data yang perlu diperiksa
                        </p>


                        <ul class="mt-2 space-y-1 text-sm text-red-700">

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
                class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 shadow-sm">

                <div class="flex items-start gap-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-emerald-100 font-bold text-emerald-600">
                        ✓
                    </div>


                    <div class="min-w-0 flex-1">

                        <p class="text-sm font-semibold text-emerald-800">
                            Lamaran berhasil dikirim
                        </p>

                        <p class="mt-1 text-sm text-emerald-700">
                            {{ session('success') }}
                        </p>

                    </div>


                    <button
                        type="button"
                        @click="show = false"
                        class="rounded-lg p-1 text-emerald-600 transition hover:bg-emerald-100">

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
                class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 shadow-sm">

                <div class="flex items-start gap-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-red-100 font-bold text-red-600">
                        !
                    </div>


                    <div class="min-w-0 flex-1">

                        <p class="text-sm font-semibold text-red-800">
                            Lamaran gagal dikirim
                        </p>

                        <p class="mt-1 text-sm text-red-700">
                            {{ session('error') }}
                        </p>

                    </div>


                    <button
                        type="button"
                        @click="show = false"
                        class="rounded-lg p-1 text-red-600 transition hover:bg-red-100">

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
                method="POST">

                @csrf


                <div class="grid gap-6 lg:grid-cols-3">

                    {{-- =================================================
                        LEFT COLUMN
                    ================================================== --}}
                    <div class="space-y-6 lg:col-span-2">


                        {{-- =================================================
                            INFORMASI LOWONGAN
                        ================================================== --}}
                        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                            <div class="border-b border-gray-100 px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-lg">
                                        🏢
                                    </div>


                                    <div>

                                        <h2 class="text-base font-bold text-gray-900">
                                            Informasi Lowongan
                                        </h2>

                                        <p class="mt-1 text-xs text-gray-500">
                                            Masukkan informasi perusahaan dan posisi yang dilamar.
                                        </p>

                                    </div>

                                </div>

                            </div>


                            <div class="space-y-5 p-6">

                                {{-- Email HRD --}}
                                <div>

                                    <label
                                        for="email_hrd"
                                        class="mb-2 block text-sm font-semibold text-gray-700">
                                        Email HRD Tujuan
                                    </label>


                                    <div class="relative">

                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">

                                            <svg
                                                class="h-5 w-5 text-gray-400"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 002-2v10a2 2 0 002 2z" />
                                            </svg>

                                        </div>


                                        <input
                                            type="email"
                                            name="email_hrd"
                                            id="email_hrd"
                                            required
                                            value="{{ old('email_hrd', $selectedHistory->email_hrd ?? '') }}"
                                            placeholder="hrd@perusahaan.com"
                                            class="block w-full rounded-xl border-gray-200 bg-gray-50 py-3 pl-11 pr-4 text-sm text-gray-900 placeholder-gray-400 transition focus:border-indigo-500 focus:bg-white focus:ring-indigo-500">

                                    </div>

                                </div>


                                {{-- Company + Position --}}
                                <div class="grid gap-5 md:grid-cols-2">

                                    <div>

                                        <label
                                            for="nama_pt"
                                            class="mb-2 block text-sm font-semibold text-gray-700">
                                            Nama Perusahaan
                                        </label>


                                        <input
                                            type="text"
                                            name="nama_pt"
                                            id="nama_pt"
                                            required
                                            value="{{ old('nama_pt', $selectedHistory->nama_pt ?? '') }}"
                                            placeholder="PT Maju Mundur"
                                            class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition focus:border-indigo-500 focus:bg-white focus:ring-indigo-500">

                                    </div>


                                    <div>

                                        <label
                                            for="posisi"
                                            class="mb-2 block text-sm font-semibold text-gray-700">
                                            Posisi yang Dilamar
                                        </label>


                                        <input
                                            type="text"
                                            name="posisi"
                                            id="posisi"
                                            required
                                            value="{{ old('posisi', $selectedHistory->posisi ?? '') }}"
                                            placeholder="Backend Developer"
                                            class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition focus:border-indigo-500 focus:bg-white focus:ring-indigo-500">

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                            SUBJEK EMAIL
                        ================================================== --}}
                        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                            <div class="border-b border-gray-100 px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-50 text-lg">
                                        ✉️
                                    </div>


                                    <div>

                                        <h2 class="text-base font-bold text-gray-900">
                                            Subjek Email
                                        </h2>

                                        <p class="mt-1 text-xs text-gray-500">
                                            Gunakan subjek otomatis atau tentukan sendiri.
                                        </p>

                                    </div>

                                </div>

                            </div>


                            <div class="space-y-4 p-6">

                                {{-- Automatic --}}
                                <label
                                    for="subjek_auto"
                                    class="flex cursor-pointer items-start gap-3 rounded-xl border border-indigo-200 bg-indigo-50/60 p-4 transition hover:bg-indigo-50">

                                    <input
                                        type="radio"
                                        name="tipe_subjek"
                                        id="subjek_auto"
                                        value="auto"
                                        checked
                                        onchange="toggleSubject()"
                                        class="mt-0.5 h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">


                                    <span>

                                        <span class="block text-sm font-semibold text-gray-900">
                                            Otomatis
                                        </span>


                                        <span class="mt-1 block text-xs leading-5 text-gray-500">
                                            Subjek akan dibuat berdasarkan posisi dan nama pelamar.
                                        </span>

                                    </span>

                                </label>


                                {{-- Manual --}}
                                <label
                                    for="subjek_manual"
                                    class="flex cursor-pointer items-start gap-3 rounded-xl border border-gray-200 bg-white p-4 transition hover:border-gray-300 hover:bg-gray-50">

                                    <input
                                        type="radio"
                                        name="tipe_subjek"
                                        id="subjek_manual"
                                        value="manual"
                                        onchange="toggleSubject()"
                                        class="mt-0.5 h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">


                                    <span>

                                        <span class="block text-sm font-semibold text-gray-900">
                                            Manual
                                        </span>


                                        <span class="mt-1 block text-xs leading-5 text-gray-500">
                                            Tentukan sendiri subjek email yang akan digunakan.
                                        </span>

                                    </span>

                                </label>


                                {{-- Manual input --}}
                                <div
                                    id="manual_subject_wrapper"
                                    class="hidden">

                                    <label
                                        for="input_subjek_manual"
                                        class="mb-2 block text-sm font-semibold text-gray-700">
                                        Subjek Custom
                                    </label>


                                    <input
                                        type="text"
                                        name="subjek_custom"
                                        id="input_subjek_manual"
                                        value="{{ old('subjek_custom') }}"
                                        placeholder="Lamaran Staff Administrasi - Nama Lengkap"
                                        class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 placeholder-gray-400 transition focus:border-indigo-500 focus:bg-white focus:ring-indigo-500">

                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                            EMAIL
                        ================================================== --}}
                        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                            <div class="border-b border-gray-100 px-6 py-5">

                                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                                    <div class="flex items-center gap-3">

                                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-lg">
                                            📝
                                        </div>


                                        <div>

                                            <h2 class="text-base font-bold text-gray-900">
                                                Isi Email
                                            </h2>


                                            <p class="mt-1 text-xs text-gray-500">
                                                Template menggunakan biodata akun yang sedang login.
                                            </p>

                                        </div>

                                    </div>


                                    <button
                                        type="button"
                                        onclick="updateTemplate()"
                                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-xs font-semibold text-gray-600 transition hover:border-gray-300 hover:bg-gray-50">

                                        ↻
                                        Reset Template

                                    </button>

                                </div>

                            </div>


                            <div class="p-6">

                                <textarea
                                    name="body_email"
                                    id="body_email"
                                    rows="15"
                                    required
                                    placeholder="Isi email lamaran..."
                                    class="block w-full resize-y rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm leading-6 text-gray-900 placeholder-gray-400 transition focus:border-indigo-500 focus:bg-white focus:ring-indigo-500">{{ old('body_email') }}</textarea>


                                <p class="mt-2 text-xs text-gray-400">
                                    Data nama, pendidikan, nomor HP, dan email akan mengikuti profil akun.
                                </p>

                            </div>

                        </div>


                        {{-- =================================================
                            PDF LETTER
                        ================================================== --}}
                        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                            <div class="border-b border-gray-100 px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-lg">
                                        📄
                                    </div>


                                    <div>

                                        <h2 class="text-base font-bold text-gray-900">
                                            Surat Lamaran PDF
                                        </h2>


                                        <p class="mt-1 text-xs text-gray-500">
                                            Data biodata diambil dari profil akun yang sedang login.
                                        </p>

                                    </div>

                                </div>

                            </div>


                            <div class="p-6">

                                <textarea
                                    name="body_pdf"
                                    id="body_pdf">{{ old('body_pdf') }}</textarea>


                                <p class="mt-3 text-xs text-gray-400">
                                    Surat dapat diedit sebelum dikirim.
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
                        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                            <div class="border-b border-gray-100 px-5 py-5">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-lg">
                                        📎
                                    </div>


                                    <div>

                                        <h2 class="text-base font-bold text-gray-900">
                                            Lampiran
                                        </h2>


                                        <p class="mt-1 text-xs text-gray-500">
                                            Pilih dokumen yang akan dikirim.
                                        </p>

                                    </div>

                                </div>

                            </div>


                            <div class="space-y-3 p-5">

                                @forelse($files as $file)

                                <label
                                    for="file_{{ $loop->index }}"
                                    class="flex cursor-pointer items-center gap-3 rounded-xl border border-gray-200 bg-gray-50 p-3.5 transition hover:border-indigo-200 hover:bg-indigo-50/50">

                                    <input
                                        type="checkbox"
                                        name="lampiran[]"
                                        value="{{ $file }}"
                                        id="file_{{ $loop->index }}"
                                        checked
                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">


                                    <div class="flex min-w-0 flex-1 items-center gap-3">

                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-lg shadow-sm">
                                            📄
                                        </div>


                                        <span class="truncate text-sm font-medium text-gray-700">
                                            {{ $file }}
                                        </span>

                                    </div>

                                </label>

                                @empty

                                <div class="rounded-xl border border-amber-200 bg-amber-50 p-4">

                                    <div class="flex gap-3">

                                        <span class="text-lg">
                                            ⚠️
                                        </span>


                                        <div>

                                            <p class="text-sm font-semibold text-amber-800">
                                                Belum ada berkas
                                            </p>


                                            <p class="mt-1 text-xs leading-5 text-amber-700">
                                                Upload CV atau dokumen pendukung melalui menu Berkas.
                                            </p>

                                        </div>

                                    </div>

                                </div>

                                @endforelse

                            </div>


                            <div class="border-t border-gray-100 px-5 py-4">

                                <a
                                    href="{{ route('files.index') }}"
                                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-xs font-semibold text-gray-600 transition hover:border-indigo-200 hover:bg-indigo-50 hover:text-indigo-700">

                                    📁
                                    Kelola Berkas

                                </a>

                            </div>

                        </div>


                        {{-- =================================================
                            SEND CARD
                        ================================================== --}}
                        <div class="overflow-hidden rounded-2xl bg-gray-900 shadow-sm">

                            <div class="relative p-6">

                                <div class="relative z-10">

                                    <span class="inline-flex rounded-full bg-white/10 px-3 py-1 text-xs font-semibold text-indigo-200">
                                        Siap dikirim?
                                    </span>


                                    <h2 class="mt-4 text-xl font-bold text-white">
                                        Periksa kembali
                                    </h2>


                                    <p class="mt-2 text-sm leading-6 text-gray-400">
                                        Pastikan informasi HRD, posisi, isi email,
                                        surat, dan lampiran sudah benar.
                                    </p>


                                    <button
                                        type="submit"
                                        class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-indigo-500 px-5 py-3.5 text-sm font-bold text-white transition hover:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 focus:ring-offset-gray-900">

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


                                <div class="pointer-events-none absolute -right-10 -top-10 h-36 w-36 rounded-full bg-indigo-500/20 blur-3xl"></div>

                            </div>

                        </div>


                        {{-- =================================================
                            PROFILE INFO
                        ================================================== --}}
                        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">

                            <div class="flex items-center justify-between gap-3">

                                <div>

                                    <h3 class="text-sm font-bold text-gray-900">
                                        Profil Pelamar
                                    </h3>

                                    <p class="mt-1 text-xs text-gray-500">
                                        Data yang digunakan template.
                                    </p>

                                </div>


                                <a
                                    href="{{ route('profile.edit') }}"
                                    class="text-xs font-semibold text-indigo-600 hover:text-indigo-700">
                                    Edit
                                </a>

                            </div>


                            <div class="mt-4 space-y-3">

                                <div>

                                    <p class="text-[11px] font-semibold uppercase tracking-wide text-gray-400">
                                        Nama
                                    </p>

                                    <p class="mt-1 text-sm font-medium text-gray-800">
                                        {{ Auth::user()->name }}
                                    </p>

                                </div>


                                <div>

                                    <p class="text-[11px] font-semibold uppercase tracking-wide text-gray-400">
                                        Pendidikan
                                    </p>

                                    <p class="mt-1 text-sm text-gray-600">
                                        {{ Auth::user()->education ?: 'Belum diisi' }}
                                    </p>

                                </div>


                                <div>

                                    <p class="text-[11px] font-semibold uppercase tracking-wide text-gray-400">
                                        Email
                                    </p>

                                    <p class="mt-1 truncate text-sm text-gray-600">
                                        {{ Auth::user()->email }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </form>


            {{-- =====================================================
                HISTORY
            ====================================================== --}}
            <div class="mt-10">

                <div class="mb-5">

                    <div class="flex items-center gap-2">

                        <span class="text-lg">
                            📋
                        </span>


                        <h2 class="text-xl font-bold tracking-tight text-gray-900">
                            Riwayat Lamaran
                        </h2>

                    </div>


                    <p class="mt-1 text-sm text-gray-500">
                        Daftar lamaran yang telah kamu kirim.
                    </p>

                </div>


                <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                    {{-- =================================================
                        DESKTOP TABLE
                    ================================================== --}}
                    <div class="hidden overflow-x-auto xl:block">

                        <table class="min-w-full divide-y divide-gray-100">

                            <thead class="bg-gray-50">

                                <tr>

                                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500">
                                        No
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500">
                                        Waktu
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500">
                                        Perusahaan
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500">
                                        Posisi
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500">
                                        Email HRD
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500">
                                        Status
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500">
                                        Subjek
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500">
                                        Waktu Berlalu
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-gray-100">

                                @forelse($histories as $history)

                                @php
                                $days = floor($history->created_at->diffInDays(now()));
                                @endphp


                                <tr class="transition hover:bg-gray-50">

                                    <td class="whitespace-nowrap px-5 py-4 text-sm text-gray-500">
                                        {{ $loop->iteration }}
                                    </td>


                                    <td class="whitespace-nowrap px-5 py-4">

                                        <p class="text-sm font-medium text-gray-900">
                                            {{ $history->created_at->format('d/m/Y') }}
                                        </p>

                                        <p class="text-xs text-gray-400">
                                            {{ $history->created_at->format('H:i') }}
                                        </p>

                                    </td>


                                    <td class="px-5 py-4">

                                        <p class="max-w-[180px] truncate text-sm font-semibold text-gray-900">
                                            {{ $history->nama_pt }}
                                        </p>

                                    </td>


                                    <td class="px-5 py-4">

                                        <span class="inline-flex rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700">
                                            {{ $history->posisi }}
                                        </span>

                                    </td>


                                    <td class="px-5 py-4">

                                        <p class="max-w-[200px] truncate text-sm text-gray-600">
                                            {{ $history->email_hrd }}
                                        </p>

                                    </td>


                                    <td class="px-5 py-4">

                                        <form
                                            action="{{ route('history.update-status', $history->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('PATCH')


                                            <select
                                                name="status"
                                                onchange="this.form.submit()"
                                                class="rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-xs font-semibold text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

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


                                    <td class="px-5 py-4">

                                        <p
                                            class="max-w-[220px] truncate text-sm text-gray-600"
                                            title="{{ $history->subjek }}">
                                            {{ $history->subjek }}
                                        </p>

                                    </td>


                                    <td class="whitespace-nowrap px-5 py-4">

                                        @if ($days === 0)

                                        <span class="inline-flex rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                            Hari ini
                                        </span>

                                        @elseif ($days === 1)

                                        <span class="inline-flex rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700">
                                            1 hari lalu
                                        </span>

                                        @else

                                        <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                                            {{ $days }} hari lalu
                                        </span>

                                        @endif

                                    </td>


                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-2">

                                            <a
                                                href="{{ route('history.resend', $history->id) }}"
                                                class="inline-flex items-center gap-1.5 rounded-lg bg-amber-50 px-3 py-2 text-xs font-semibold text-amber-700 transition hover:bg-amber-100">
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
                                                    class="inline-flex items-center gap-1.5 rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100">
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
                                        class="px-5 py-16 text-center">

                                        <div class="mx-auto max-w-sm">

                                            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gray-100 text-2xl">
                                                📭
                                            </div>


                                            <h3 class="mt-4 text-sm font-bold text-gray-900">
                                                Belum ada riwayat
                                            </h3>


                                            <p class="mt-1 text-sm leading-6 text-gray-500">
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
                    <div class="divide-y divide-gray-100 xl:hidden">

                        @forelse($histories as $history)

                        @php
                        $days = floor($history->created_at->diffInDays(now()));
                        @endphp


                        <div class="space-y-4 p-5">

                            <div class="flex items-start justify-between gap-4">

                                <div class="min-w-0">

                                    <p class="truncate text-sm font-bold text-gray-900">
                                        {{ $history->nama_pt }}
                                    </p>


                                    <p class="mt-1 text-xs text-gray-500">
                                        {{ $history->created_at->format('d/m/Y H:i') }}
                                    </p>

                                </div>


                                @if ($days === 0)

                                <span class="shrink-0 rounded-full bg-emerald-50 px-2.5 py-1 text-[11px] font-semibold text-emerald-700">
                                    Hari ini
                                </span>

                                @elseif ($days === 1)

                                <span class="shrink-0 rounded-full bg-sky-50 px-2.5 py-1 text-[11px] font-semibold text-sky-700">
                                    1 hari lalu
                                </span>

                                @else

                                <span class="shrink-0 rounded-full bg-gray-100 px-2.5 py-1 text-[11px] font-semibold text-gray-600">
                                    {{ $days }} hari lalu
                                </span>

                                @endif

                            </div>


                            <div class="grid gap-4 sm:grid-cols-2">

                                <div>

                                    <p class="text-[11px] font-semibold uppercase tracking-wide text-gray-400">
                                        Posisi
                                    </p>


                                    <span class="mt-1 inline-flex rounded-full bg-indigo-50 px-2.5 py-1 text-xs font-semibold text-indigo-700">
                                        {{ $history->posisi }}
                                    </span>

                                </div>


                                <div>

                                    <p class="text-[11px] font-semibold uppercase tracking-wide text-gray-400">
                                        Email HRD
                                    </p>


                                    <p class="mt-1 truncate text-sm text-gray-600">
                                        {{ $history->email_hrd }}
                                    </p>

                                </div>

                            </div>


                            <div>

                                <p class="text-[11px] font-semibold uppercase tracking-wide text-gray-400">
                                    Subjek
                                </p>


                                <p class="mt-1 text-sm leading-5 text-gray-600">
                                    {{ $history->subjek }}
                                </p>

                            </div>


                            <div>

                                <p class="mb-2 text-[11px] font-semibold uppercase tracking-wide text-gray-400">
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
                                        class="w-full rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-sm font-semibold text-gray-700 focus:border-indigo-500 focus:ring-indigo-500">

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
                                    class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-amber-50 px-4 py-2.5 text-xs font-semibold text-amber-700 transition hover:bg-amber-100">
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
                                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-red-50 px-4 py-2.5 text-xs font-semibold text-red-600 transition hover:bg-red-100">
                                        🗑 Hapus
                                    </button>

                                </form>

                            </div>

                        </div>


                        @empty

                        <div class="px-5 py-16 text-center">

                            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gray-100 text-2xl">
                                📭
                            </div>


                            <h3 class="mt-4 text-sm font-bold text-gray-900">
                                Belum ada riwayat
                            </h3>


                            <p class="mt-1 text-sm leading-6 text-gray-500">
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
        SUMMERNOTE CSS
    ========================================================== --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">


    {{-- =========================================================
        JQUERY
    ========================================================== --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>


    {{-- =========================================================
        SUMMERNOTE JS
    ========================================================== --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


    {{-- =========================================================
        SUMMERNOTE STYLE
    ========================================================== --}}
    <style>
        .note-editor.note-frame {
            border: 1px solid #e5e7eb !important;
            border-radius: 0.75rem !important;
            overflow: hidden;
            box-shadow: none !important;
        }


        .note-toolbar {
            border-bottom: 1px solid #e5e7eb !important;
            background: #f9fafb !important;
            padding: 8px !important;
        }


        .note-editable {
            min-height: 400px !important;
            padding: 1rem !important;
            font-size: 0.875rem !important;
            line-height: 1.7 !important;
            color: #111827 !important;
            background: #ffffff !important;
        }


        .note-statusbar {
            border-top: 1px solid #e5e7eb !important;
            background: #f9fafb !important;
        }


        .note-btn {
            border-color: #e5e7eb !important;
            background: #ffffff !important;
        }


        .note-btn:hover {
            background: #f3f4f6 !important;
        }


        /*
         * Tailwind menghilangkan numbering default.
         * Kita kembalikan numbering di Summernote.
         */
        .note-editable ol {
            list-style-type: decimal !important;
            padding-left: 2rem !important;
            margin-top: 0.5rem !important;
            margin-bottom: 1rem !important;
        }


        .note-editable ul {
            list-style-type: disc !important;
            padding-left: 2rem !important;
            margin-top: 0.5rem !important;
            margin-bottom: 1rem !important;
        }


        .note-editable ol li,
        .note-editable ul li {
            display: list-item !important;
        }


        @media (max-width: 640px) {

            .note-editable {
                min-height: 300px !important;
            }

        }
    </style>


    {{-- =========================================================
        JAVASCRIPT
        Tidak menggunakan @json()
    ========================================================== --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            /*
            |--------------------------------------------------------------------------
            | ELEMENT
            |--------------------------------------------------------------------------
            */

            const bodyEmail =
                document.getElementById('body_email');

            const bodyPdf =
                document.getElementById('body_pdf');

            const namaPt =
                document.getElementById('nama_pt');

            const posisi =
                document.getElementById('posisi');

            const profileElement =
                document.getElementById('profile-data');


            /*
            |--------------------------------------------------------------------------
            | PROFILE DATA
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
            | CURRENT DATE
            |--------------------------------------------------------------------------
            */

            const tanggalSekarang =
                "{{ now()->translatedFormat('d F Y') }}";


            /*
            |--------------------------------------------------------------------------
            | HELPER
            |--------------------------------------------------------------------------
            */

            function valueOrFallback(value, fallback = '-') {

                if (
                    value === undefined ||
                    value === null ||
                    String(value).trim() === ''
                ) {
                    return fallback;
                }

                return value;

            }


            /*
            |--------------------------------------------------------------------------
            | TEMPLATE EMAIL
            |--------------------------------------------------------------------------
            */

            function getEmailTemplate() {

                const perusahaan =
                    namaPt && namaPt.value.trim() ?
                    namaPt.value.trim() :
                    '[NAMA_PT]';


                const posisiLamaran =
                    posisi && posisi.value.trim() ?
                    posisi.value.trim() :
                    '[POSISI]';


                const nama =
                    valueOrFallback(
                        profile.name,
                        'Nama Lengkap'
                    );


                const pendidikan =
                    valueOrFallback(
                        profile.education,
                        'pendidikan terakhir'
                    );


                const phone =
                    valueOrFallback(
                        profile.phone,
                        'Nomor HP'
                    );


                const email =
                    valueOrFallback(
                        profile.email,
                        'Email'
                    );


                return `Yth. HRD / Tim Rekrutmen ${perusahaan},

Perkenalkan nama saya ${nama}. Menanggapi lowongan pekerjaan yang Bapak/Ibu terbitkan, saya bermaksud ingin mengajukan lamaran pekerjaan di perusahaan yang Bapak/Ibu pimpin sebagai ${posisiLamaran}.

Saya memiliki latar belakang pendidikan ${pendidikan} dan tertarik untuk mengembangkan kemampuan saya melalui posisi tersebut.

Saya memiliki kemampuan pengolahan data menggunakan Microsoft Excel dan berbagai fungsi seperti Sum, If, Average, Hlookup, Vlookup, Mid, Right, Left, Index, Match, Pivot, dan lain-lain.

Saya juga siap jika nantinya terdapat test atau tahapan seleksi sebagai bagian dari proses rekrutmen pada posisi tersebut.

Sebagai bahan pertimbangan Bapak/Ibu, saya telah melampirkan Curriculum Vitae (CV) beserta dokumen pendukung lainnya pada email ini.

Saya sangat menantikan kesempatan untuk mengikuti tahapan wawancara agar dapat mendiskusikan lebih rinci mengenai potensi yang saya miliki.

Terima kasih atas waktu dan perhatian Bapak/Ibu.

Hormat saya,
${nama}
${phone}
${email}`;

            }


            /*
            |--------------------------------------------------------------------------
            | TEMPLATE PDF
            |--------------------------------------------------------------------------
            */

            function getPdfTemplate() {

                const perusahaan =
                    namaPt && namaPt.value.trim() ?
                    namaPt.value.trim() :
                    '[NAMA_PT]';


                const posisiLamaran =
                    posisi && posisi.value.trim() ?
                    posisi.value.trim() :
                    '[POSISI]';


                const nama =
                    valueOrFallback(
                        profile.name,
                        'Nama Lengkap'
                    );


                const tempatLahir =
                    valueOrFallback(
                        profile.birthPlace
                    );


                const tanggalLahir =
                    valueOrFallback(
                        profile.birthDate
                    );


                const pendidikan =
                    valueOrFallback(
                        profile.education
                    );


                const alamat =
                    valueOrFallback(
                        profile.address
                    );


                const phone =
                    valueOrFallback(
                        profile.phone
                    );


                const email =
                    valueOrFallback(
                        profile.email
                    );


                return `
<div style="font-family: Arial, sans-serif; font-size: 12pt; line-height: 1.6;">

    <div style="text-align: right; margin-bottom: 20px;">
        Jombang, ${tanggalSekarang}
    </div>


    <table style="width: 100%; margin-bottom: 20px; border-collapse: collapse;">

        <tr>
            <td style="width: 80px; vertical-align: top;">
                Hal
            </td>

            <td style="width: 15px; vertical-align: top;">
                :
            </td>

            <td>
                Lamaran Pekerjaan
            </td>
        </tr>


        <tr>
            <td style="vertical-align: top;">
                Lampiran
            </td>

            <td style="vertical-align: top;">
                :
            </td>

            <td>
                -
            </td>
        </tr>

    </table>


    <p>
        Yth. HRD <strong>${perusahaan}</strong>.
    </p>


    <p>
        Dengan Hormat.
    </p>


    <p>
        Saya yang bertanda tangan di bawah ini:
    </p>


    <table
        style="
            margin-left: 30px;
            margin-bottom: 20px;
            margin-top: 15px;
            border-collapse: collapse;
        "
    >

        <tr>
            <td style="width: 170px; vertical-align: top;">
                Nama
            </td>

            <td style="width: 15px; vertical-align: top;">
                :
            </td>

            <td>
                ${nama}
            </td>
        </tr>


        <tr>
            <td style="vertical-align: top;">
                Tempat, Tanggal Lahir
            </td>

            <td style="vertical-align: top;">
                :
            </td>

            <td>
                ${tempatLahir}, ${tanggalLahir}
            </td>
        </tr>


        <tr>
            <td style="vertical-align: top;">
                Pendidikan
            </td>

            <td style="vertical-align: top;">
                :
            </td>

            <td>
                ${pendidikan}
            </td>
        </tr>


        <tr>
            <td style="vertical-align: top;">
                Alamat
            </td>

            <td style="vertical-align: top;">
                :
            </td>

            <td>
                ${alamat}
            </td>
        </tr>


        <tr>
            <td style="vertical-align: top;">
                No. HP
            </td>

            <td style="vertical-align: top;">
                :
            </td>

            <td>
                ${phone}
            </td>
        </tr>


        <tr>
            <td style="vertical-align: top;">
                Email
            </td>

            <td style="vertical-align: top;">
                :
            </td>

            <td>
                ${email}
            </td>
        </tr>

    </table>


    <p style="text-align: justify;">

        Dengan segala hormat, saya ingin mengajukan lamaran pekerjaan
        di perusahaan yang dipimpin oleh Bapak/Ibu sebagai
        <strong>${posisiLamaran}</strong>.

        Saya sangat antusias untuk bergabung dengan perusahaan ini
        dan memberikan kontribusi terbaik sesuai dengan kemampuan
        yang saya miliki.

    </p>


    <p style="text-align: justify;">

        Saya memiliki latar belakang pendidikan
        <strong>${pendidikan}</strong>
        dan siap mengikuti seluruh proses seleksi yang ditetapkan
        oleh perusahaan.

    </p>


    <p style="text-align: justify;">

        Terima kasih atas perhatian Bapak/Ibu.

        Sebagai bahan pertimbangan, bersama surat ini saya lampirkan
        dokumen pendukung yang diperlukan.

    </p>


    <ol style="
        margin-top: 8px;
        margin-bottom: 16px;
        padding-left: 24px;
        list-style-type: decimal;
    ">

        <li>Riwayat Hidup</li>
        <li>Pas Foto</li>
        <li>KTP</li>
        <li>KK</li>
        <li>SKCK</li>
        <li>Fotokopi Ijazah</li>
        <li>Fotokopi Transkrip Nilai</li>

    </ol>


    <p style="text-align: justify;">

        Demikian surat lamaran ini saya buat.

        Atas perhatian dan pertimbangan Ibu/Bapak,
        saya ucapkan terima kasih.

    </p>


    <table
        style="
            width: 100%;
            margin-top: 40px;
            border-collapse: collapse;
        "
    >

        <tr>

            <td style="width: 65%;"></td>


            <td
                style="
                    width: 35%;
                    text-align: center;
                "
            >

                Hormat saya,

                <br>
                <br>
                <br>
                <br>
                <br>

                (${nama})

            </td>

        </tr>

    </table>

</div>
`;

            }


            /*
            |--------------------------------------------------------------------------
            | INITIALIZE SUMMERNOTE
            |--------------------------------------------------------------------------
            */

            if (window.jQuery && bodyPdf) {

                $('#body_pdf').summernote({

                    height: 400,

                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['view', ['fullscreen', 'codeview']]
                    ]

                });

            }


            /*
            |--------------------------------------------------------------------------
            | INITIAL EMAIL TEMPLATE
            |--------------------------------------------------------------------------
            */

            if (bodyEmail) {

                const existingEmail =
                    bodyEmail.value.trim();


                if (!existingEmail) {

                    bodyEmail.value =
                        getEmailTemplate();

                }

            }


            /*
            |--------------------------------------------------------------------------
            | INITIAL PDF TEMPLATE
            |--------------------------------------------------------------------------
            */

            if (bodyPdf && window.jQuery) {

                const existingPdf =
                    bodyPdf.value.trim();


                if (existingPdf) {

                    $('#body_pdf').summernote(
                        'code',
                        existingPdf
                    );

                } else {

                    $('#body_pdf').summernote(
                        'code',
                        getPdfTemplate()
                    );

                }

            }


            /*
            |--------------------------------------------------------------------------
            | SUBJECT TOGGLE
            |--------------------------------------------------------------------------
            */

            window.toggleSubject = function() {

                const manualRadio =
                    document.getElementById('subjek_manual');

                const inputManual =
                    document.getElementById('input_subjek_manual');

                const wrapper =
                    document.getElementById('manual_subject_wrapper');


                if (
                    !manualRadio ||
                    !inputManual ||
                    !wrapper
                ) {
                    return;
                }


                if (manualRadio.checked) {

                    wrapper.classList.remove('hidden');

                    inputManual.required = true;

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

                if (bodyEmail) {

                    bodyEmail.value =
                        getEmailTemplate();

                }


                if (
                    bodyPdf &&
                    window.jQuery
                ) {

                    $('#body_pdf').summernote(
                        'code',
                        getPdfTemplate()
                    );

                }

            };

        });
    </script>

</x-app-layout>