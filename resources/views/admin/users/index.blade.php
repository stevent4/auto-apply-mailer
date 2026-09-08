@extends('admin.layout')

@section('page-title', 'Management Users')

@section('content')

<style>
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

    .pp-action-link {
        font-weight: 500;
        transition: color 0.15s ease;
    }

    .pp-action-link--accent {
        color: var(--accent-ink);
    }

    .pp-action-link--accent:hover {
        color: var(--accent);
    }

    .pp-action-link--danger {
        color: var(--danger);
    }

    .pp-action-link--danger:hover {
        color: var(--accent-ink);
        opacity: 0.8;
    }
</style>

<div class="pp-table-card">
    <div class="overflow-x-auto">
        <table class="pp-table w-full whitespace-nowrap text-left text-sm">
            <thead>
                <tr>
                    <th class="px-6 py-4">Nama</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Registrasi</th>
                    <th class="px-6 py-4">Total Lamaran</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Menggunakan forelse agar ada tampilan khusus jika data kosong --}}
                @forelse ($users as $user)
                <tr>
                    <td class="px-6 py-4 font-medium" style="color: var(--ink)">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">{{ $user->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4">{{ $user->application_histories_count ?? 0 }}</td>
                    <td class="px-6 py-4">
                        @if($user->status == 'suspended')
                        <span class="pp-badge pp-badge--danger">
                            <span class="pp-dot pp-dot--danger"></span> Suspended
                        </span>
                        @else
                        <span class="pp-badge pp-badge--success">
                            <span class="pp-dot pp-dot--success"></span> Active
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('admin.users.show', $user) }}" class="pp-action-link pp-action-link--accent">
                                Detail
                            </a>

                            @if (($user->status ?? 'active') === 'active')
                            <form method="POST" action="{{ route('admin.users.suspend', $user) }}" class="inline">
                                @csrf @method('PATCH')
                                <button type="submit" class="pp-action-link pp-action-link--danger">
                                    Suspend
                                </button>
                            </form>
                            @else
                            <form method="POST" action="{{ route('admin.users.activate', $user) }}" class="inline">
                                @csrf @method('PATCH')
                                <button type="submit" class="pp-action-link pp-action-link--accent">
                                    Aktifkan
                                </button>
                            </form>
                            @endif
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini beserta seluruh berkasnya?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="pp-action-link pp-action-link--danger">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center" style="color: var(--ink-soft)">
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