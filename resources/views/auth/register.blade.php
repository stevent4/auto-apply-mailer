<x-guest-layout title="Register — Auto Apply Mailer">
    <div class="space-y-6">
        {{-- Branding --}}
        <div class="text-center">
            <div class="mx-auto flex h-20 w-20 items-center justify-center">
                <img
                    src="{{ asset('favicon.png') }}"
                    alt="Logo Auto Apply Mailer"
                    class="h-20 w-20 object-contain">
            </div>

            <h1 class="mt-5 text-2xl font-bold tracking-tight text-slate-900">
                Buat Akun
            </h1>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Lengkapi data diri untuk mulai menggunakan Auto Apply Mailer.
            </p>
        </div>

        {{-- Register Form --}}
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            {{-- Nama --}}
            <div>
                <x-input-label for="name" value="Nama Lengkap" class="text-sm font-medium text-slate-700" />
                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    class="mt-1.5 block w-full rounded-xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    :value="old('name')"
                    autocomplete="name"
                    placeholder="Nama lengkap"
                    required
                    autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            {{-- Email --}}
            <div>
                <x-input-label for="email" value="Email" class="text-sm font-medium text-slate-700" />
                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    class="mt-1.5 block w-full rounded-xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    :value="old('email')"
                    autocomplete="username"
                    placeholder="nama@email.com"
                    required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Tempat & Tanggal Lahir --}}
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div>
                    <x-input-label for="birth_place" value="Tempat Lahir" class="text-sm font-medium text-slate-700" />
                    <x-text-input
                        id="birth_place"
                        name="birth_place"
                        type="text"
                        class="mt-1.5 block w-full rounded-xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        :value="old('birth_place')"
                        placeholder="Kota kelahiran"
                        required />
                    <x-input-error :messages="$errors->get('birth_place')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="birth_date" value="Tanggal Lahir" class="text-sm font-medium text-slate-700" />
                    <x-text-input
                        id="birth_date"
                        name="birth_date"
                        type="date"
                        class="mt-1.5 block w-full rounded-xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        :value="old('birth_date')"
                        required />
                    <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
                </div>
            </div>

            {{-- Pendidikan --}}
            <div>
                <x-input-label for="education" value="Pendidikan Terakhir" class="text-sm font-medium text-slate-700" />
                <x-text-input
                    id="education"
                    name="education"
                    type="text"
                    class="mt-1.5 block w-full rounded-xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    :value="old('education')"
                    placeholder="Contoh: S1 Teknik Informatika"
                    required />
                <x-input-error :messages="$errors->get('education')" class="mt-2" />
            </div>

            {{-- No HP --}}
            <div>
                <x-input-label for="phone" value="Nomor HP" class="text-sm font-medium text-slate-700" />
                <x-text-input
                    id="phone"
                    name="phone"
                    type="tel"
                    class="mt-1.5 block w-full rounded-xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    :value="old('phone')"
                    autocomplete="tel"
                    placeholder="081234567890"
                    required />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            {{-- Alamat --}}
            <div>
                <x-input-label for="address" value="Alamat" class="text-sm font-medium text-slate-700" />
                <textarea
                    id="address"
                    name="address"
                    rows="3"
                    class="mt-1.5 block w-full rounded-xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="Alamat lengkap"
                    required>{{ old('address') }}</textarea>
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            {{-- Password --}}
            <div>
                <x-input-label for="password" value="Password" class="text-sm font-medium text-slate-700" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1.5 block w-full rounded-xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    autocomplete="new-password"
                    placeholder="Buat password"
                    required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- Konfirmasi Password --}}
            <div>
                <x-input-label for="password_confirmation" value="Konfirmasi Password" class="text-sm font-medium text-slate-700" />
                <x-text-input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    class="mt-1.5 block w-full rounded-xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    autocomplete="new-password"
                    placeholder="Ulangi password"
                    required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            {{-- Actions --}}
            <x-primary-button class="w-full justify-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold tracking-wide hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800">
                Buat Akun
            </x-primary-button>
        </form>

        {{-- Login --}}
        <div class="border-t border-slate-200 pt-5 text-center">
            <p class="text-sm text-slate-500">
                Sudah punya akun?
                <a
                    href="{{ route('login') }}"
                    class="font-semibold text-indigo-600 hover:text-indigo-700 hover:underline focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 rounded">
                    Masuk di sini
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>