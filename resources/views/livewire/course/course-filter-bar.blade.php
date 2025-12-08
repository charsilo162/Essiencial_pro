<div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6 pb-6 border-b">

    {{-- Filters + Title + Clear Button --}}
    <div class="flex flex-wrap items-center gap-4 order-2 md:order-1 w-full md:w-auto">
        <h2 class="text-2xl font-bold text-gray-800 hidden md:block">Filter Courses</h2>

        {{-- Price Filter --}}
        <livewire:course.course-price-filter :filterPrice="$filterPrice" key="price-filter-buttons" />

        {{-- Type Filter (uncomment when ready) --}}
        {{-- <livewire:course.course-type-filter :filterType="$filterType" key="type-filter-buttons" /> --}}

        {{-- Clear All Filters Button --}}
        <button
            wire:click="clearAllFilters"
            @class([
                'py-2.5 px-5 rounded-full font-medium text-sm transition shadow-md',
                'bg-red-600 text-white hover:bg-red-700' => $filterType !== 'all' || $filterPrice !== 'all',
                'bg-gray-200 text-gray-600 cursor-not-allowed opacity-70' => $filterType === 'all' && $filterPrice === 'all',
            ])
        >
            Clear Filters
        </button>
    </div>

    {{-- SEARCH BOX HAS BEEN MOVED TO THE MAIN COURSE LIST PAGE --}}
    {{-- No more location search here — it's now unified above the list --}}
</div>