@extends('admin.layout')

@section('page-title', 'Email Activity')

@section('content')

{{-- Bagian Statistik --}}
<div class="mb-10 grid grid-cols-1 gap-5 sm:grid-cols-2">

    <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition-all hover:shadow-md">
        <div class="text-sm font-medium text-gray-500">Berhasil Hari Ini</div>
        <div class="mt-1 text-3xl font-medium tracking-tight text-emerald-500">{{ $summary['success_today'] }}</div>
    </div>

    <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition-all hover:shadow-md">
        <div class="text-sm font-medium text-gray-500">Gagal Hari Ini</div>
        <div class="mt-1 text-3xl font-medium tracking-tight text-rose-500">{{ $summary['failed_today'] }}</div>
    </div>

</div>

{{-- Container Tabel --}}
<div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full whitespace-nowrap text-left text-sm text-gray-600">
            <thead class="border-b border-gray-100 bg-gray-50/50 text-[11px] font-semibold uppercase tracking-wider text-gray-500">
                <tr>
                    <th class="px-6 py-4">User</th>
                    <th class="px-6 py-4">Recipient</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Waktu</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($activities as $log)
                <tr class="transition hover:bg-gray-50/50">
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $log->user->email ?? '-' }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $log->email_hrd }}</td>
                    <td class="px-6 py-4">
                        {{-- Logika warna status --}}
                        @if(strtolower($log->status) == 'success' || strtolower($log->status) == 'berhasil')
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-emerald-50 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            {{ $log->status }}
                        </span>
                        @elseif(strtolower($log->status) == 'failed' || strtolower($log->status) == 'gagal')
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
                    <td colspan="4" class="px-6 py-12 text-center text-gray-400">
                        Belum ada aktivitas email hari ini.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
@if($activities->hasPages())
<div class="mt-6">
    {{ $activities->links() }}
</div>
@endif

@endsection