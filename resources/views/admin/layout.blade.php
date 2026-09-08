<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}"> {{-- Metadata utama --}}

    <title>
        @yield('title', 'Admin Panel') — Auto Apply Mailer
    </title>

    {{-- =========================================================
        FONT & TOKEN SISTEM ADMIN PANEL
        Disamakan dengan halaman Template, Login, Register,
        Kebijakan Privasi, dan Ketentuan Layanan.
    ========================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;0,600;1,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
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
        }

        body {
            font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
            background: var(--paper);
            color: var(--ink);
        }

        .pp-serif {
            font-family: 'Lora', Georgia, serif;
        }

        ::selection {
            background: var(--accent-soft);
        }

        /* Sidebar */
        .pp-sidebar {
            background: #fff;
            border-color: var(--line) !important;
        }

        .pp-brand-badge {
            background: var(--accent);
        }

        .pp-nav-section-label {
            color: var(--ink-soft);
        }

        .pp-nav-link {
            color: var(--ink-soft);
        }

        .pp-nav-link:hover {
            background: var(--paper-soft);
            color: var(--ink);
        }

        .pp-nav-link svg {
            color: var(--ink-soft);
        }

        .pp-nav-link:hover svg {
            color: var(--ink);
        }

        .pp-nav-link.is-active {
            background: var(--accent-soft);
            color: var(--accent-ink);
        }

        .pp-nav-link.is-active svg {
            color: var(--accent);
        }

        .pp-sidebar-footer-link {
            color: var(--ink-soft);
        }

        .pp-sidebar-footer-link:hover {
            background: var(--paper-soft);
            color: var(--ink);
        }

        /* Topbar */
        .pp-topbar {
            background: rgba(255, 255, 255, 0.95);
            border-color: var(--line) !important;
        }

        .pp-menu-btn {
            color: var(--ink-soft);
        }

        .pp-menu-btn:hover {
            background: var(--paper-soft);
            color: var(--ink);
        }

        .pp-avatar {
            background: var(--accent-soft);
            color: var(--accent-ink);
        }

        /* Flash messages */
        .pp-flash-success {
            background: var(--accent-soft);
            border-color: var(--accent);
            color: var(--accent-ink);
        }

        .pp-flash-error {
            background: var(--danger-soft);
            border-color: var(--danger);
            color: var(--danger);
        }
    </style>
</head>

<body class="min-h-screen antialiased">

    <!-- Ubah min-h-screen biasa menjadi layout block karena kita akan memakai padding kiri -->
    <div>

        {{-- =========================================================
             MOBILE OVERLAY
        ========================================================== --}}
        <div
            id="admin-overlay"
            class="fixed inset-0 z-40 hidden bg-gray-900/30 backdrop-blur-sm lg:hidden">
        </div>


        {{-- =========================================================
             SIDEBAR
        ========================================================== --}}
        <!-- Hapus lg:static agar sidebar konsisten berada di posisi fixed -->
        <aside
            id="admin-sidebar"
            class="pp-sidebar fixed inset-y-0 left-0 z-50 flex w-64 -translate-x-full flex-col border-r transition-transform duration-200 lg:translate-x-0">

            {{-- Brand --}}
            <div class="flex h-20 items-center border-b px-6 shrink-0" style="border-color: var(--line)">

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3">

                    <div class="pp-brand-badge flex h-9 w-9 items-center justify-center rounded-xl text-white shadow-sm">
                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M4 15.5A3.5 3.5 0 017.5 12H9l1.5-3h3L15 12h1.5a3.5 3.5 0 013.5 3.5V17a3 3 0 01-3 3H7a3 3 0 01-3-3v-1.5z" />
                        </svg>
                    </div>

                    <div>
                        <div class="pp-serif text-sm font-semibold leading-tight" style="color: var(--ink)">
                            Auto Apply
                        </div>

                        <div class="text-xs" style="color: var(--ink-soft)">
                            Admin Panel
                        </div>
                    </div>

                </a>

            </div>


            {{-- Navigation --}}
            <nav class="flex-1 overflow-y-auto px-3 py-5">

                <p class="pp-nav-section-label mb-3 px-3 text-[11px] font-semibold uppercase tracking-wider">
                    Overview
                </p>


                {{-- Dashboard --}}
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="pp-nav-link mb-1 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition
                    {{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">

                    <svg
                        class="h-5 w-5 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M4 13h6V4H4v9zm10 7h6V4h-6v16zM4 20h6v-4H4v4z" />

                    </svg>

                    Dashboard

                </a>


                <p class="pp-nav-section-label mb-3 mt-7 px-3 text-[11px] font-semibold uppercase tracking-wider">
                    Management
                </p>


                {{-- Users --}}
                <a
                    href="{{ route('admin.users.index') }}"
                    class="pp-nav-link mb-1 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition
                    {{ request()->routeIs('admin.users.*') ? 'is-active' : '' }}">

                    <svg
                        class="h-5 w-5 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zm8-1a3 3 0 100-6m4 17v-2a4 4 0 00-3-3.87" />

                    </svg>

                    Users

                </a>


                {{-- Applications --}}
                <a
                    href="{{ route('admin.applications.index') }}"
                    class="pp-nav-link mb-1 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition
                    {{ request()->routeIs('admin.applications.*') ? 'is-active' : '' }}">

                    <svg
                        class="h-5 w-5 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M6 3h12a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2zm3 5h6m-6 4h6m-6 4h4" />

                    </svg>

                    Applications

                </a>


                {{-- Email Activity --}}
                <a
                    href="{{ route('admin.email-activity.index') }}"
                    class="pp-nav-link mb-1 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition
                    {{ request()->routeIs('admin.email-activity.*') ? 'is-active' : '' }}">

                    <svg
                        class="h-5 w-5 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M3 7l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />

                    </svg>

                    Email Activity

                </a>


                {{-- Feedback --}}
                <a
                    href="{{ route('admin.feedback.index') }}"
                    class="pp-nav-link mb-1 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition
                    {{ request()->routeIs('admin.feedback.*') ? 'is-active' : '' }}">

                    <svg
                        class="h-5 w-5 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M7 8h10M7 12h6m-3 8a8 8 0 100-16 8 8 0 000 16z" />

                    </svg>

                    Feedback

                </a>


                {{-- Logs --}}
                <a
                    href="{{ route('admin.logs.index') }}"
                    class="pp-nav-link mb-1 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition
                    {{ request()->routeIs('admin.logs.*') ? 'is-active' : '' }}">

                    <svg
                        class="h-5 w-5 shrink-0"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M4 5h16M4 10h16M4 15h10M4 20h7" />

                    </svg>

                    System Logs

                </a>

            </nav>


            {{-- Bottom --}}
            <div class="border-t p-3 shrink-0" style="border-color: var(--line)">

                <a
                    href="{{ route('dashboard') }}"
                    class="pp-sidebar-footer-link flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M15 19l-7-7 7-7" />

                    </svg>

                    Kembali ke Aplikasi

                </a>

            </div>

        </aside>


        {{-- =========================================================
             MAIN
        ========================================================== --}}
        <!-- Tambahkan lg:pl-64 (padding-left 16rem/256px) untuk memberi ruang bagi sidebar -->
        <div class="flex flex-col min-h-screen transition-all duration-200 lg:pl-64">

            {{-- Topbar --}}
            <header class="pp-topbar sticky top-0 z-30 flex h-20 items-center justify-between border-b px-4 backdrop-blur sm:px-6 lg:px-8">

                <div class="flex items-center gap-3">

                    {{-- Mobile menu --}}
                    <button
                        type="button"
                        id="admin-menu-button"
                        class="pp-menu-btn inline-flex h-10 w-10 items-center justify-center rounded-xl transition lg:hidden">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />

                        </svg>

                    </button>


                    <div>
                        <p class="text-xs" style="color: var(--ink-soft)">
                            Auto Apply Mailer
                        </p>

                        <h1 class="pp-serif text-base font-semibold sm:text-lg" style="color: var(--ink)">
                            @yield('page-title', 'Admin Panel')
                        </h1>
                    </div>

                </div>


                {{-- Admin profile --}}
                <div class="flex items-center gap-3">

                    <div class="hidden text-right sm:block">

                        <!-- Tambahkan pengecekan null dengan ?? agar tidak error jika auth kosong -->
                        <p class="text-sm font-semibold" style="color: var(--ink)">
                            {{ auth()->user()->name ?? 'Admin' }}
                        </p>

                        <p class="text-xs" style="color: var(--ink-soft)">
                            Administrator
                        </p>

                    </div>

                    <div class="pp-avatar flex h-10 w-10 items-center justify-center rounded-xl text-sm font-semibold">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </div>

                </div>

            </header>


            {{-- Flash message --}}
            @if (session('success'))

            <div class="px-4 pt-5 sm:px-6 lg:px-8">

                <div class="pp-flash-success rounded-xl border px-4 py-3 text-sm">
                    {{ session('success') }}
                </div>

            </div>

            @endif


            {{-- Error message --}}
            @if (session('error'))

            <div class="px-4 pt-5 sm:px-6 lg:px-8">

                <div class="pp-flash-error rounded-xl border px-4 py-3 text-sm">
                    {{ session('error') }}
                </div>

            </div>

            @endif


            {{-- Content --}}
            <!-- Pastikan tabel dibungkus dengan div overflow-x-auto di file child (misal: users.blade.php) -->
            <main class="flex-1 px-4 py-6 sm:px-6 sm:py-8 lg:px-8">

                <div class="mx-auto max-w-7xl">

                    @yield('content')

                </div>

            </main>

        </div>

    </div>


    {{-- =========================================================
         MOBILE SIDEBAR SCRIPT
    ========================================================== --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const sidebar = document.getElementById('admin-sidebar');
            const overlay = document.getElementById('admin-overlay');
            const button = document.getElementById('admin-menu-button');

            if (!sidebar || !overlay || !button) {
                return;
            }

            const openMenu = () => {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            };

            const closeMenu = () => {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            };

            button.addEventListener('click', openMenu);
            overlay.addEventListener('click', closeMenu);

            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024) {
                    closeMenu();
                }
            });

        });
    </script>

</body>

</html>