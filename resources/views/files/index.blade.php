<x-app-layout title="Berkas — Auto Apply Mailer">

    <div class="min-h-[calc(100vh-5rem)] bg-gray-50">

        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

            {{-- =====================================================
                HEADER
            ====================================================== --}}
            <div class="mb-8">

                <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                    <div>


                        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                            Kelola Berkas
                        </h1>


                        <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-500 sm:text-base">
                            Simpan CV dan dokumen pendukung yang akan digunakan
                            sebagai lampiran saat mengirim lamaran.
                        </p>

                    </div>


                    <a
                        href="{{ route('apply.index') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm transition hover:border-gray-300 hover:bg-gray-50">

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

            <div
                class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4">

                <div class="flex items-center gap-3">

                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-emerald-100 font-bold text-emerald-600">
                        ✓
                    </div>

                    <p class="text-sm font-medium text-emerald-800">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

            @endif


            {{-- =====================================================
                ERROR
            ====================================================== --}}
            @if ($errors->any())

            <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4">

                <div class="flex items-start gap-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-red-100 font-bold text-red-600">
                        !
                    </div>


                    <div>

                        <p class="text-sm font-semibold text-red-800">
                            Upload gagal
                        </p>


                        <ul class="mt-2 space-y-1 text-sm text-red-700">

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
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                <div class="border-b border-gray-100 px-6 py-5">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-lg">
                            ☁️
                        </div>


                        <div>

                            <h2 class="text-base font-bold text-gray-900">
                                Upload Berkas
                            </h2>

                            <p class="mt-1 text-xs text-gray-500">
                                Upload satu atau beberapa file sekaligus.
                            </p>

                        </div>

                    </div>

                </div>


                <form
                    action="{{ route('files.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="p-6">

                    @csrf


                    <label
                        for="files"
                        class="group flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 px-6 py-12 text-center transition hover:border-indigo-400 hover:bg-indigo-50/40">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white text-2xl shadow-sm transition group-hover:scale-105">
                            📄
                        </div>


                        <h3 class="mt-4 text-sm font-bold text-gray-900">
                            Pilih berkas untuk diunggah
                        </h3>


                        <p class="mt-1 text-sm text-gray-500">
                            Klik di sini untuk memilih satu atau beberapa file.
                        </p>


                        <span class="mt-3 rounded-lg bg-white px-3 py-1.5 text-xs font-medium text-gray-500 shadow-sm">
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

                        <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-gray-400">
                            File yang dipilih
                        </p>


                        <div
                            id="selected-files-list"
                            class="space-y-2"></div>

                    </div>


                    <div class="mt-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                        <p class="text-xs leading-5 text-gray-400">
                            Maksimal 10 MB per file.
                        </p>


                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">

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

                            <h2 class="text-xl font-bold tracking-tight text-gray-900">
                                Berkas Tersimpan
                            </h2>

                        </div>


                        <p class="mt-1 text-sm text-gray-500">
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


                    <div class="group rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

                        <div class="flex items-start gap-4">

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-gray-50 text-xl">
                                {{ $icon }}
                            </div>


                            <div class="min-w-0 flex-1">

                                <p
                                    class="truncate text-sm font-semibold text-gray-900"
                                    title="{{ $file['name'] }}">
                                    {{ $file['name'] }}
                                </p>


                                <div class="mt-1 flex items-center gap-2 text-xs text-gray-400">

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
                                class="inline-flex flex-1 items-center justify-center gap-2 rounded-lg bg-indigo-50 px-3 py-2 text-xs font-semibold text-indigo-700 transition hover:bg-indigo-100">

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
                                    class="inline-flex items-center justify-center rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100"
                                    title="Hapus">
                                    🗑
                                </button>

                            </form>

                        </div>

                    </div>

                    @endforeach

                </div>

                @else

                <div class="rounded-2xl border border-dashed border-gray-300 bg-white px-6 py-16 text-center">

                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gray-100 text-2xl">
                        📭
                    </div>


                    <h3 class="mt-4 text-sm font-bold text-gray-900">
                        Belum ada berkas
                    </h3>


                    <p class="mx-auto mt-1 max-w-md text-sm leading-6 text-gray-500">
                        Upload CV dan dokumen pendukung agar dapat
                        langsung dipilih ketika membuat lamaran.
                    </p>

                </div>

                @endif

            </div>


            {{-- =====================================================
                INFORMATION
            ====================================================== --}}
            <div class="mt-8 rounded-2xl border border-indigo-100 bg-indigo-50/60 p-5">

                <div class="flex items-start gap-3">

                    <div class="text-lg">
                        💡
                    </div>

                    <div>

                        <h3 class="text-sm font-bold text-indigo-900">
                            Bagaimana cara kerjanya?
                        </h3>

                        <p class="mt-1 text-sm leading-6 text-indigo-700">
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

                    item.className =
                        'flex items-center gap-3 rounded-xl border border-gray-200 bg-white p-3';


                    item.innerHTML = `
                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-gray-50">
                            📄
                        </div>

                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm font-medium text-gray-700">
                                ${file.name}
                            </p>

                            <p class="text-xs text-gray-400">
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