<x-guest-layout title="Login — Auto Apply Mailer">
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
                Auto Apply Mailer
            </h1>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Kelola profil, berkas, dan pengiriman lamaran kerja dalam satu tempat.
            </p>
        </div>

        {{-- Session Status --}}
        <x-auth-session-status class="mb-4" :status="session('status')" />

        {{-- Login Form --}}
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            {{-- Email --}}
            <div>
                <x-input-label
                    for="email"
                    value="Email"
                    class="text-sm font-medium text-slate-700" />

                <x-text-input
                    id="email"
                    class="mt-1.5 block w-full rounded-xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="nama@email.com" />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Password --}}
            <div>
                <div class="flex items-center justify-between">
                    <x-input-label
                        for="password"
                        value="Password"
                        class="text-sm font-medium text-slate-700" />

                    @if (Route::has('password.request'))
                    <a
                        href="{{ route('password.request') }}"
                        class="text-sm font-medium text-indigo-600 hover:text-indigo-700 hover:underline focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 rounded">
                        Lupa password?
                    </a>
                    @endif
                </div>

                <div class="relative mt-1.5">
                    <x-text-input
                        id="password"
                        class="block w-full rounded-xl border-slate-300 bg-white px-4 py-3 pr-12 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Masukkan password" />

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
                                d="M9.878 4.879A9.953 9.953 0 0112 4.5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411M6.228 6.228A10.05 10.05 0 002.458 12C3.732 16.057 7.523 19 12 19c1.61 0 3.13-.397 4.46-1.098" />
                        </svg>
                    </button>
                </div>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- Login Button --}}
            <x-primary-button class="w-full justify-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold tracking-wide hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800">
                Masuk ke Akun
            </x-primary-button>
        </form>

        {{-- Register --}}
        @if (Route::has('register'))
        <div class="border-t border-slate-200 pt-5 text-center">
            <p class="text-sm text-slate-500">
                Belum punya akun?
                <a
                    href="{{ route('register') }}"
                    class="font-semibold text-indigo-600 hover:text-indigo-700 hover:underline focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 rounded">
                    Daftar sekarang
                </a>
            </p>
        </div>
        @endif
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