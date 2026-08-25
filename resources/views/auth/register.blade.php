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
                <x-input-label
                    for="password"
                    value="Password"
                    class="text-sm font-medium text-slate-700" />

                <div class="relative mt-1.5">
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="block w-full rounded-xl border-slate-300 bg-white px-4 py-3 pr-12 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        autocomplete="new-password"
                        placeholder="Buat password"
                        required />

                    <button
                        type="button"
                        onclick="togglePassword('password', this)"
                        class="absolute inset-y-0 right-0 flex items-center px-4 text-slate-400 hover:text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-inset rounded-r-xl"
                        aria-label="Tampilkan password">

                        {{-- Eye --}}
                        <svg
                            class="eye-open h-5 w-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>

                        {{-- Eye Off --}}
                        <svg
                            class="eye-closed hidden h-5 w-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 3l18 18" />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M10.584 10.587a2 2 0 002.829 2.829" />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9.878 4.879A9.953 9.953 0 0112 4.5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-1.61 0-3.13-.397-4.46-1.098" />
                        </svg>

                    </button>
                </div>

                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2" />
            </div>

            {{-- Konfirmasi Password --}}
            <div>
                <x-input-label
                    for="password_confirmation"
                    value="Konfirmasi Password"
                    class="text-sm font-medium text-slate-700" />

                <div class="relative mt-1.5">
                    <x-text-input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        class="block w-full rounded-xl border-slate-300 bg-white px-4 py-3 pr-12 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        autocomplete="new-password"
                        placeholder="Ulangi password"
                        required />

                    <button
                        type="button"
                        onclick="togglePassword('password_confirmation', this)"
                        class="absolute inset-y-0 right-0 flex items-center px-4 text-slate-400 hover:text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-inset rounded-r-xl"
                        aria-label="Tampilkan password">

                        {{-- Eye --}}
                        <svg
                            class="eye-open h-5 w-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>

                        {{-- Eye Off --}}
                        <svg
                            class="eye-closed hidden h-5 w-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 3l18 18" />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M10.584 10.587a2 2 0 002.829 2.829" />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9.878 4.879A9.953 9.953 0 0112 4.5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-1.61 0-3.13-.397-4.46-1.098" />
                        </svg>

                    </button>
                </div>

                <x-input-error
                    :messages="$errors->get('password_confirmation')"
                    class="mt-2" />
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

    <script>
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            const eyeOpen = button.querySelector('.eye-open');
            const eyeClosed = button.querySelector('.eye-closed');

            if (input.type === 'password') {
                input.type = 'text';

                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');

                button.setAttribute('aria-label', 'Sembunyikan password');
            } else {
                input.type = 'password';

                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');

                button.setAttribute('aria-label', 'Tampilkan password');
            }
        }
    </script>

</x-guest-layout>