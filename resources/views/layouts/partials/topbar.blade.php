<header class="sticky top-0 inset-x-0 z-50 w-full text-base">

    {{-- GRADIENT BACKGROUND --}}
    <div class="absolute inset-0 bg-gradient-to-r
                from-orange-400 via-pink-500 to-yellow-400
                opacity-90
                dark:from-orange-600 dark:via-pink-700 dark:to-yellow-600">
    </div>

    {{-- GLASSMORPHISM OVERLAY --}}
    <div class="absolute inset-0 backdrop-blur-xl
                bg-white/70 dark:bg-neutral-900/60">
    </div>

    {{-- CONTENT --}}
    <div class="relative grid grid-cols-3 items-center px-6 py-4">

        {{-- LEFT: LOGO + HAMBURGER --}}
        <div class="flex items-center gap-4">
            <button
                @click="sidebarOpen = !sidebarOpen"
                class="md:hidden text-xl text-neutral-900 dark:text-white"
            >
                ☰
            </button>

            {{-- <span class="hidden sm:inline font-semibold text-neutral-900 dark:text-white">
                Essiencials
            </span> --}}
        </div>

        {{-- CENTER: NAV --}}
        <nav class="hidden md:flex justify-center gap-8 text-sm font-medium">
            <a href="{{ route('home') }}" class="text-neutral-900 dark:text-white/90 hover:text-black dark:hover:text-white">
                Home
            </a>
            <a href="{{ route('category.index') }}" class="text-neutral-900 dark:text-white/90 hover:text-black dark:hover:text-white">
                Category
            </a>
            <a href="{{ route('about-us') }}" class="text-neutral-900 dark:text-white/90 hover:text-black dark:hover:text-white">
                About Us
            </a>
            <a href="{{ route('contact_us') }}" class="text-neutral-900 dark:text-white/90 hover:text-black dark:hover:text-white">
                Contact Us
            </a>
        </nav>

        {{-- RIGHT: USER MENU --}}
        <div class="flex justify-end">
            <x-user-menu />
        </div>

    </div>
</header>
