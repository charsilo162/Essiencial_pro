<div class="flex gap-2 w-full md:w-auto md:max-w-xs"> 
    <div class="relative flex-grow"> 
        {{-- wire:model.live.debounce updates the property and triggers the updatedSearchLocation method --}}
        <input 
            type="text" 
            placeholder="Enter Location" 
            class="py-2 px-4 pr-10 border border-gray-300 rounded-lg w-full text-sm focus:ring-blue-500 focus:border-blue-500"
            wire:model.live.debounce.300ms="searchLocation" 
        > 
        <svg class="absolute right-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg> 
    </div> 
    
    {{-- Optional: Keep a dedicated search button for instant search --}}
    <button 
        wire:click="doSearch"
        class="py-2 px-4 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition duration-200 flex-shrink-0"
    >
        Search
    </button> 
</div>