@extends('admin.layout')

@section('page-title', 'Feedback & Reports')

@section('content')

{{-- Form Filter --}}
<form method="GET" class="mb-6 flex flex-col gap-3 sm:flex-row">
    {{-- Filter Tipe --}}
    <select
        name="type"
        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm text-gray-700 outline-none transition focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 sm:w-48">
        <option value="">Semua Tipe</option>
        <option value="feedback" @selected(request('type')=='feedback' )>Feedback</option>
        <option value="report" @selected(request('type')=='report' )>Report</option>
    </select>

    {{-- Filter Status --}}
    <select
        name="status"
        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm text-gray-700 outline-none transition focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 sm:w-48">
        <option value="">Semua Status</option>
        <option value="open" @selected(request('status')=='open' )>Open</option>
        <option value="in_progress" @selected(request('status')=='in_progress' )>In Progress</option>
        <option value="resolved" @selected(request('status')=='resolved' )>Resolved</option>
        <option value="closed" @selected(request('status')=='closed' )>Closed</option>
    </select>

    {{-- Tombol Filter --}}
    <button
        type="submit"
        class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-2 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1">
        Filter
    </button>
</form>

{{-- Container Tabel --}}
<div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full whitespace-nowrap text-left text-sm text-gray-600">
            <thead class="border-b border-gray-100 bg-gray-50/50 text-[11px] font-semibold uppercase tracking-wider text-gray-500">
                <tr>
                    <th class="px-6 py-4">User</th>
                    <th class="px-6 py-4">Tipe</th>
                    <th class="px-6 py-4">Judul</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Waktu</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($feedbacks as $fb)
                <tr class="transition hover:bg-gray-50/50">
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $fb->user->name ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center rounded-md bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-700">
                            {{ ucfirst($fb->type) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-700">{{ $fb->title }}</td>
                    <td class="px-6 py-4">
                        {{-- Logika warna berdasarkan status feedback --}}
                        @php
                        $status = strtolower($fb->status);
                        @endphp

                        @if($status == 'resolved')
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-emerald-50 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            Resolved
                        </span>
                        @elseif($status == 'in_progress')
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-amber-50 px-2 py-1 text-xs font-medium text-amber-700 ring-1 ring-inset ring-amber-600/20">
                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                            In Progress
                        </span>
                        @elseif($status == 'open')
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-sky-50 px-2 py-1 text-xs font-medium text-sky-700 ring-1 ring-inset ring-sky-600/20">
                            <span class="h-1.5 w-1.5 rounded-full bg-sky-500"></span>
                            Open
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/20">
                            <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>
                            {{ ucfirst($fb->status) }}
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-400">{{ $fb->created_at->diffForHumans() }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.feedback.show', $fb) }}" class="font-medium text-indigo-600 transition-colors hover:text-indigo-800">
                            Lihat
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400">
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