<header class="bg-white border-b">
    <div class="flex items-center justify-between px-6 py-4">

        {{-- Left: Mobile toggle + user --}}
        <div class="flex items-center gap-4">

            {{-- Mobile hamburger --}}
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

        {{-- Right buttons --}}
        <div class="hidden sm:flex gap-2">
            {{-- <x-button.secondary>Post a center</x-button.secondary>
            <x-button.dark>Post a course</x-button.dark>
            <x-button.primary>Edit Profile</x-button.primary> --}}
                <livewire:post-center-button />
                        <livewire:course.post-course-button />
                       <livewire:profile.edit-profile />
        </div>
    </div>
   
</header>
