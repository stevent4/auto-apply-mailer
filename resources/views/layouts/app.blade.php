@props([
'title' => 'Auto Apply Mailer'
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    {{-- Dynamic Page Title --}}
    <title>{{ $title }}</title>

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}"> {{-- Metadata utama --}}
    <meta name="application-name" content="Auto Apply Mailer">
    <meta name="description" content="Auto Apply Mailer adalah aplikasi web untuk membantu pencari kerja mengelola lowongan, menyiapkan dokumen lamaran, membuat email lamaran yang dipersonalisasi, dan mengirim lamaran melalui akun email pengguna.">
    <meta name="keywords" content="manajemen lamaran kerja, lamaran kerja, pencarian kerja, email lamaran, resume, surat lamaran, Auto Apply Mailer">
    <meta name="author" content="Auto Apply Mailer">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#2563eb"> {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Auto Apply Mailer">
    <meta property="og:title" content="Auto Apply Mailer — Manajemen Lamaran Kerja">
    <meta property="og:description" content="Kelola lowongan kerja, siapkan dokumen lamaran, buat email yang dipersonalisasi, dan kirim lamaran melalui akun email Anda.">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ asset('og-image.png') }}"> {{-- Twitter / social sharing --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Auto Apply Mailer — Manajemen Lamaran Kerja">
    <meta name="twitter:description" content="Aplikasi untuk membantu pencari kerja mengelola dan mengirim lamaran kerja yang dipersonalisasi.">
    <meta name="twitter:image" content="{{ asset('og-image.png') }}"> {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url('/') }}">



    <link rel="preconnect" href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600,700"
        rel="stylesheet" />

    @vite([
    'resources/css/app.css',
    'resources/js/app.js'
    ])
</head>

<body class="font-sans antialiased text-gray-900">

    <div class="min-h-screen bg-gray-50">

        @include('layouts.navigation')

        @isset($header)
        <header class="border-b border-gray-200 bg-white">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <main>
            {{ $slot }}
        </main>

    </div>

</body>


{{-- =========================================================
        SUMMERNOTE CSS
    ========================================================== --}}
<script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
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
                'lineheight spacebefore spaceafter | table | link image media | fullscreen code help',
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
                /* Tambahan: rapatkan tinggi baris tabel */
                        table { border-collapse: collapse; }
                        table td, table th {
                            padding: 4px 8px !important;
                            vertical-align: top;
                            line-height: 1.4;
                        }
                        table td p, table th p {
                            margin: 0 !important;
                            padding: 0 !important;
                        }
            `,
            formats: {
                spacebefore: {
                    selector: 'p,div,li',
                    styles: {
                        marginTop: '1em'
                    }
                },
                nospacebefore: {
                    selector: 'p,div,li',
                    styles: {
                        marginTop: '0'
                    }
                },
                spaceafter: {
                    selector: 'p,div,li',
                    styles: {
                        marginBottom: '1em'
                    }
                },
                nospaceafter: {
                    selector: 'p,div,li',
                    styles: {
                        marginBottom: '0'
                    }
                }
            },
            setup: function(editor) {
                editor.ui.registry.addButton('spacebefore', {
                    icon: 'line-height',
                    tooltip: 'Add/Remove Space Before Paragraph',
                    onAction: function() {
                        const isActive = editor.formatter.match('spacebefore');
                        if (isActive) {
                            editor.formatter.remove('spacebefore');
                            editor.formatter.apply('nospacebefore');
                        } else {
                            editor.formatter.remove('nospacebefore');
                            editor.formatter.apply('spacebefore');
                        }
                    }
                });
                editor.ui.registry.addButton('spaceafter', {
                    icon: 'line-height',
                    tooltip: 'Add/Remove Space After Paragraph',
                    onAction: function() {
                        const isActive = editor.formatter.match('spaceafter');
                        if (isActive) {
                            editor.formatter.remove('spaceafter');
                            editor.formatter.apply('nospaceafter');
                        } else {
                            editor.formatter.remove('nospaceafter');
                            editor.formatter.apply('spaceafter');
                        }
                    }
                });
            }
        };
    }
</script>
<style>
    .tox-dialog textarea,
    .tox-textarea {
        color: #1f2937 !important;
        background-color: #ffffff !important;
        -webkit-text-fill-color: #1f2937 !important;
        opacity: 1 !important;
    }
</style>

</html>