@extends('admin.layout')

@section('page-title', 'Detail Pengguna')

@section('content')

{{-- Navigasi Kembali --}}
<div class="mb-6">
    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 transition-colors hover:text-gray-900">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Daftar Users
    </a>
</div>

{{-- Profil User (Card) --}}
<div class="mb-8 flex items-center gap-5 rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
    {{-- Avatar Inisial --}}
    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-indigo-50 text-xl font-bold text-indigo-700">
        {{ strtoupper(substr($user->name, 0, 1)) }}
    </div>

    <div>
        <h1 class="text-xl font-semibold text-gray-800">{{ $user->name }}</h1>
        <p class="text-sm font-medium text-gray-500">{{ $user->email }}</p>

        <div class="mt-2 flex items-center gap-1.5 text-xs font-medium text-gray-400">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Bergabung sejak {{ $user->created_at->format('d M Y') }}
        </div>
    </div>
</div>

{{-- Judul Tabel --}}
<div class="mb-4">
    <h2 class="text-base font-semibold text-gray-700">Riwayat Lamaran</h2>
</div>

{{-- Tabel Riwayat --}}
<div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full whitespace-nowrap text-left text-sm text-gray-600">
            <thead class="border-b border-gray-100 bg-gray-50/50 text-[11px] font-semibold uppercase tracking-wider text-gray-500">
                <tr>
                    <th class="px-6 py-4">Perusahaan</th>
                    <th class="px-6 py-4">Posisi</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Waktu</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($user->applicationHistories as $app)
                <tr class="transition hover:bg-gray-50/50">
                    <td class="px-6 py-4 font-medium text-gray-700">{{ $app->nama_pt }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $app->posisi }}</td>
                    <td class="px-6 py-4">
                        {{-- Logika warna status --}}
                        @if(strtolower($app->status) == 'berhasil' || strtolower($app->status) == 'success' || strtolower($app->status) == 'sent')
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-emerald-50 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            {{ $app->status }}
                        </span>
                        @elseif(strtolower($app->status) == 'gagal' || strtolower($app->status) == 'failed')
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-rose-50 px-2 py-1 text-xs font-medium text-rose-700 ring-1 ring-inset ring-rose-600/20">
                            <span class="h-1.5 w-1.5 rounded-full bg-rose-500"></span>
                            {{ $app->status }}
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/20">
                            <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>
                            {{ $app->status }}
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-400">{{ $app->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-400">
                        Pengguna ini belum memiliki riwayat lamaran.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection