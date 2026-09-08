@extends('admin.layout')

@section('page-title', 'Detail Pengguna')

@section('content')

<style>
    .pp-back-link {
        color: var(--ink-soft);
        transition: color 0.15s ease;
    }

    .pp-back-link:hover {
        color: var(--ink);
    }

    .pp-profile-card {
        background: #fff;
        border: 1px solid var(--line);
        border-left-width: 3px;
        border-left-color: var(--accent);
        border-radius: 1rem;
        padding: 1.5rem;
    }

    .pp-avatar-lg {
        background: var(--accent-soft);
        color: var(--accent-ink);
    }

    .pp-meta-line {
        color: var(--ink-soft);
    }

    .pp-table-card {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 1rem;
        overflow: hidden;
    }

    .pp-table thead {
        background: var(--paper-soft);
        border-bottom: 1px solid var(--line);
    }

    .pp-table thead th {
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--ink-soft);
    }

    .pp-table tbody tr {
        border-bottom: 1px solid var(--paper-soft);
        transition: background 0.15s ease;
    }

    .pp-table tbody tr:hover {
        background: var(--paper-soft);
    }

    .pp-table tbody td {
        color: var(--ink-soft);
    }

    .pp-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        border-radius: 0.5rem;
        padding: 0.25rem 0.6rem;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .pp-badge--success {
        background: var(--accent-soft);
        color: var(--accent-ink);
    }

    .pp-badge--danger {
        background: var(--danger-soft);
        color: var(--danger);
    }

    .pp-badge--neutral {
        background: var(--paper-soft);
        color: var(--ink-soft);
    }

    .pp-dot {
        height: 0.375rem;
        width: 0.375rem;
        border-radius: 9999px;
    }

    .pp-dot--success {
        background: var(--accent);
    }

    .pp-dot--danger {
        background: var(--danger);
    }

    .pp-dot--neutral {
        background: var(--ink-soft);
    }
</style>

{{-- Navigasi Kembali --}}
<div class="mb-6">
    <a href="{{ route('admin.users.index') }}" class="pp-back-link inline-flex items-center gap-2 text-sm font-medium">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Daftar Users
    </a>
</div>

{{-- Profil User (Card) --}}
<div class="pp-profile-card mb-8 flex items-center gap-5">
    {{-- Avatar Inisial --}}
    <div class="pp-avatar-lg flex h-16 w-16 shrink-0 items-center justify-center rounded-full text-xl font-bold">
        {{ strtoupper(substr($user->name, 0, 1)) }}
    </div>

    <div>
        <h1 class="pp-serif text-xl font-semibold" style="color: var(--ink)">{{ $user->name }}</h1>
        <p class="text-sm font-medium" style="color: var(--ink-soft)">{{ $user->email }}</p>

        <div class="pp-meta-line mt-2 flex items-center gap-1.5 text-xs font-medium">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Bergabung sejak {{ $user->created_at->format('d M Y') }}
        </div>
    </div>
</div>

{{-- Judul Tabel --}}
<div class="mb-4">
    <h2 class="pp-serif text-base font-semibold" style="color: var(--ink)">Riwayat Lamaran</h2>
</div>

{{-- Tabel Riwayat --}}
<div class="pp-table-card">
    <div class="overflow-x-auto">
        <table class="pp-table w-full whitespace-nowrap text-left text-sm">
            <thead>
                <tr>
                    <th class="px-6 py-4">Perusahaan</th>
                    <th class="px-6 py-4">Posisi</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Waktu</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user->applicationHistories as $app)
                <tr>
                    <td class="px-6 py-4 font-medium" style="color: var(--ink)">{{ $app->nama_pt }}</td>
                    <td class="px-6 py-4">{{ $app->posisi }}</td>
                    <td class="px-6 py-4">
                        {{-- Logika warna status --}}
                        @if(strtolower($app->status) == 'berhasil' || strtolower($app->status) == 'success' || strtolower($app->status) == 'sent')
                        <span class="pp-badge pp-badge--success">
                            <span class="pp-dot pp-dot--success"></span>
                            {{ $app->status }}
                        </span>
                        @elseif(strtolower($app->status) == 'gagal' || strtolower($app->status) == 'failed')
                        <span class="pp-badge pp-badge--danger">
                            <span class="pp-dot pp-dot--danger"></span>
                            {{ $app->status }}
                        </span>
                        @else
                        <span class="pp-badge pp-badge--neutral">
                            <span class="pp-dot pp-dot--neutral"></span>
                            {{ $app->status }}
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4" style="color: var(--ink-soft)">{{ $app->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center" style="color: var(--ink-soft)">
                        Pengguna ini belum memiliki riwayat lamaran.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection