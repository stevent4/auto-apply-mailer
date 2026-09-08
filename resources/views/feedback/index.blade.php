<x-app-layout title="Feedback — Auto Apply Mailer">

    {{-- =========================================================
        FONT & TOKEN SISTEM HALAMAN INI
        Konsisten dengan halaman Template, Buat Lamaran & Kelola Berkas.
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
            overflow: hidden;
        }

        .tpl-card-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--line);
        }

        .tpl-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.85rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.05rem;
            flex-shrink: 0;
        }

        .tpl-icon--meta {
            background: var(--paper-soft);
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
            padding: 0.7rem 1.15rem;
            border-radius: 0.7rem;
            transition: background 0.15s ease;
        }

        .tpl-btn-primary:hover {
            background: var(--accent-ink);
        }

        .tpl-btn-primary--sm {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.5rem 0.9rem;
        }

        .tpl-alert {
            border-radius: 0.85rem;
            padding: 0.9rem 1.1rem;
            border: 1px solid var(--line);
        }

        .tpl-alert--accent {
            background: var(--accent-soft);
            border-color: var(--accent);
        }

        .tpl-alert-icon {
            width: 2.25rem;
            height: 2.25rem;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            flex-shrink: 0;
        }

        .tpl-ticket-icon {
            width: 2.75rem;
            height: 2.75rem;
            border-radius: 0.85rem;
            background: var(--paper-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.05rem;
            flex-shrink: 0;
        }

        .tpl-ticket-row {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1.25rem 1.5rem;
            border-top: 1px solid var(--line);
            transition: background 0.15s ease;
        }

        .tpl-ticket-row:first-of-type {
            border-top: none;
        }

        .tpl-ticket-row:hover {
            background: var(--paper-soft);
        }

        .tpl-status-tag {
            display: inline-flex;
            align-items: center;
            border-radius: 9999px;
            border: 1px solid;
            padding: 0.15rem 0.65rem;
            font-size: 0.6875rem;
            font-weight: 600;
        }

        .tpl-status-tag--open {
            background: var(--paper-soft);
            color: var(--ink-soft);
            border-color: var(--line);
        }

        .tpl-status-tag--progress {
            background: var(--clay-soft);
            color: var(--clay);
            border-color: var(--clay);
        }

        .tpl-status-tag--resolved {
            background: var(--accent-soft);
            color: var(--accent-ink);
            border-color: var(--accent);
        }

        .tpl-status-tag--closed {
            background: var(--paper-soft);
            color: var(--ink-soft);
            border-color: var(--line);
        }

        .tpl-empty {
            text-align: center;
            padding: 3.5rem 1.5rem;
            color: var(--ink-soft);
            font-size: 0.875rem;
        }
    </style>

    <div class="tpl-page min-h-[calc(100vh-5rem)]">

        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">


            {{-- =====================================================
                HEADER
            ====================================================== --}}
            <div class="mb-8">

                <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <h1 class="tpl-serif text-2xl font-semibold sm:text-3xl" style="color: var(--ink)">
                            Feedback & Laporan Saya
                        </h1>

                        <p class="mt-2 max-w-2xl text-sm leading-6 sm:text-base" style="color: var(--ink-soft)">
                            Sampaikan masukan atau laporkan kendala yang kamu
                            temui saat menggunakan aplikasi.
                        </p>

                    </div>


                    <a
                        href="{{ route('feedback.create') }}"
                        class="tpl-btn-primary">

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>

                        Buat Baru

                    </a>

                </div>

            </div>


            {{-- =====================================================
                SUCCESS
            ====================================================== --}}
            @if (session('success'))

            <div
                x-data="{ show: true }"
                x-show="show"
                x-transition
                class="tpl-alert tpl-alert--accent mb-6">

                <div class="flex items-center gap-3">

                    <div class="tpl-alert-icon" style="background: var(--accent-soft); color: var(--accent-ink)">
                        ✓
                    </div>

                    <p class="min-w-0 flex-1 text-sm font-medium" style="color: var(--accent-ink)">
                        {{ session('success') }}
                    </p>

                    <button
                        type="button"
                        @click="show = false"
                        class="rounded-lg p-1 transition"
                        style="color: var(--accent-ink)">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </button>

                </div>

            </div>

            @endif


            {{-- =====================================================
                FEEDBACK LIST
            ====================================================== --}}
            <div class="tpl-card">

                <div class="tpl-card-header">

                    <div class="flex items-center gap-3">

                        <div class="tpl-icon tpl-icon--meta">
                            💬
                        </div>


                        <div>

                            <h2 class="tpl-serif text-base font-semibold" style="color: var(--ink)">
                                Riwayat Feedback & Laporan
                            </h2>

                            <p class="mt-1 text-xs" style="color: var(--ink-soft)">
                                {{ $feedbacks->total() }} tiket ditemukan.
                            </p>

                        </div>

                    </div>

                </div>


                @forelse ($feedbacks as $fb)

                @php
                $typeMeta = $fb->type === 'report'
                ? ['icon' => '🐞', 'label' => 'Report']
                : ['icon' => '💡', 'label' => 'Feedback'];

                $statusMeta = match ($fb->status) {
                'open' => ['label' => 'Open', 'class' => 'tpl-status-tag--open'],
                'in_progress' => ['label' => 'Diproses', 'class' => 'tpl-status-tag--progress'],
                'resolved' => ['label' => 'Selesai', 'class' => 'tpl-status-tag--resolved'],
                'closed' => ['label' => 'Closed', 'class' => 'tpl-status-tag--closed'],
                default => ['label' => ucfirst(str_replace('_', ' ', $fb->status)), 'class' => 'tpl-status-tag--closed'],
                };
                @endphp

                <a
                    href="{{ route('feedback.show', $fb) }}"
                    class="tpl-ticket-row group">

                    <div class="tpl-ticket-icon">
                        {{ $typeMeta['icon'] }}
                    </div>


                    <div class="min-w-0 flex-1">

                        <div class="flex flex-wrap items-center gap-2">

                            <p class="truncate text-sm font-semibold" style="color: var(--ink)">
                                {{ $fb->title }}
                            </p>

                            <span class="tpl-status-tag {{ $statusMeta['class'] }}">
                                {{ $statusMeta['label'] }}
                            </span>

                        </div>

                        <div class="mt-1 flex flex-wrap items-center gap-x-2 gap-y-1 text-xs" style="color: var(--ink-soft)">

                            <span class="font-medium" style="color: var(--ink-soft)">
                                {{ $typeMeta['label'] }}
                            </span>

                            @if ($fb->category)
                            <span>•</span>
                            <span>
                                {{ ucfirst(str_replace('_', ' ', $fb->category)) }}
                            </span>
                            @endif

                            <span>•</span>

                            <span>
                                {{ $fb->created_at->diffForHumans() }}
                            </span>

                            @if ($fb->replies()->count())
                            <span>•</span>
                            <span>
                                {{ $fb->replies()->count() }} balasan
                            </span>
                            @endif

                        </div>

                    </div>


                    <svg
                        class="mt-1 h-4 w-4 shrink-0 transition group-hover:translate-x-0.5"
                        style="color: var(--ink-soft)"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7" />
                    </svg>

                </a>

                @empty

                <div class="tpl-empty">

                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl text-2xl" style="background: var(--paper-soft)">
                        📭
                    </div>

                    <h3 class="mt-4 text-sm font-semibold" style="color: var(--ink)">
                        Belum ada feedback/laporan
                    </h3>

                    <p class="mx-auto mt-1 max-w-md text-sm leading-6" style="color: var(--ink-soft)">
                        Ada masukan atau menemukan kendala? Buat tiket baru
                        agar tim kami bisa membantu.
                    </p>

                    <a
                        href="{{ route('feedback.create') }}"
                        class="tpl-btn-primary tpl-btn-primary--sm mt-4">
                        + Buat Baru
                    </a>

                </div>

                @endforelse

            </div>


            @if ($feedbacks->hasPages())
            <div class="mt-6">
                {{ $feedbacks->links() }}
            </div>
            @endif

        </div>

    </div>

</x-app-layout>