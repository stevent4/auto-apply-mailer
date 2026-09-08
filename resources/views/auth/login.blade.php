<x-guest-layout title="Login — Auto Apply Mailer">

    {{-- =========================================================
        FONT & TOKEN SISTEM HALAMAN INI
        Disamakan dengan halaman Template, Kebijakan Privasi,
        dan Ketentuan Layanan: Lora untuk judul, Inter untuk UI.
    ========================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;0,600;1,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .pp-page {
            --paper: #FAF7F1;
            --paper-soft: #F2EDE1;
            --ink: #23262B;
            --ink-soft: #83796C;
            --line: #E4DECE;
            --accent: #2F6F4E;
            --accent-ink: #1F4D36;
            --accent-soft: #E4EEE6;
            font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
        }

        .pp-serif {
            font-family: 'Lora', Georgia, serif;
        }

        .pp-page ::selection {
            background: var(--accent-soft);
        }

        /* Kartu form — kesan kertas surat, garis putus di atas, sama seperti tpl-compose */
        .pp-compose {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 1rem;
            padding: 2rem;
            position: relative;
        }

        .pp-compose::before {
            content: '';
            position: absolute;
            top: -1px;
            left: 1.5rem;
            right: 1.5rem;
            height: 1px;
            background-image: repeating-linear-gradient(90deg, var(--line) 0 6px, transparent 6px 12px);
        }

        .pp-label {
            font-size: 0.8125rem;
            font-weight: 500;
            color: var(--ink-soft) !important;
        }

        .pp-field {
            border-color: var(--line) !important;
            background: var(--paper) !important;
            border-radius: 0.65rem !important;
            padding: 0.7rem 0.95rem !important;
            color: var(--ink) !important;
            transition: border-color 0.15s ease, background 0.15s ease;
        }

        .pp-field:focus {
            border-color: var(--accent) !important;
            background: #fff !important;
            box-shadow: 0 0 0 1px var(--accent) !important;
        }

        .pp-link {
            color: var(--accent-ink) !important;
        }

        .pp-link:hover {
            color: var(--accent) !important;
        }

        .pp-toggle-btn {
            color: var(--ink-soft) !important;
        }

        .pp-toggle-btn:hover {
            color: var(--ink) !important;
        }

        .pp-btn-primary {
            background: var(--accent) !important;
            border-radius: 0.65rem !important;
            letter-spacing: 0.01em;
        }

        .pp-btn-primary:hover,
        .pp-btn-primary:focus {
            background: var(--accent-ink) !important;
        }
    </style>

    <div class="pp-page">
        <div class="space-y-6">

            {{-- Branding --}}
            <div class="text-center">
                <div class="mx-auto flex h-20 w-20 items-center justify-center">
                    <img
                        src="{{ asset('favicon.png') }}"
                        alt="Logo Auto Apply Mailer"
                        class="h-20 w-20 object-contain">
                </div>

                <h1 class="pp-serif mt-5 text-2xl font-semibold" style="color: var(--ink)">
                    Auto Apply Mailer
                </h1>

                <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                    Kelola profil, berkas, dan pengiriman lamaran kerja dalam satu tempat.
                </p>
            </div>

            {{-- Session Status --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            {{-- Login Form --}}
            <div class="pp-compose">
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <x-input-label
                            for="email"
                            value="Email"
                            class="pp-label" />

                        <x-text-input
                            id="email"
                            class="pp-field mt-1.5 block w-full"
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
                                class="pp-label" />

                            @if (Route::has('password.request'))
                            <a
                                href="{{ route('password.request') }}"
                                class="pp-link text-sm font-medium hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 rounded" style="--tw-ring-color: var(--accent)">
                                Lupa password?
                            </a>
                            @endif
                        </div>

                        <div class="relative mt-1.5">
                            <x-text-input
                                id="password"
                                class="pp-field block w-full pr-12"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Masukkan password" />

                            <button
                                type="button"
                                onclick="togglePassword('password', this)"
                                class="pp-toggle-btn absolute inset-y-0 right-0 flex items-center px-4 focus:outline-none focus:ring-2 focus:ring-inset rounded-r-xl" style="--tw-ring-color: var(--accent)"
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
                    <x-primary-button class="pp-btn-primary w-full justify-center px-5 py-3 text-sm font-semibold">
                        Masuk ke Akun
                    </x-primary-button>
                </form>
            </div>

            {{-- Register --}}
            @if (Route::has('register'))
            <div class="border-t pt-5 text-center" style="border-color: var(--line)">
                <p class="text-sm" style="color: var(--ink-soft)">
                    Belum punya akun?
                    <a
                        href="{{ route('register') }}"
                        class="pp-link font-semibold hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 rounded" style="--tw-ring-color: var(--accent)">
                        Daftar sekarang
                    </a>
                </p>
            </div>
            @endif
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