@extends('admin.layout')

@section('page-title', 'Management Applications')

@section('content')

<style>
    .pp-field {
        border-color: var(--line) !important;
        background: #fff !important;
        color: var(--ink) !important;
        border-radius: 0.75rem !important;
    }

    .pp-field:focus {
        border-color: var(--accent) !important;
        box-shadow: 0 0 0 1px var(--accent) !important;
        outline: none;
    }

    .pp-field::placeholder {
        color: var(--ink-soft);
    }

    .pp-search-icon {
        color: var(--ink-soft);
    }

    .pp-btn-filter {
        background: var(--accent);
        color: #fff;
        border-radius: 0.75rem;
        transition: background 0.15s ease;
    }

    .pp-btn-filter:hover,
    .pp-btn-filter:focus {
        background: var(--accent-ink);
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

{{-- Form Filter --}}
<form method="GET" class="mb-6 flex flex-col gap-3 sm:flex-row">
    {{-- Input Pencarian --}}
    <div class="relative w-full sm:w-72">
        <div class="pp-search-icon pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari perusahaan atau posisi..."
            class="pp-field w-full border py-2 pl-9 pr-4 text-sm">
    </div>

    {{-- Filter Dropdown --}}
    <select
        name="status"
        class="pp-field w-full border px-4 py-2 text-sm sm:w-40">
        <option value="">Semua Status</option>
        <option value="success" @selected(request('status')=='success' )>Success</option>
        <option value="failed" @selected(request('status')=='failed' )>Failed</option>
    </select>

    {{-- Tombol Submit --}}
    <button
        type="submit"
        class="pp-btn-filter inline-flex items-center justify-center gap-2 px-5 py-2 text-sm font-medium">
        Filter
    </button>
</form>

{{-- Container Tabel --}}
<div class="pp-table-card">
    <div class="overflow-x-auto">
        <table class="pp-table w-full whitespace-nowrap text-left text-sm">
            <thead>
                <tr>
                    <th class="px-6 py-4">User</th>
                    <th class="px-6 py-4">Perusahaan</th>
                    <th class="px-6 py-4">Posisi</th>
                    <th class="px-6 py-4">Email HRD</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Waktu</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($applications as $app)
                <tr>
                    <td class="px-6 py-4 font-medium" style="color: var(--ink)">{{ $app->user->name ?? '-' }}</td>
                    <td class="px-6 py-4 font-medium" style="color: var(--ink)">{{ $app->nama_pt }}</td>
                    <td class="px-6 py-4">{{ $app->posisi }}</td>
                    <td class="px-6 py-4">{{ $app->email_hrd }}</td>
                    <td class="px-6 py-4">
                        {{-- Logika warna status --}}
                        @if(strtolower($app->status) == 'success' || strtolower($app->status) == 'berhasil')
                        <span class="pp-badge pp-badge--success">
                            <span class="pp-dot pp-dot--success"></span>
                            {{ $app->status }}
                        </span>
                        @elseif(strtolower($app->status) == 'failed' || strtolower($app->status) == 'gagal')
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
                    <td colspan="6" class="px-6 py-12 text-center" style="color: var(--ink-soft)">
                        Belum ada data lamaran yang ditemukan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
@if($applications->hasPages())
<div class="mt-6">
    {{ $applications->links() }}
</div>
@endif

@endsection