@extends('admin.layout')

@section('page-title', 'System Logs')

@section('content')

{{-- Filter Tombol Level Log --}}
<div class="mb-6 flex flex-wrap items-center gap-2">
    @foreach (['all','info','warning','error'] as $lvl)
    <a
        href="{{ request()->fullUrlWithQuery(['level' => $lvl]) }}"
        class="rounded-xl px-4 py-2 text-sm font-medium transition {{ (request('level', 'all') == $lvl) ? 'bg-indigo-600 text-white shadow-sm' : 'border border-gray-200 bg-white text-gray-600 hover:bg-gray-50' }}">
        {{ ucfirst($lvl) }}
    </a>
    @endforeach
</div>

{{-- Container Tabel --}}
<div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full whitespace-nowrap text-left text-sm text-gray-600">
            <thead class="border-b border-gray-100 bg-gray-50/50 text-[11px] font-semibold uppercase tracking-wider text-gray-500">
                <tr>
                    <th class="px-6 py-4">Level</th>
                    <th class="px-6 py-4">Event</th>
                    <th class="px-6 py-4">Deskripsi</th>
                    <th class="px-6 py-4">User</th>
                    <th class="px-6 py-4">Waktu</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($logs as $log)
                <tr class="transition hover:bg-gray-50/50">
                    <td class="px-6 py-4">
                        @php
                        $level = strtolower($log->level);
                        @endphp

                        @if($level == 'error')
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-rose-50 px-2 py-1 text-xs font-medium text-rose-700 ring-1 ring-inset ring-rose-600/20">
                            <span class="h-1.5 w-1.5 rounded-full bg-rose-500"></span>
                            {{ ucfirst($log->level) }}
                        </span>
                        @elseif($level == 'warning')
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-amber-50 px-2 py-1 text-xs font-medium text-amber-700 ring-1 ring-inset ring-amber-600/20">
                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                            {{ ucfirst($log->level) }}
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-sky-50 px-2 py-1 text-xs font-medium text-sky-700 ring-1 ring-inset ring-sky-600/20">
                            <span class="h-1.5 w-1.5 rounded-full bg-sky-500"></span>
                            {{ ucfirst($log->level) }}
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $log->event }}</td>
                    <td class="px-6 py-4 text-gray-600 max-w-xs truncate" title="{{ $log->description }}">{{ $log->description }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $log->user->email ?? '-' }}</td>
                    <td class="px-6 py-4 text-gray-400">{{ $log->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-400">
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