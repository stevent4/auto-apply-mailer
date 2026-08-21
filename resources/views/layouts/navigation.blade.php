<nav
    x-data="{ open: false }"
    class="sticky top-0 z-50 border-b border-gray-200/80 bg-white/95 backdrop-blur">
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
                        <div class="text-sm font-bold leading-5 tracking-tight text-gray-900">
                            Auto Apply
                        </div>

                        <div class="text-xs font-medium text-gray-500">
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
                        class="
                            inline-flex items-center gap-2 rounded-xl px-4 py-2.5 text-sm font-semibold transition
                            focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                            {{ request()->routeIs('dashboard')
                                ? 'bg-indigo-50 text-indigo-700'
                                : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}
                        ">

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
                        class="
                            inline-flex items-center gap-2 rounded-xl px-4 py-2.5 text-sm font-semibold transition
                            focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                            {{ request()->routeIs('apply.*')
                                ? 'bg-indigo-50 text-indigo-700'
                                : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}
                        ">

                        <svg
                            class="h-4.5 w-4.5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 8.5l8.11 5.41a1.6 1.6 0 001.78 0L21 8.5M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>

                        Apply Job
                    </a>

                    <a
                        href="{{ route('files.index') }}"
                        class="
                            inline-flex items-center gap-2 rounded-xl px-4 py-2.5 text-sm font-semibold transition
                            focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                            {{ request()->routeIs('files.*')
                                ? 'bg-indigo-50 text-indigo-700'
                                : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}
                        ">
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

                </div>

            </div>


            {{-- =====================================================
                DESKTOP USER MENU
            ====================================================== --}}
            <div class="hidden items-center gap-3 sm:flex">

                {{-- User information --}}
                <div class="hidden text-right md:block">
                    <p class="text-sm font-bold text-gray-900">
                        {{ Auth::user()?->name ?? 'User' }}
                    </p>

                    <p class="mt-0.5 text-xs text-gray-500">
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
                            class="flex items-center gap-2 rounded-2xl border border-gray-200 bg-white px-3 py-2.5 text-sm font-medium text-gray-700 shadow-sm transition hover:border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">

                            {{-- Avatar --}}
                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-indigo-100 text-sm font-bold text-indigo-700">
                                {{ strtoupper(substr(Auth::user()?->name ?? 'U', 0, 1)) }}
                            </div>


                            {{-- Arrow --}}
                            <svg
                                class="h-4 w-4 text-gray-400"
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
                                    class="h-4 w-4 text-gray-400"
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
                                <div class="flex items-center gap-2 text-red-600">

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
                    class="inline-flex items-center justify-center rounded-xl border border-gray-200 bg-white p-2.5 text-gray-500 shadow-sm transition hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">

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
        class="border-t border-gray-100 bg-white sm:hidden">

        <div class="space-y-1 px-4 py-4">

            {{-- Mobile Dashboard --}}
            <a
                href="{{ route('dashboard') }}"
                class="
                    flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
                    {{ request()->routeIs('dashboard')
                        ? 'bg-indigo-50 text-indigo-700'
                        : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}
                ">

                <span class="text-base">
                    🏠
                </span>

                Dashboard

            </a>


            {{-- Mobile Apply --}}
            <a
                href="{{ route('apply.index') }}"
                class="
                    flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
                    {{ request()->routeIs('apply.*')
                        ? 'bg-indigo-50 text-indigo-700'
                        : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}
                ">

                <span class="text-base">
                    ✉️
                </span>

                Apply Job

            </a>

            <a
                href="{{ route('files.index') }}"
                class="
                    flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition
                    {{ request()->routeIs('files.*')
                        ? 'bg-indigo-50 text-indigo-700'
                        : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}
                ">
                <span class="text-base">
                    📁
                </span>

                Berkas
            </a>

        </div>


        {{-- =========================================================
            MOBILE USER AREA
        ========================================================== --}}
        <div class="border-t border-gray-100 px-4 py-4">

            <div class="flex items-center gap-3">

                {{-- Avatar --}}
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-indigo-100 text-sm font-bold text-indigo-700">
                    {{ strtoupper(substr(Auth::user()?->name ?? 'U', 0, 1)) }}
                </div>


                {{-- User --}}
                <div class="min-w-0">

                    <p class="truncate text-sm font-bold text-gray-900">
                        {{ Auth::user()?->name ?? 'User' }}
                    </p>

                    <p class="truncate text-xs text-gray-500">
                        {{ Auth::user()?->email ?? '' }}
                    </p>

                </div>

            </div>


            <div class="mt-4 space-y-1">

                {{-- Profile --}}
                <a
                    href="{{ route('profile.edit') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-gray-900">
                    <svg
                        class="h-4 w-4 text-gray-400"
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
                        class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-left text-sm font-medium text-red-600 transition hover:bg-red-50">

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