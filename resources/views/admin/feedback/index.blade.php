@extends('admin.layout')

@section('page-title', 'Feedback & Reports')

@section('content')

<style>
    :root {
        --warn: #A9781E;
        --warn-soft: #F5EBD3;
        --info: #3B6E90;
        --info-soft: #E3EEF2;
    }

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

    .pp-tag-neutral {
        display: inline-flex;
        align-items: center;
        border-radius: 0.5rem;
        background: var(--paper-soft);
        color: var(--ink-soft);
        padding: 0.15rem 0.6rem;
        font-size: 0.75rem;
        font-weight: 500;
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

    .pp-badge--warn {
        background: var(--warn-soft);
        color: var(--warn);
    }

    .pp-badge--info {
        background: var(--info-soft);
        color: var(--info);
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

    .pp-dot--warn {
        background: var(--warn);
    }

    .pp-dot--info {
        background: var(--info);
    }

    .pp-dot--neutral {
        background: var(--ink-soft);
    }

    .pp-action-link {
        color: var(--accent-ink);
        font-weight: 500;
        transition: color 0.15s ease;
    }

    .pp-action-link:hover {
        color: var(--accent);
    }
</style>

{{-- Form Filter --}}
<form method="GET" class="mb-6 flex flex-col gap-3 sm:flex-row">
    {{-- Filter Tipe --}}
    <select
        name="type"
        class="pp-field w-full border px-4 py-2 text-sm sm:w-48">
        <option value="">Semua Tipe</option>
        <option value="feedback" @selected(request('type')=='feedback' )>Feedback</option>
        <option value="report" @selected(request('type')=='report' )>Report</option>
    </select>

    {{-- Filter Status --}}
    <select
        name="status"
        class="pp-field w-full border px-4 py-2 text-sm sm:w-48">
        <option value="">Semua Status</option>
        <option value="open" @selected(request('status')=='open' )>Open</option>
        <option value="in_progress" @selected(request('status')=='in_progress' )>In Progress</option>
        <option value="resolved" @selected(request('status')=='resolved' )>Resolved</option>
        <option value="closed" @selected(request('status')=='closed' )>Closed</option>
    </select>

    {{-- Tombol Filter --}}
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
                    <th class="px-6 py-4">Tipe</th>
                    <th class="px-6 py-4">Judul</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Waktu</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($feedbacks as $fb)
                <tr>
                    <td class="px-6 py-4 font-medium" style="color: var(--ink)">{{ $fb->user->name ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <span class="pp-tag-neutral">
                            {{ ucfirst($fb->type) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 font-medium" style="color: var(--ink)">{{ $fb->title }}</td>
                    <td class="px-6 py-4">
                        {{-- Logika warna berdasarkan status feedback --}}
                        @php
                        $status = strtolower($fb->status);
                        @endphp

                        @if($status == 'resolved')
                        <span class="pp-badge pp-badge--success">
                            <span class="pp-dot pp-dot--success"></span>
                            Resolved
                        </span>
                        @elseif($status == 'in_progress')
                        <span class="pp-badge pp-badge--warn">
                            <span class="pp-dot pp-dot--warn"></span>
                            In Progress
                        </span>
                        @elseif($status == 'open')
                        <span class="pp-badge pp-badge--info">
                            <span class="pp-dot pp-dot--info"></span>
                            Open
                        </span>
                        @else
                        <span class="pp-badge pp-badge--neutral">
                            <span class="pp-dot pp-dot--neutral"></span>
                            {{ ucfirst($fb->status) }}
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4" style="color: var(--ink-soft)">{{ $fb->created_at->diffForHumans() }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.feedback.show', $fb) }}" class="pp-action-link">
                            Lihat
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center" style="color: var(--ink-soft)">
                        Belum ada data feedback atau laporan yang masuk.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
@if($feedbacks->hasPages())
<div class="mt-6">
    {{ $feedbacks->links() }}
</div>
@endif

@endsection