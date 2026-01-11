<div class="h-full pt-20 overflow-y-auto">
    <div class="px-6 py-4">
        <input 
            type="text" 
            placeholder="Search Categories..." 
            class="w-full p-2 rounded-lg border border-gray-300 bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            wire:model.live.debounce.300ms="search" 
        />
    </div>

    <nav class="p-4 space-y-1.5">
        <h3 class="px-3 pb-1 text-xs font-semibold uppercase text-gray-500">
            Course Categories
        </h3>

        @forelse ($categories as $category)
            <a href="{{ route('category.show', $category['slug']) }}" 
               class="flex items-center justify-between gap-x-3.5 py-2 px-3 text-sm rounded-lg text-gray-700 hover:bg-gray-100 transition-colors 
               {{ $activeCategorySlug === $category['slug'] ? 'bg-blue-100 text-blue-800 font-semibold' : '' }}"
               wire:navigate>
                <span>{{ $category['name'] }}</span>
            </a>
        @empty
            <p class="px-3 py-2 text-sm text-gray-500">No categories found.</p>
        @endforelse
    </nav>
</div>
