<x-guest-layout>
    <div class="space-y-8">
        {{-- Branding --}}
        <div class="text-center">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-indigo-600 shadow-lg shadow-indigo-200">
                <svg
                    class="h-8 w-8 text-white"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3 7.5A2.5 2.5 0 0 1 5.5 5h13A2.5 2.5 0 0 1 21 7.5v9a2.5 2.5 0 0 1-2.5 2.5h-13A2.5 2.5 0 0 1 3 16.5v-9Z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m4 7 7.1 5.1a1.5 1.5 0 0 0 1.8 0L20 7"
                    />
                </svg>
            </div>

            <h1 class="mt-5 text-2xl font-bold tracking-tight text-slate-900">
                Kebijakan Privasi
            </h1>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Bagaimana Auto Apply Mailer mengelola data dan informasi Anda.
            </p>
        </div>

        <div class="space-y-8 text-sm leading-7 text-slate-600">

            <section>
                <h2 class="text-base font-semibold text-slate-900">
                    1. Pendahuluan
                </h2>

                <p class="mt-2">
                    Kebijakan Privasi ini menjelaskan bagaimana Auto Apply Mailer
                    ("Auto Apply Mailer", "Aplikasi", "kami", atau "kita")
                    mengumpulkan, menggunakan, menyimpan, melindungi, dan menghapus
                    data pribadi ketika Anda membuat akun atau menggunakan layanan.
                </p>

                <p class="mt-3">
                    Dengan menggunakan aplikasi, Anda dapat mengelola profil pencari
                    kerja, menyimpan dokumen dan template lamaran, serta mengirim
                    lamaran melalui akun email yang Anda hubungkan.
                </p>
            </section>

            <section>
                <h2 class="text-base font-semibold text-slate-900">
                    2. Data yang Kami Kumpulkan
                </h2>

                <p class="mt-2">
                    Data yang dapat diproses Auto Apply Mailer antara lain:
                </p>

                <ul class="mt-3 list-disc space-y-2 pl-5">
                    <li>Nama lengkap.</li>
                    <li>Alamat email akun aplikasi.</li>
                    <li>Tempat dan tanggal lahir.</li>
                    <li>Nomor telepon.</li>
                    <li>Alamat.</li>
                    <li>Informasi pendidikan.</li>
                    <li>CV, surat lamaran, dan dokumen yang Anda unggah.</li>
                    <li>Template email dan konten lamaran yang Anda buat.</li>
                    <li>Alamat email penerima lamaran.</li>
                    <li>Riwayat atau status pengiriman lamaran.</li>
                    <li>Data teknis yang diperlukan untuk keamanan dan operasional aplikasi.</li>
                </ul>
            </section>

            <section>
                <h2 class="text-base font-semibold text-slate-900">
                    3. Data dari Google dan Gmail
                </h2>

                <p class="mt-2">
                    Auto Apply Mailer tidak menggunakan Google untuk login ke akun
                    Auto Apply Mailer. Login aplikasi tetap menggunakan email dan
                    password yang terdaftar pada sistem Auto Apply Mailer.
                </p>

                <p class="mt-3">
                    Google OAuth hanya digunakan apabila Anda memilih untuk
                    menghubungkan akun Gmail agar Auto Apply Mailer dapat menjalankan
                    fitur pengiriman lamaran melalui Gmail API.
                </p>

                <p class="mt-3">
                    Bergantung pada izin (scope) yang Anda berikan, aplikasi dapat
                    menerima data dan/atau kredensial otorisasi yang diperlukan untuk
                    melakukan tindakan Gmail yang Anda minta, termasuk mengirim email
                    melalui akun Gmail yang telah dihubungkan.
                </p>

                <p class="mt-3">
                    Kami tidak menggunakan data Google/Gmail Anda untuk menjual,
                    menyewakan, atau menyediakan iklan yang ditargetkan berdasarkan
                    data tersebut. Penggunaan Google user data dibatasi pada fungsi
                    aplikasi yang dijelaskan dalam Kebijakan Privasi ini dan fitur
                    yang Anda minta. Google mewajibkan penggunaan data API dibatasi
                    pada fungsi yang diungkapkan kepada pengguna. 
                </p>

                <p class="mt-3">
                    Anda dapat memutuskan koneksi akun Gmail dari Auto Apply Mailer
                    melalui fitur yang tersedia di aplikasi. Anda juga dapat mencabut
                    akses aplikasi melalui pengaturan keamanan akun Google Anda.
                </p>
            </section>

            <section>
                <h2 class="text-base font-semibold text-slate-900">
                    4. Tujuan Penggunaan Data
                </h2>

                <p class="mt-2">
                    Data digunakan untuk menyediakan dan mengoperasikan fitur
                    Auto Apply Mailer, termasuk:
                </p>

                <ul class="mt-3 list-disc space-y-2 pl-5">
                    <li>Membuat dan mengelola akun pengguna.</li>
                    <li>Mengautentikasi pengguna.</li>
                    <li>Menyediakan proses lupa dan reset password.</li>
                    <li>Menyimpan profil pencari kerja.</li>
                    <li>Menyimpan CV dan dokumen pendukung.</li>
                    <li>Menyimpan template lamaran.</li>
                    <li>Membantu menyiapkan dan mengirim lamaran kerja.</li>
                    <li>Menyimpan riwayat pengiriman dan status lamaran.</li>
                    <li>Menjaga keamanan, mencegah penyalahgunaan, dan melakukan troubleshooting.</li>
                    <li>Meningkatkan keandalan fitur aplikasi.</li>
                </ul>
            </section>

            <section>
                <h2 class="text-base font-semibold text-slate-900">
                    5. Email Transaksional dan Brevo
                </h2>

                <p class="mt-2">
                    Untuk email sistem seperti email pemulihan password,
                    Auto Apply Mailer menggunakan layanan email transactional
                    pihak ketiga, yaitu Brevo.
                </p>

                <p class="mt-3">
                    Brevo dapat memproses data yang diperlukan untuk mengirim email,
                    seperti alamat email penerima, subjek, isi email, serta informasi
                    teknis pengiriman.
                </p>

                <p class="mt-3">
                    Brevo digunakan untuk pengiriman email yang dipicu oleh tindakan
                    pengguna dan bukan sebagai sistem login utama Auto Apply Mailer.
                </p>
            </section>

            <section>
                <h2 class="text-base font-semibold text-slate-900">
                    6. Password dan Keamanan Akun
                </h2>

                <p class="mt-2">
                    Password akun Auto Apply Mailer disimpan menggunakan mekanisme
                    hashing dan tidak disimpan sebagai teks biasa.
                </p>

                <p class="mt-3">
                    Kami menerapkan langkah keamanan yang wajar untuk melindungi akun,
                    token reset password, koneksi layanan pihak ketiga, dan data yang
                    tersimpan dalam sistem.
                </p>

                <p class="mt-3">
                    Namun, tidak ada sistem yang dapat dijamin 100% aman dari seluruh
                    risiko keamanan.
                </p>
            </section>

            <section>
                <h2 class="text-base font-semibold text-slate-900">
                    7. Dokumen dan Data Lamaran
                </h2>

                <p class="mt-2">
                    Dokumen seperti CV dan surat lamaran yang Anda unggah digunakan
                    untuk menyediakan fitur pengelolaan dan pengiriman lamaran kerja.
                </p>

                <p class="mt-3">
                    Pengguna bertanggung jawab untuk memastikan bahwa dokumen,
                    informasi, dan konten yang diberikan kepada aplikasi memang
                    diperbolehkan untuk digunakan dan dikirim.
                </p>
            </section>

            <section>
                <h2 class="text-base font-semibold text-slate-900">
                    8. Data Penerima Lamaran
                </h2>

                <p class="mt-2">
                    Ketika Anda menggunakan fitur pengiriman lamaran, Anda dapat
                    memberikan alamat email perusahaan, perekrut, atau penerima
                    lainnya.
                </p>

                <p class="mt-3">
                    Alamat email tersebut digunakan untuk tujuan pengiriman lamaran
                    yang Anda minta dan dapat muncul dalam riwayat pengiriman aplikasi.
                </p>
            </section>

            <section>
                <h2 class="text-base font-semibold text-slate-900">
                    9. Layanan Pihak Ketiga
                </h2>

                <p class="mt-2">
                    Auto Apply Mailer dapat menggunakan penyedia layanan pihak ketiga
                    untuk menjalankan infrastrukturnya, termasuk antara lain:
                </p>

                <ul class="mt-3 list-disc space-y-2 pl-5">
                    <li>Google dan Gmail API untuk koneksi dan pengiriman melalui Gmail.</li>
                    <li>Brevo untuk email transactional seperti reset password.</li>
                    <li>Penyedia hosting, database, penyimpanan, dan infrastruktur aplikasi.</li>
                </ul>

                <p class="mt-3">
                    Setiap penyedia pihak ketiga tunduk pada kebijakan dan ketentuan
                    mereka masing-masing.
                </p>
            </section>

            <section>
                <h2 class="text-base font-semibold text-slate-900">
                    10. Dasar dan Retensi Pemrosesan Data
                </h2>

                <p class="mt-2">
                    Data diproses sejauh diperlukan untuk menyediakan layanan,
                    memenuhi tindakan yang diminta pengguna, menjaga keamanan,
                    memenuhi kewajiban hukum, atau berdasarkan dasar pemrosesan
                    lain yang berlaku.
                </p>

                <p class="mt-3">
                    Data disimpan selama diperlukan untuk tujuan tersebut,
                    selama akun masih aktif, selama dibutuhkan untuk menyediakan
                    layanan, atau sepanjang diwajibkan oleh hukum.
                </p>

                <p class="mt-3">
                    Detail masa retensi dapat berbeda berdasarkan jenis data.
                    Data yang tidak lagi diperlukan akan dihapus atau dianonimkan
                    sesuai kebijakan operasional dan kewajiban yang berlaku.
                </p>
            </section>

            <section>
                <h2 class="text-base font-semibold text-slate-900">
                    11. Hak Anda
                </h2>

                <p class="mt-2">
                    Tunduk pada hukum yang berlaku, Anda dapat memiliki hak untuk:
                </p>

                <ul class="mt-3 list-disc space-y-2 pl-5">
                    <li>Memperoleh informasi mengenai pemrosesan data pribadi Anda.</li>
                    <li>Memperbaiki atau memperbarui data yang tidak akurat.</li>
                    <li>Mengakses data pribadi tertentu yang kami simpan.</li>
                    <li>Meminta penghapusan data atau akun dalam kondisi yang diperbolehkan.</li>
                    <li>Menarik persetujuan atas pemrosesan yang berbasis persetujuan.</li>
                    <li>Meminta pembatasan pemrosesan dalam kondisi tertentu.</li>
                    <li>Mengajukan pertanyaan atau keberatan mengenai pemrosesan data.</li>
                </ul>

                <p class="mt-3">
                    Permintaan dapat diajukan melalui alamat kontak yang tercantum
                    pada bagian Kontak.
                </p>
            </section>

            <section>
                <h2 class="text-base font-semibold text-slate-900">
                    12. Penghapusan Akun dan Data
                </h2>

                <p class="mt-2">
                    Jika Anda ingin menghapus akun Auto Apply Mailer atau meminta
                    penghapusan data tertentu, hubungi kami melalui alamat kontak
                    resmi.
                </p>

                <p class="mt-3">
                    Jika Anda telah menghubungkan akun Gmail, Anda juga dapat
                    mencabut otorisasi Auto Apply Mailer dari pengaturan akun Google
                    Anda.
                </p>

                <p class="mt-3">
                    Penghapusan data dapat tunduk pada kebutuhan untuk menyimpan
                    informasi tertentu apabila diwajibkan atau diperbolehkan oleh
                    hukum, untuk penyelesaian sengketa, keamanan, pencegahan fraud,
                    atau pencatatan transaksi yang sah.
                </p>
            </section>

            <section>
                <h2 class="text-base font-semibold text-slate-900">
                    13. Perubahan Kebijakan
                </h2>

                <p class="mt-2">
                    Kebijakan Privasi dapat diperbarui dari waktu ke waktu untuk
                    mencerminkan perubahan layanan, teknologi, praktik keamanan,
                    atau persyaratan hukum.
                </p>

                <p class="mt-3">
                    Versi terbaru akan dipublikasikan pada halaman ini.
                </p>
            </section>

            <section>
                <h2 class="text-base font-semibold text-slate-900">
                    14. Kontak
                </h2>

                <div class="mt-3 rounded-xl bg-slate-50 p-4">
                    <p>
                        <span class="font-semibold text-slate-800">Nama/Pengelola:</span>
                        Stevent
                    </p>

                    <p class="mt-1">
                        <span class="font-semibold text-slate-800">Email:</span>
                        ahmadstevent3@gmail.com
                    </p>

                    <p class="mt-1">
                        <span class="font-semibold text-slate-800">Website:</span>
                        https://stevents.my.id/
                    </p>
                </div>
            </section>

            <section class="border-t border-slate-200 pt-5">
                <p class="text-xs leading-6 text-slate-400">
                    Terakhir diperbarui: 20 Agustus 2026
                </p>
            </section>
        </div>

        <div class="border-t border-slate-200 pt-5 text-center">
            <a
                href="{{ route('login') }}"
                class="text-sm font-semibold text-indigo-600 hover:text-indigo-700 hover:underline"
            >
                Kembali ke login
            </a>
        </div>
    </div>
</x-guest-layout>