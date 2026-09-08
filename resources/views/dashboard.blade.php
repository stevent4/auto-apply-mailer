<x-app-layout title="Dashboard — Auto Apply Mailer">

    <div class="min-h-[calc(100vh-4rem)] bg-gray-50">

        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- =========================================================
                 HEADER
            ========================================================== --}}
            <div class="mb-8">

                <div class="flex flex-col justify-between gap-5 md:flex-row md:items-center">

                    <div>
                        <p class="mb-1 text-sm font-medium text-indigo-600">
                            Dashboard
                        </p>

                        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                            Halo, {{ Auth::user()->name }} 👋
                        </h1>

                        <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-500">
                            Kelola profil, Gmail pengirim, template, berkas,
                            lamaran, dan riwayat dari satu tempat.
                        </p>
                    </div>

                    @if (Route::has('apply.index'))
                    <a
                        href="{{ route('apply.index') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
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
            <div class="mb-8 overflow-hidden rounded-2xl border border-indigo-100 bg-indigo-50 shadow-sm">

                <div class="p-6 sm:p-7">

                    <div class="flex flex-col gap-5 sm:flex-row sm:items-start">

                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-2xl shadow-sm">
                            🚀
                        </div>

                        <div class="min-w-0 flex-1">

                            <p class="text-sm font-semibold text-indigo-700">
                                Auto Apply Mailer
                            </p>

                            <h2 class="mt-1 text-xl font-bold text-gray-900">
                                Semua kebutuhan lamaran kerja dalam satu alur.
                            </h2>

                            <p class="mt-3 max-w-4xl text-sm leading-6 text-gray-600">
                                Siapkan profil dan Gmail pengirim, simpan CV serta
                                dokumen pendukung, buat template email atau cover letter,
                                lalu gunakan semuanya ketika membuat dan mengirim lamaran.
                            </p>

                            <div class="mt-5 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">

                                <div class="rounded-xl border border-indigo-100 bg-white p-4">
                                    <div class="text-lg">👤</div>

                                    <p class="mt-2 text-sm font-semibold text-gray-900">
                                        Profile
                                    </p>

                                    <p class="mt-1 text-xs leading-5 text-gray-500">
                                        Biodata dan akun pengirim.
                                    </p>
                                </div>

                                <div class="rounded-xl border border-indigo-100 bg-white p-4">
                                    <div class="text-lg">📝</div>

                                    <p class="mt-2 text-sm font-semibold text-gray-900">
                                        Template
                                    </p>

                                    <p class="mt-1 text-xs leading-5 text-gray-500">
                                        Email dan cover letter.
                                    </p>
                                </div>

                                <div class="rounded-xl border border-indigo-100 bg-white p-4">
                                    <div class="text-lg">📎</div>

                                    <p class="mt-2 text-sm font-semibold text-gray-900">
                                        Berkas
                                    </p>

                                    <p class="mt-1 text-xs leading-5 text-gray-500">
                                        CV dan dokumen pendukung.
                                    </p>
                                </div>

                                <div class="rounded-xl border border-indigo-100 bg-white p-4">
                                    <div class="text-lg">📋</div>

                                    <p class="mt-2 text-sm font-semibold text-gray-900">
                                        History
                                    </p>

                                    <p class="mt-1 text-xs leading-5 text-gray-500">
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
            <div class="mb-8 overflow-hidden rounded-2xl border border-indigo-100 bg-white shadow-sm">

                <div class="border-b border-indigo-100 bg-indigo-50/70 px-6 py-5 sm:px-7">

                    <div class="flex items-start gap-4">

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white text-xl shadow-sm">
                            ✉️
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-indigo-700">
                                Gmail Pengirim
                            </p>

                            <h2 class="mt-1 text-lg font-bold text-gray-900">
                                Email akun dan Gmail pengirim memiliki fungsi berbeda.
                            </h2>

                            <p class="mt-2 max-w-3xl text-sm leading-6 text-gray-600">
                                Email akun digunakan untuk identitas dan data profil,
                                sedangkan Gmail yang ditautkan digunakan sebagai alamat
                                pengirim ketika lamaran dikirim.
                            </p>
                        </div>

                    </div>

                </div>

                <div class="grid gap-4 p-6 sm:p-7 md:grid-cols-2">

                    {{-- Email akun --}}
                    <div class="rounded-xl border border-gray-200 bg-gray-50 p-5">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-white text-lg shadow-sm">
                                👤
                            </div>

                            <div>
                                <p class="text-xs font-bold uppercase tracking-wide text-gray-400">
                                    Email akun / profil
                                </p>

                                <p class="mt-1 font-semibold text-gray-900">
                                    Identitas pengguna
                                </p>
                            </div>

                        </div>

                        <p class="mt-3 text-sm leading-6 text-gray-500">
                            Digunakan untuk login, identitas akun, dan informasi
                            profil pelamar.
                        </p>

                    </div>


                    {{-- Gmail pengirim --}}
                    <div class="rounded-xl border border-gray-200 bg-gray-50 p-5">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-white text-lg shadow-sm">
                                ✉️
                            </div>

                            <div>
                                <p class="text-xs font-bold uppercase tracking-wide text-gray-400">
                                    Gmail pengirim
                                </p>

                                <p class="mt-1 font-semibold text-gray-900">
                                    Untuk mengirim lamaran
                                </p>
                            </div>

                        </div>

                        <p class="mt-3 text-sm leading-6 text-gray-500">
                            Akun Gmail yang ditautkan digunakan sebagai alamat
                            <strong>From</strong> saat lamaran dikirim melalui Gmail API.
                        </p>

                    </div>

                </div>

                <div class="border-t border-gray-100 px-6 py-5 sm:px-7">

                    <div class="rounded-xl bg-gray-50 p-4">

                        <p class="text-sm font-semibold text-gray-900">
                            Contoh
                        </p>

                        <p class="mt-1 text-sm leading-6 text-gray-600">
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
                            class="inline-flex items-center gap-2 rounded-xl bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-gray-800">
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

                        <span class="text-sm text-gray-500">
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
                    class="group rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:border-indigo-200 hover:shadow-md">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-500">
                                Kirim Lamaran
                            </p>

                            <h2 class="mt-2 text-lg font-bold text-gray-900">
                                Lebih Cepat
                            </h2>

                        </div>

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-50 text-xl">
                            🚀
                        </div>

                    </div>

                    <p class="mt-4 text-sm leading-6 text-gray-500">
                        Masukkan tujuan lamaran, pilih template,
                        surat lamaran, dan berkas, kemudian kirim
                        melalui Gmail yang sudah ditautkan.
                    </p>

                    <div class="mt-4 text-xs font-semibold text-indigo-600">
                        Buat lamaran →
                    </div>

                </a>
                @endif


                {{-- Template --}}
                @if (Route::has('templates.index'))
                <a
                    href="{{ route('templates.index') }}"
                    class="group rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:border-emerald-200 hover:shadow-md">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-500">
                                Template
                            </p>

                            <h2 class="mt-2 text-lg font-bold text-gray-900">
                                Email & Cover Letter
                            </h2>

                        </div>

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-xl">
                            📝
                        </div>

                    </div>

                    <p class="mt-4 text-sm leading-6 text-gray-500">
                        Simpan template email dan cover letter,
                        gunakan variable untuk mengisi data secara
                        otomatis, dan tentukan template default.
                    </p>

                    <div class="mt-4 text-xs font-semibold text-emerald-600">
                        Kelola template →
                    </div>

                </a>
                @endif


                {{-- Berkas --}}
                @if (Route::has('files.index'))
                <a
                    href="{{ route('files.index') }}"
                    class="group rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:border-amber-200 hover:shadow-md">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-500">
                                Berkas
                            </p>

                            <h2 class="mt-2 text-lg font-bold text-gray-900">
                                Terorganisir
                            </h2>

                        </div>

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-xl">
                            📎
                        </div>

                    </div>

                    <p class="mt-4 text-sm leading-6 text-gray-500">
                        Simpan CV dan dokumen pendukung agar
                        mudah dipilih sebagai lampiran ketika
                        membuat lamaran.
                    </p>

                    <div class="mt-4 text-xs font-semibold text-amber-600">
                        Kelola berkas →
                    </div>

                </a>
                @endif


                {{-- Profile --}}
                @if (Route::has('profile.edit'))
                <a
                    href="{{ route('profile.edit') }}"
                    class="group rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:border-purple-200 hover:shadow-md">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-gray-500">
                                Profile
                            </p>

                            <h2 class="mt-2 text-lg font-bold text-gray-900">
                                Data Pelamar
                            </h2>

                        </div>

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-purple-50 text-xl">
                            👤
                        </div>

                    </div>

                    <p class="mt-4 text-sm leading-6 text-gray-500">
                        Lengkapi biodata dan informasi Gmail
                        agar dapat digunakan pada proses
                        pembuatan lamaran.
                    </p>

                    <div class="mt-4 text-xs font-semibold text-purple-600">
                        Buka profile →
                    </div>

                </a>
                @endif

            </div>


            {{-- =========================================================
                 TEMPLATE FEATURE
            ========================================================== --}}
            @if (Route::has('templates.index'))

            <div class="mt-8 overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                <div class="border-b border-gray-100 bg-gradient-to-r from-emerald-50 via-white to-indigo-50 px-6 py-6 sm:px-7">

                    <div class="flex flex-col gap-5 md:flex-row md:items-center md:justify-between">

                        <div class="flex items-start gap-4">

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-xl">
                                📝
                            </div>

                            <div>

                                <p class="text-sm font-semibold text-emerald-700">
                                    Fitur Template
                                </p>

                                <h2 class="mt-1 text-xl font-bold text-gray-900">
                                    Tulis sekali, gunakan kembali.
                                </h2>

                                <p class="mt-2 max-w-3xl text-sm leading-6 text-gray-500">
                                    Template membantu kamu menyimpan pola tulisan
                                    yang sering digunakan pada proses lamaran.
                                    Data pelamar dan lowongan dapat disisipkan
                                    menggunakan variable.
                                </p>

                            </div>

                        </div>

                        <a
                            href="{{ route('templates.index') }}"
                            class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-gray-800">
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
                    <div class="rounded-xl border border-emerald-100 bg-emerald-50/50 p-5">

                        <div class="flex items-start gap-3">

                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-white text-lg shadow-sm">
                                ✉️
                            </div>

                            <div>

                                <p class="text-xs font-bold uppercase tracking-wide text-emerald-700">
                                    Email
                                </p>

                                <h3 class="mt-1 font-semibold text-gray-900">
                                    Template Email
                                </h3>

                                <p class="mt-2 text-sm leading-6 text-gray-500">
                                    Simpan subject dan isi email yang sering
                                    digunakan. Template email dapat dipersonalisasi
                                    dengan variable sebelum dikirim.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Cover Letter --}}
                    <div class="rounded-xl border border-amber-100 bg-amber-50/50 p-5">

                        <div class="flex items-start gap-3">

                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-white text-lg shadow-sm">
                                📄
                            </div>

                            <div>

                                <p class="text-xs font-bold uppercase tracking-wide text-amber-700">
                                    Cover Letter
                                </p>

                                <h3 class="mt-1 font-semibold text-gray-900">
                                    Template Surat Lamaran
                                </h3>

                                <p class="mt-2 text-sm leading-6 text-gray-500">
                                    Buat template surat lamaran dengan formatting
                                    yang dapat digunakan sebagai dasar pembuatan
                                    cover letter PDF.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Variable --}}
                <div class="border-t border-gray-100 bg-gray-50 px-6 py-5 sm:px-7">

                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                        <div>

                            <p class="text-sm font-semibold text-gray-900">
                                Gunakan variable untuk personalisasi
                            </p>

                            <p class="mt-1 text-sm leading-6 text-gray-500">
                                Template dapat menggunakan data pelamar,
                                lowongan, dan informasi waktu.
                            </p>

                        </div>

                        <div class="flex flex-wrap gap-2">

                            <span class="rounded-lg bg-white px-2.5 py-1.5 text-xs font-medium text-gray-600 ring-1 ring-gray-200">
                                @{{nama}}
                            </span>

                            <span class="rounded-lg bg-white px-2.5 py-1.5 text-xs font-medium text-gray-600 ring-1 ring-gray-200">
                                @{{perusahaan}}
                            </span>

                            <span class="rounded-lg bg-white px-2.5 py-1.5 text-xs font-medium text-gray-600 ring-1 ring-gray-200">
                                @{{posisi}}
                            </span>

                            <span class="rounded-lg bg-white px-2.5 py-1.5 text-xs font-medium text-gray-600 ring-1 ring-gray-200">
                                @{{tanggal}}
                            </span>

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

                    <h2 class="text-lg font-bold text-gray-900">
                        Akses cepat
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Akses langsung ke bagian utama Auto Apply Mailer.
                    </p>

                </div>


                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

                    @if (Route::has('profile.edit'))
                    <a
                        href="{{ route('profile.edit') }}"
                        class="group rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-indigo-200 hover:shadow-md">

                        <div class="flex items-center justify-between">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-lg">
                                👤
                            </div>

                            <svg
                                class="h-4 w-4 text-gray-300 transition group-hover:text-indigo-500"
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

                        <h3 class="mt-4 font-semibold text-gray-900">
                            Profile
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-gray-500">
                            Biodata dan pengaturan Gmail.
                        </p>

                    </a>
                    @endif


                    @if (Route::has('templates.index'))
                    <a
                        href="{{ route('templates.index') }}"
                        class="group rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-emerald-200 hover:shadow-md">

                        <div class="flex items-center justify-between">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-lg">
                                📝
                            </div>

                            <svg
                                class="h-4 w-4 text-gray-300 transition group-hover:text-emerald-600"
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

                        <h3 class="mt-4 font-semibold text-gray-900">
                            Template
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-gray-500">
                            Email dan cover letter.
                        </p>

                    </a>
                    @endif


                    @if (Route::has('files.index'))
                    <a
                        href="{{ route('files.index') }}"
                        class="group rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-amber-200 hover:shadow-md">

                        <div class="flex items-center justify-between">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-lg">
                                📎
                            </div>

                            <svg
                                class="h-4 w-4 text-gray-300 transition group-hover:text-amber-600"
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

                        <h3 class="mt-4 font-semibold text-gray-900">
                            Berkas
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-gray-500">
                            CV dan dokumen pendukung.
                        </p>

                    </a>
                    @endif


                    @if (Route::has('apply.index'))
                    <a
                        href="{{ route('apply.index') }}"
                        class="group rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-indigo-200 hover:shadow-md">

                        <div class="flex items-center justify-between">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-lg">
                                🚀
                            </div>

                            <svg
                                class="h-4 w-4 text-gray-300 transition group-hover:text-indigo-500"
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

                        <h3 class="mt-4 font-semibold text-gray-900">
                            Buat Lamaran
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-gray-500">
                            Mulai proses pengiriman lamaran.
                        </p>

                    </a>
                    @endif

                </div>


                <div class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

                    @if (Route::has('feedback.index'))
                    <a
                        href="{{ route('feedback.index') }}"
                        class="group rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-rose-200 hover:shadow-md">

                        <div class="flex items-center justify-between">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-rose-50 text-lg">
                                💬
                            </div>

                            <svg
                                class="h-4 w-4 text-gray-300 transition group-hover:text-rose-600"
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

                        <h3 class="mt-4 font-semibold text-gray-900">
                            Feedback
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-gray-500">
                            Kirim masukan terkait aplikasi.
                        </p>

                    </a>
                    @endif


                    @if (Route::has('google.connect'))
                    <a
                        href="{{ route('profile.edit') }}"
                        class="group rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-red-200 hover:shadow-md">

                        <div class="flex items-center justify-between">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-50 text-lg">
                                ✉️
                            </div>

                            <svg
                                class="h-4 w-4 text-gray-300 transition group-hover:text-red-500"
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

                        <h3 class="mt-4 font-semibold text-gray-900">
                            Gmail Pengirim
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-gray-500">
                            Kelola Gmail melalui Profile.
                        </p>

                    </a>
                    @endif


                    <div class="rounded-2xl border border-dashed border-gray-200 bg-gray-50 p-5">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-lg ring-1 ring-gray-200">
                            ✓
                        </div>

                        <h3 class="mt-4 font-semibold text-gray-900">
                            Siap Apply
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-gray-500">
                            Profil, Gmail, template, dan berkas siap digunakan.
                        </p>

                    </div>

                </div>

            </div>


            {{-- =========================================================
                 CTA APPLY
            ========================================================== --}}
            <div class="mt-8 overflow-hidden rounded-2xl bg-gray-900 shadow-sm">

                <div class="relative px-6 py-8 sm:px-8 lg:px-10">

                    <div class="relative z-10 max-w-2xl">

                        <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-semibold text-indigo-200 ring-1 ring-inset ring-white/10">
                            Auto Apply Mailer
                        </span>

                        <h2 class="mt-4 text-2xl font-bold tracking-tight text-white sm:text-3xl">
                            Siap mengirim lamaran hari ini?
                        </h2>

                        <p class="mt-3 text-sm leading-6 text-gray-300 sm:text-base">
                            Pastikan Gmail pengirim sudah ditautkan di Profile,
                            kemudian masukkan informasi perusahaan dan posisi,
                            pilih template email atau surat lamaran, lalu tentukan
                            berkas yang ingin dikirim.
                        </p>

                        @if (Route::has('apply.index'))

                        <a
                            href="{{ route('apply.index') }}"
                            class="mt-6 inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-semibold text-gray-900 transition hover:bg-gray-100">
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


                    <div class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full bg-indigo-500/20 blur-3xl"></div>

                    <div class="pointer-events-none absolute -bottom-24 right-20 h-56 w-56 rounded-full bg-purple-500/10 blur-3xl"></div>

                </div>

            </div>


            {{-- =========================================================
                 QUICK GUIDE
            ========================================================== --}}
            <div class="mt-8">

                <div class="mb-4">

                    <h2 class="text-lg font-bold text-gray-900">
                        Cara menggunakan
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Ikuti alur berikut untuk menyiapkan dan mengirim lamaran.
                    </p>

                </div>


                <div class="grid gap-4 md:grid-cols-5">

                    {{-- Step 1 --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-5">

                        <div class="mb-4 flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-50 text-sm font-bold text-indigo-600">
                            01
                        </div>

                        <h3 class="font-semibold text-gray-900">
                            Lengkapi Profile
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Isi nama, email, pendidikan, alamat,
                            nomor HP, dan data lain yang diperlukan.
                        </p>

                    </div>


                    {{-- Step 2 --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-5">

                        <div class="mb-4 flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-50 text-sm font-bold text-indigo-600">
                            02
                        </div>

                        <h3 class="font-semibold text-gray-900">
                            Hubungkan Gmail
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Tautkan Gmail pengirim melalui Profile
                            menggunakan Google OAuth.
                        </p>

                    </div>


                    {{-- Step 3 --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-5">

                        <div class="mb-4 flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-50 text-sm font-bold text-indigo-600">
                            03
                        </div>

                        <h3 class="font-semibold text-gray-900">
                            Siapkan Template
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Buat template Email atau Cover Letter
                            dan gunakan variable untuk personalisasi.
                        </p>

                    </div>


                    {{-- Step 4 --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-5">

                        <div class="mb-4 flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-50 text-sm font-bold text-indigo-600">
                            04
                        </div>

                        <h3 class="font-semibold text-gray-900">
                            Siapkan Berkas
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Upload CV dan dokumen pendukung
                            yang akan digunakan sebagai lampiran.
                        </p>

                    </div>


                    {{-- Step 5 --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-5">

                        <div class="mb-4 flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-50 text-sm font-bold text-indigo-600">
                            05
                        </div>

                        <h3 class="font-semibold text-gray-900">
                            Kirim & Pantau
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
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

                    <h2 class="text-lg font-bold text-gray-900">
                        Apa fungsi setiap fitur?
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Ringkasan fungsi setiap bagian utama aplikasi.
                    </p>

                </div>


                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                    {{-- Profile --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-lg">
                            👤
                        </div>

                        <h3 class="mt-4 font-semibold text-gray-900">
                            Profile
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Menyimpan identitas, biodata, informasi pelamar,
                            dan pengaturan Gmail pengirim.
                        </p>

                    </div>


                    {{-- Gmail --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-50 text-lg">
                            ✉️
                        </div>

                        <h3 class="mt-4 font-semibold text-gray-900">
                            Gmail Pengirim
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Akun Gmail yang telah ditautkan digunakan
                            untuk mengirim email lamaran melalui Gmail API.
                        </p>

                    </div>


                    {{-- Template --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-lg">
                            📝
                        </div>

                        <h3 class="mt-4 font-semibold text-gray-900">
                            Template
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Menyimpan pola email dan cover letter.
                            Variable dapat digunakan untuk mengisi data secara otomatis.
                        </p>

                    </div>


                    {{-- Berkas --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-lg">
                            📎
                        </div>

                        <h3 class="mt-4 font-semibold text-gray-900">
                            Berkas
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Tempat menyimpan CV dan dokumen pendukung
                            yang dapat dipilih sebagai lampiran.
                        </p>

                    </div>


                    {{-- Apply --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-purple-50 text-lg">
                            🚀
                        </div>

                        <h3 class="mt-4 font-semibold text-gray-900">
                            Apply Job
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Tempat memasukkan informasi perusahaan,
                            posisi, email HRD, template, surat, dan lampiran.
                        </p>

                    </div>


                    {{-- History --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gray-100 text-lg">
                            📋
                        </div>

                        <h3 class="mt-4 font-semibold text-gray-900">
                            History
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
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
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                    <h2 class="text-lg font-bold text-gray-900">
                        Pertanyaan yang sering muncul
                    </h2>

                    <div class="mt-5 space-y-3">

                        {{-- FAQ 1 --}}
                        <details class="group rounded-xl border border-gray-200 p-4">

                            <summary class="cursor-pointer list-none font-semibold text-gray-900">

                                Kenapa saya perlu menautkan Gmail?

                                <span class="float-right text-gray-400 transition group-open:rotate-180">
                                    ⌄
                                </span>

                            </summary>

                            <p class="mt-3 text-sm leading-6 text-gray-500">
                                Email akun digunakan sebagai identitas akun.
                                Gmail yang ditautkan memberikan izin kepada
                                aplikasi untuk mengirim lamaran menggunakan
                                akun Gmail tersebut.
                            </p>

                        </details>


                        {{-- FAQ 2 --}}
                        <details class="group rounded-xl border border-gray-200 p-4">

                            <summary class="cursor-pointer list-none font-semibold text-gray-900">

                                Apakah password Gmail disimpan aplikasi?

                                <span class="float-right text-gray-400 transition group-open:rotate-180">
                                    ⌄
                                </span>

                            </summary>

                            <p class="mt-3 text-sm leading-6 text-gray-500">
                                Tidak. Proses penautan Gmail dilakukan melalui
                                Google OAuth sehingga aplikasi tidak meminta
                                password Gmail secara langsung.
                            </p>

                        </details>


                        {{-- FAQ 3 --}}
                        <details class="group rounded-xl border border-gray-200 p-4">

                            <summary class="cursor-pointer list-none font-semibold text-gray-900">

                                Apa perbedaan Template Email dan Cover Letter?

                                <span class="float-right text-gray-400 transition group-open:rotate-180">
                                    ⌄
                                </span>

                            </summary>

                            <p class="mt-3 text-sm leading-6 text-gray-500">
                                Template Email digunakan untuk menyiapkan
                                isi email lamaran, sedangkan Cover Letter
                                digunakan untuk menyiapkan surat lamaran
                                yang dapat diproses sebagai PDF.
                            </p>

                        </details>


                        {{-- FAQ 4 --}}
                        <details class="group rounded-xl border border-gray-200 p-4">

                            <summary class="cursor-pointer list-none font-semibold text-gray-900">

                                Apa fungsi variable pada template?

                                <span class="float-right text-gray-400 transition group-open:rotate-180">
                                    ⌄
                                </span>

                            </summary>

                            <p class="mt-3 text-sm leading-6 text-gray-500">
                                Variable memungkinkan template menggunakan
                                data seperti nama pelamar, perusahaan, posisi,
                                kota, tanggal, dan informasi profil lainnya
                                tanpa harus mengetik ulang setiap kali.
                            </p>

                        </details>


                        {{-- FAQ 5 --}}
                        <details class="group rounded-xl border border-gray-200 p-4">

                            <summary class="cursor-pointer list-none font-semibold text-gray-900">

                                Apakah saya bisa memiliki template default?

                                <span class="float-right text-gray-400 transition group-open:rotate-180">
                                    ⌄
                                </span>

                            </summary>

                            <p class="mt-3 text-sm leading-6 text-gray-500">
                                Bisa. Template yang kamu miliki dapat ditentukan
                                sebagai template default sesuai kebutuhan.
                            </p>

                        </details>

                    </div>

                </div>


                {{-- Preparation --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                    <h2 class="text-lg font-bold text-gray-900">
                        Sebelum mengirim lamaran
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Checklist singkat agar lamaran siap dikirim.
                    </p>


                    <div class="mt-5 space-y-3">

                        <div class="flex gap-3 rounded-xl bg-gray-50 p-4">

                            <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-white text-sm shadow-sm">
                                1
                            </div>

                            <div>
                                <p class="font-semibold text-gray-900">
                                    Profile sudah lengkap
                                </p>

                                <p class="mt-1 text-sm leading-5 text-gray-500">
                                    Pastikan biodata pelamar sudah benar.
                                </p>
                            </div>

                        </div>


                        <div class="flex gap-3 rounded-xl bg-gray-50 p-4">

                            <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-white text-sm shadow-sm">
                                2
                            </div>

                            <div>
                                <p class="font-semibold text-gray-900">
                                    Gmail sudah terhubung
                                </p>

                                <p class="mt-1 text-sm leading-5 text-gray-500">
                                    Pastikan akun Gmail pengirim tersedia.
                                </p>
                            </div>

                        </div>


                        <div class="flex gap-3 rounded-xl bg-gray-50 p-4">

                            <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-white text-sm shadow-sm">
                                3
                            </div>

                            <div>
                                <p class="font-semibold text-gray-900">
                                    Template sudah diperiksa
                                </p>

                                <p class="mt-1 text-sm leading-5 text-gray-500">
                                    Pastikan subject dan isi sesuai dengan posisi.
                                </p>
                            </div>

                        </div>


                        <div class="flex gap-3 rounded-xl bg-gray-50 p-4">

                            <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-white text-sm shadow-sm">
                                4
                            </div>

                            <div>
                                <p class="font-semibold text-gray-900">
                                    Lampiran sudah benar
                                </p>

                                <p class="mt-1 text-sm leading-5 text-gray-500">
                                    Pastikan CV dan dokumen pendukung yang dipilih sesuai.
                                </p>
                            </div>

                        </div>


                        <div class="flex gap-3 rounded-xl bg-gray-50 p-4">

                            <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-white text-sm shadow-sm">
                                5
                            </div>

                            <div>
                                <p class="font-semibold text-gray-900">
                                    Email HRD benar
                                </p>

                                <p class="mt-1 text-sm leading-5 text-gray-500">
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
            <div class="mt-8 rounded-2xl border border-amber-200 bg-amber-50 p-5 sm:p-6">

                <div class="flex gap-4">

                    <div class="text-xl">
                        💡
                    </div>

                    <div>

                        <h2 class="font-semibold text-amber-900">
                            Gunakan template sebagai pusat personalisasi
                        </h2>

                        <p class="mt-1 text-sm leading-6 text-amber-800">
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