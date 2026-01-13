<aside
    class="fixed inset-y-0 left-0 z-40 w-64
           transform transition-transform duration-300 ease-in-out
           md:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
>

    {{-- GRADIENT BASE --}}
    <div class="absolute inset-0 bg-gradient-to-b
                from-orange-400 via-pink-500 to-yellow-400
                opacity-90
                dark:from-orange-600 dark:via-pink-700 dark:to-yellow-600">
    </div>

    {{-- GLASSMORPHISM OVERLAY --}}
    <div class="absolute inset-0 backdrop-blur-xl
                bg-white/40 dark:bg-neutral-900/70">
    </div>

    {{-- CONTENT --}}
    <div class="relative flex flex-col h-full text-neutral-900 dark:text-white">

        {{-- HEADER --}}
        <div class="px-6 py-4 border-b border-black/10 dark:border-white/10">
            <span class="text-lg font-semibold tracking-wide">
                Essiencial
            </span>
        </div>

        {{-- NAV --}}
        <nav class="flex-1 px-4 py-6 space-y-1 text-sm">

            <x-dashboard.nav-link
                href="{{ route('home') }}"
                :active="request()->routeIs('dashboard')"
            >
                Home
            </x-dashboard.nav-link>

            <x-dashboard.nav-link
                href="{{ route('category.index') }}"
                :active="request()->routeIs('category*')"
            >
                Categories
            </x-dashboard.nav-link>

             @if((session('user.role') ?? session('user.type') ?? '') !== 'user')

            <x-dashboard.nav-link
                href="{{ route('category.list') }}"
                :active="request()->routeIs('list_category')"
            >
                Category list
            </x-dashboard.nav-link>

            <x-dashboard.nav-link
                href="{{ route('my.course') }}"
                :active="request()->routeIs('my-course*')"
            >
                Our Courses
            </x-dashboard.nav-link>

            <x-dashboard.nav-link
                href="{{ route('center.centers') }}"
                :active="request()->routeIs('our-center')"
            >
               Our Center
            </x-dashboard.nav-link>

            <x-dashboard.nav-link
                href="{{ route('courses.no-video') }}"
                :active="request()->routeIs('draftvideo')"
            >
                Draft Courses
            </x-dashboard.nav-link>

            <x-dashboard.nav-link
                href="{{ route('my.videos') }}"
                :active="request()->routeIs('my-videos*')"
            >
                Videos
            </x-dashboard.nav-link>
@endif
               @if((session('user.role') ?? session('user.type') ?? '') !== 'user')
            <div class="pt-4 space-y-3 border-t border-gray-200 dark:border-gray-700">
               
                <livewire:post-center-button />
                <livewire:course.post-course-button />
            </div>
        @endif

        </nav>

        {{-- FOOTER --}}
        <div class="px-6 py-4 text-xs
                    text-black/60 dark:text-white/50
                    border-t border-black/10 dark:border-white/10">
            © {{ date('Y') }} Essiencial
        </div>

    </div>
</aside>
