<x-app-layout title="{{ $feedback->title }} — Auto Apply Mailer">

    {{-- =========================================================
        FONT & TOKEN SISTEM HALAMAN INI
        Konsisten dengan halaman Template, Buat Lamaran, Kelola Berkas
        & Feedback list.
    ========================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;0,600;1,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .tpl-page {
            --paper: #FAF7F1;
            --paper-soft: #F2EDE1;
            --ink: #23262B;
            --ink-soft: #83796C;
            --line: #E4DECE;
            --accent: #2F6F4E;
            --accent-ink: #1F4D36;
            --accent-soft: #E4EEE6;
            --clay: #9C5A3C;
            --clay-soft: #F2E5DC;
            --danger: #B3402E;
            --danger-soft: #F7E6E2;
            font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
            background: var(--paper);
        }

        .tpl-serif {
            font-family: 'Lora', Georgia, serif;
        }

        .tpl-page ::selection {
            background: var(--accent-soft);
        }

        .tpl-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 1rem;
        }

        .tpl-tag {
            display: inline-flex;
            align-items: center;
            border-radius: 9999px;
            background: var(--paper-soft);
            color: var(--ink-soft);
            padding: 0.3rem 0.8rem;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .tpl-input {
            width: 100%;
            border: 1px solid var(--line);
            background: var(--paper);
            border-radius: 0.65rem;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            color: var(--ink);
            transition: border-color 0.15s ease, background 0.15s ease;
            resize: vertical;
            line-height: 1.6;
        }

        .tpl-input:focus {
            outline: none;
            border-color: var(--accent);
            background: #fff;
        }

        .tpl-btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            background: var(--accent);
            color: #fff;
            font-size: 0.875rem;
            font-weight: 600;
            padding: 0.65rem 1.25rem;
            border-radius: 0.7rem;
            transition: background 0.15s ease;
        }

        .tpl-btn-primary:hover {
            background: var(--accent-ink);
        }

        .tpl-reply-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 1rem;
            padding: 1.25rem;
        }

        .tpl-empty-box {
            background: #fff;
            border: 1px dashed var(--line);
            border-radius: 1rem;
            padding: 2.5rem 1.5rem;
            text-align: center;
        }
    </style>

    <div class="tpl-page min-h-screen">
        <div class="mx-auto max-w-4xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-7">

                <div class="flex items-center justify-between gap-4">

                    <div>
                        <p class="mb-1 text-sm" style="color: var(--ink-soft)">
                            Feedback
                        </p>

                        <h1 class="tpl-serif text-2xl font-semibold" style="color: var(--ink)">
                            {{ $feedback->title }}
                        </h1>
                    </div>

                    <a
                        href="{{ route('feedback.index') }}"
                        class="shrink-0 text-sm font-medium transition"
                        style="color: var(--ink-soft)">
                        Kembali
                    </a>

                </div>

            </div>


            {{-- Feedback Detail --}}
            <div class="tpl-card">

                <div class="p-6 sm:p-8">

                    {{-- Meta --}}
                    <div class="flex flex-wrap items-center gap-x-3 gap-y-2 text-sm">

                        <span class="tpl-tag">
                            {{ $feedback->type === 'report' ? 'Laporan Masalah' : 'Feedback / Saran' }}
                        </span>

                        <span style="color: var(--line)">
                            •
                        </span>

                        <span style="color: var(--ink-soft)">
                            {{ ucfirst(str_replace('_', ' ', $feedback->status)) }}
                        </span>

                        @if ($feedback->category)

                        <span style="color: var(--line)">
                            •
                        </span>

                        <span style="color: var(--ink-soft)">
                            {{ $feedback->category }}
                        </span>

                        @endif

                        <span style="color: var(--line)">
                            •
                        </span>

                        <span style="color: var(--ink-soft)">
                            {{ $feedback->created_at->format('d M Y, H:i') }}
                        </span>

                    </div>


                    {{-- Description --}}
                    <div class="mt-6">

                        <p class="whitespace-pre-line text-sm leading-7" style="color: var(--ink)">
                            {{ $feedback->description }}
                        </p>

                    </div>


                    {{-- Screenshot --}}
                    @if ($feedback->screenshot_path)

                    <div class="mt-7 pt-6" style="border-top: 1px solid var(--line)">

                        <p class="mb-3 text-sm font-medium" style="color: var(--ink)">
                            Screenshot
                        </p>

                        <a
                            href="{{ asset('storage/'.$feedback->screenshot_path) }}"
                            target="_blank"
                            rel="noopener noreferrer">

                            <img
                                src="{{ asset('storage/'.$feedback->screenshot_path) }}"
                                alt="Screenshot feedback"
                                class="max-h-[520px] max-w-full rounded-xl object-contain transition hover:opacity-95"
                                style="border: 1px solid var(--line)">

                        </a>

                        <p class="mt-2 text-xs" style="color: var(--ink-soft)">
                            Klik gambar untuk melihat ukuran penuh.
                        </p>

                    </div>

                    @endif

                </div>

            </div>


            {{-- Conversation --}}
            <div class="mt-8">

                <div class="mb-4 flex items-center justify-between">

                    <div>
                        <h2 class="tpl-serif text-lg font-semibold" style="color: var(--ink)">
                            Percakapan
                        </h2>

                        <p class="mt-1 text-sm" style="color: var(--ink-soft)">
                            Riwayat balasan terkait feedback ini.
                        </p>
                    </div>

                    @if ($feedback->replies->count())
                    <span class="text-xs" style="color: var(--ink-soft)">
                        {{ $feedback->replies->count() }} balasan
                    </span>
                    @endif

                </div>


                {{-- Replies --}}
                <div class="space-y-3">

                    @forelse ($feedback->replies as $reply)

                    <div class="tpl-reply-card">

                        <div class="flex items-center justify-between gap-3">

                            <p class="text-sm font-medium" style="color: var(--ink)">
                                {{ $reply->user_id === auth()->id() ? 'Anda' : 'Admin' }}
                            </p>

                            <p class="text-xs" style="color: var(--ink-soft)">
                                {{ $reply->created_at->diffForHumans() }}
                            </p>

                        </div>

                        <p class="mt-3 whitespace-pre-line text-sm leading-6" style="color: var(--ink-soft)">
                            {{ $reply->message }}
                        </p>

                    </div>

                    @empty

                    <div class="tpl-empty-box">

                        <p class="text-sm font-medium" style="color: var(--ink)">
                            Belum ada balasan
                        </p>

                        <p class="mt-1 text-xs" style="color: var(--ink-soft)">
                            Balasan dari admin akan muncul di sini.
                        </p>

                    </div>

                    @endforelse

                </div>

            </div>


            {{-- Reply Form --}}
            @if ($feedback->status !== 'closed')

            <div class="tpl-card mt-8">

                <form
                    method="POST"
                    action="{{ route('feedback.reply', $feedback) }}">

                    @csrf

                    <div class="p-6 sm:p-8">

                        <label
                            for="message"
                            class="mb-2 block text-sm font-medium"
                            style="color: var(--ink)">
                            Balasan
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="4"
                            required
                            placeholder="Tulis balasan..."
                            class="tpl-input">{{ old('message') }}</textarea>

                        @error('message')
                        <p class="mt-1.5 text-xs" style="color: var(--danger)">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                    <div class="flex justify-end px-6 py-4 sm:px-8" style="border-top: 1px solid var(--line)">

                        <button
                            type="submit"
                            class="tpl-btn-primary">
                            Kirim Balasan
                        </button>

                    </div>

                </form>

            </div>

            @else

            <div class="mt-6 pt-5" style="border-top: 1px solid var(--line)">

                <p class="text-sm" style="color: var(--ink-soft)">
                    Feedback ini sudah ditutup.
                </p>

            </div>

            @endif

        </div>
    </div>

</x-app-layout>