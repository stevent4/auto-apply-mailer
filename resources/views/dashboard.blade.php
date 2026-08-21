<x-app-layout title="Dashboard — Auto Apply Mailer">

    <div class="min-h-[calc(100vh-4rem)]">

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
                            Kelola profil, berkas, template, Gmail pengirim,
                            dan riwayat lamaran dari satu tempat.
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
                 PENJELASAN EMAIL DAN GMAIL
            ========================================================== --}}
            <div class="mb-8 overflow-hidden rounded-2xl border border-indigo-100 bg-indigo-50 shadow-sm">

                <div class="p-6 sm:p-7">

                    <div class="flex flex-col gap-5 sm:flex-row sm:items-start">

                        {{-- Icon --}}
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-2xl shadow-sm">
                            ✉️
                        </div>


                        <div class="min-w-0 flex-1">

                            <p class="text-sm font-semibold text-indigo-700">
                                Tentang Gmail Pengirim
                            </p>


                            <h2 class="mt-1 text-xl font-bold text-gray-900">
                                Email akun dan Gmail pengirim memiliki fungsi yang berbeda.
                            </h2>


                            <p class="mt-3 max-w-4xl text-sm leading-6 text-gray-600">

                                Email yang digunakan untuk login adalah identitas
                                akun dan data profil pelamar.

                                Gmail yang ditautkan melalui halaman
                                <strong>Profile</strong>
                                adalah akun yang diberi izin untuk mengirim
                                lamaran melalui Gmail API.

                                <strong>
                                    Jika Gmail kamu sudah tertaut di Profile,
                                    tidak perlu menautkannya lagi di Dashboard.
                                </strong>

                            </p>


                            {{-- Perbedaan email --}}
                            <div class="mt-5 grid gap-4 md:grid-cols-2">

                                {{-- Email akun --}}
                                <div class="rounded-xl border border-indigo-100 bg-white p-4">

                                    <p class="text-xs font-bold uppercase tracking-wide text-gray-400">
                                        Email akun / profil
                                    </p>

                                    <p class="mt-1 font-semibold text-gray-900">
                                        Untuk login dan biodata
                                    </p>

                                    <p class="mt-2 text-sm leading-6 text-gray-500">
                                        Digunakan sebagai identitas akun dan
                                        informasi profil pelamar.
                                    </p>

                                </div>


                                {{-- Gmail pengirim --}}
                                <div class="rounded-xl border border-indigo-100 bg-white p-4">

                                    <p class="text-xs font-bold uppercase tracking-wide text-gray-400">
                                        Gmail pengirim
                                    </p>

                                    <p class="mt-1 font-semibold text-gray-900">
                                        Untuk mengirim lamaran
                                    </p>

                                    <p class="mt-2 text-sm leading-6 text-gray-500">
                                        Akun Gmail yang ditautkan digunakan
                                        sebagai alamat
                                        <strong>From</strong>
                                        saat lamaran dikirim.
                                    </p>

                                </div>

                            </div>


                            {{-- Contoh --}}
                            <div class="mt-5 rounded-xl bg-white/80 p-4 ring-1 ring-indigo-100">

                                <p class="text-sm font-semibold text-gray-900">
                                    Contoh
                                </p>

                                <p class="mt-1 text-sm leading-6 text-gray-600">

                                    Kamu login menggunakan
                                    <strong>nama@contoh.com</strong>,

                                    lalu menautkan Gmail
                                    <strong>kamu@gmail.com</strong>
                                    melalui Profile.

                                    Saat lamaran dikirim, penerima akan menerima
                                    email dari
                                    <strong>kamu@gmail.com</strong>.

                                </p>

                            </div>


                            {{-- Link ke Profile --}}
                            <div class="mt-5 flex flex-wrap items-center gap-3">

                                <a
                                    href="{{ route('profile.edit') }}"
                                    class="inline-flex items-center gap-2 rounded-xl bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-gray-800">

                                    Kelola Gmail di Profile

                                </a>


                                <span class="text-sm text-gray-500">
                                    Penautan dan pengelolaan Gmail dilakukan di halaman Profile.
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================================================
                 FEATURE CARDS
            ========================================================== --}}
            <div class="grid gap-5 md:grid-cols-3">


                {{-- Apply --}}
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

                        Masukkan tujuan lamaran, gunakan template,
                        pilih surat lamaran dan berkas, lalu kirim
                        melalui Gmail yang sudah ditautkan.

                    </p>

                </div>


                {{-- Template --}}
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
                        sebagai titik awal, kemudian sesuaikan
                        isinya sebelum dikirim.

                    </p>

                </div>


                {{-- Berkas --}}
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

                        Simpan CV dan dokumen pendukung di halaman
                        Berkas agar mudah dipilih sebagai lampiran.

                    </p>

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

                            Pastikan Gmail pengirim sudah ditautkan
                            di Profile, lalu masukkan informasi perusahaan,
                            posisi yang dilamar, pilih template,
                            surat lamaran, dan berkas yang ingin dikirim.

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


                    {{-- Decorative background --}}
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
                        Ikuti langkah berikut sebelum mengirim lamaran pertama.
                    </p>

                </div>


                <div class="grid gap-4 md:grid-cols-4">


                    {{-- Step 1 --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-5">

                        <div class="mb-4 flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-50 text-sm font-bold text-indigo-600">
                            01
                        </div>

                        <h3 class="font-semibold text-gray-900">
                            Lengkapi profil
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Pastikan nama, email, pendidikan,
                            alamat, dan nomor HP sudah benar.
                        </p>

                    </div>


                    {{-- Step 2 --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-5">

                        <div class="mb-4 flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-50 text-sm font-bold text-indigo-600">
                            02
                        </div>

                        <h3 class="font-semibold text-gray-900">
                            Tautkan Gmail di Profile
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Hubungkan akun Gmail yang ingin digunakan
                            sebagai alamat pengirim melalui halaman Profile.
                        </p>

                    </div>


                    {{-- Step 3 --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-5">

                        <div class="mb-4 flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-50 text-sm font-bold text-indigo-600">
                            03
                        </div>

                        <h3 class="font-semibold text-gray-900">
                            Siapkan lamaran
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Pilih template email, surat lamaran,
                            dan berkas yang sesuai dengan lowongan.
                        </p>

                    </div>


                    {{-- Step 4 --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-5">

                        <div class="mb-4 flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-50 text-sm font-bold text-indigo-600">
                            04
                        </div>

                        <h3 class="font-semibold text-gray-900">
                            Kirim & pantau
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Kirim lamaran dan gunakan History
                            untuk memantau lamaran yang sudah dikirim.
                        </p>

                    </div>

                </div>

            </div>


            {{-- =========================================================
                 FEATURE EXPLANATION + FAQ
            ========================================================== --}}
            <div class="mt-8 grid gap-6 lg:grid-cols-2">


                {{-- Feature explanation --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                    <h2 class="text-lg font-bold text-gray-900">
                        Apa fungsi setiap fitur?
                    </h2>


                    <div class="mt-5 space-y-5">


                        {{-- Profile --}}
                        <div>

                            <h3 class="font-semibold text-gray-900">
                                👤 Profile
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-gray-500">

                                Menyimpan identitas, biodata,
                                dan akun Gmail pengirim yang terhubung.

                            </p>

                        </div>


                        {{-- Gmail --}}
                        <div>

                            <h3 class="font-semibold text-gray-900">
                                ✉️ Gmail
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-gray-500">

                                Penautan Gmail dilakukan di Profile.
                                Akun Gmail tersebut diberi izin untuk
                                mengirim email melalui Gmail API.

                            </p>

                        </div>


                        {{-- Berkas --}}
                        <div>

                            <h3 class="font-semibold text-gray-900">
                                📄 Berkas
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-gray-500">

                                Tempat menyimpan CV dan dokumen
                                pendukung yang nantinya dapat dipilih
                                sebagai lampiran.

                            </p>

                        </div>


                        {{-- Template --}}
                        <div>

                            <h3 class="font-semibold text-gray-900">
                                📝 Template
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-gray-500">

                                Membantu menyiapkan email dan surat
                                lamaran tanpa harus menulis semuanya
                                dari awal.

                            </p>

                        </div>


                        {{-- History --}}
                        <div>

                            <h3 class="font-semibold text-gray-900">
                                📋 History
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-gray-500">

                                Mencatat lamaran yang dikirim oleh
                                akun kamu sehingga dapat dipantau
                                dan dikirim ulang jika diperlukan.

                            </p>

                        </div>

                    </div>

                </div>


                {{-- FAQ --}}
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                    <h2 class="text-lg font-bold text-gray-900">
                        Pertanyaan yang sering muncul
                    </h2>


                    <div class="mt-5 space-y-3">


                        {{-- FAQ 1 --}}
                        <details class="group rounded-xl border border-gray-200 p-4">

                            <summary class="cursor-pointer list-none font-semibold text-gray-900">

                                Saya sudah punya email.
                                Kenapa masih harus menautkan Gmail?

                                <span class="float-right text-gray-400 transition group-open:rotate-180">
                                    ⌄
                                </span>

                            </summary>


                            <p class="mt-3 text-sm leading-6 text-gray-500">

                                Email pada profil digunakan untuk akun
                                dan data pelamar.

                                Penautan Gmail di Profile memberikan
                                izin kepada aplikasi untuk mengirim email
                                melalui akun Gmail yang kamu pilih.

                                Jadi keduanya memiliki fungsi yang berbeda.

                            </p>

                        </details>


                        {{-- FAQ 2 --}}
                        <details class="group rounded-xl border border-gray-200 p-4">

                            <summary class="cursor-pointer list-none font-semibold text-gray-900">

                                Apakah email lamaran dikirim dari email saya sendiri?

                                <span class="float-right text-gray-400 transition group-open:rotate-180">
                                    ⌄
                                </span>

                            </summary>


                            <p class="mt-3 text-sm leading-6 text-gray-500">

                                Ya.

                                Setelah Gmail ditautkan di Profile,
                                aplikasi menggunakan akun Gmail tersebut
                                sebagai alamat pengirim saat mengirim
                                lamaran melalui Gmail API.

                            </p>

                        </details>


                        {{-- FAQ 3 --}}
                        <details class="group rounded-xl border border-gray-200 p-4">

                            <summary class="cursor-pointer list-none font-semibold text-gray-900">

                                Apakah saya harus memasukkan password Gmail ke aplikasi?

                                <span class="float-right text-gray-400 transition group-open:rotate-180">
                                    ⌄
                                </span>

                            </summary>


                            <p class="mt-3 text-sm leading-6 text-gray-500">

                                Tidak.

                                Proses penautan dilakukan melalui
                                Google OAuth.

                                Aplikasi menerima token izin dari Google
                                untuk kebutuhan pengiriman email.

                            </p>

                        </details>


                        {{-- FAQ 4 --}}
                        <details class="group rounded-xl border border-gray-200 p-4">

                            <summary class="cursor-pointer list-none font-semibold text-gray-900">

                                Apakah saya bisa mengganti Gmail pengirim?

                                <span class="float-right text-gray-400 transition group-open:rotate-180">
                                    ⌄
                                </span>

                            </summary>


                            <p class="mt-3 text-sm leading-6 text-gray-500">

                                Bisa.

                                Gmail pengirim dapat dikelola melalui
                                menu Google/Gmail pada halaman Profile.

                            </p>

                        </details>

                    </div>

                </div>

            </div>


            {{-- =========================================================
                 REMINDER
            ========================================================== --}}
            <div class="mt-8 rounded-2xl border border-amber-200 bg-amber-50 p-5 sm:p-6">

                <div class="flex gap-4">

                    <div class="text-xl">
                        💡
                    </div>


                    <div>

                        <h2 class="font-semibold text-amber-900">
                            Sebelum mengirim lamaran
                        </h2>


                        <p class="mt-1 text-sm leading-6 text-amber-800">

                            Pastikan Gmail pengirim sudah terhubung
                            di Profile, alamat HRD benar, template sudah
                            diperiksa, surat lamaran sesuai posisi,
                            dan lampiran yang dipilih merupakan
                            dokumen yang benar.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>