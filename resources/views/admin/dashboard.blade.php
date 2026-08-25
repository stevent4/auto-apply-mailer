@extends('admin.layout')

@section('page-title', 'Dashboard')

@section('content')

{{-- Bagian Statistik --}}
<div class="mb-5">
    <h2 class="text-base font-semibold text-gray-700">Overview Statistik</h2>
</div>

<div class="mb-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

    <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition-all hover:shadow-md">
        <div class="text-sm font-medium text-gray-500">Total Users</div>
        <div class="mt-1 text-3xl font-medium tracking-tight text-gray-800">{{ $stats['total_users'] }}</div>
    </div>

    <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition-all hover:shadow-md">
        <div class="text-sm font-medium text-gray-500">Total Lamaran</div>
        <div class="mt-1 text-3xl font-medium tracking-tight text-gray-800">{{ $stats['total_applications'] }}</div>
    </div>

    <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition-all hover:shadow-md">
        <div class="text-sm font-medium text-gray-500">Lamaran Hari Ini</div>
        <div class="mt-1 text-3xl font-medium tracking-tight text-gray-800">{{ $stats['applications_today'] }}</div>
    </div>

    <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition-all hover:shadow-md">
        <div class="text-sm font-medium text-gray-500">Email Berhasil</div>
        <div class="mt-1 text-3xl font-medium tracking-tight text-emerald-500">{{ $stats['emails_success'] }}</div>
    </div>

    <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition-all hover:shadow-md">
        <div class="text-sm font-medium text-gray-500">Email Gagal</div>
        <div class="mt-1 text-3xl font-medium tracking-tight text-rose-500">{{ $stats['emails_failed'] }}</div>
    </div>

    <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition-all hover:shadow-md">
        <div class="text-sm font-medium text-gray-500">Gmail Terhubung</div>
        <div class="mt-1 text-3xl font-medium tracking-tight text-gray-800">{{ $stats['gmail_connected'] }}</div>
    </div>

    <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition-all hover:shadow-md">
        <div class="text-sm font-medium text-gray-500">Total Ukuran Berkas</div>
        <div class="mt-1 text-3xl font-medium tracking-tight text-indigo-600">
            {{ $stats['total_storage_size'] }}
        </div>
    </div>

    <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition-all hover:shadow-md">
        <div class="text-sm font-medium text-gray-500">Total Berkas Tersimpan</div>
        <div class="mt-1 text-3xl font-medium tracking-tight text-indigo-600">
            {{ $stats['total_files'] }} <span class="text-base font-normal text-gray-400">File</span>
        </div>
    </div>

</div>


{{-- Bagian Tabel Aktivitas --}}
<div class="mb-5 flex items-center justify-between">
    <h2 class="text-base font-semibold text-gray-700">Aktivitas Terbaru</h2>
    <a href="{{ route('admin.applications.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-700">Lihat Semua &rarr;</a>
</div>

<div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full whitespace-nowrap text-left text-sm text-gray-600">
            <thead class="border-b border-gray-100 bg-gray-50/50 text-[11px] font-semibold uppercase tracking-wider text-gray-500">
                <tr>
                    <th class="px-6 py-4">Perusahaan</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Waktu</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($recentLogs as $log)
                <tr class="transition hover:bg-gray-50/50">
                    <td class="px-6 py-4 font-medium text-gray-700">{{ $log->nama_pt }}</td>
                    <td class="px-6 py-4">
                        @if(strtolower($log->status) == 'berhasil' || strtolower($log->status) == 'success')
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-emerald-50 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            {{ $log->status }}
                        </span>
                        @elseif(strtolower($log->status) == 'gagal' || strtolower($log->status) == 'failed')
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-rose-50 px-2 py-1 text-xs font-medium text-rose-700 ring-1 ring-inset ring-rose-600/20">
                            <span class="h-1.5 w-1.5 rounded-full bg-rose-500"></span>
                            {{ $log->status }}
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/20">
                            <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>
                            {{ $log->status }}
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-400">{{ $log->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-12 text-center text-gray-400">
                        Belum ada aktivitas terbaru.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection