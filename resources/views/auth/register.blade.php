<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900">
                Daftar Auto Apply Mailer
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Buat akun sekali, lalu gunakan untuk mengirim lamaran dari Gmail kamu.
            </p>
        </div>

        {{-- Nama --}}
        <div>
            <x-input-label for="name" value="Nama Lengkap" />
            <x-text-input
                id="name"
                name="name"
                type="text"
                class="block w-full mt-1"
                :value="old('name')"
                required
                autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input
                id="email"
                name="email"
                type="email"
                class="block w-full mt-1"
                :value="old('email')"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Tempat Lahir --}}
        <div>
            <x-input-label for="birth_place" value="Tempat Lahir" />
            <x-text-input
                id="birth_place"
                name="birth_place"
                type="text"
                class="block w-full mt-1"
                :value="old('birth_place')"
                required />
            <x-input-error :messages="$errors->get('birth_place')" class="mt-2" />
        </div>

        {{-- Tanggal Lahir --}}
        <div>
            <x-input-label for="birth_date" value="Tanggal Lahir" />
            <x-text-input
                id="birth_date"
                name="birth_date"
                type="date"
                class="block w-full mt-1"
                :value="old('birth_date')"
                required />
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
        </div>

        {{-- Pendidikan --}}
        <div>
            <x-input-label for="education" value="Pendidikan Terakhir" />
            <x-text-input
                id="education"
                name="education"
                type="text"
                class="block w-full mt-1"
                :value="old('education')"
                placeholder="S1 Teknik Informatika"
                required />
            <x-input-error :messages="$errors->get('education')" class="mt-2" />
        </div>

        {{-- No HP --}}
        <div>
            <x-input-label for="phone" value="Nomor HP" />
            <x-text-input
                id="phone"
                name="phone"
                type="text"
                class="block w-full mt-1"
                :value="old('phone')"
                placeholder="081234567890"
                required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        {{-- Alamat --}}
        <div>
            <x-input-label for="address" value="Alamat" />
            <textarea
                id="address"
                name="address"
                rows="3"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                required>{{ old('address') }}</textarea>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        {{-- Password --}}
        <div>
            <x-input-label for="password" value="Password" />
            <x-text-input
                id="password"
                name="password"
                type="password"
                class="block w-full mt-1"
                required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Konfirmasi Password --}}
        <div>
            <x-input-label for="password_confirmation" value="Konfirmasi Password" />
            <x-text-input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                class="block w-full mt-1"
                required />
        </div>

        <div class="flex items-center justify-between pt-4">
            <a
                href="{{ route('login') }}"
                class="text-sm text-indigo-600 hover:underline">
                Sudah punya akun?
            </a>

            <x-primary-button>
                Daftar
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>