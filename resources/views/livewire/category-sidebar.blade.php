<x-sidebar.shell>

    {{-- HEADER --}}
    <div class="px-6 py-4 border-b border-black/10 dark:border-white/10">
        <span class="text-lg font-semibold tracking-wide">
            Categories
        </span>
    </div>

    {{-- SEARCH --}}
    <div class="px-6 py-4">
        <input
            type="text"
            placeholder="Search Categories..."
            class="w-full px-3 py-2 rounded-lg text-sm
                   bg-white/70 dark:bg-neutral-800/70
                   border border-black/10 dark:border-white/10
                   focus:ring-2 focus:ring-pink-500 focus:outline-none"
            wire:model.live.debounce.300ms="search"
        />
    </div>

    {{-- NAV --}}
    <nav class="flex-1 px-4 pb-6 space-y-1.5 text-sm overflow-y-auto">

        <h3 class="px-3 pb-2 text-xs font-semibold uppercase
                   text-black/50 dark:text-white/50">
            Course Categories
        </h3>

        @forelse ($categories as $category)
            <a
                href="{{ route('category.show', $category['slug']) }}"
                wire:navigate
                @click="sidebarOpen = false"
                class="flex items-center justify-between gap-3 px-3 py-2 rounded-lg transition
                       {{ $activeCategorySlug === $category['slug']
                           ? 'bg-black/10 dark:bg-white/10 font-semibold'
                           : 'hover:bg-black/5 dark:hover:bg-white/10'
                       }}"
            >
                <span>{{ $category['name'] }}</span>
            </a>
        @empty
            <p class="px-3 py-2 text-sm text-black/50 dark:text-white/50">
                No categories found.
            </p>
        @endforelse

    </nav>

</x-sidebar.shell>
