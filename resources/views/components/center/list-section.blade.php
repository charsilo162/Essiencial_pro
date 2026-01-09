@props([
    'title' => 'Trainings Around You',
    'centers' => [],
    'gridClass' => 'grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8',

    // New Props for "See More" Logic
    'limit' => 0,
    'totalCenterCount' => 0,
    'showSeeAll' => false,

    // Search Bar Props
    'search' => '',
    'showSearch' => true,
    'wireModel' => 'search',
    'buttonClick' => 'performSearch',
    'searchPlaceholder' => 'Search centers...',
])

{{-- Outer Container Class --}}
<section {{ $attributes->merge(['class' => 'max-w-6xl mx-auto mt-12 px-6']) }}>
    <h2 class="text-xl text-center font-semibold text-gray-800 mb-3">{{ $title }}</h2>

    @if ($showSearch)
        {{-- You might want to wrap the search bar to prevent it from stretching the full 6xl width --}}
        <div class="max-w-3xl mx-auto mb-6">
            <x-forms.search-bar 
                :wire-model="$wireModel" 
                :button-click="$buttonClick" 
                :placeholder="$searchPlaceholder"
            />
        </div>
    @endif

    <div class="grid {{ $gridClass }}">
        @forelse ($centers as $center)
            <x-center.card :center="$center" />
        @empty
            <p class="col-span-full text-center py-8 text-gray-500">
                No training centers found right now.
            </p>
        @endforelse
    </div>

    {{-- SEE MORE BUTTON LOGIC --}}
    @if ($showSeeAll)
        <div class="text-center mt-10">
            <a 
                {{-- href="{{ route('centers.index') }}"  --}}
           href="{{ route('category.index') }}" 
                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                See All {{ number_format($totalCenterCount) }} Centers
                <svg class="ml-2 -mr-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    @endif
</section>