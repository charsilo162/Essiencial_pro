@props([
    'title' => 'List Section',
    'items' => [],
    'itemPropName' => 'item',           // The variable name to pass to the card (e.g., 'center' or 'course')
    'itemComponent' => 'center.card',   // The actual component tag to render (e.g., 'center.card' or 'course.card')
    'gridClass' => 'grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8',
    'showSeeAll' => false,
    'seeAllUrl' => '#',
    'totalCount' => 0,
    'showSearch' => false,
    'searchPlaceholder' => 'Search...',
    // Include all your other search-related props here if needed
])

<section {{ $attributes->merge(['class' => 'max-w-6xl mx-auto mt-12 px-6']) }}>
    <h2 class="text-xl text-center font-semibold text-gray-800 mb-3">{{ $title }}</h2>

    @if ($showSearch)
        {{-- Search Bar logic goes here --}}
    @endif

    <div class="grid {{ $gridClass }}">
        @forelse ($items as $item)
            {{-- DYNAMICALLY RENDER THE ITEM COMPONENT --}}
            <x-dynamic-component 
                :component="$itemComponent" 
                :wire:key="$itemComponent . '-' . $item->id" 
                :{{ $itemPropName }}="$item" 
            />
        @empty
            <p class="col-span-full text-center py-8 text-gray-500">
                No items found right now.
            </p>
        @endforelse
    </div>

    @if ($showSeeAll)
        {{-- See More button logic --}}
    @endif
</section>