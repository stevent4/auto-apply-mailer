<x-app-layout title="Feedback — Auto Apply Mailer">

    <div class="min-h-[calc(100vh-5rem)] bg-gray-50">

        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">


            {{-- =====================================================
                HEADER
            ====================================================== --}}
            <div class="mb-8">

                <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                            Feedback & Laporan Saya
                        </h1>

                        <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-500 sm:text-base">
                            Sampaikan masukan atau laporkan kendala yang kamu
                            temui saat menggunakan aplikasi.
                        </p>

                    </div>


                    <a
                        href="{{ route('feedback.create') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">

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
                class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4">

                <div class="flex items-center gap-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-emerald-100 font-bold text-emerald-600">
                        ✓
                    </div>

                    <p class="min-w-0 flex-1 text-sm font-medium text-emerald-800">
                        {{ session('success') }}
                    </p>

                    <button
                        type="button"
                        @click="show = false"
                        class="rounded-lg p-1 text-emerald-600 transition hover:bg-emerald-100">

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
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                <div class="border-b border-gray-100 px-6 py-5">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-lg">
                            💬
                        </div>


                        <div>

                            <h2 class="text-base font-bold text-gray-900">
                                Riwayat Feedback & Laporan
                            </h2>

                            <p class="mt-1 text-xs text-gray-500">
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
                'open' => ['label' => 'Open', 'class' => 'bg-blue-50 text-blue-700 border-blue-100'],
                'in_progress' => ['label' => 'Diproses', 'class' => 'bg-amber-50 text-amber-700 border-amber-100'],
                'resolved' => ['label' => 'Selesai', 'class' => 'bg-emerald-50 text-emerald-700 border-emerald-100'],
                'closed' => ['label' => 'Closed', 'class' => 'bg-gray-100 text-gray-600 border-gray-200'],
                default => ['label' => ucfirst(str_replace('_', ' ', $fb->status)), 'class' => 'bg-gray-100 text-gray-600 border-gray-200'],
                };
                @endphp

                <a
                    href="{{ route('feedback.show', $fb) }}"
                    class="group flex items-start gap-4 border-b border-gray-100 px-6 py-5 transition last:border-b-0 hover:bg-gray-50">

                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-gray-50 text-lg">
                        {{ $typeMeta['icon'] }}
                    </div>


                    <div class="min-w-0 flex-1">

                        <div class="flex flex-wrap items-center gap-2">

                            <p class="truncate text-sm font-semibold text-gray-900 group-hover:text-indigo-700">
                                {{ $fb->title }}
                            </p>

                            <span class="inline-flex shrink-0 items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold {{ $statusMeta['class'] }}">
                                {{ $statusMeta['label'] }}
                            </span>

                        </div>

                        <div class="mt-1 flex flex-wrap items-center gap-x-2 gap-y-1 text-xs text-gray-400">

                            <span class="font-medium text-gray-500">
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
                        class="mt-1 h-4 w-4 shrink-0 text-gray-300 transition group-hover:translate-x-0.5 group-hover:text-indigo-500"
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

                <div class="px-6 py-16 text-center">

                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gray-100 text-2xl">
                        📭
                    </div>

                    <h3 class="mt-4 text-sm font-bold text-gray-900">
                        Belum ada feedback/laporan
                    </h3>

                    <p class="mx-auto mt-1 max-w-md text-sm leading-6 text-gray-500">
                        Ada masukan atau menemukan kendala? Buat tiket baru
                        agar tim kami bisa membantu.
                    </p>

                    <a
                        href="{{ route('feedback.create') }}"
                        class="mt-4 inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-xs font-semibold text-white transition hover:bg-indigo-700">
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