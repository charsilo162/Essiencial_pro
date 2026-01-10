<header class="sticky top-0 z-50 bg-slate-900 text-white shadow">
    <nav x-data="{ open: false }"
         class="w-full px-6 py-4 flex items-center">

        {{-- LEFT: Logo --}}
        <div class="flex items-center w-1/4">
            <x-shared.logo class="text-white" />
        </div>

        {{-- CENTER: Main Nav --}}
        <div class="hidden lg:flex justify-center w-2/4">
            <x-navigation.main-menu />
        </div>

        {{-- RIGHT: User + Toggle --}}
        <div class="flex items-center justify-end gap-4 w-1/4">

            {{-- User menu --}}
            <x-navigation.user-menu />

            {{-- Mobile toggle --}}
            <button
                @click="open = !open"
                class="lg:hidden inline-flex items-center justify-center
                       w-10 h-10 rounded-md hover:bg-slate-800 focus:outline-none"
            >
                {{-- Hamburger --}}
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>

                {{-- Close --}}
                <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Mobile menu --}}
        <div x-show="open"
             x-transition
             x-cloak
             class="absolute top-full left-0 w-full bg-slate-900 border-t border-slate-700 lg:hidden">
            <div class="flex flex-col px-6 py-4 space-y-5">
                <x-navigation.main-menu class="flex flex-col gap-6" />
            </div>
        </div>

    </nav>
</header>
