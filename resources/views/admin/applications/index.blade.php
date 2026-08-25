@extends('admin.layout')

@section('page-title', 'Management Applications')

@section('content')

{{-- Form Filter --}}
<form method="GET" class="mb-6 flex flex-col gap-3 sm:flex-row">
    {{-- Input Pencarian --}}
    <div class="relative w-full sm:w-72">
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari perusahaan atau posisi..."
            class="w-full rounded-xl border border-gray-200 bg-white py-2 pl-9 pr-4 text-sm text-gray-700 outline-none transition focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
    </div>

    {{-- Filter Dropdown --}}
    <select
        name="status"
        class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm text-gray-700 outline-none transition focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 sm:w-40">
        <option value="">Semua Status</option>
        <option value="success" @selected(request('status')=='success' )>Success</option>
        <option value="failed" @selected(request('status')=='failed' )>Failed</option>
    </select>

    {{-- Tombol Submit --}}
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
                    <th class="px-6 py-4">Perusahaan</th>
                    <th class="px-6 py-4">Posisi</th>
                    <th class="px-6 py-4">Email HRD</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Waktu</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($applications as $app)
                <tr class="transition hover:bg-gray-50/50">
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $app->user->name ?? '-' }}</td>
                    <td class="px-6 py-4 font-medium text-gray-700">{{ $app->nama_pt }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $app->posisi }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $app->email_hrd }}</td>
                    <td class="px-6 py-4">
                        {{-- Logika warna status --}}
                        @if(strtolower($app->status) == 'success' || strtolower($app->status) == 'berhasil')
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-emerald-50 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            {{ $app->status }}
                        </span>
                        @elseif(strtolower($app->status) == 'failed' || strtolower($app->status) == 'gagal')
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
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400">
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