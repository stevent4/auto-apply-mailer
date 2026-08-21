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

                <x-text-input
                    id="password"
                    class="mt-1.5 block w-full rounded-xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Masukkan password" />

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
</x-guest-layout>