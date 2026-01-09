@props([
    'title', 
    'items', 
    'showSeeAll' => false, 
    'seeAllRoute' => '#',
])

{{-- This section remains the same, accepting the dynamic title and item data --}}
<section class="max-w-7xl mx-auto py-4 sm:px-6 lg:px-8">
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-extrabold text-gray-900">
            {{ $title }}
        </h2>
    </div>

    <div class="grid grid-cols-1 gap-4">
        @forelse ($items as $item)
            {{-- Assuming list-item.blade.php exists --}}
            <x-shared.list-item :item="$item" /> 
        @empty
             <p class="text-center text-gray-500 py-8">No items found for this section.</p>
        @endforelse
    </div>
    
    @if ($showSeeAll)
        <div class="text-center mt-8">
            <a href="{{ $seeAllRoute }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 transition-colors">
                See {{ $title }}
            </a>
        </div>
    @endif
</section>
