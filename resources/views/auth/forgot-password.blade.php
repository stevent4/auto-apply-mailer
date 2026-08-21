<x-guest-layout title="Lupa Password — Auto Apply Mailer">
    <div class="space-y-6">
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
                Lupa Password?
            </h1>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Jangan khawatir. Masukkan email akun Anda dan kami akan mengirimkan
                link untuk membuat password baru.
            </p>
        </div>

        {{-- Session Status --}}
        <x-auth-session-status
            class="mb-4"
            :status="session('status')"
        />

        {{-- Forgot Password Form --}}
        <form
            method="POST"
            action="{{ route('password.email') }}"
            class="space-y-5"
        >
            @csrf

            {{-- Email --}}
            <div>
                <x-input-label
                    for="email"
                    value="Email"
                    class="text-sm font-medium text-slate-700"
                />

                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    class="mt-1.5 block w-full rounded-xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    :value="old('email')"
                    autocomplete="email"
                    placeholder="nama@email.com"
                    required
                    autofocus
                />

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2"
                />
            </div>

            {{-- Submit --}}
            <x-primary-button class="w-full justify-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold tracking-wide hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800">
                Kirim Link Reset Password
            </x-primary-button>
        </form>

        {{-- Back to Login --}}
        <div class="border-t border-slate-200 pt-5 text-center">
            <p class="text-sm text-slate-500">
                Ingat password Anda?

                <a
                    href="{{ route('login') }}"
                    class="font-semibold text-indigo-600 hover:text-indigo-700 hover:underline focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 rounded"
                >
                    Kembali ke login
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>