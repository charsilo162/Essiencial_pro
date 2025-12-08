<div x-data="{ open: false }" @click.away="open = false" class="w-full">
    <label for="center-select" class="block text-sm font-medium text-gray-700">Training Center</label>

    <div class="relative mt-1">
        
        <div @click="open = !open; $wire.searchTerm = '';" 
             class="w-full text-left py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm cursor-pointer sm:text-sm">
            {{ $selectedName ?: $placeholder }} 
            <span class="float-right text-gray-400">▼</span>
        </div>
        
        <div x-show="open" class="absolute z-10 w-full bg-white border border-gray-300 mt-1 rounded-md shadow-lg max-h-60 overflow-auto" style="display: none;">
            
            <input 
                type="text" 
                wire:model.live.debounce.300ms="searchTerm"
                wire:keydown.escape="open = false"
                @focus="open = true"
                placeholder="Search centers..."
                class="block w-full border-b border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm p-2 sticky top-0"
            >

            @forelse ($centers as $center)
                <div wire:click="selectCenter({{ $center['id'] }}, '{{ $center['name'] }}')" 
                     @click="open = false"
                     class="p-2 cursor-pointer hover:bg-gray-100 text-sm {{ $selectedId == $center['id'] ? 'bg-indigo-50 font-semibold' : '' }}">
                    {{ $center['name'] }}
                </div>
            @empty
                <div class="p-2 text-sm text-gray-500">
                    @if (strlen($searchTerm) > 0)
                        No centers found for "{{ $searchTerm }}".
                    @else
                        Start typing to search.
                    @endif
                </div>
            @endforelse
        </div>
    </div>
</div>