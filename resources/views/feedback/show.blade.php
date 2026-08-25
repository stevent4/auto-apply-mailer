<x-app-layout title="{{ $feedback->title }} — Auto Apply Mailer">

    <div class="min-h-screen bg-gray-50">
        <div class="mx-auto max-w-4xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-7">

                <div class="flex items-center justify-between gap-4">

                    <div>
                        <p class="mb-1 text-sm text-gray-400">
                            Feedback
                        </p>

                        <h1 class="text-2xl font-semibold tracking-tight text-gray-900">
                            {{ $feedback->title }}
                        </h1>
                    </div>

                    <a
                        href="{{ route('feedback.index') }}"
                        class="shrink-0 text-sm font-medium text-gray-500 transition hover:text-gray-900">
                        Kembali
                    </a>

                </div>

            </div>


            {{-- Feedback Detail --}}
            <div class="rounded-2xl border border-gray-200 bg-white shadow-sm">

                <div class="p-6 sm:p-8">

                    {{-- Meta --}}
                    <div class="flex flex-wrap items-center gap-x-3 gap-y-2 text-sm">

                        <span
                            class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700">
                            {{ $feedback->type === 'report' ? 'Laporan Masalah' : 'Feedback / Saran' }}
                        </span>

                        <span class="text-gray-300">
                            •
                        </span>

                        <span class="text-gray-500">
                            {{ ucfirst(str_replace('_', ' ', $feedback->status)) }}
                        </span>

                        @if ($feedback->category)

                        <span class="text-gray-300">
                            •
                        </span>

                        <span class="text-gray-500">
                            {{ $feedback->category }}
                        </span>

                        @endif

                        <span class="text-gray-300">
                            •
                        </span>

                        <span class="text-gray-500">
                            {{ $feedback->created_at->format('d M Y, H:i') }}
                        </span>

                    </div>


                    {{-- Description --}}
                    <div class="mt-6">

                        <p class="whitespace-pre-line text-sm leading-7 text-gray-700">
                            {{ $feedback->description }}
                        </p>

                    </div>


                    {{-- Screenshot --}}
                    @if ($feedback->screenshot_path)

                    <div class="mt-7 border-t border-gray-100 pt-6">

                        <p class="mb-3 text-sm font-medium text-gray-800">
                            Screenshot
                        </p>

                        <a
                            href="{{ asset('storage/'.$feedback->screenshot_path) }}"
                            target="_blank"
                            rel="noopener noreferrer">

                            <img
                                src="{{ asset('storage/'.$feedback->screenshot_path) }}"
                                alt="Screenshot feedback"
                                class="max-h-[520px] max-w-full rounded-xl border border-gray-200 object-contain transition hover:opacity-95">

                        </a>

                        <p class="mt-2 text-xs text-gray-400">
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
                        <h2 class="text-lg font-semibold text-gray-900">
                            Percakapan
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            Riwayat balasan terkait feedback ini.
                        </p>
                    </div>

                    @if ($feedback->replies->count())
                    <span class="text-xs text-gray-400">
                        {{ $feedback->replies->count() }} balasan
                    </span>
                    @endif

                </div>


                {{-- Replies --}}
                <div class="space-y-3">

                    @forelse ($feedback->replies as $reply)

                    <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">

                        <div class="flex items-center justify-between gap-3">

                            <p class="text-sm font-medium text-gray-900">
                                {{ $reply->user_id === auth()->id() ? 'Anda' : 'Admin' }}
                            </p>

                            <p class="text-xs text-gray-400">
                                {{ $reply->created_at->diffForHumans() }}
                            </p>

                        </div>

                        <p class="mt-3 whitespace-pre-line text-sm leading-6 text-gray-600">
                            {{ $reply->message }}
                        </p>

                    </div>

                    @empty

                    <div class="rounded-2xl border border-dashed border-gray-300 bg-white px-6 py-10 text-center">

                        <p class="text-sm font-medium text-gray-700">
                            Belum ada balasan
                        </p>

                        <p class="mt-1 text-xs text-gray-400">
                            Balasan dari admin akan muncul di sini.
                        </p>

                    </div>

                    @endforelse

                </div>

            </div>


            {{-- Reply Form --}}
            @if ($feedback->status !== 'closed')

            <div class="mt-8 rounded-2xl border border-gray-200 bg-white shadow-sm">

                <form
                    method="POST"
                    action="{{ route('feedback.reply', $feedback) }}">

                    @csrf

                    <div class="p-6 sm:p-8">

                        <label
                            for="message"
                            class="mb-2 block text-sm font-medium text-gray-800">
                            Balasan
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="4"
                            required
                            placeholder="Tulis balasan..."
                            class="w-full resize-y rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm leading-6 text-gray-900 placeholder-gray-400 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10">{{ old('message') }}</textarea>

                        @error('message')
                        <p class="mt-1.5 text-xs text-red-600">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                    <div class="flex justify-end border-t border-gray-100 px-6 py-4 sm:px-8">

                        <button
                            type="submit"
                            class="rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Kirim Balasan
                        </button>

                    </div>

                </form>

            </div>

            @else

            <div class="mt-6 border-t border-gray-200 pt-5">

                <p class="text-sm text-gray-500">
                    Feedback ini sudah ditutup.
                </p>

            </div>

            @endif

        </div>
    </div>

</x-app-layout>