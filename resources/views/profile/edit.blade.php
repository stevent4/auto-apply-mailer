<x-app-layout>

    <div class="min-h-[calc(100vh-5rem)] bg-gray-50">

        <div class="mx-auto max-w-5xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- =====================================================
                HEADER
            ====================================================== --}}
            <div class="mb-8">

                <div class="flex items-center gap-3">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-600 text-lg text-white shadow-sm">
                        👤
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-indigo-600">
                            Account Settings
                        </p>

                        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                            Profil Saya
                        </h1>

                    </div>

                </div>

                <p class="mt-3 max-w-2xl text-sm leading-6 text-gray-500">
                    Lengkapi biodata agar template email dan surat lamaran
                    dapat menyesuaikan dengan akun yang sedang login.
                </p>

            </div>


            {{-- =====================================================
                SUCCESS
            ====================================================== --}}
            @if (session('status') === 'profile-updated')

            <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4">

                <div class="flex items-center gap-3">

                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-emerald-100 font-bold text-emerald-600">
                        ✓
                    </div>

                    <p class="text-sm font-medium text-emerald-800">
                        Profil berhasil diperbarui.
                    </p>

                </div>

            </div>

            @endif


            <form
                method="post"
                action="{{ route('profile.update') }}"
                class="space-y-6">

                @csrf
                @method('patch')


                {{-- =================================================
                    ACCOUNT
                ================================================== --}}
                <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-100 px-6 py-5">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-lg">
                                ✉️
                            </div>

                            <div>

                                <h2 class="text-base font-bold text-gray-900">
                                    Informasi Akun
                                </h2>

                                <p class="mt-1 text-xs text-gray-500">
                                    Digunakan untuk login dan informasi dasar akun.
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="grid gap-5 p-6 md:grid-cols-2">

                        {{-- Nama --}}
                        <div>

                            <label
                                for="name"
                                class="mb-2 block text-sm font-semibold text-gray-700">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $user->name) }}"
                                required
                                autocomplete="name"
                                class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:bg-white focus:ring-indigo-500">

                            @error('name')
                            <p class="mt-1 text-xs text-red-600">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>


                        {{-- Email --}}
                        <div>

                            <label
                                for="email"
                                class="mb-2 block text-sm font-semibold text-gray-700">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email', $user->email) }}"
                                required
                                autocomplete="email"
                                class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:bg-white focus:ring-indigo-500">

                            @error('email')
                            <p class="mt-1 text-xs text-red-600">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- =================================================
                    BIODATA
                ================================================== --}}
                <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-100 px-6 py-5">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-50 text-lg">
                                📋
                            </div>

                            <div>

                                <h2 class="text-base font-bold text-gray-900">
                                    Biodata Lamaran
                                </h2>

                                <p class="mt-1 text-xs text-gray-500">
                                    Data ini akan digunakan otomatis pada surat lamaran.
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="space-y-5 p-6">

                        {{-- Tempat + Tanggal Lahir --}}
                        <div class="grid gap-5 md:grid-cols-2">

                            <div>

                                <label
                                    for="birth_place"
                                    class="mb-2 block text-sm font-semibold text-gray-700">
                                    Tempat Lahir
                                </label>

                                <input
                                    type="text"
                                    name="birth_place"
                                    id="birth_place"
                                    value="{{ old('birth_place', $user->birth_place) }}"
                                    placeholder="Jombang"
                                    class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:bg-white focus:ring-indigo-500">

                                @error('birth_place')
                                <p class="mt-1 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror

                            </div>


                            <div>

                                <label
                                    for="birth_date"
                                    class="mb-2 block text-sm font-semibold text-gray-700">
                                    Tanggal Lahir
                                </label>

                                <input
                                    type="date"
                                    name="birth_date"
                                    id="birth_date"
                                    value="{{ old('birth_date', optional($user->birth_date)->format('Y-m-d')) }}"
                                    class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 focus:border-indigo-500 focus:bg-white focus:ring-indigo-500">

                                @error('birth_date')
                                <p class="mt-1 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror

                            </div>

                        </div>


                        {{-- Pendidikan --}}
                        <div>

                            <label
                                for="education"
                                class="mb-2 block text-sm font-semibold text-gray-700">
                                Pendidikan Terakhir
                            </label>

                            <input
                                type="text"
                                name="education"
                                id="education"
                                value="{{ old('education', $user->education) }}"
                                placeholder="S1 Teknik Informatika"
                                class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:bg-white focus:ring-indigo-500">

                            @error('education')
                            <p class="mt-1 text-xs text-red-600">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>


                        {{-- Alamat --}}
                        <div>

                            <label
                                for="address"
                                class="mb-2 block text-sm font-semibold text-gray-700">
                                Alamat
                            </label>

                            <textarea
                                name="address"
                                id="address"
                                rows="3"
                                placeholder="Ds. Gajah, Kecamatan Ngoro, Kabupaten Jombang"
                                class="block w-full resize-y rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm leading-6 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:bg-white focus:ring-indigo-500">{{ old('address', $user->address) }}</textarea>

                            @error('address')
                            <p class="mt-1 text-xs text-red-600">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>


                        {{-- Nomor HP --}}
                        <div>

                            <label
                                for="phone"
                                class="mb-2 block text-sm font-semibold text-gray-700">
                                Nomor HP
                            </label>

                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                value="{{ old('phone', $user->phone) }}"
                                placeholder="089620276245"
                                class="block w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:bg-white focus:ring-indigo-500">

                            @error('phone')
                            <p class="mt-1 text-xs text-red-600">
                                {{ $message }}
                            </p>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- =================================================
                    INFO
                ================================================== --}}
                <div class="rounded-2xl border border-indigo-100 bg-indigo-50/60 p-5">

                    <div class="flex items-start gap-3">

                        <span class="text-lg">
                            💡
                        </span>

                        <div>

                            <h3 class="text-sm font-bold text-indigo-900">
                                Biodata digunakan pada template otomatis
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-indigo-700">
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
                <div class="flex justify-end">

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-6 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">

                        <svg
                            class="h-5 w-5"
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

        </div>

    </div>

</x-app-layout>