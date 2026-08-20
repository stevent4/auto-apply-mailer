<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Auto Apply Mailer</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800"
        rel="stylesheet"
    />

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-900">

    <div class="min-h-screen flex flex-col">

        {{-- =========================================================
             HEADER
        ========================================================== --}}
        <header class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="h-16 sm:h-20 flex items-center justify-between gap-4">

                    {{-- Brand --}}
                    <a
                        href="{{ url('/') }}"
                        class="flex items-center gap-2.5 sm:gap-3 min-w-0"
                    >
                        <div
                            class="w-10 h-10 sm:w-11 sm:h-11 flex-shrink-0 rounded-xl bg-indigo-100 flex items-center justify-center"
                        >
                            <svg
                                class="w-5 h-5 sm:w-6 sm:h-6 text-indigo-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                />
                            </svg>
                        </div>

                        <div class="min-w-0">
                            <div class="text-sm sm:text-lg font-bold text-gray-900 truncate">
                                Auto Apply Mailer
                            </div>

                            <div class="text-xs sm:text-sm text-gray-500">
                                Mailer
                            </div>
                        </div>
                    </a>

                    {{-- Navigation --}}
                    <div class="flex items-center gap-2 sm:gap-3">

                        @auth

                            <a
                                href="{{ route('dashboard') }}"
                                class="inline-flex items-center justify-center px-3 sm:px-5 py-2 sm:py-2.5 rounded-xl bg-indigo-600 text-white text-xs sm:text-sm font-semibold hover:bg-indigo-700 transition whitespace-nowrap"
                            >
                                Dashboard
                            </a>

                        @else

                            <a
                                href="{{ route('login') }}"
                                class="inline-flex items-center justify-center px-3 sm:px-5 py-2 sm:py-2.5 rounded-xl border border-gray-300 bg-white text-gray-700 text-xs sm:text-sm font-semibold hover:bg-gray-50 transition whitespace-nowrap"
                            >
                                Masuk
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="hidden sm:inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-indigo-600 text-white text-sm font-semibold hover:bg-indigo-700 transition whitespace-nowrap"
                                >
                                    Daftar
                                </a>
                            @endif

                        @endauth

                    </div>
                </div>
            </div>
        </header>


        {{-- =========================================================
             MAIN
        ========================================================== --}}
        <main class="flex-1">

            {{-- =====================================================
                 HERO
            ====================================================== --}}
            <section class="bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="py-12 sm:py-20 lg:py-28">

                        <div class="max-w-3xl">

                            {{-- Badge --}}
                            <div
                                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-indigo-50 text-indigo-700 text-xs sm:text-sm font-semibold"
                            >
                                <span
                                    class="w-2 h-2 rounded-full bg-indigo-500 flex-shrink-0"
                                ></span>

                                Platform Lamaran Kerja
                            </div>


                            {{-- Heading --}}
                            <h1
                                class="mt-5 sm:mt-6 text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-gray-900 leading-[1.08]"
                            >
                                Kelola dan kirim

                                <span class="text-indigo-600">
                                    lamaran kerja
                                </span>

                                dengan lebih mudah.
                            </h1>


                            {{-- Description --}}
                            <p
                                class="mt-5 sm:mt-6 text-base sm:text-lg leading-7 sm:leading-8 text-gray-600 max-w-2xl"
                            >
                                Auto Apply Mailer membantu pencari kerja
                                menyiapkan informasi perusahaan, posisi yang
                                dilamar, template surat lamaran, dan mengirim
                                lamaran melalui email dengan lebih praktis.
                            </p>


                            {{-- Buttons --}}
                            <div
                                class="mt-7 sm:mt-8 flex flex-col sm:flex-row gap-3"
                            >

                                @auth

                                    <a
                                        href="{{ route('dashboard') }}"
                                        class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-indigo-600 text-white font-semibold text-sm sm:text-base hover:bg-indigo-700 transition"
                                    >
                                        Buka Dashboard
                                    </a>

                                @else

                                    <a
                                        href="{{ route('login') }}"
                                        class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-indigo-600 text-white font-semibold text-sm sm:text-base hover:bg-indigo-700 transition"
                                    >
                                        Mulai Menggunakan
                                    </a>

                                    @if (Route::has('register'))

                                        <a
                                            href="{{ route('register') }}"
                                            class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl border border-gray-300 bg-white text-gray-700 font-semibold text-sm sm:text-base hover:bg-gray-50 transition"
                                        >
                                            Buat Akun
                                        </a>

                                    @endif

                                @endauth

                            </div>

                        </div>
                    </div>
                </div>
            </section>


            {{-- =====================================================
                 FEATURES
            ====================================================== --}}
            <section class="py-12 sm:py-16 lg:py-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    {{-- Section Header --}}
                    <div class="max-w-2xl mx-auto text-center">

                        <h2
                            class="text-2xl sm:text-3xl font-bold text-gray-900"
                        >
                            Semua kebutuhan lamaran dalam satu tempat
                        </h2>

                        <p
                            class="mt-3 text-sm sm:text-base leading-6 text-gray-600"
                        >
                            Dirancang untuk membuat proses menyiapkan dan
                            mengirim lamaran menjadi lebih sederhana.
                        </p>

                    </div>


                    {{-- Feature Cards --}}
                    <div
                        class="mt-10 sm:mt-12 grid grid-cols-1 md:grid-cols-3 gap-5 sm:gap-6"
                    >

                        {{-- Card 1 --}}
                        <div
                            class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5 sm:p-6"
                        >

                            <div
                                class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-indigo-100 flex items-center justify-center"
                            >
                                <svg
                                    class="w-5 h-5 sm:w-6 sm:h-6 text-indigo-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 10.5V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2h14a2 2 0 002-2v-4.5M16 13l3 3m0 0l3-3m-3 3V9"
                                    />
                                </svg>
                            </div>

                            <h3
                                class="mt-5 text-lg font-bold text-gray-900"
                            >
                                Kirim Lamaran
                            </h3>

                            <p
                                class="mt-2 text-sm sm:text-base leading-6 text-gray-600"
                            >
                                Siapkan dan kirim surat lamaran ke email HRD
                                dengan lebih cepat dan terorganisir.
                            </p>

                        </div>


                        {{-- Card 2 --}}
                        <div
                            class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5 sm:p-6"
                        >

                            <div
                                class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-indigo-100 flex items-center justify-center"
                            >
                                <svg
                                    class="w-5 h-5 sm:w-6 sm:h-6 text-indigo-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h6l5 5v11a2 2 0 01-2 2z"
                                    />
                                </svg>
                            </div>

                            <h3
                                class="mt-5 text-lg font-bold text-gray-900"
                            >
                                Template Lamaran
                            </h3>

                            <p
                                class="mt-2 text-sm sm:text-base leading-6 text-gray-600"
                            >
                                Gunakan template untuk membantu menyiapkan
                                isi surat lamaran secara konsisten.
                            </p>

                        </div>


                        {{-- Card 3 --}}
                        <div
                            class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5 sm:p-6"
                        >

                            <div
                                class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-indigo-100 flex items-center justify-center"
                            >
                                <svg
                                    class="w-5 h-5 sm:w-6 sm:h-6 text-indigo-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    aria-hidden="true"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z"
                                    />
                                </svg>
                            </div>

                            <h3
                                class="mt-5 text-lg font-bold text-gray-900"
                            >
                                Lebih Terorganisir
                            </h3>

                            <p
                                class="mt-2 text-sm sm:text-base leading-6 text-gray-600"
                            >
                                Kelola informasi lowongan dan proses lamaran
                                dalam satu aplikasi.
                            </p>

                        </div>

                    </div>

                </div>
            </section>


            {{-- =====================================================
                 CTA
            ====================================================== --}}
            <section class="pb-12 sm:pb-16 lg:pb-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    <div
                        class="rounded-2xl sm:rounded-3xl bg-indigo-600 px-5 py-10 sm:px-10 sm:py-12 lg:px-12 text-center"
                    >

                        <h2
                            class="text-2xl sm:text-3xl font-bold text-white"
                        >
                            Siap membuat proses lamaran lebih sederhana?
                        </h2>

                        <p
                            class="mt-3 text-sm sm:text-base leading-6 text-indigo-100 max-w-2xl mx-auto"
                        >
                            Gunakan Auto Apply Mailer untuk membantu
                            menyiapkan dan mengirim lamaran kerja.
                        </p>

                        <div class="mt-7">

                            @auth

                                <a
                                    href="{{ route('dashboard') }}"
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-white text-indigo-700 font-semibold text-sm sm:text-base hover:bg-gray-100 transition"
                                >
                                    Masuk ke Dashboard
                                </a>

                            @else

                                <a
                                    href="{{ route('login') }}"
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-white text-indigo-700 font-semibold text-sm sm:text-base hover:bg-gray-100 transition"
                                >
                                    Mulai Sekarang
                                </a>

                            @endauth

                        </div>

                    </div>

                </div>
            </section>

        </main>


        {{-- =========================================================
             FOOTER
        ========================================================== --}}
        <footer class="border-t border-gray-200 bg-white">

            <div
                class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-7 sm:py-8"
            >

                <div
                    class="flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left"
                >

                    <div class="text-xs sm:text-sm text-gray-500">
                        © {{ date('Y') }} Auto Apply Mailer.
                    </div>


                    <div class="flex items-center gap-5 text-xs sm:text-sm">

                        @if (Route::has('privacy-policy'))

                            <a
                                href="{{ route('privacy-policy') }}"
                                class="text-gray-500 hover:text-gray-900 transition"
                            >
                                Privacy Policy
                            </a>

                        @endif

                    </div>

                </div>

            </div>

        </footer>

    </div>

</body>

</html>