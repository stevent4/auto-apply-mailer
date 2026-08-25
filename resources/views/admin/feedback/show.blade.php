@extends('admin.layout')

@section('page-title', 'Detail Feedback & Report')

@section('content')

{{-- Navigasi Kembali --}}
<div class="mb-6">
    <a href="{{ route('admin.feedback.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 transition-colors hover:text-gray-900">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Daftar Feedback
    </a>
</div>

{{-- Kartu Utama Informasi Feedback --}}
<div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm sm:p-8">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="text-xl font-semibold text-gray-800">{{ $feedback->title }}</h1>
            <p class="mt-1 text-sm text-gray-400">
                <span class="font-medium text-gray-700">{{ $feedback->user->name ?? 'User' }}</span> ({{ $feedback->user->email ?? '-' }}) &middot;
                <span class="inline-flex items-center rounded-md bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-700">{{ ucfirst($feedback->type) }}</span> &middot;
                {{ $feedback->created_at->format('d M Y H:i') }}
            </p>
        </div>

        {{-- Form Ubah Status (Auto Submit on Change) --}}
        <form method="POST" action="{{ route('admin.feedback.update-status', $feedback) }}" class="shrink-0">
            @csrf @method('PATCH')
            <select
                name="status"
                onchange="this.form.submit()"
                class="rounded-xl border border-gray-200 bg-white px-3 py-1.5 text-sm font-medium text-gray-700 outline-none transition focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                @foreach (['open','in_progress','resolved','closed'] as $s)
                <option value="{{ $s }}" @selected($feedback->status == $s)>{{ ucfirst(str_replace('_',' ',$s)) }}</option>
                @endforeach
            </select>
        </form>
    </div>

    {{-- Deskripsi Masalah --}}
    <div class="mt-6 text-gray-600 leading-relaxed">
        <p>{{ $feedback->description }}</p>
    </div>

    {{-- Screenshot Lampiran (Jika Ada) --}}
    @if ($feedback->screenshot_path)
    <div class="mt-6">
        <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-gray-400">Lampiran Screenshot:</p>
        <a href="{{ asset('storage/'.$feedback->screenshot_path) }}" target="_blank" class="inline-block overflow-hidden rounded-xl border border-gray-200 transition hover:opacity-90">
            <img src="{{ asset('storage/'.$feedback->screenshot_path) }}" class="max-h-80 w-auto object-cover">
        </a>
    </div>
    @endif

    {{-- Terkait Lamaran (Jika Ada) --}}
    @if ($feedback->relatedApplication)
    <div class="mt-6 rounded-xl border border-indigo-100 bg-indigo-50/50 p-4 text-sm text-indigo-900">
        <span class="font-semibold">Terkait Lamaran:</span>
        Ke perusahaan <strong class="text-indigo-700">{{ $feedback->relatedApplication->company_name }}</strong>
        (Status: <span class="capitalize font-medium">{{ $feedback->relatedApplication->status }}</span>)
    </div>
    @endif
</div>

{{-- Bagian Percakapan / Balasan --}}
<div class="mt-8">
    <h2 class="mb-4 text-base font-semibold text-gray-700">Percakapan</h2>

    <div class="space-y-4">
        @forelse ($feedback->replies as $reply)
        <div class="rounded-2xl border border-gray-100 bg-white p-5 shadow-sm">
            <div class="mb-2 flex items-center justify-between">
                <span class="text-xs font-semibold text-gray-800">{{ $reply->user->name ?? 'Admin/User' }}</span>
                <span class="text-xs text-gray-400">{{ $reply->created_at->diffForHumans() }}</span>
            </div>
            <p class="text-sm text-gray-600 leading-relaxed">{{ $reply->message }}</p>
        </div>
        @empty
        <div class="rounded-2xl border border-gray-100 bg-white p-8 text-center text-sm text-gray-400 shadow-sm">
            Belum ada balasan pada percakapan ini.
        </div>
        @endforelse
    </div>

    {{-- Form Kirim Balasan --}}
    <form method="POST" action="{{ route('admin.feedback.reply', $feedback) }}" class="mt-6 rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
        @csrf
        <label for="message" class="mb-2 block text-sm font-medium text-gray-700">Tulis Balasan</label>
        <textarea
            name="message"
            id="message"
            rows="4"
            class="w-full rounded-xl border border-gray-200 p-3 text-sm text-gray-700 outline-none transition focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
            placeholder="Tulis pesan balasan untuk pengguna..."
            required></textarea>

        <div class="mt-4 flex justify-end">
            <button
                type="submit"
                class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-5 py-2 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1">
                Kirim Balasan
            </button>
        </div>
    </form>
</div>

@endsection