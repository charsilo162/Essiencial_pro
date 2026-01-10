<div class="h-full overflow-y-auto">

    {{-- Search --}}
    <div class="px-6 py-4">
        <input 
            type="text" 
            placeholder="Search Categories..." 
            class="w-full p-2 rounded-lg border border-slate-700
                   bg-slate-800 text-white placeholder-gray-400
                   focus:ring-2 focus:ring-sky-500 focus:outline-none"
            wire:model.live.debounce.300ms="search" 
        />
    </div>

    {{-- Categories --}}
    <nav class="p-4 space-y-1.5">
        <h3 class="px-3 pb-1 text-xs font-semibold uppercase text-gray-400">
            Course Categories
        </h3>

        @forelse ($categories as $category)
            <a href="{{ route('category.show', $category['slug']) }}" 
               class="flex items-center justify-between gap-x-3.5 py-2 px-3 text-sm rounded-lg
                      text-gray-300 hover:bg-slate-800 hover:text-white transition
                      {{ $activeCategorySlug === $category['slug'] 
                          ? 'bg-sky-600 text-white font-semibold' 
                          : '' }}"
               wire:navigate>
                <span>{{ $category['name'] }}</span>
            </a>
        @empty
            <p class="px-3 py-2 text-sm text-gray-500">No categories found.</p>
        @endforelse
    </nav>

</div>
