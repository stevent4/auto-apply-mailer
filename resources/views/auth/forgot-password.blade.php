<x-guest-layout title="Lupa Password — Auto Apply Mailer">

    {{-- =========================================================
        FONT & TOKEN SISTEM HALAMAN INI
        Disamakan dengan halaman Login, Register, Reset Password,
        Template, Kebijakan Privasi, dan Ketentuan Layanan.
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

        .pp-badge {
            background: var(--accent);
            box-shadow: 0 10px 25px -5px rgba(47, 111, 78, 0.35);
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
                <div class="pp-badge mx-auto flex h-16 w-16 items-center justify-center rounded-2xl">
                    <svg
                        class="h-8 w-8 text-white"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        aria-hidden="true">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 7.5A2.5 2.5 0 0 1 5.5 5h13A2.5 2.5 0 0 1 21 7.5v9a2.5 2.5 0 0 1-2.5 2.5h-13A2.5 2.5 0 0 1 3 16.5v-9Z" />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m4 7 7.1 5.1a1.5 1.5 0 0 0 1.8 0L20 7" />
                    </svg>
                </div>

                <h1 class="pp-serif mt-5 text-2xl font-semibold" style="color: var(--ink)">
                    Lupa Password?
                </h1>

                <p class="mt-2 text-sm leading-6" style="color: var(--ink-soft)">
                    Jangan khawatir. Masukkan email akun Anda dan kami akan mengirimkan
                    link untuk membuat password baru.
                </p>
            </div>

            {{-- Session Status --}}
            <x-auth-session-status
                class="mb-4"
                :status="session('status')" />

            {{-- Forgot Password Form --}}
            <div class="pp-compose">
                <form
                    method="POST"
                    action="{{ route('password.email') }}"
                    class="space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <x-input-label
                            for="email"
                            value="Email"
                            class="pp-label" />

                        <x-text-input
                            id="email"
                            name="email"
                            type="email"
                            class="pp-field mt-1.5 block w-full"
                            :value="old('email')"
                            autocomplete="email"
                            placeholder="nama@email.com"
                            required
                            autofocus />

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2" />
                    </div>

                    {{-- Submit --}}
                    <x-primary-button class="pp-btn-primary w-full justify-center px-5 py-3 text-sm font-semibold">
                        Kirim Link Reset Password
                    </x-primary-button>
                </form>
            </div>

            {{-- Back to Login --}}
            <div class="border-t pt-5 text-center" style="border-color: var(--line)">
                <p class="text-sm" style="color: var(--ink-soft)">
                    Ingat password Anda?

                    <a
                        href="{{ route('login') }}"
                        class="pp-link font-semibold hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 rounded" style="--tw-ring-color: var(--accent)">
                        Kembali ke login
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>