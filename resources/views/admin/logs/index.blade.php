@extends('admin.layout')

@section('page-title', 'System Logs')

@section('content')

<style>
    :root {
        --warn: #A9781E;
        --warn-soft: #F5EBD3;
        --info: #3B6E90;
        --info-soft: #E3EEF2;
    }

    .pp-level-tab {
        border-radius: 0.75rem;
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        font-weight: 500;
        transition: background 0.15s ease, color 0.15s ease;
        border: 1px solid var(--line);
        background: #fff;
        color: var(--ink-soft);
    }

    .pp-level-tab:hover {
        background: var(--paper-soft);
    }

    .pp-level-tab.is-active {
        background: var(--accent);
        color: #fff;
        border-color: var(--accent);
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

    .pp-badge--danger {
        background: var(--danger-soft);
        color: var(--danger);
    }

    .pp-badge--warn {
        background: var(--warn-soft);
        color: var(--warn);
    }

    .pp-badge--info {
        background: var(--info-soft);
        color: var(--info);
    }

    .pp-dot {
        height: 0.375rem;
        width: 0.375rem;
        border-radius: 9999px;
    }

    .pp-dot--danger {
        background: var(--danger);
    }

    .pp-dot--warn {
        background: var(--warn);
    }

    .pp-dot--info {
        background: var(--info);
    }
</style>

{{-- Filter Tombol Level Log --}}
<div class="mb-6 flex flex-wrap items-center gap-2">
    @foreach (['all','info','warning','error'] as $lvl)
    <a
        href="{{ request()->fullUrlWithQuery(['level' => $lvl]) }}"
        class="pp-level-tab {{ (request('level', 'all') == $lvl) ? 'is-active' : '' }}">
        {{ ucfirst($lvl) }}
    </a>
    @endforeach
</div>

{{-- Container Tabel --}}
<div class="pp-table-card">
    <div class="overflow-x-auto">
        <table class="pp-table w-full whitespace-nowrap text-left text-sm">
            <thead>
                <tr>
                    <th class="px-6 py-4">Level</th>
                    <th class="px-6 py-4">Event</th>
                    <th class="px-6 py-4">Deskripsi</th>
                    <th class="px-6 py-4">User</th>
                    <th class="px-6 py-4">Waktu</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($logs as $log)
                <tr>
                    <td class="px-6 py-4">
                        @php
                        $level = strtolower($log->level);
                        @endphp

                        @if($level == 'error')
                        <span class="pp-badge pp-badge--danger">
                            <span class="pp-dot pp-dot--danger"></span>
                            {{ ucfirst($log->level) }}
                        </span>
                        @elseif($level == 'warning')
                        <span class="pp-badge pp-badge--warn">
                            <span class="pp-dot pp-dot--warn"></span>
                            {{ ucfirst($log->level) }}
                        </span>
                        @else
                        <span class="pp-badge pp-badge--info">
                            <span class="pp-dot pp-dot--info"></span>
                            {{ ucfirst($log->level) }}
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium" style="color: var(--ink)">{{ $log->event }}</td>
                    <td class="px-6 py-4 max-w-xs truncate" title="{{ $log->description }}">{{ $log->description }}</td>
                    <td class="px-6 py-4">{{ $log->user->email ?? '-' }}</td>
                    <td class="px-6 py-4" style="color: var(--ink-soft)">{{ $log->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center" style="color: var(--ink-soft)">
                        Belum ada system log yang tercatat.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
@if($logs->hasPages())
<div class="mt-6">
    {{ $logs->links() }}
</div>
@endif

@endsection