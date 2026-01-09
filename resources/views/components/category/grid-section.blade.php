@props([
    'title' => 'Categories',
    'categories' => [],
    'search' => '',
    'totalCategoryCount' => 0,
    
    // Layout and visibility props
    'gridClass' => 'grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6',
    'showSeeAll' => false,
    'showSearch' => true,

    // Search Bar Props (for Livewire binding)
    'wireModel' => 'search',
    'buttonClick' => 'performSearch',
    'searchPlaceholder' => 'Search categories...',
])

<section {{ $attributes->merge(['class' => 'max-w-7xl mx-auto px-4 pb-2 mt-8']) }}>
    <h2 class="text-xl font-bold mb-6">{{ $title }}</h2>

    @if ($showSearch)
        <x-forms.search-bar 
            :wire-model="$wireModel" 
            :button-click="$buttonClick" 
            :placeholder="$searchPlaceholder"
        />
    @endif

    {{-- CATEGORY CARDS GRID --}}
    {{-- The dynamic class allows you to set the number of columns per row --}}
    <div class="grid {{ $gridClass }} mt-8">
        
        @forelse ($categories as $category)
            {{-- Use the reusable card component --}}
            <x-category.card :category="$category" />
        @empty
            <p class="col-span-full text-center py-10 text-lg text-gray-500">
                No {{ strtolower($title) }} found matching **"{{ $search }}"**.
            </p>
        @endforelse
    </div>

    @if ($showSeeAll)
        {{-- Use the reusable button component --}}
        <x-category.see-all-button :total-category-count="$totalCategoryCount" />
    @endif
</section>