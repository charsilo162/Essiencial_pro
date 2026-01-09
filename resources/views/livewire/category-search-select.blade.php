{{-- 1. ALPINE.JS SETUP (Controls the dropdown visibility) --}}
<div x-data="{ open: false }" @click.away="open = false" class="w-full">
    <label for="category-select" class="block text-sm font-medium text-gray-700">Category</label>

    <div class="relative mt-1">
        
        {{-- 2. DISPLAY BUTTON (Shows the current selection or placeholder) --}}
        <div @click="open = !open; $wire.searchTerm = '';" 
             class="w-full text-left py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm cursor-pointer sm:text-sm">
            {{-- Shows the name stored in the Livewire component --}}
            {{ $selectedName ?: $placeholder }} 
            <span class="float-right text-gray-400">▼</span>
        </div>
        
        {{-- 3. DROPDOWN BOX (Hidden by default, shown by Alpine.js 'open' state) --}}
        <div x-show="open" class="absolute z-10 w-full bg-white border border-gray-300 mt-1 rounded-md shadow-lg max-h-60 overflow-auto" style="display: none;">
            
            {{-- 4. SEARCH INPUT (Tied to the Livewire class) --}}
            <input 
                type="text" 
                {{-- Binds input to the $searchTerm property. Livewire updates it 300ms after user stops typing --}}
                wire:model.live.debounce.300ms="searchTerm" 
                wire:keydown.escape="open = false"
                @focus="open = true"
                placeholder="Search categories..."
                class="block w-full p-2 sticky top-0"
            >

            {{-- 5. RESULTS LIST (Populated by the $categories array from the class) --}}
            @forelse ($categories as $category)
                {{-- When clicked, it runs the selectCategory method in the PHP class --}}
                <div wire:click="selectCategory({{ $category['id'] }}, '{{ $category['name'] }}')" 
                     @click="open = false" {{-- Alpine closes the dropdown --}}
                     class="p-2 cursor-pointer hover:bg-gray-100 text-sm {{ $selectedId == $category['id'] ? 'bg-indigo-50 font-semibold' : '' }}">
                    {{ $category['name'] }}
                </div>
            @empty
                {{-- Handles no results --}}
                <div class="p-2 text-sm text-gray-500">
                    No results found.
                </div>
            @endforelse
        </div>
    </div>
</div>