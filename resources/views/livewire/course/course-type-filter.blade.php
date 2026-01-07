<div class="flex flex-wrap gap-2">
    <button 
        wire:click="setTypeFilter('all')" 
        @class([
            'flex items-center py-2 px-4 rounded-full text-sm font-medium border transition',
            'bg-gray-600 text-white border-transparent' => $filterType === 'all',
            'bg-white text-gray-700 hover:bg-gray-50 border-gray-200' => $filterType !== 'all',
        ])
    >
        <span class="h-2 w-2 rounded-full mr-2 bg-gray-600"></span>  <!-- Add this line -->
        All
    </button>
    
    <button 
        wire:click="setTypeFilter('online')"
        @class([
            'flex items-center py-2 px-4 rounded-full text-sm font-medium border transition',
            'bg-blue-600 text-white border-transparent' => $filterType === 'online',
            'bg-white text-gray-700 hover:bg-gray-50 border-gray-200' => $filterType !== 'online',
        ])
    >
        <span class="h-2 w-2 rounded-full mr-2 bg-blue-600"></span>  <!-- Add this line -->
        Online
    </button>
    
    <button 
        wire:click="setTypeFilter('physical')"
        @class([
            'flex items-center py-2 px-4 rounded-full text-sm font-medium border transition',
            'bg-orange-500 text-white border-transparent' => $filterType === 'physical',
            'bg-white text-gray-700 hover:bg-gray-50 border-gray-200' => $filterType !== 'physical',
        ])
    >
        <span class="h-2 w-2 rounded-full mr-2 bg-orange-500"></span>  <!-- Add this line -->
        Physical
    </button>
</div>