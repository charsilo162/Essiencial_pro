<div class="flex flex-wrap gap-2">
    <button 
        wire:click="setTypeFilter('all')" 
        @class([
            'py-2 px-4 rounded-full text-sm font-medium border transition',
            'bg-gray-600 text-white border-transparent' => $filterType === 'all',
            'bg-white text-gray-700 hover:bg-gray-50 border-gray-200' => $filterType !== 'all',
        ])
    >
        All
    </button>
    
    <button 
        wire:click="setTypeFilter('online')"
        @class([
            'py-2 px-4 rounded-full text-sm font-medium border transition',
            'bg-blue-600 text-white border-transparent' => $filterType === 'online',
            'bg-white text-gray-700 hover:bg-gray-50 border-gray-200' => $filterType !== 'online',
        ])
    >
        Online
    </button>
    
    <button 
        wire:click="setTypeFilter('physical')"
        @class([
            'py-2 px-4 rounded-full text-sm font-medium border transition',
            'bg-orange-500 text-white border-transparent' => $filterType === 'physical',
            'bg-white text-gray-700 hover:bg-gray-50 border-gray-200' => $filterType !== 'physical',
        ])
    >
        Physical
    </button>
</div>