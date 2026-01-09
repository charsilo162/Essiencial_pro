@props([
    'imageUrl',
    'title',
    'description',
    'rating' => 0,
    'tagLabels' => [],
    'badgeText' => null,
])

<section class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row gap-8">
        
        <!-- Left Section: Image and Badge -->
        <div class="relative w-full lg:w-1/2 flex-shrink-0">
            <img class="w-full h-auto rounded-xl shadow-2xl object-cover" 
                 src="{{ $imageUrl }}"
                  
                 alt="{{ $title }}" 
            />
            @if ($badgeText)
                {{-- Updated to use the user's requested blue badge styling --}}
                <span class="absolute top-4 left-4 bg-blue-500 text-white px-3 py-1 text-sm font-semibold rounded-lg shadow-lg">
                    {{ $badgeText }}
                </span>
            @endif
        </div>

        <!-- Right Section: Content Slotting -->
        <div class="w-full lg:w-1/2 p-6 bg-white rounded-xl shadow-2xl">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $title }}</h1>
            <p class="text-gray-600 text-sm mb-4">{{ $description }}</p>

            <!-- Rating Section (Shared) -->
            <div class="flex items-center mb-4">
                <span class="text-yellow-400 text-xl">
                    {{-- Assuming simple rounding for star count --}}
                    {!! str_repeat('&#9733;', (int) round($rating)) !!}
                    {!! str_repeat('&#9734;', 5 - (int) round($rating)) !!}
                </span>
                <span class="text-gray-600 text-sm ml-2">{{ number_format($rating, 2) }}</span>
            </div>

            <!-- *** Dynamic Contact/Info Area (SLOT) *** -->
            {{ $contactArea }}
            <!-- *** End Dynamic Contact/Info Area *** -->


            <!-- Tags Section (Shared) -->
            <div class="flex flex-wrap gap-2 text-xs font-semibold uppercase text-gray-600 mb-4">
                @foreach ($tagLabels as $tag)
                    <span class="py-1 px-2 border border-gray-300 rounded-full hover:bg-gray-50 transition-colors">{{ $tag }}</span>
                @endforeach
            </div>

            <!-- Interaction Stats (Shared) -->
            {{-- NOTE: You should move these SVGs into a reusable interaction-stats component/partial --}}
            {{ $interactionStats }}

            <!-- Thumbs Up/Down (Shared) -->
            <div class="flex items-center gap-8 mt-6">
    <div class="flex-1">
        {{ $thumbsBlock }}
    </div>
    <div class="flex-shrink-0">
        {{ $shareBlock ?? '' }}
    </div>
</div>
            <!-- Map/Price Footer (SLOT) -->
            <div class="pt-4 mt-4 border-t border-gray-100">
                {{ $footerArea }}
            </div>
        </div>
    </div>
</section>
