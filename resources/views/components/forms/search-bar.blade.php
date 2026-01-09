@props(['wireModel' => 'search', 'buttonClick' => 'performSearch', 'placeholder' => 'Search now...'])

<div {{ $attributes->merge(['class' => 'max-w-3xl mx-auto mt-8 px-4']) }}>
    <div 
        class="bg-white rounded-xl shadow-lg p-3 sm:p-4 
               flex flex-col sm:flex-row items-stretch sm:items-center 
               space-y-2 sm:space-y-0 sm:space-x-4"
    >
        <!-- Input Field -->
        <input 
            type="text" 
            placeholder="{{ $placeholder }}" 
            class="flex-1 px-3 py-2 sm:px-4 sm:py-2 text-base 
                   border-2 border-gray-200 rounded-xl 
                   focus:outline-none focus:ring-4 focus:ring-sky-200 focus:border-sky-500 
                   transition duration-200"
            wire:model.live.debounce.300ms="{{ $wireModel }}"
        />
        
        <!-- Search Button -->
        <button 
            type="button"
            class="px-3 py-2 sm:px-4 sm:py-2 text-sm sm:text-base 
                   bg-sky-600 text-white font-semibold rounded-xl 
                   hover:bg-sky-700 active:bg-sky-800 
                   transition duration-150 ease-in-out 
                   shadow-md hover:shadow-lg"
            wire:click="{{ $buttonClick }}"
        >
            Search
        </button>
    </div>
</div>
