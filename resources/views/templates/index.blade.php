<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Template Email & Surat Lamaran
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4">

            @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg text-sm">
                {{ session('success') }}
            </div>
            @endif

            {{-- Filter Type --}}
            <div class="flex gap-2 mb-6">
                <a href="{{ route('templates.index') }}"
                    class="px-3 py-1.5 rounded-lg text-sm {{ !request('type') ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700' }}">
                    Semua
                </a>
                <a href="{{ route('templates.index', ['type' => 'email']) }}"
                    class="px-3 py-1.5 rounded-lg text-sm {{ request('type') === 'email' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700' }}">
                    Email
                </a>
                <a href="{{ route('templates.index', ['type' => 'pdf']) }}"
                    class="px-3 py-1.5 rounded-lg text-sm {{ request('type') === 'pdf' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700' }}">
                    Cover Letter
                </a>
            </div>

            {{-- Form Buat Template Baru --}}
            <div class="bg-white border border-gray-200 rounded-xl p-5 mb-8">
                <h2 class="font-semibold text-gray-800 mb-3">Buat Template Baru</h2>

                <form method="POST" action="{{ route('templates.store') }}">
                    @csrf

                    <div class="grid grid-cols-2 gap-4 mb-3">
                        <div>
                            <label class="text-sm text-gray-600">Nama Template</label>
                            <input type="text" name="name" required
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                        </div>
                        <div>
                            <label class="text-sm text-gray-600">Type</label>
                            <select name="type" required class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                                <option value="email">Email</option>
                                <option value="pdf">Cover Letter</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-3">
                        <div>
                            <label class="text-sm text-gray-600">Kategori (opsional)</label>
                            <input type="text" name="category" placeholder="mis. Formal, IT"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                        </div>
                        <div>
                            <label class="text-sm text-gray-600">Subject (khusus Email)</label>
                            <input type="text" name="subject" placeholder="Lamaran {{'{{'}}position{{'}}'}} - {{'{{'}}applicant_name{{'}}'}}"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                        </div>
                    </div>

                    {{-- Insert Variable Picker --}}
                    <div class="mb-2">
                        <label class="text-sm text-gray-600 block mb-1">Insert Variable:</label>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach ($variableGroups as $group => $vars)
                            @foreach ($vars as $var)
                            <button type="button"
                                onclick="insertVariable('create-body', '{{ $var }}')"
                                class="text-xs px-2 py-1 bg-gray-100 hover:bg-indigo-100 text-gray-700 rounded">
                                {{ $var }}
                            </button>
                            @endforeach
                            @endforeach
                        </div>
                    </div>

                    <textarea id="create-body" name="body" rows="6" required
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm font-mono"
                        placeholder="Isi template di sini, gunakan tombol variable di atas..."></textarea>

                    <button type="submit"
                        class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700">
                        Simpan Template
                    </button>
                </form>
            </div>

            {{-- Daftar Template --}}
            <div class="space-y-3">
                @forelse ($templates as $template)
                <div class="bg-white border border-gray-200 rounded-xl p-4">
                    <div class="flex items-start justify-between">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-gray-800">{{ $template->name }}</span>
                                <span class="text-xs px-2 py-0.5 rounded-full {{ $template->type === 'email' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700' }}">
                                    {{ $template->type === 'email' ? 'Email' : 'Cover Letter' }}
                                </span>
                                @if ($template->is_default)
                                <span class="text-xs px-2 py-0.5 rounded-full bg-green-100 text-green-700">Default</span>
                                @endif
                                @if (is_null($template->user_id))
                                <span class="text-xs px-2 py-0.5 rounded-full bg-gray-100 text-gray-600">Bawaan Sistem</span>
                                @endif
                            </div>
                            @if ($template->category)
                            <p class="text-xs text-gray-500 mt-1">Kategori: {{ $template->category }}</p>
                            @endif
                        </div>

                        @if ($template->user_id === auth()->id())
                        <div class="flex gap-2">
                            @unless ($template->is_default)
                            <form method="POST" action="{{ route('templates.setDefault', $template) }}">
                                @csrf
                                <button class="text-xs text-indigo-600 hover:underline">Jadikan Default</button>
                            </form>
                            @endunless
                            <button onclick="document.getElementById('edit-{{ $template->id }}').classList.toggle('hidden')"
                                class="text-xs text-gray-600 hover:underline">Edit</button>
                            <form method="POST" action="{{ route('templates.destroy', $template) }}"
                                onsubmit="return confirm('Hapus template ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-xs text-red-600 hover:underline">Hapus</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    <pre class="text-xs text-gray-600 mt-2 whitespace-pre-wrap">{{ \Illuminate\Support\Str::limit($template->body, 150) }}</pre>

                    {{-- Form Edit (hidden by default) --}}
                    @if ($template->user_id === auth()->id())
                    <div id="edit-{{ $template->id }}" class="hidden mt-4 pt-4 border-t border-gray-100">
                        <form method="POST" action="{{ route('templates.update', $template) }}">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-2 gap-4 mb-3">
                                <div>
                                    <label class="text-sm text-gray-600">Nama Template</label>
                                    <input type="text" name="name" value="{{ $template->name }}" required
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                                </div>
                                <div>
                                    <label class="text-sm text-gray-600">Subject</label>
                                    <input type="text" name="subject" value="{{ $template->subject }}"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
                                </div>
                            </div>

                            <div class="mb-2">
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach ($variableGroups as $group => $vars)
                                    @foreach ($vars as $var)
                                    <button type="button"
                                        onclick="insertVariable('edit-body-{{ $template->id }}', '{{ $var }}')"
                                        class="text-xs px-2 py-1 bg-gray-100 hover:bg-indigo-100 text-gray-700 rounded">
                                        {{ $var }}
                                    </button>
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>

                            <textarea id="edit-body-{{ $template->id }}" name="body" rows="6" required
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm font-mono">{{ $template->body }}</textarea>

                            <button type="submit"
                                class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700">
                                Update Template
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
                @empty
                <p class="text-gray-500 text-sm">Belum ada template. Buat yang pertama di atas.</p>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        function insertVariable(textareaId, variableName) {
            const textarea = document.getElementById(textareaId);
            const placeholder = '{{' + variableName + '}}';
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const before = textarea.value.substring(0, start);
            const after = textarea.value.substring(end);

            textarea.value = before + placeholder + after;
            textarea.focus();
            textarea.selectionStart = textarea.selectionEnd = start + placeholder.length;
        }
    </script>
</x-app-layout>