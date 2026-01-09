@props([
    'imageUrl',
    'title',
    'description',
    'rating' => 0,
    'tagLabels' => [],
    'badgeText' => null,
])

@php
    $tags = collect($tagLabels);
    $fullStars = (int) round($rating);
    $emptyStars = 5 - $fullStars;
@endphp

<section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
    <div class="relative bg-white rounded-3xl shadow-2xl overflow-hidden
                border-4 border-transparent
                bg-gradient-to-br from-white via-orange-50/50 to-pink-50/30
                ring-4 ring-orange-200/40 hover:ring-orange-300/70 transition-all duration-500">

        {{-- Top Gradient Bar --}}
        <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-orange-400 via-pink-500 to-yellow-400"></div>

        <div class="p-6 lg:p-10">
            <div class="flex flex-col lg:flex-row gap-10 lg:gap-12">

                {{-- IMAGE SIDE --}}
                <div class="relative w-full lg:w-5/12 xl:w-2/5 flex-shrink-0 group">
                    <div class="relative w-full h-80 lg:h-full aspect-video lg:aspect-square overflow-hidden rounded-3xl shadow-2xl
                                ring-4 ring-orange-200/50 hover:ring-orange-400/80 transition-all duration-500">
                        <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out"
                             src="{{ $imageUrl }}"
                             alt="{{ $title }}" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>

                    @if ($badgeText)
                        <span class="absolute -top-4 -left-4 bg-gradient-to-r from-orange-500 via-pink-500 to-yellow-400 
                                     text-white px-6 py-3 text-sm font-bold tracking-wider rounded-full shadow-2xl
                                     border-4 border-white transform -rotate-12 hover:rotate-0 transition-all duration-500
                                     flex items-center gap-2 animate-pulse hover:animate-none">
                             {{ $badgeText }}
                        </span>
                    @endif
                </div>

                {{-- CONTENT SIDE --}}
                <div class="w-full lg:w-7/12 xl:w-3/5 space-y-8">

                    {{-- Tags --}}
                    @if($tags->count())
                        <div class="flex flex-wrap gap-3">
                            @foreach ($tags as $tag)
                                <span class="px-4 py-2 text-xs font-bold uppercase tracking-wider rounded-full
                                             bg-gradient-to-r from-orange-50 to-pink-50
                                             text-orange-800 border-2 border-orange-200
                                             hover:border-orange-400 hover:from-orange-100 hover:to-pink-100
                                             transition-all duration-300 transform hover:scale-105">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    {{-- Title --}}
                    <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight
                               group-hover:text-transparent group-hover:bg-clip-text 
                               group-hover:bg-gradient-to-r group-hover:from-orange-600 group-hover:via-pink-600 group-hover:to-yellow-600
                               transition-all duration-700">
                        {{ $title }}
                    </h1>

                    {{-- Description --}}
                    <div class="relative pl-6 border-l-4 border-transparent bg-gradient-to-r from-orange-400 to-pink-500 bg-clip-border">
                        <p class="text-lg text-gray-700 leading-relaxed italic">
                            {{ $description }}
                        </p>
                    </div>

                            {{-- RATING — PREMIUM SVG STARS (Best Looking) --}}
                {{-- <div class="flex items-center gap-5 py-4"> --}}
                    {{-- <div class="flex items-center space-x-1">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= round($rating))
                                <!-- Filled Star -->
                                <svg class="w-9 h-9 text-yellow-500 drop-shadow-lg hover:scale-125 transition-transform duration-200" 
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @else
                                <!-- Empty Star -->
                                <svg class="w-9 h-9 text-gray-300" 
                                    fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endif
                        @endfor
                    </div> --}}

                    {{-- <div class="ml-2">
                        <span class="text-4xl font-extrabold text-gray-900">
                            {{ number_format($rating, 1) }}
                        </span>
                        <p class="text-sm text-gray-500 font-medium">
                            {{ number_format(rand(300, 1800)) }} verified reviews
                        </p>
                    </div> --}}
                {{-- </div> --}}

                    {{-- Slots --}}
                    <div class="bg-gradient-to-r from-orange-50 to-pink-50 rounded-2xl p-6 border-2 border-orange-200/50">
                        {{ $contactArea ?? '' }}
                    </div>

                    <div class="py-4">
                        {{ $interactionStats ?? '' }}
                    </div>

                    <div class="flex items-center justify-between pt-6 border-t-2 border-orange-100">
                        <div class="flex-1">
                            {{ $thumbsBlock ?? '' }}
                        </div>
                        <div class="flex-shrink-0">
                            {{ $shareBlock ?? '' }}
                        </div>
                    </div>

                    <div class="mt-8 p-6 rounded-2xl bg-white/70 backdrop-blur-sm border-2 border-orange-200/30 shadow-inner">
                        {{ $footerArea ?? '' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>