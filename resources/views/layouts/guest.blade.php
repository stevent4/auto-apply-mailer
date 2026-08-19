<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Auto Apply Mailer') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
        rel="stylesheet"
    />

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
                    class="hover:text-indigo-600 hover:underline"
                >
                    Privacy Policy
                </a>

                <span class="mx-1.5">·</span>

                <a
                    href="{{ route('terms') }}"
                    class="hover:text-indigo-600 hover:underline"
                >
                    Terms of Service
                </a>
            </div>

        </div>
    </div>
</body>

</html>