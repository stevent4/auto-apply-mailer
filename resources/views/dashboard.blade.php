<x-app-layout>

    <div class="min-h-[calc(100vh-4rem)]">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- Welcome --}}
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
                            Kelola lamaran kerja dan kirim email lamaran
                            dengan lebih cepat dari satu tempat.
                        </p>
                    </div>

                    @if (Route::has('apply'))
                    <a
                        href="{{ route('apply') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
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


            {{-- Feature Cards --}}
            <div class="grid gap-5 md:grid-cols-3">

                {{-- Card 1 --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

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
                        Siapkan email lamaran dan kirim ke HRD
                        tanpa harus membuat email dari awal.
                    </p>
                </div>


                {{-- Card 2 --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                    <div class="flex items-start justify-between">

                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                Template
                            </p>

                            <h2 class="mt-2 text-lg font-bold text-gray-900">
                                Siap Digunakan
                            </h2>
                        </div>

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-xl">
                            📝
                        </div>

                    </div>

                    <p class="mt-4 text-sm leading-6 text-gray-500">
                        Gunakan template email dan surat lamaran
                        yang dapat disesuaikan sebelum dikirim.
                    </p>
                </div>


                {{-- Card 3 --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

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
                        Pilih dokumen yang ingin dilampirkan
                        sebelum mengirim lamaran.
                    </p>
                </div>

            </div>


            {{-- Main Action --}}
            <div class="mt-8 overflow-hidden rounded-2xl bg-gray-900 shadow-sm">

                <div class="relative px-6 py-8 sm:px-8 lg:px-10">

                    <div class="relative z-10 max-w-2xl">

                        <span
                            class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-xs font-semibold text-indigo-200 ring-1 ring-inset ring-white/10">
                            Auto Apply Mailer
                        </span>

                        <h2 class="mt-4 text-2xl font-bold tracking-tight text-white sm:text-3xl">
                            Siap mengirim lamaran hari ini?
                        </h2>

                        <p class="mt-3 text-sm leading-6 text-gray-300 sm:text-base">
                            Masukkan informasi perusahaan, posisi yang dilamar,
                            isi email, surat lamaran, dan pilih berkas yang ingin
                            dikirim.
                        </p>

                        @if (Route::has('apply'))
                        <a
                            href="{{ route('apply') }}"
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

                    {{-- Decorative background --}}
                    <div
                        class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full bg-indigo-500/20 blur-3xl"></div>

                    <div
                        class="pointer-events-none absolute -bottom-24 right-20 h-56 w-56 rounded-full bg-purple-500/10 blur-3xl"></div>

                </div>
            </div>


            {{-- Quick Guide --}}
            <div class="mt-8">

                <div class="mb-4">
                    <h2 class="text-lg font-bold text-gray-900">
                        Cara menggunakan
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Tiga langkah sederhana untuk mengirim lamaran.
                    </p>
                </div>

                <div class="grid gap-4 md:grid-cols-3">

                    <div class="rounded-2xl border border-gray-200 bg-white p-5">
                        <div class="mb-4 flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-50 text-sm font-bold text-indigo-600">
                            01
                        </div>

                        <h3 class="font-semibold text-gray-900">
                            Isi informasi
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Masukkan email HRD, perusahaan dan posisi
                            yang ingin kamu lamar.
                        </p>
                    </div>


                    <div class="rounded-2xl border border-gray-200 bg-white p-5">
                        <div class="mb-4 flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-50 text-sm font-bold text-indigo-600">
                            02
                        </div>

                        <h3 class="font-semibold text-gray-900">
                            Periksa email
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Edit subjek dan isi email sesuai kebutuhan
                            sebelum mengirim.
                        </p>
                    </div>


                    <div class="rounded-2xl border border-gray-200 bg-white p-5">
                        <div class="mb-4 flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-50 text-sm font-bold text-indigo-600">
                            03
                        </div>

                        <h3 class="font-semibold text-gray-900">
                            Kirim lamaran
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Pilih berkas yang dibutuhkan lalu kirim
                            lamaran melalui sistem.
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>