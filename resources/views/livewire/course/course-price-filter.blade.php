<div class="flex flex-wrap gap-2">
    <button 
        wire:click="setPriceFilter('0-10000')" 
        @class([
            'flex items-center py-2 px-4 rounded-full text-sm font-medium border transition duration-150', 
            'bg-red-600 text-white border-transparent' => $filterPrice === '0-10000',
            'bg-white text-gray-700 hover:bg-gray-50 border-gray-200' => $filterPrice !== '0-10000',
        ])> 
        <span class="h-2 w-2 rounded-full mr-2" style="background-color: #f40d15ff;"></span>
        < ₦10,000
    </button> 
    
    <button 
        wire:click="setPriceFilter('10000-50000')"
        @class([
            // ... (Other buttons follow the same pattern)
            'flex items-center py-2 px-4 rounded-full text-sm font-medium border transition duration-150',
            'bg-green-500 text-white border-transparent' => $filterPrice === '10000-50000',
            'bg-white text-gray-700 hover:bg-gray-50 border-gray-200' => $filterPrice !== '10000-50000',
        ])> 
        <span class="h-2 w-2 rounded-full mr-2 bg-white"></span>
        ₦10k - ₦50k
    </button> 
    
    <button 
        wire:click="setPriceFilter('50000-100000')"
        @class([
            // ...
            'flex items-center py-2 px-4 rounded-full text-sm font-medium border transition duration-150',
            'bg-orange-400 text-white border-transparent' => $filterPrice === '50000-100000',
            'bg-white text-gray-700 hover:bg-gray-50 border-gray-200' => $filterPrice !== '50000-100000',
        ])> 
        <span class="h-2 w-2 rounded-full mr-2" style="background-color: #cfbfafff;"></span>
        ₦50k - ₦100k
    </button>
</div>