<x-app-layout>

    {{-- =========================================================
        FONT & TOKEN SISTEM HALAMAN INI
        Serif untuk nama template (kesan surat), sans untuk UI.
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

        /* Tab filter */
        .tpl-tab {
            font-size: 0.8125rem;
            font-weight: 500;
            padding: 0.5rem 0.9rem;
            border-radius: 0.6rem;
            color: var(--ink-soft);
            transition: background 0.15s ease, color 0.15s ease;
        }

        .tpl-tab:hover {
            background: var(--paper-soft);
            color: var(--ink);
        }

        .tpl-tab.is-active {
            background: var(--ink);
            color: var(--paper);
        }

        /* Kartu buat template — kesan kertas surat baru, garis putus di atas */
        .tpl-compose {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 1rem;
            position: relative;
        }

        .tpl-compose::before {
            content: '';
            position: absolute;
            top: -1px;
            left: 1.5rem;
            right: 1.5rem;
            height: 1px;
            background-image: repeating-linear-gradient(90deg, var(--line) 0 6px, transparent 6px 12px);
        }

        .tpl-label {
            font-size: 0.8125rem;
            font-weight: 500;
            color: var(--ink-soft);
            margin-bottom: 0.375rem;
            display: block;
        }

        .tpl-input {
            width: 100%;
            border: 1px solid var(--line);
            background: var(--paper);
            border-radius: 0.65rem;
            padding: 0.6rem 0.85rem;
            font-size: 0.875rem;
            color: var(--ink);
            transition: border-color 0.15s ease, background 0.15s ease;
        }

        .tpl-input:focus {
            outline: none;
            border-color: var(--accent);
            background: #fff;
        }

        .tpl-chip {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.3rem 0.65rem;
            border-radius: 0.5rem;
            background: var(--paper-soft);
            color: var(--ink-soft);
            border: 1px solid var(--line);
            transition: background 0.15s ease, color 0.15s ease, border-color 0.15s ease;
        }

        .tpl-chip:hover {
            background: var(--accent-soft);
            color: var(--accent-ink);
            border-color: var(--accent);
        }

        .tpl-chip--sm {
            font-size: 0.6875rem;
            padding: 0.2rem 0.5rem;
        }

        .tpl-btn-primary {
            background: var(--accent);
            color: #fff;
            font-size: 0.875rem;
            font-weight: 600;
            padding: 0.65rem 1.25rem;
            border-radius: 0.65rem;
            transition: background 0.15s ease;
        }

        .tpl-btn-primary:hover {
            background: var(--accent-ink);
        }

        /* Tag tipe template */
        .tpl-tag {
            font-size: 0.6875rem;
            font-weight: 600;
            padding: 0.2rem 0.55rem;
            border-radius: 0.4rem;
            letter-spacing: 0.01em;
        }

        .tpl-tag--email {
            background: var(--accent-soft);
            color: var(--accent-ink);
        }

        .tpl-tag--pdf {
            background: var(--clay-soft);
            color: var(--clay);
        }

        .tpl-tag--meta {
            background: var(--paper-soft);
            color: var(--ink-soft);
        }

        /* Baris daftar template — tab warna di kiri, bukan shadow kartu generik */
        .tpl-row {
            background: #fff;
            border: 1px solid var(--line);
            border-left-width: 3px;
            border-radius: 0.85rem;
            padding: 1.1rem 1.25rem;
            transition: border-color 0.15s ease;
        }

        .tpl-row--email {
            border-left-color: var(--accent);
        }

        .tpl-row--pdf {
            border-left-color: var(--clay);
        }

        .tpl-row:hover {
            border-color: var(--ink-soft);
            border-left-width: 3px;
        }

        .tpl-row-action {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.4rem 0.7rem;
            border-radius: 0.5rem;
            white-space: nowrap;
            transition: background 0.15s ease;
        }

        .tpl-row-action--accent {
            color: var(--accent-ink);
        }

        .tpl-row-action--accent:hover {
            background: var(--accent-soft);
        }

        .tpl-row-action--ink {
            color: var(--ink-soft);
        }

        .tpl-row-action--ink:hover {
            background: var(--paper-soft);
            color: var(--ink);
        }

        .tpl-row-action--danger {
            color: var(--danger);
        }

        .tpl-row-action--danger:hover {
            background: var(--danger-soft);
        }

        .tpl-snippet {
            font-size: 0.8125rem;
            line-height: 1.6;
            color: var(--ink-soft);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .tpl-empty {
            text-align: center;
            padding: 3.5rem 1.5rem;
            background: var(--paper-soft);
            border: 1px dashed var(--line);
            border-radius: 1rem;
            color: var(--ink-soft);
            font-size: 0.875rem;
        }

        .tpl-alert {
            background: var(--accent-soft);
            border: 1px solid var(--accent);
            color: var(--accent-ink);
            border-radius: 0.85rem;
            padding: 0.85rem 1.1rem;
            font-size: 0.875rem;
            font-weight: 500;
        }
    </style>

    <div class="tpl-page py-8 min-h-screen">
        <div class="max-w-5xl mx-auto px-4">

            <div class="mb-6">
                <h1 class="tpl-serif text-2xl font-semibold" style="color: var(--ink)">
                    Template surat & email
                </h1>
                <p class="mt-1 text-sm" style="color: var(--ink-soft)">
                    Simpan pola tulisan yang sering kamu pakai, isi ulang otomatis lewat variable.
                </p>
            </div>

            @if (session('success'))
            <div class="tpl-alert mb-6">
                {{ session('success') }}
            </div>
            @endif

            {{-- Form Buat Template Baru --}}
            <div class="tpl-compose p-6 mb-10">
                <h2 class="tpl-serif text-lg font-semibold mb-4" style="color: var(--ink)">
                    Tulis template baru
                </h2>

                <form method="POST" action="{{ route('templates.store') }}">
                    @csrf

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="tpl-label">Nama template</label>
                            <input type="text" name="name" required class="tpl-input">
                        </div>
                        <div>
                            <label class="tpl-label">Tipe</label>
                            <select name="type" required class="tpl-input" id="type-select"
                                onchange="toggleSubjectField(this.value); toggleBodyEditor(this.value)">
                                <option value="email">Email</option>
                                <option value="pdf">Cover letter</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="tpl-label">Kategori (opsional)</label>
                            <input type="text" name="category" placeholder="mis. Formal, IT" class="tpl-input">
                        </div>
                        <div id="subject-field-wrapper">
                            <label class="tpl-label">Subjek (khusus email)</label>
                            <input type="text" name="subject" id="create-subject" placeholder="Lamaran @{{position}} - @{{applicant_name}}" class="tpl-input">

                            {{-- Variable picker khusus Subjek --}}
                            <div class="flex flex-wrap gap-1 mt-2">
                                @foreach ($variableGroups as $group => $vars)
                                @foreach ($vars as $var)
                                <button type="button"
                                    onclick="insertVariable('create-subject', '{{ $var }}')"
                                    class="tpl-chip tpl-chip--sm">
                                    {{ $var }}
                                </button>
                                @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Insert Variable Picker (Body) --}}
                    <div class="mb-3">
                        <label class="tpl-label">Sisipkan variable (Isi)</label>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach ($variableGroups as $group => $vars)
                            @foreach ($vars as $var)
                            <button type="button"
                                onclick="insertVariable('create-body', '{{ $var }}')"
                                class="tpl-chip">
                                {{ $var }}
                            </button>
                            @endforeach
                            @endforeach
                        </div>
                    </div>

                    {{--
                        Body: textarea polos untuk Email (dikirim sebagai plain text
                        via nl2br() di controller), TinyMCE hanya untuk Cover Letter
                        (HTML dibutuhkan untuk generate PDF).
                    --}}
                    <textarea id="create-body" name="body" rows="6"
                        class="tpl-input font-mono"
                        placeholder="Isi template di sini, gunakan tombol variable di atas..."></textarea>

                    <p id="create-body-hint" class="mt-1 text-xs" style="color: var(--ink-soft)">
                        Template Email dikirim sebagai teks polos — tanpa formatting bold/italic/tabel.
                    </p>

                    <button type="submit" class="tpl-btn-primary mt-4">
                        Simpan template
                    </button>
                </form>
            </div>

            {{-- Filter Type --}}
            <div class="inline-flex gap-1 mb-6 p-1 rounded-xl" style="background: var(--paper-soft); border: 1px solid var(--line)">
                <a href="{{ route('templates.index') }}" class="tpl-tab {{ !request('type') ? 'is-active' : '' }}">
                    Semua
                </a>
                <a href="{{ route('templates.index', ['type' => 'email']) }}" class="tpl-tab {{ request('type') === 'email' ? 'is-active' : '' }}">
                    Email
                </a>
                <a href="{{ route('templates.index', ['type' => 'pdf']) }}" class="tpl-tab {{ request('type') === 'pdf' ? 'is-active' : '' }}">
                    Cover letter
                </a>
            </div>

            {{-- Daftar Template --}}
            <div class="space-y-3">
                @forelse ($templates as $template)
                <div class="tpl-row {{ $template->type === 'email' ? 'tpl-row--email' : 'tpl-row--pdf' }}">
                    <div class="flex items-start justify-between gap-4">
                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-center gap-2 mb-1.5">
                                <h3 class="tpl-serif font-semibold text-base" style="color: var(--ink)">
                                    {{ $template->name }}
                                </h3>

                                <span class="tpl-tag {{ $template->type === 'email' ? 'tpl-tag--email' : 'tpl-tag--pdf' }}">
                                    {{ $template->type === 'email' ? 'Email' : 'Cover letter' }}
                                </span>

                                @if ($template->is_default)
                                <span class="tpl-tag tpl-tag--meta">Default</span>
                                @endif

                                @if (is_null($template->user_id))
                                <span class="tpl-tag tpl-tag--meta">Bawaan sistem</span>
                                @endif
                            </div>

                            @if ($template->category)
                            <p class="text-xs mb-1.5" style="color: var(--ink-soft)">
                                Kategori: {{ $template->category }}
                            </p>
                            @endif

                            <p class="tpl-snippet">
                                {{ \Illuminate\Support\Str::limit(strip_tags($template->body), 160) }}
                            </p>
                        </div>

                        @if ($template->user_id === auth()->id())
                        <div class="flex items-center gap-1 shrink-0">
                            @unless ($template->is_default)
                            <form method="POST" action="{{ route('templates.setDefault', $template) }}">
                                @csrf
                                <button class="tpl-row-action tpl-row-action--accent">Jadikan default</button>
                            </form>
                            @endunless

                            <button data-template-id="{{ $template->id }}"
                                data-template-type="{{ $template->type }}"
                                class="tpl-row-action tpl-row-action--ink js-toggle-edit">Edit</button>

                            <form method="POST" action="{{ route('templates.destroy', $template) }}"
                                onsubmit="return confirm('Hapus template ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="tpl-row-action tpl-row-action--danger">Hapus</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    {{-- Form Edit (hidden by default) --}}
                    @if ($template->user_id === auth()->id())
                    <div id="edit-{{ $template->id }}" class="hidden mt-5 pt-5" style="border-top: 1px solid var(--line)">
                        <form method="POST" action="{{ route('templates.update', $template) }}">
                            @csrf
                            @method('PUT')

                            <div class="grid {{ $template->type === 'email' ? 'grid-cols-2' : 'grid-cols-1' }} gap-4 mb-4">
                                <div>
                                    <label class="tpl-label">Nama template</label>
                                    <input type="text" name="name" value="{{ $template->name }}" required class="tpl-input">
                                </div>

                                @if ($template->type === 'email')
                                <div>
                                    <label class="tpl-label">Subjek</label>
                                    <input type="text" name="subject" id="edit-subject-{{ $template->id }}" value="{{ $template->subject }}" class="tpl-input">

                                    {{-- Variable picker khusus Subjek (edit) --}}
                                    <div class="flex flex-wrap gap-1 mt-2">
                                        @foreach ($variableGroups as $group => $vars)
                                        @foreach ($vars as $var)
                                        <button type="button"
                                            onclick="insertVariable('edit-subject-{{ $template->id }}', '{{ $var }}')"
                                            class="tpl-chip tpl-chip--sm">
                                            {{ $var }}
                                        </button>
                                        @endforeach
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="tpl-label">Sisipkan variable (Isi)</label>
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach ($variableGroups as $group => $vars)
                                    @foreach ($vars as $var)
                                    <button type="button"
                                        onclick="insertVariable('edit-body-{{ $template->id }}', '{{ $var }}')"
                                        class="tpl-chip">
                                        {{ $var }}
                                    </button>
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>

                            {{--
                                Textarea body: TinyMCE otomatis diinisialisasi lewat JS
                                HANYA kalau $template->type === 'pdf' (lihat toggleEdit()).
                                Untuk type email, ini tetap textarea polos.
                            --}}
                            <textarea id="edit-body-{{ $template->id }}" name="body" rows="6"
                                class="tpl-input font-mono">{{ $template->body }}</textarea>

                            @if ($template->type === 'email')
                            <p class="mt-1 text-xs" style="color: var(--ink-soft)">
                                Template Email dikirim sebagai teks polos — tanpa formatting bold/italic/tabel.
                            </p>
                            @endif

                            <button type="submit" class="tpl-btn-primary mt-4">
                                Perbarui template
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
                @empty
                <div class="tpl-empty">
                    Belum ada template. Buat yang pertama di atas.
                </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- TinyMCE (self-hosted CDN, tidak perlu API key) --}}
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>

    <style>
        .tox-dialog textarea,
        .tox-textarea {
            color: #1f2937 !important;
            background-color: #ffffff !important;
            -webkit-text-fill-color: #1f2937 !important;
            opacity: 1 !important;
        }
    </style>

    @verbatim
    <script>
        function getTinyMCEConfig(selectorId) {
            return {
                selector: '#' + selectorId,
                license_key: 'gpl',
                height: 300,
                menubar: false,
                branding: false,
                plugins: 'lists link image media table code fullscreen help charmap',
                toolbar: 'bold italic underline strikethrough removeformat | ' +
                    'superscript subscript | fontsize fontfamily | forecolor backcolor | ' +
                    'bullist numlist | alignleft aligncenter alignright alignjustify | ' +
                    'lineheight | table | link image media | fullscreen code help',
                table_resize_bars: true,
                table_use_colgroups: true,
                table_default_attributes: {
                    border: '1'
                },
                table_default_styles: {
                    'border-collapse': 'collapse',
                    'width': '100%'
                },
                content_style: `
                    body { font-family: sans-serif; font-size: 14px; }
                    p, div, li { margin: 0; padding: 0; }
                    table td, table th { padding: 4px 8px; vertical-align: top; line-height: 1.4; }
                    table td p, table th p { margin: 0; padding: 0; }
                `
            };
        }

        /**
         * Insert {{variable}} langsung ke targetId yang diberikan.
         * Otomatis deteksi apakah targetId adalah editor TinyMCE
         * (Cover Letter) atau input/textarea polos (Email/Subjek).
         */
        function insertVariable(targetId, variableName) {
            const placeholder = '{' + '{' + variableName + '}' + '}';

            const editor = tinymce.get(targetId);
            if (editor) {
                editor.insertContent(placeholder);
                return;
            }

            const input = document.getElementById(targetId);
            if (!input) return;

            const start = input.selectionStart ?? input.value.length;
            const end = input.selectionEnd ?? input.value.length;
            const value = input.value;
            const scrollTopBefore = input.scrollTop; // simpan posisi scroll sebelum diubah

            input.value = value.substring(0, start) + placeholder + value.substring(end);

            const newCursorPos = start + placeholder.length;
            input.focus();
            input.setSelectionRange(newCursorPos, newCursorPos);

            // Browser sering otomatis scroll ke bawah setelah value diubah + focus()
            // dipanggil — kembalikan scroll ke posisi semula.
            input.scrollTop = scrollTopBefore;
        }

        /**
         * Form CREATE: aktifkan/nonaktifkan TinyMCE pada #create-body
         * tergantung Tipe yang dipilih. Email = textarea polos,
         * Cover letter = TinyMCE (butuh HTML untuk generate PDF).
         */
        function toggleBodyEditor(type) {
            const editor = tinymce.get('create-body');
            const hint = document.getElementById('create-body-hint');

            if (type === 'pdf') {
                if (!editor) {
                    tinymce.init(getTinyMCEConfig('create-body'));
                }
                if (hint) hint.style.display = 'none';
            } else {
                if (editor) {
                    editor.remove(); // kembalikan jadi textarea polos
                }
                if (hint) hint.style.display = 'block';
            }
        }

        /**
         * Daftar Template: toggle form edit + init TinyMCE HANYA
         * kalau template ini bertipe 'pdf' (Cover Letter).
         */
        function toggleEdit(templateId, templateType) {
            const container = document.getElementById('edit-' + templateId);
            container.classList.toggle('hidden');

            if (templateType === 'pdf') {
                const editorId = 'edit-body-' + templateId;
                if (!tinymce.get(editorId)) {
                    tinymce.init(getTinyMCEConfig(editorId));
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Init TinyMCE untuk create-body HANYA kalau default Tipe = pdf
            const initialType = document.getElementById('type-select')?.value;
            if (initialType === 'pdf') {
                tinymce.init(getTinyMCEConfig('create-body'));
                const hint = document.getElementById('create-body-hint');
                if (hint) hint.style.display = 'none';
            }

            document.querySelectorAll('.js-toggle-edit').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const templateId = this.getAttribute('data-template-id');
                    const templateType = this.getAttribute('data-template-type');
                    toggleEdit(templateId, templateType);
                });
            });

            document.querySelectorAll('form').forEach(function(form) {
                form.addEventListener('submit', function() {
                    tinymce.triggerSave();
                });
            });
        });

        // Toggle hide subject field for cover letter templates
        function toggleSubjectField(type) {
            const wrapper = document.getElementById('subject-field-wrapper');
            wrapper.style.display = (type === 'email') ? 'block' : 'none';
        }

        document.addEventListener('DOMContentLoaded', () => {
            const typeSelect = document.getElementById('type-select');
            if (typeSelect) {
                toggleSubjectField(typeSelect.value);
            }
        });
    </script>
    @endverbatim
</x-app-layout>