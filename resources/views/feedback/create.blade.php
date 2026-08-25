<x-app-layout title="Kirim Feedback — Auto Apply Mailer">

    <div class="min-h-screen bg-gray-50">
        <div class="mx-auto max-w-4xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-7">
                <div class="flex items-center justify-between gap-4">

                    <div>
                        <h1 class="text-2xl font-semibold tracking-tight text-gray-900">
                            Kirim Feedback
                        </h1>

                        <p class="mt-1 text-sm text-gray-500">
                            Sampaikan saran atau laporkan masalah yang kamu temui.
                        </p>
                    </div>

                    <a
                        href="{{ route('feedback.index') }}"
                        class="text-sm font-medium text-gray-500 transition hover:text-gray-900">
                        Kembali
                    </a>

                </div>
            </div>


            {{-- Form --}}
            <div class="rounded-2xl border border-gray-200 bg-white shadow-sm">

                <form
                    method="POST"
                    action="{{ route('feedback.store') }}"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="space-y-6 p-6 sm:p-8">

                        {{-- Jenis --}}
                        <div>
                            <label
                                for="type"
                                class="mb-2 block text-sm font-medium text-gray-800">
                                Jenis
                            </label>

                            <select
                                id="type"
                                name="type"
                                required
                                class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10">

                                <option value="feedback" @selected(old('type', 'feedback' )==='feedback' )>
                                    Feedback / Saran
                                </option>

                                <option value="report" @selected(old('type')==='report' )>
                                    Laporkan Masalah
                                </option>

                            </select>

                            @error('type')
                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>


                        {{-- Kategori --}}
                        <div>
                            <label
                                for="category"
                                class="mb-2 block text-sm font-medium text-gray-800">
                                Kategori
                                <span class="font-normal text-gray-400">(opsional)</span>
                            </label>

                            <input
                                id="category"
                                type="text"
                                name="category"
                                value="{{ old('category') }}"
                                placeholder="Contoh: Email, CV, UI"
                                class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-900 placeholder-gray-400 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10">

                            @error('category')
                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>


                        {{-- Judul --}}
                        <div>
                            <label
                                for="title"
                                class="mb-2 block text-sm font-medium text-gray-800">
                                Judul
                            </label>

                            <input
                                id="title"
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                                required
                                placeholder="Tulis judul feedback"
                                class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-900 placeholder-gray-400 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10">

                            @error('title')
                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>


                        {{-- Deskripsi --}}
                        <div>
                            <label
                                for="description"
                                class="mb-2 block text-sm font-medium text-gray-800">
                                Deskripsi
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="6"
                                required
                                placeholder="Jelaskan feedback atau masalah yang kamu alami..."
                                class="w-full resize-y rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm leading-6 text-gray-900 placeholder-gray-400 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10">{{ old('description') }}</textarea>

                            @error('description')
                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>


                        {{-- Lamaran terkait --}}
                        @if ($applications->count())

                        <div>
                            <label
                                for="related_application_id"
                                class="mb-2 block text-sm font-medium text-gray-800">
                                Lamaran terkait
                                <span class="font-normal text-gray-400">(opsional)</span>
                            </label>

                            <select
                                id="related_application_id"
                                name="related_application_id"
                                class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10">

                                <option value="">
                                    Tidak ada
                                </option>

                                @foreach ($applications as $app)

                                <option
                                    value="{{ $app->id }}"
                                    @selected(old('related_application_id')==$app->id)>
                                    {{ $app->company_name }} — {{ $app->position }}
                                </option>

                                @endforeach

                            </select>

                            @error('related_application_id')
                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        @endif


                        {{-- Screenshot --}}
                        <div>
                            <label
                                for="screenshot"
                                class="mb-2 block text-sm font-medium text-gray-800">
                                Screenshot
                                <span class="font-normal text-gray-400">(opsional)</span>
                            </label>

                            <input
                                id="screenshot"
                                type="file"
                                name="screenshot"
                                accept="image/*"
                                class="block w-full rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-500
                                file:mr-3 file:rounded-lg file:border-0 file:bg-gray-100
                                file:px-4 file:py-2 file:text-sm file:font-medium file:text-gray-700
                                hover:file:bg-gray-200">

                            @error('screenshot')
                            <p class="mt-1.5 text-xs text-red-600">
                                {{ $message }}
                            </p>
                            @enderror

                            <p class="mt-1.5 text-xs text-gray-400">
                                Maksimal 2MB.
                            </p>
                        </div>

                    </div>


                    {{-- Footer --}}
                    <div class="flex flex-col-reverse gap-3 border-t border-gray-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-end sm:px-8">

                        <a
                            href="{{ route('feedback.index') }}"
                            class="inline-flex justify-center rounded-xl px-5 py-2.5 text-sm font-medium text-gray-600 transition hover:bg-gray-100 hover:text-gray-900">
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="inline-flex justify-center rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Kirim Feedback
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>