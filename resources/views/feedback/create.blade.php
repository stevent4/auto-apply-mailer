<x-app-layout title="Kirim Feedback — Auto Apply Mailer">

    {{-- =========================================================
        FONT & TOKEN SISTEM HALAMAN INI
        Konsisten dengan halaman Template, Buat Lamaran, Kelola Berkas
        & Feedback list/detail.
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

        .tpl-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--ink);
            margin-bottom: 0.5rem;
            display: block;
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
        }

        .tpl-input:focus {
            outline: none;
            border-color: var(--accent);
            background: #fff;
        }

        textarea.tpl-input {
            resize: vertical;
            line-height: 1.6;
        }

        .tpl-input-file {
            display: block;
            width: 100%;
            border: 1px solid var(--line);
            background: var(--paper);
            border-radius: 0.65rem;
            padding: 0.55rem 1rem;
            font-size: 0.875rem;
            color: var(--ink-soft);
        }

        .tpl-input-file::file-selector-button {
            margin-right: 0.75rem;
            border-radius: 0.5rem;
            border: none;
            background: var(--paper-soft);
            padding: 0.5rem 1rem;
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--ink);
            transition: background 0.15s ease;
        }

        .tpl-input-file:hover::file-selector-button {
            background: var(--line);
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

        .tpl-btn-ghost {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.7rem;
            padding: 0.65rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--ink-soft);
            transition: background 0.15s ease, color 0.15s ease;
        }

        .tpl-btn-ghost:hover {
            background: var(--paper-soft);
            color: var(--ink);
        }
    </style>

    <div class="tpl-page min-h-screen">
        <div class="mx-auto max-w-4xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="mb-7">
                <div class="flex items-center justify-between gap-4">

                    <div>
                        <h1 class="tpl-serif text-2xl font-semibold" style="color: var(--ink)">
                            Kirim Feedback
                        </h1>

                        <p class="mt-1 text-sm" style="color: var(--ink-soft)">
                            Sampaikan saran atau laporkan masalah yang kamu temui.
                        </p>
                    </div>

                    <a
                        href="{{ route('feedback.index') }}"
                        class="text-sm font-medium transition"
                        style="color: var(--ink-soft)">
                        Kembali
                    </a>

                </div>
            </div>


            {{-- Form --}}
            <div class="tpl-card">

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
                                class="tpl-label">
                                Jenis
                            </label>

                            <select
                                id="type"
                                name="type"
                                required
                                class="tpl-input">

                                <option value="feedback" @selected(old('type', 'feedback' )==='feedback' )>
                                    Feedback / Saran
                                </option>

                                <option value="report" @selected(old('type')==='report' )>
                                    Laporkan Masalah
                                </option>

                            </select>

                            @error('type')
                            <p class="mt-1.5 text-xs" style="color: var(--danger)">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>


                        {{-- Kategori --}}
                        <div>
                            <label
                                for="category"
                                class="tpl-label">
                                Kategori
                                <span class="font-normal" style="color: var(--ink-soft)">(opsional)</span>
                            </label>

                            <input
                                id="category"
                                type="text"
                                name="category"
                                value="{{ old('category') }}"
                                placeholder="Contoh: Email, CV, UI"
                                class="tpl-input">

                            @error('category')
                            <p class="mt-1.5 text-xs" style="color: var(--danger)">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>


                        {{-- Judul --}}
                        <div>
                            <label
                                for="title"
                                class="tpl-label">
                                Judul
                            </label>

                            <input
                                id="title"
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                                required
                                placeholder="Tulis judul feedback"
                                class="tpl-input">

                            @error('title')
                            <p class="mt-1.5 text-xs" style="color: var(--danger)">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>


                        {{-- Deskripsi --}}
                        <div>
                            <label
                                for="description"
                                class="tpl-label">
                                Deskripsi
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="6"
                                required
                                placeholder="Jelaskan feedback atau masalah yang kamu alami..."
                                class="tpl-input">{{ old('description') }}</textarea>

                            @error('description')
                            <p class="mt-1.5 text-xs" style="color: var(--danger)">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>


                        {{-- Lamaran terkait --}}
                        @if ($applications->count())

                        <div>
                            <label
                                for="related_application_id"
                                class="tpl-label">
                                Lamaran terkait
                                <span class="font-normal" style="color: var(--ink-soft)">(opsional)</span>
                            </label>

                            <select
                                id="related_application_id"
                                name="related_application_id"
                                class="tpl-input">

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
                            <p class="mt-1.5 text-xs" style="color: var(--danger)">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        @endif


                        {{-- Screenshot --}}
                        <div>
                            <label
                                for="screenshot"
                                class="tpl-label">
                                Screenshot
                                <span class="font-normal" style="color: var(--ink-soft)">(opsional)</span>
                            </label>

                            <input
                                id="screenshot"
                                type="file"
                                name="screenshot"
                                accept="image/*"
                                class="tpl-input-file">

                            @error('screenshot')
                            <p class="mt-1.5 text-xs" style="color: var(--danger)">
                                {{ $message }}
                            </p>
                            @enderror

                            <p class="mt-1.5 text-xs" style="color: var(--ink-soft)">
                                Maksimal 2MB.
                            </p>
                        </div>

                    </div>


                    {{-- Footer --}}
                    <div class="flex flex-col-reverse gap-3 px-6 py-5 sm:flex-row sm:items-center sm:justify-end sm:px-8" style="border-top: 1px solid var(--line)">

                        <a
                            href="{{ route('feedback.index') }}"
                            class="tpl-btn-ghost">
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="tpl-btn-primary">
                            Kirim Feedback
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>