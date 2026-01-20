<header class="bg-white border-b relative z-30">
    <div class="flex items-center justify-between px-4 sm:px-6 py-4">

        {{-- Left --}}
        <div class="flex items-center gap-4">
            <button
                @click="sidebarOpen = !sidebarOpen"
                class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded hover:bg-gray-100"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <x-dashboard.user-summary />
        </div>

        {{-- Right --}}
        @if((session('user.role') ?? session('user.type') ?? '') !== 'user')
        <div class="relative flex items-center gap-2">

            {{-- Desktop buttons --}}
            <div class="hidden sm:flex gap-2">
                <livewire:post-center-button />
                <livewire:course.post-course-button />
                <livewire:profile.edit-profile />
            </div>

            {{-- Mobile dropdown --}}
            <div x-data="{ open:false }" class="sm:hidden relative">
                <button
                    @click="open = !open"
                    class="inline-flex items-center justify-center w-10 h-10 rounded hover:bg-gray-100"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6v.01M12 12v.01M12 18v.01"/>
                    </svg>
                </button>

                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition
                    x-cloak
                    class="absolute right-0 mt-2 w-60 bg-white border rounded-lg shadow-xl z-[999]"
                >
                    <div class="p-2 space-y-2">
                        <livewire:post-center-button />
                        <livewire:course.post-course-button />
                        <livewire:profile.edit-profile />
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</header>
