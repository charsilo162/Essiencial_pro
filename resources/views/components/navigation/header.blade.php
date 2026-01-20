<header class="sticky top-0 z-[60] h-[72px] bg-slate-900 text-white shadow-md border-b border-slate-800">
    <nav x-data="{ mobileMenuOpen: false }" class="h-full w-full px-6 flex items-center justify-between">
        
        {{-- LEFT: Logo --}}
        <div class="flex items-center">
            <x-shared.logo class="text-white" />
        </div>

        {{-- RIGHT: Actions --}}
        <div class="flex items-center gap-2">
            
            {{-- Desktop Menu --}}
            <div class="hidden lg:block mr-4">
                <x-navigation.main-menu class="flex gap-6" />
            </div>

            <x-navigation.user-menu />

            {{-- BUTTON 1: Sidebar Toggle (Only shows if sidebar exists) --}}
           {{-- Check if hasSidebar is true --}}
@if($hasSidebar ?? false)
    <button
        {{-- This triggers the @toggle-sidebar listener in the body --}}
        @click="window.dispatchEvent(new CustomEvent('toggle-sidebar'))"
        class="lg:hidden p-2 rounded-md bg-slate-800 text-white"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
@endif

            {{-- BUTTON 2: Mobile Nav Toggle (For Home, About, etc.) --}}
            <button 
                @click="mobileMenuOpen = !mobileMenuOpen"
                class="lg:hidden p-2 rounded-md hover:bg-slate-800"
            >
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
                <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Mobile Dropdown for Main Nav --}}
        <div x-show="mobileMenuOpen" 
             x-transition 
             x-cloak
             class="absolute top-[72px] left-0 w-full bg-slate-900 border-b border-slate-700 lg:hidden z-[70]">
            <div class="p-4 space-y-4">
                <x-navigation.main-menu class="flex flex-col gap-4" />
            </div>
        </div>
    </nav>
</header>