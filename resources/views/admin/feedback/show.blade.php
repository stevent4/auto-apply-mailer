@extends('admin.layout')

@section('page-title', 'Detail Feedback & Report')

@section('content')

<style>
    :root {
        --warn: #A9781E;
        --warn-soft: #F5EBD3;
        --info: #3B6E90;
        --info-soft: #E3EEF2;
    }

    .pp-back-link {
        color: var(--ink-soft);
        transition: color 0.15s ease;
    }

    .pp-back-link:hover {
        color: var(--ink);
    }

    .pp-card {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 1rem;
    }

    .pp-tag-neutral {
        display: inline-flex;
        align-items: center;
        border-radius: 0.5rem;
        background: var(--paper-soft);
        color: var(--ink-soft);
        padding: 0.1rem 0.5rem;
        font-size: 0.75rem;
        font-weight: 500;
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

    .pp-related-box {
        background: var(--info-soft);
        border: 1px solid var(--info);
        color: var(--info);
        border-radius: 0.85rem;
    }

    .pp-reply-card {
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 1rem;
    }

    .pp-btn-primary {
        background: var(--accent);
        color: #fff;
        border-radius: 0.75rem;
        transition: background 0.15s ease;
    }

    .pp-btn-primary:hover,
    .pp-btn-primary:focus {
        background: var(--accent-ink);
    }
</style>

{{-- Navigasi Kembali --}}
<div class="mb-6">
    <a href="{{ route('admin.feedback.index') }}" class="pp-back-link inline-flex items-center gap-2 text-sm font-medium">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Daftar Feedback
    </a>
</div>

{{-- Kartu Utama Informasi Feedback --}}
<div class="pp-card p-6 sm:p-8">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="pp-serif text-xl font-semibold" style="color: var(--ink)">{{ $feedback->title }}</h1>
            <p class="mt-1 text-sm" style="color: var(--ink-soft)">
                <span class="font-medium" style="color: var(--ink)">{{ $feedback->user->name ?? 'User' }}</span> ({{ $feedback->user->email ?? '-' }}) &middot;
                <span class="pp-tag-neutral">{{ ucfirst($feedback->type) }}</span> &middot;
                {{ $feedback->created_at->format('d M Y H:i') }}
            </p>
        </div>

        {{-- Form Ubah Status (Auto Submit on Change) --}}
        <form method="POST" action="{{ route('admin.feedback.update-status', $feedback) }}" class="shrink-0">
            @csrf @method('PATCH')
            <select
                name="status"
                onchange="this.form.submit()"
                class="pp-field px-3 py-1.5 text-sm font-medium">
                @foreach (['open','in_progress','resolved','closed'] as $s)
                <option value="{{ $s }}" @selected($feedback->status == $s)>{{ ucfirst(str_replace('_',' ',$s)) }}</option>
                @endforeach
            </select>
        </form>
    </div>

    {{-- Deskripsi Masalah --}}
    <div class="mt-6 leading-relaxed" style="color: var(--ink-soft)">
        <p>{{ $feedback->description }}</p>
    </div>

    {{-- Screenshot Lampiran (Jika Ada) --}}
    @if ($feedback->screenshot_path)
    <div class="mt-6">
        <p class="mb-2 text-xs font-semibold uppercase tracking-wider" style="color: var(--ink-soft)">Lampiran Screenshot:</p>
        <a href="{{ asset('storage/'.$feedback->screenshot_path) }}" target="_blank" class="inline-block overflow-hidden rounded-xl border transition hover:opacity-90" style="border-color: var(--line)">
            <img src="{{ asset('storage/'.$feedback->screenshot_path) }}" class="max-h-80 w-auto object-cover">
        </a>
    </div>
    @endif

    {{-- Terkait Lamaran (Jika Ada) --}}
    @if ($feedback->relatedApplication)
    <div class="pp-related-box mt-6 p-4 text-sm">
        <span class="font-semibold">Terkait Lamaran:</span>
        Ke perusahaan <strong>{{ $feedback->relatedApplication->company_name }}</strong>
        (Status: <span class="capitalize font-medium">{{ $feedback->relatedApplication->status }}</span>)
    </div>
    @endif
</div>

{{-- Bagian Percakapan / Balasan --}}
<div class="mt-8">
    <h2 class="pp-serif mb-4 text-base font-semibold" style="color: var(--ink)">Percakapan</h2>

    <div class="space-y-4">
        @forelse ($feedback->replies as $reply)
        <div class="pp-reply-card p-5">
            <div class="mb-2 flex items-center justify-between">
                <span class="text-xs font-semibold" style="color: var(--ink)">{{ $reply->user->name ?? 'Admin/User' }}</span>
                <span class="text-xs" style="color: var(--ink-soft)">{{ $reply->created_at->diffForHumans() }}</span>
            </div>
            <p class="text-sm leading-relaxed" style="color: var(--ink-soft)">{{ $reply->message }}</p>
        </div>
        @empty
        <div class="pp-reply-card p-8 text-center text-sm" style="color: var(--ink-soft)">
            Belum ada balasan pada percakapan ini.
        </div>
        @endforelse
    </div>

    {{-- Form Kirim Balasan --}}
    <form method="POST" action="{{ route('admin.feedback.reply', $feedback) }}" class="pp-card mt-6 p-6">
        @csrf
        <label for="message" class="mb-2 block text-sm font-medium" style="color: var(--ink)">Tulis Balasan</label>
        <textarea
            name="message"
            id="message"
            rows="4"
            class="pp-field w-full p-3 text-sm"
            placeholder="Tulis pesan balasan untuk pengguna..."
            required></textarea>

        <div class="mt-4 flex justify-end">
            <button
                type="submit"
                class="pp-btn-primary inline-flex items-center justify-center px-5 py-2 text-sm font-medium">
                Kirim Balasan
            </button>
        </div>
    </form>
</div>

@endsection