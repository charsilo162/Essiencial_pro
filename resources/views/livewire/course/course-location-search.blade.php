<div class="flex gap-2 w-full md:w-auto md:max-w-md">
    <div class="relative flex-grow">
        <input
            type="text"
            placeholder="Search courses or location..."
            class="py-2.5 px-4 pr-12 border border-gray-300 rounded-lg w-full text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
            wire:model.live.debounce.400ms="searchQuery"
        >
        <svg class="absolute right-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400 pointer-events-none"
             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </div>

    <button
        wire:click="$refresh"
        class="px-5 py-2.5 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition hidden md:block"
    >
        Search
    </button>
</div>