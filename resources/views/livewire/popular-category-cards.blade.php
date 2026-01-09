{{-- Use the new, flexible grid component --}}
<x-category.grid-section 
    title="" 
    :categories="$categories" 
    :search="$search" 
    :total-category-count="$totalCategoryCount"

    {{-- Customize Layout (This sets 6 cards per row) --}}
    grid-class="grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6"
    
    {{-- Show the see all button based on Livewire logic --}}
    :show-see-all="$showSeeAll"
    
    {{-- Bind to the Livewire component's properties/methods --}}
    wire-model="search"
    button-click="performSearch"
    search-placeholder="Search popular categories..."
/>