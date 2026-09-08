<x-app-layout title="Berkas — Auto Apply Mailer">

    {{-- =========================================================
        FONT & TOKEN SISTEM HALAMAN INI
        Konsisten dengan halaman Template & Buat Lamaran.
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

        .tpl-card-body {
            padding: 1.5rem;
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

        .tpl-icon--accent {
            background: var(--accent-soft);
        }

        .tpl-btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border: 1px solid var(--line);
            background: #fff;
            color: var(--ink-soft);
            font-size: 0.8125rem;
            font-weight: 600;
            padding: 0.65rem 1.1rem;
            border-radius: 0.7rem;
            transition: border-color 0.15s ease, background 0.15s ease, color 0.15s ease;
        }

        .tpl-btn-secondary:hover {
            border-color: var(--ink-soft);
            background: var(--paper-soft);
            color: var(--ink);
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
            padding: 0.75rem 1.35rem;
            border-radius: 0.7rem;
            transition: background 0.15s ease;
        }

        .tpl-btn-primary:hover {
            background: var(--accent-ink);
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

        .tpl-alert--danger {
            background: var(--danger-soft);
            border-color: var(--danger);
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

        .tpl-dropzone {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            border: 2px dashed var(--line);
            background: var(--paper);
            border-radius: 1rem;
            padding: 3rem 1.5rem;
            cursor: pointer;
            transition: border-color 0.15s ease, background 0.15s ease;
        }

        .tpl-dropzone:hover {
            border-color: var(--accent);
            background: var(--accent-soft);
        }

        .tpl-dropzone-icon {
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 1rem;
            background: #fff;
            border: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: transform 0.15s ease;
        }

        .tpl-dropzone:hover .tpl-dropzone-icon {
            transform: scale(1.05);
        }

        .tpl-badge-soft {
            display: inline-flex;
            border-radius: 0.55rem;
            background: var(--paper-soft);
            border: 1px solid var(--line);
            color: var(--ink-soft);
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.35rem 0.7rem;
        }

        .tpl-preview-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-radius: 0.85rem;
            border: 1px solid var(--line);
            background: #fff;
            padding: 0.75rem;
        }

        .tpl-preview-icon {
            width: 2.25rem;
            height: 2.25rem;
            border-radius: 0.6rem;
            background: var(--paper-soft);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .tpl-file-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 1rem;
            padding: 1.25rem;
            transition: border-color 0.15s ease;
        }

        .tpl-file-card:hover {
            border-color: var(--ink-soft);
        }

        .tpl-file-icon {
            width: 3rem;
            height: 3rem;
            border-radius: 0.85rem;
            background: var(--paper-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .tpl-row-action {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.5rem 0.75rem;
            border-radius: 0.55rem;
            white-space: nowrap;
            transition: background 0.15s ease;
        }

        .tpl-row-action--accent {
            color: var(--accent-ink);
            background: var(--accent-soft);
        }

        .tpl-row-action--accent:hover {
            background: #d6e6db;
        }

        .tpl-row-action--danger {
            color: var(--danger);
            background: var(--danger-soft);
        }

        .tpl-row-action--danger:hover {
            background: #f2d5cd;
        }

        .tpl-empty {
            text-align: center;
            padding: 3.5rem 1.5rem;
            background: #fff;
            border: 1px dashed var(--line);
            border-radius: 1rem;
            color: var(--ink-soft);
            font-size: 0.875rem;
        }

        .tpl-info-box {
            border-radius: 0.85rem;
            background: var(--accent-soft);
            border: 1px solid var(--accent);
            padding: 1.1rem 1.25rem;
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
                            Kelola Berkas
                        </h1>

                        <p class="mt-2 max-w-2xl text-sm leading-6 sm:text-base" style="color: var(--ink-soft)">
                            Simpan CV dan dokumen pendukung yang akan digunakan
                            sebagai lampiran saat mengirim lamaran.
                        </p>

                    </div>


                    <a
                        href="{{ route('apply.index') }}"
                        class="tpl-btn-secondary">

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 19l-7-7 7-7" />
                        </svg>

                        Apply Job

                    </a>

                </div>

            </div>


            {{-- =====================================================
                SUCCESS
            ====================================================== --}}
            @if (session('success'))

            <div class="tpl-alert tpl-alert--accent mb-6">

                <div class="flex items-center gap-3">

                    <div class="tpl-alert-icon" style="background: var(--accent-soft); color: var(--accent-ink)">
                        ✓
                    </div>

                    <p class="text-sm font-medium" style="color: var(--accent-ink)">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

            @endif


            {{-- =====================================================
                ERROR
            ====================================================== --}}
            @if ($errors->any())

            <div class="tpl-alert tpl-alert--danger mb-6">

                <div class="flex items-start gap-3">

                    <div class="tpl-alert-icon" style="background: var(--danger-soft); color: var(--danger)">
                        !
                    </div>


                    <div>

                        <p class="text-sm font-semibold" style="color: var(--danger)">
                            Upload gagal
                        </p>


                        <ul class="mt-2 space-y-1 text-sm" style="color: var(--danger)">

                            @foreach ($errors->all() as $error)

                            <li>
                                • {{ $error }}
                            </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

            @endif


            {{-- =====================================================
                UPLOAD CARD
            ====================================================== --}}
            <div class="tpl-card">

                <div class="tpl-card-header">

                    <div class="flex items-center gap-3">

                        <div class="tpl-icon tpl-icon--meta">
                            ☁️
                        </div>


                        <div>

                            <h2 class="tpl-serif text-base font-semibold" style="color: var(--ink)">
                                Upload Berkas
                            </h2>

                            <p class="mt-1 text-xs" style="color: var(--ink-soft)">
                                Upload satu atau beberapa file sekaligus.
                            </p>

                        </div>

                    </div>

                </div>


                <form
                    action="{{ route('files.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="tpl-card-body">

                    @csrf


                    <label
                        for="files"
                        class="tpl-dropzone">

                        <div class="tpl-dropzone-icon">
                            📄
                        </div>


                        <h3 class="mt-4 text-sm font-semibold" style="color: var(--ink)">
                            Pilih berkas untuk diunggah
                        </h3>


                        <p class="mt-1 text-sm" style="color: var(--ink-soft)">
                            Klik di sini untuk memilih satu atau beberapa file.
                        </p>


                        <span class="tpl-badge-soft mt-3">
                            PDF · DOC · DOCX · JPG · PNG
                        </span>


                        <input
                            type="file"
                            name="files[]"
                            id="files"
                            multiple
                            required
                            accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                            class="sr-only">

                    </label>


                    {{-- Selected files preview --}}
                    <div
                        id="selected-files"
                        class="mt-4 hidden">

                        <p class="mb-2 text-xs font-semibold uppercase tracking-wide" style="color: var(--ink-soft)">
                            File yang dipilih
                        </p>


                        <div
                            id="selected-files-list"
                            class="space-y-2"></div>

                    </div>


                    <div class="mt-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                        <p class="text-xs leading-5" style="color: var(--ink-soft)">
                            Maksimal 10 MB per file.
                        </p>


                        <button
                            type="submit"
                            class="tpl-btn-primary">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 3v12m0-12l-4 4m4-4l4 4" />
                            </svg>

                            Upload Berkas

                        </button>

                    </div>

                </form>

            </div>


            {{-- =====================================================
                FILE LIST
            ====================================================== --}}
            <div class="mt-8">

                <div class="mb-5 flex items-end justify-between">

                    <div>

                        <div class="flex items-center gap-2">

                            <span class="text-lg">
                                📁
                            </span>

                            <h2 class="tpl-serif text-xl font-semibold" style="color: var(--ink)">
                                Berkas Tersimpan
                            </h2>

                        </div>


                        <p class="mt-1 text-sm" style="color: var(--ink-soft)">
                            {{ count($files) }} berkas tersedia untuk digunakan.
                        </p>

                    </div>

                </div>


                @if(count($files) > 0)

                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">

                    @foreach($files as $file)

                    @php

                    $extension = strtolower(
                    pathinfo($file['name'], PATHINFO_EXTENSION)
                    );

                    $icon = match ($extension) {
                    'pdf' => '📕',
                    'doc', 'docx' => '📘',
                    'jpg', 'jpeg', 'png' => '🖼️',
                    default => '📄',
                    };

                    $fileSize =
                    $file['size'] >= 1024 * 1024
                    ? number_format($file['size'] / (1024 * 1024), 2) . ' MB'
                    : number_format($file['size'] / 1024, 1) . ' KB';

                    @endphp


                    <div class="tpl-file-card">

                        <div class="flex items-start gap-4">

                            <div class="tpl-file-icon">
                                {{ $icon }}
                            </div>


                            <div class="min-w-0 flex-1">

                                <p
                                    class="truncate text-sm font-semibold"
                                    style="color: var(--ink)"
                                    title="{{ $file['name'] }}">
                                    {{ $file['name'] }}
                                </p>


                                <div class="mt-1 flex items-center gap-2 text-xs" style="color: var(--ink-soft)">

                                    <span>
                                        {{ strtoupper($extension) }}
                                    </span>

                                    <span>
                                        •
                                    </span>

                                    <span>
                                        {{ $fileSize }}
                                    </span>

                                </div>

                            </div>

                        </div>


                        <div class="mt-4 flex items-center gap-2">

                            <a
                                href="{{ route('files.download', ['filename' => $file['name']]) }}"
                                class="tpl-row-action tpl-row-action--accent flex flex-1 items-center justify-center gap-2">

                                ↓
                                Download

                            </a>


                            <form
                                action="{{ route('files.destroy', ['filename' => $file['name']]) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus file ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="tpl-row-action tpl-row-action--danger"
                                    title="Hapus">
                                    🗑
                                </button>

                            </form>

                        </div>

                    </div>

                    @endforeach

                </div>

                @else

                <div class="tpl-empty">

                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl text-2xl" style="background: var(--paper-soft)">
                        📭
                    </div>


                    <h3 class="mt-4 text-sm font-semibold" style="color: var(--ink)">
                        Belum ada berkas
                    </h3>


                    <p class="mx-auto mt-1 max-w-md text-sm leading-6" style="color: var(--ink-soft)">
                        Upload CV dan dokumen pendukung agar dapat
                        langsung dipilih ketika membuat lamaran.
                    </p>

                </div>

                @endif

            </div>


            {{-- =====================================================
                INFORMATION
            ====================================================== --}}
            <div class="tpl-info-box mt-8">

                <div class="flex items-start gap-3">

                    <div class="text-lg">
                        💡
                    </div>

                    <div>

                        <h3 class="text-sm font-semibold" style="color: var(--accent-ink)">
                            Bagaimana cara kerjanya?
                        </h3>

                        <p class="mt-1 text-sm leading-6" style="color: var(--accent-ink)">
                            File yang kamu upload ke halaman ini akan otomatis
                            muncul di bagian <strong>Lampiran</strong> pada halaman
                            <strong>Apply Job</strong>. Jadi kamu cukup mengelola
                            dokumen sekali dan dapat menggunakannya berkali-kali
                            untuk melamar pekerjaan.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
        FILE PREVIEW JAVASCRIPT
    ====================================================== --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const input =
                document.getElementById('files');

            const wrapper =
                document.getElementById('selected-files');

            const list =
                document.getElementById('selected-files-list');


            if (!input || !wrapper || !list) {
                return;
            }


            input.addEventListener('change', function() {

                list.innerHTML = '';


                if (!input.files.length) {

                    wrapper.classList.add('hidden');

                    return;
                }


                wrapper.classList.remove('hidden');


                Array.from(input.files).forEach(function(file) {

                    const item =
                        document.createElement('div');

                    item.className = 'tpl-preview-item';


                    item.innerHTML = `
                        <div class="tpl-preview-icon">
                            📄
                        </div>

                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm font-medium" style="color: var(--ink)">
                                ${file.name}
                            </p>

                            <p class="text-xs" style="color: var(--ink-soft)">
                                ${(file.size / 1024).toFixed(1)} KB
                            </p>
                        </div>
                    `;


                    list.appendChild(item);

                });

            });

        });
    </script>

</x-app-layout>