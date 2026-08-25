@extends('admin.layout')

@section('page-title', 'Management Users')

@section('content')

<div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">
    <div class="overflow-x-auto">
        <table class="w-full whitespace-nowrap text-left text-sm text-gray-600">
            <thead class="border-b border-gray-100 bg-gray-50/50 text-[11px] font-semibold uppercase tracking-wider text-gray-500">
                <tr>
                    <th class="px-6 py-4">Nama</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Registrasi</th>
                    <th class="px-6 py-4">Total Lamaran</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                {{-- Menggunakan forelse agar ada tampilan khusus jika data kosong --}}
                @forelse ($users as $user)
                <tr class="transition hover:bg-gray-50/50">
                    <td class="px-6 py-4 font-medium text-gray-700">{{ $user->name }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $user->email }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $user->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $user->application_histories_count ?? 0 }}</td>
                    <td class="px-6 py-4">
                        @if($user->status == 'suspended')
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-rose-50 px-2 py-1 text-xs font-medium text-rose-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-rose-500"></span> Suspended
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 rounded-md bg-emerald-50 px-2 py-1 text-xs font-medium text-emerald-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Active
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('admin.users.show', $user) }}" class="font-medium text-indigo-600 transition-colors hover:text-indigo-800">
                                Detail
                            </a>

                            @if (($user->status ?? 'active') === 'active')
                            <form method="POST" action="{{ route('admin.users.suspend', $user) }}" class="inline">
                                @csrf @method('PATCH')
                                <button type="submit" class="font-medium text-rose-500 transition-colors hover:text-rose-700">
                                    Suspend
                                </button>
                            </form>
                            @else
                            <form method="POST" action="{{ route('admin.users.activate', $user) }}" class="inline">
                                @csrf @method('PATCH')
                                <button type="submit" class="font-medium text-emerald-600 transition-colors hover:text-emerald-800">
                                    Aktifkan
                                </button>
                            </form>
                            @endif
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini beserta seluruh berkasnya?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-rose-500 transition-colors hover:text-rose-700">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                        Belum ada data pengguna.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination wrapper dengan margin atas --}}
@if($users->hasPages())
<div class="mt-6">
    {{ $users->links() }}
</div>
@endif

@endsection