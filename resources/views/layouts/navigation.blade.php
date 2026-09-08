<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;0,600;1,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    .nav-brand {
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
        background: rgba(250, 247, 241, 0.95);
        border-bottom: 1px solid var(--line);
    }

    .nav-brand-serif {
        font-family: 'Lora', Georgia, serif;
    }

    .nav-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border-radius: 0.75rem;
        padding: 0.625rem 1rem;
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--ink-soft);
        transition: background 0.15s ease, color 0.15s ease;
    }

    .nav-link:hover {
        background: var(--paper-soft);
        color: var(--ink);
    }

    .nav-link:focus {
        outline: none;
        box-shadow: 0 0 0 2px var(--accent), 0 0 0 4px #fff;
    }

    .nav-link.is-active {
        background: var(--accent-soft);
        color: var(--accent-ink);
    }

    .nav-mobile-link {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--ink-soft);
        transition: background 0.15s ease, color 0.15s ease;
    }

    .nav-mobile-link:hover {
        background: var(--paper-soft);
        color: var(--ink);
    }

    .nav-mobile-link.is-active {
        background: var(--accent-soft);
        color: var(--accent-ink);
    }

    .nav-avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        background: var(--accent-soft);
        color: var(--accent-ink);
        font-weight: 700;
        font-family: 'Lora', Georgia, serif;
    }

    .nav-trigger {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        border-radius: 1rem;
        border: 1px solid var(--line);
        background: #fff;
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--ink);
        transition: border-color 0.15s ease, background 0.15s ease;
    }

    .nav-trigger:hover {
        border-color: var(--ink-soft);
        background: var(--paper-soft);
    }

    .nav-trigger:focus {
        outline: none;
        box-shadow: 0 0 0 2px var(--accent), 0 0 0 4px #fff;
    }

    .nav-burger {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.75rem;
        border: 1px solid var(--line);
        background: #fff;
        padding: 0.6rem;
        color: var(--ink-soft);
        transition: background 0.15s ease, color 0.15s ease;
    }

    .nav-burger:hover {
        background: var(--paper-soft);
        color: var(--ink);
    }

    .nav-burger:focus {
        outline: none;
        box-shadow: 0 0 0 2px var(--accent), 0 0 0 4px #fff;
    }

    .nav-mobile-panel {
        background: var(--paper);
        border-top: 1px solid var(--line);
    }

    .nav-logout {
        color: var(--danger);
    }
</style>

<nav
    x-data="{ open: false }"
    class="nav-brand sticky top-0 z-50 backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">

            {{-- =====================================================
                LOGO + BRAND
            ====================================================== --}}
            <div class="flex items-center">

                <a
                    href="{{ route('dashboard') }}"
                    class="flex items-center gap-3">

                    {{-- Logo --}}
                    <img
                        src="{{ asset('favicon.png') }}"
                        alt="Auto Apply Mailer Logo"
                        class="h-8 w-8" />

                    {{-- Brand name --}}
                    <div class="hidden sm:block">
                        <div class="nav-brand-serif text-sm font-semibold leading-5 tracking-tight" style="color: var(--ink)">
                            Auto Apply
                        </div>

                        <div class="text-xs font-medium" style="color: var(--ink-soft)">
                            Mailer
                        </div>
                    </div>

                </a>


                {{-- =================================================
                    DESKTOP NAVIGATION
                ================================================== --}}
                <div class="ml-8 hidden items-center gap-1 sm:flex">

                    {{-- Dashboard --}}
                    <a
                        href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'is-active' : '' }}">

                        <svg
                            class="h-4.5 w-4.5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 10.5L12 3l9 7.5M5.5 9.5V21h13V9.5M9.5 21v-6h5v6" />
                        </svg>

                        Dashboard
                    </a>


                    {{-- Apply Job --}}
                    <a
                        href="{{ route('apply.index') }}"
                        class="nav-link {{ request()->routeIs('apply.*') ? 'is-active' : '' }}">

                        Apply Job
                    </a>

                    <a
                        href="{{ route('files.index') }}"
                        class="nav-link {{ request()->routeIs('files.*') ? 'is-active' : '' }}">
                        <svg
                            class="h-4.5 w-4.5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 5a2 2 0 012-2h5l2 2h5a2 2 0 012 2v1H4V5zM4 8h16l-1.5 11h-13L4 8z" />
                        </svg>

                        Berkas
                    </a>

                    <a
                        href="{{ route('templates.index') }}"
                        class="nav-link {{ request()->routeIs('templates.*') ? 'is-active' : '' }}">

                        Templates
                    </a>

                    <a
                        href="{{ route('feedback.index') }}"
                        class="nav-link {{ request()->routeIs('feedback.*') ? 'is-active' : '' }}">

                        Feedback
                    </a>

                    @if (auth()->user()->isAdmin())
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.*') ? 'is-active' : '' }}">

                        Admin Panel
                    </a>
                    @endif

                </div>

            </div>


            {{-- =====================================================
                DESKTOP USER MENU
            ====================================================== --}}
            <div class="hidden items-center gap-3 sm:flex">

                {{-- User information --}}
                <div class="hidden text-right md:block">
                    <p class="text-sm font-semibold" style="color: var(--ink)">
                        {{ Auth::user()?->name ?? 'User' }}
                    </p>

                    <p class="mt-0.5 text-xs" style="color: var(--ink-soft)">
                        {{ Auth::user()?->email ?? '' }}
                    </p>
                </div>


                {{-- Dropdown --}}
                <x-dropdown
                    align="right"
                    width="48">

                    <x-slot name="trigger">

                        <button
                            type="button"
                            class="nav-trigger">

                            {{-- Avatar --}}
                            <div class="nav-avatar h-9 w-9 text-sm">
                                {{ strtoupper(substr(Auth::user()?->name ?? 'U', 0, 1)) }}
                            </div>


                            {{-- Arrow --}}
                            <svg
                                class="h-4 w-4"
                                style="color: var(--ink-soft)"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>

                        </button>

                    </x-slot>


                    <x-slot name="content">

                        {{-- Profile --}}
                        <x-dropdown-link :href="route('profile.edit')">
                            <div class="flex items-center gap-2">

                                <svg
                                    class="h-4 w-4"
                                    style="color: var(--ink-soft)"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 19a4 4 0 00-8 0M11 11a4 4 0 100-8 4 4 0 000 8z" />
                                </svg>

                                Profile

                            </div>
                        </x-dropdown-link>


                        {{-- Logout --}}
                        <form
                            method="POST"
                            action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <div class="nav-logout flex items-center gap-2">

                                    <svg
                                        class="h-4 w-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 17l5-5-5-5M20 12H9M12 19H6a2 2 0 01-2-2V7a2 2 0 012-2h6" />
                                    </svg>

                                    Logout

                                </div>
                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>


            {{-- =====================================================
                MOBILE MENU BUTTON
            ====================================================== --}}
            <div class="flex items-center sm:hidden">

                <button
                    type="button"
                    @click="open = !open"
                    class="nav-burger">

                    {{-- Hamburger --}}
                    <svg
                        x-show="!open"
                        x-cloak
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


                    {{-- Close --}}
                    <svg
                        x-show="open"
                        x-cloak
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </button>

            </div>

        </div>
    </div>


    {{-- =============================================================
        MOBILE NAVIGATION
    ============================================================== --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="nav-mobile-panel sm:hidden">

        <div class="space-y-1 px-4 py-4">

            {{-- Mobile Dashboard --}}
            <a
                href="{{ route('dashboard') }}"
                class="nav-mobile-link {{ request()->routeIs('dashboard') ? 'is-active' : '' }}">
                <svg
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 10.5L12 3l9 7.5M5.5 9.5V21h13V9.5M9.5 21v-6h5v6" />
                </svg>

                Dashboard

            </a>


            {{-- Mobile Apply --}}
            <a
                href="{{ route('apply.index') }}"
                class="nav-mobile-link {{ request()->routeIs('apply.*') ? 'is-active' : '' }}">

                <svg
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>

                Apply Job

            </a>

            <a
                href="{{ route('files.index') }}"
                class="nav-mobile-link {{ request()->routeIs('files.*') ? 'is-active' : '' }}">
                <svg
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 5a2 2 0 012-2h5l2 2h5a2 2 0 012 2v1H4V5zM4 8h16l-1.5 11h-13L4 8z" />
                </svg>

                Berkas
            </a>

            <a
                href="{{ route('templates.index') }}"
                class="nav-mobile-link {{ request()->routeIs('templates.*') ? 'is-active' : '' }}">
                <svg
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>

                Templates
            </a>

            <a
                href="{{ route('feedback.index') }}"
                class="nav-mobile-link {{ request()->routeIs('feedback.*') ? 'is-active' : '' }}">
                <svg
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8-1.183 0-2.312-.203-3.343-.573C7.343 19.755 5 21 3 21c.867-1.294 1.371-2.671 1.5-4.5C3.55 15.038 3 13.55 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>

                Feedback
            </a>

            @if (auth()->user()->isAdmin())
            <a
                href="{{ route('admin.dashboard') }}"
                class="nav-mobile-link {{ request()->routeIs('admin.*') ? 'is-active' : '' }}">
                <svg
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

                Admin Panel
            </a>
            @endif

        </div>


        {{-- =========================================================
            MOBILE USER AREA
        ========================================================== --}}
        <div class="px-4 py-4" style="border-top: 1px solid var(--line)">

            <div class="flex items-center gap-3">

                {{-- Avatar --}}
                <div class="nav-avatar h-10 w-10 shrink-0 text-sm">
                    {{ strtoupper(substr(Auth::user()?->name ?? 'U', 0, 1)) }}
                </div>


                {{-- User --}}
                <div class="min-w-0">

                    <p class="truncate text-sm font-semibold" style="color: var(--ink)">
                        {{ Auth::user()?->name ?? 'User' }}
                    </p>

                    <p class="truncate text-xs" style="color: var(--ink-soft)">
                        {{ Auth::user()?->email ?? '' }}
                    </p>

                </div>

            </div>


            <div class="mt-4 space-y-1">

                {{-- Profile --}}
                <a
                    href="{{ route('profile.edit') }}"
                    class="nav-mobile-link">
                    <svg
                        class="h-4 w-4"
                        style="color: var(--ink-soft)"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 19a4 4 0 00-8 0M11 11a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>

                    Profile
                </a>


                {{-- Logout --}}
                <form
                    method="POST"
                    action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="nav-mobile-link nav-logout w-full text-left">

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 17l5-5-5-5M20 12H9M12 19H6a2 2 0 01-2-2V7a2 2 0 012-2h6" />
                        </svg>

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>