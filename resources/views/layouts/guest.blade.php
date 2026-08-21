@props([
    'title' => 'Auto Apply Mailer'
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}">

    {{-- Dynamic Page Title --}}
    <title>{{ $title }}</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">

    {{-- Basic metadata --}}
    <meta name="application-name" content="Auto Apply Mailer">

    <meta
        name="description"
        content="Auto Apply Mailer adalah aplikasi web untuk membantu pencari kerja mengelola lowongan kerja, dokumen lamaran, email lamaran, dan proses pengiriman lamaran melalui akun email pengguna.">

    <meta name="author" content="Auto Apply Mailer">
    <meta name="robots" content="index, follow">

    <meta name="theme-color" content="#4f46e5">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Auto Apply Mailer">
    <meta property="og:title" content="{{ $title }}">

    <meta
        property="og:description"
        content="Aplikasi web untuk membantu pencari kerja mengelola informasi lowongan, dokumen lamaran, email lamaran, dan proses pengiriman lamaran.">

    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('og-image.png') }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title }}">

    <meta
        name="twitter:description"
        content="Aplikasi untuk membantu pencari kerja mengelola dan mengirim lamaran kerja.">

    <meta name="twitter:image" content="{{ asset('og-image.png') }}">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-50 font-sans text-slate-900 antialiased">

    <div class="flex min-h-screen items-center justify-center px-4 py-8 sm:px-6">

        <div class="w-full sm:max-w-md">

            <div class="overflow-hidden rounded-2xl bg-white p-6 shadow-xl shadow-slate-200/70 sm:p-8">

                {{ $slot }}

            </div>

            <div class="mt-5 text-center text-xs text-slate-400">

                <a
                    href="{{ route('privacy-policy') }}"
                    class="hover:text-indigo-600 hover:underline">
                    Privacy Policy
                </a>

                <span class="mx-1.5">·</span>

                <a
                    href="{{ route('terms') }}"
                    class="hover:text-indigo-600 hover:underline">
                    Terms of Service
                </a>

            </div>

        </div>

    </div>

</body>

</html>