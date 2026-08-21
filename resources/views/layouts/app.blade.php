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

</html>