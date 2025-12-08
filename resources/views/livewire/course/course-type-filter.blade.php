<div class="flex flex-wrap gap-2">
    <button 
        wire:click="setFilter('all')" 
        @class([
            'py-2 px-4 rounded-full font-semibold text-sm transition shadow',
            'bg-gray-700 text-white hover:bg-gray-800' => $currentType === 'all',
            'bg-gray-100 text-gray-700 hover:bg-gray-200' => $currentType !== 'all',
        ])
    >
        All Types
    </button>
    <button 
        wire:click="setFilter('online')" 
        @class([
            'py-2 px-4 rounded-full font-semibold text-sm transition shadow',
            'bg-indigo-600 text-white hover:bg-indigo-700' => $currentType === 'online',
            'bg-gray-100 text-gray-700 hover:bg-gray-200' => $currentType !== 'online',
        ])
    >
        Online
    </button>
    <button 
        wire:click="setFilter('physical')" 
        @class([
            'py-2 px-4 rounded-full font-semibold text-sm transition shadow',
            'bg-sky-500 text-white hover:bg-sky-600' => $currentType === 'physical',
            'bg-gray-100 text-gray-700 hover:bg-gray-200' => $currentType !== 'physical',
        ])
    >
        Physical
    </button>
</div>