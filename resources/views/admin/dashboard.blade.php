@extends('admin.layout')

@section('page-title', 'Dashboard')

@section('content')

<style>
    .pp-stat {
        background: #fff;
        border: 1px solid var(--line);
        border-left-width: 3px;
        border-left-color: var(--accent);
        border-radius: 1rem;
        padding: 1.5rem;
        transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }

    .pp-stat:hover {
        box-shadow: 0 8px 20px -8px rgba(35, 38, 43, 0.12);
    }

    .pp-stat--clay {
        border-left-color: var(--clay);
    }

    .pp-stat-label {
        font-size: 0.8125rem;
        font-weight: 500;
        color: var(--ink-soft);
    }

    .pp-stat-value {
        margin-top: 0.25rem;
        font-family: 'Lora', Georgia, serif;
        font-size: 1.875rem;
        font-weight: 600;
        letter-spacing: -0.01em;
        color: var(--ink);
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

    .pp-view-all {
        color: var(--accent-ink);
        font-weight: 500;
        font-size: 0.875rem;
    }

    .pp-view-all:hover {
        color: var(--accent);
    }
</style>

{{-- Bagian Statistik --}}
<div class="mb-5">
    <h2 class="pp-serif text-base font-semibold" style="color: var(--ink)">Overview Statistik</h2>
</div>

<div class="mb-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

    <div class="pp-stat">
        <div class="pp-stat-label">Total Users</div>
        <div class="pp-stat-value">{{ $stats['total_users'] }}</div>
    </div>

    <div class="pp-stat">
        <div class="pp-stat-label">Total Lamaran</div>
        <div class="pp-stat-value">{{ $stats['total_applications'] }}</div>
    </div>

    <div class="pp-stat">
        <div class="pp-stat-label">Lamaran Hari Ini</div>
        <div class="pp-stat-value">{{ $stats['applications_today'] }}</div>
    </div>

    <div class="pp-stat">
        <div class="pp-stat-label">Email Berhasil</div>
        <div class="pp-stat-value" style="color: var(--accent)">{{ $stats['emails_success'] }}</div>
    </div>

    <div class="pp-stat pp-stat--clay">
        <div class="pp-stat-label">Email Gagal</div>
        <div class="pp-stat-value" style="color: var(--danger)">{{ $stats['emails_failed'] }}</div>
    </div>

    <div class="pp-stat">
        <div class="pp-stat-label">Gmail Terhubung</div>
        <div class="pp-stat-value">{{ $stats['gmail_connected'] }}</div>
    </div>

    <div class="pp-stat pp-stat--clay">
        <div class="pp-stat-label">Total Ukuran Berkas</div>
        <div class="pp-stat-value" style="color: var(--clay)">
            {{ $stats['total_storage_size'] }}
        </div>
    </div>

    <div class="pp-stat pp-stat--clay">
        <div class="pp-stat-label">Total Berkas Tersimpan</div>
        <div class="pp-stat-value" style="color: var(--clay)">
            {{ $stats['total_files'] }} <span class="text-base font-normal" style="color: var(--ink-soft)">File</span>
        </div>
    </div>

</div>


{{-- Bagian Tabel Aktivitas --}}
<div class="mb-5 flex items-center justify-between">
    <h2 class="pp-serif text-base font-semibold" style="color: var(--ink)">Aktivitas Terbaru</h2>
    <a href="{{ route('admin.applications.index') }}" class="pp-view-all">Lihat Semua &rarr;</a>
</div>

<div class="pp-table-card">
    <div class="overflow-x-auto">
        <table class="pp-table w-full whitespace-nowrap text-left text-sm">
            <thead>
                <tr>
                    <th class="px-6 py-4">Perusahaan</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Waktu</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentLogs as $log)
                <tr>
                    <td class="px-6 py-4 font-medium" style="color: var(--ink)">{{ $log->nama_pt }}</td>
                    <td class="px-6 py-4">
                        @if(strtolower($log->status) == 'berhasil' || strtolower($log->status) == 'success')
                        <span class="pp-badge pp-badge--success">
                            <span class="pp-dot pp-dot--success"></span>
                            {{ $log->status }}
                        </span>
                        @elseif(strtolower($log->status) == 'gagal' || strtolower($log->status) == 'failed')
                        <span class="pp-badge pp-badge--danger">
                            <span class="pp-dot pp-dot--danger"></span>
                            {{ $log->status }}
                        </span>
                        @else
                        <span class="pp-badge pp-badge--neutral">
                            <span class="pp-dot pp-dot--neutral"></span>
                            {{ $log->status }}
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4" style="color: var(--ink-soft)">{{ $log->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-12 text-center" style="color: var(--ink-soft)">
                        Belum ada aktivitas terbaru.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection