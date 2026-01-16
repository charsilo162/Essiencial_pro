@props([
    'title',
    'items',
    'showSeeAll' => false,
    'seeAllRoute' => '#',
])

<section class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

    {{-- SECTION TITLE — now with warm gradient underline --}}
    <div class="mb-10 text-center">
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            {{ $title }}
        </h2>
        <div class="w-24 mx-auto mt-2 h-1 bg-gradient-to-r from-orange-500 via-pink-500 to-yellow-400 rounded-full"></div>
    </div>

    {{-- GRID — EXACT same spacing & columns as your original --}}
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">

        @forelse ($items as $item)

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden 
                        transform transition-all duration-300 hover:scale-[1.03] hover:-translate-y-1 
                        hover:shadow-2xl hover:rotate-[0.4deg] group
                        border-2 border-transparent
                        hover:border-orange-300/50
                        relative">

                {{-- Permanent top gradient accent (subtle, always visible) --}}
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-orange-400 via-pink-500 to-yellow-400"></div>

                {{-- IMAGE — exact same h-48 and behavior --}}
                <div class="overflow-hidden">
                    <img src="{{ $item['thumbnail_url'] ?? asset('storage/img2.jpg') }}"
                         class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110"
                         alt="{{ $item['title'] }}">
                </div>

                {{-- BODY — exact same p-5 and spacing --}}
                <div class="p-5">

                    {{-- TITLE — now with gradient hover to match header --}}
                    <h3 class="font-bold text-lg text-gray-900 
                               group-hover:text-transparent group-hover:bg-clip-text 
                               group-hover:bg-gradient-to-r group-hover:from-orange-600 group-hover:to-pink-600 
                               transition-all duration-300">
                        {{ $item['title'] }}
                    </h3>

                    {{-- REGISTERED — unchanged --}}
                    <p class="text-xs text-gray-500 mt-1">
                        ({{ $item['registered_count'] ?? 0 }} registered)
                    </p>

                    {{-- STATS — unchanged layout --}}
                    <div class="flex items-center text-xs mt-3 gap-4 text-gray-400 flex-wrap">
                        <span>Comments {{ $item['comments_count'] ?? 0 }}</span>
                        <span>Likes {{ $item['likes_count'] ?? 0 }}</span>
                        <span>Shares {{ $item['shares_count'] ?? 0 }}</span>
                    </div>

                    {{-- RATING — same layout, warmer badge --}}
                    {{-- <div class="flex items-center text-yellow-500 mt-3 text-sm"> --}}
                        {{-- {!! str_repeat('Star', (int) round($item['rating'] ?? 0)) !!}
                        {!! str_repeat('Star Outline', 5 - (int) round($item['rating'] ?? 0)) !!} --}}
                        {{-- <span class="ml-2 text-gray-600 text-xs">
                            {{ number_format($item['rating'] ?? 0, 1) }}/5 — 
                            <span class="font-medium text-orange-700">
                                {{ $item['type'] ?? 'Unknown' }}
                            </span>
                        </span>
                    </div> --}}

                    {{-- ACTIONS — gradient button + same layout --}}
                    <div class="flex items-center justify-between mt-5">

                        <a href="{{ $item['link'] ?? '#' }}"
                           class="px-5 py-2 bg-gradient-to-r from-orange-500 via-pink-500 to-yellow-400 
                                  text-white font-bold text-sm rounded-full shadow-md
                                  hover:shadow-lg hover:from-orange-600 hover:via-pink-600 hover:to-yellow-500
                                  transition-all duration-300">
                            {{ $item['button_text'] ?? 'View' }}
                        </a>

                        <span class="font-bold text-xl text-gray-900">
                            {{ $item['price_formatted'] ?? 'Free' }}
                        </span>
                    </div>
                </div>
            </div>

        @empty
            <p class="text-center text-gray-500 py-8 col-span-full">
                No items found for this section.
            </p>
        @endforelse
    </div>

    {{-- SEE ALL — now matches header gradient --}}
    @if ($showSeeAll)
        <div class="text-center mt-10">
            <a href="{{ $seeAllRoute }}"
               class="inline-flex items-center px-8 py-3 text-base font-bold text-white rounded-full 
                      bg-gradient-to-r from-orange-500 via-pink-500 to-yellow-400 shadow-lg
                      hover:shadow-xl hover:from-orange-600 hover:via-pink-600 hover:to-yellow-500
                      transition-all duration-300">
                See {{ $title }}
            </a>
        </div>
    @endif
</section>