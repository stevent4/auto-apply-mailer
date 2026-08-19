<x-guest-layout>
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
                        d="M12 15.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06-1.42 1.42-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V20h-2v-.58a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06-1.42-1.42.06-.06A1.65 1.65 0 0 0 9.6 15a1.65 1.65 0 0 0-1.51-1H7v-2h.58a1.65 1.65 0 0 0 1.51-1 1.65 1.65 0 0 0-.33-1.82l-.06-.06 1.42-1.42.06.06a1.65 1.65 0 0 0 1.82.33 1.65 1.65 0 0 0 1-1.51V6h2v.58a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06 1.42 1.42-.06.06A1.65 1.65 0 0 0 19.4 11c.18.6.73 1 1.36 1H21v2h-.24c-.63 0-1.18.4-1.36 1Z"
                    />
                </svg>
            </div>

            <h1 class="mt-5 text-2xl font-bold tracking-tight text-slate-900">
                Buat Password Baru
            </h1>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Masukkan password baru untuk akun Anda. Gunakan password yang
                kuat dan mudah Anda ingat.
            </p>
        </div>

        {{-- Reset Password Form --}}
        <form
            method="POST"
            action="{{ route('password.store') }}"
            class="space-y-5"
        >
            @csrf

            {{-- Token --}}
            <input
                type="hidden"
                name="token"
                value="{{ $request->route('token') }}"
            >

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
                    class="mt-1.5 block w-full rounded-xl border-slate-300 bg-slate-50 px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    :value="old('email', $request->email)"
                    autocomplete="username"
                    placeholder="nama@email.com"
                    required
                    autofocus
                />

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2"
                />
            </div>

            {{-- Password --}}
            <div>
                <x-input-label
                    for="password"
                    value="Password Baru"
                    class="text-sm font-medium text-slate-700"
                />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1.5 block w-full rounded-xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    autocomplete="new-password"
                    placeholder="Masukkan password baru"
                    required
                />

                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2"
                />
            </div>

            {{-- Password Confirmation --}}
            <div>
                <x-input-label
                    for="password_confirmation"
                    value="Konfirmasi Password"
                    class="text-sm font-medium text-slate-700"
                />

                <x-text-input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    class="mt-1.5 block w-full rounded-xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    autocomplete="new-password"
                    placeholder="Ulangi password baru"
                    required
                />

                <x-input-error
                    :messages="$errors->get('password_confirmation')"
                    class="mt-2"
                />
            </div>

            {{-- Submit --}}
            <x-primary-button class="w-full justify-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold tracking-wide hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800">
                Simpan Password Baru
            </x-primary-button>
        </form>

        {{-- Back to Login --}}
        <div class="border-t border-slate-200 pt-5 text-center">
            <p class="text-sm text-slate-500">
                Sudah ingat password?

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