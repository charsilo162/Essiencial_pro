{{-- 
    Component: Why Users Love Us
    Matches original section exactly
--}}

@props([
    'features' => [
        [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>',
            'title' => 'Saves you time'
        ],
        [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
            'title' => 'Saves you money'
        ],
        [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>',
            'title' => 'Pinpoints your perfect match'
        ],
        [
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
            'title' => 'Reduces hiring stress'
        ],
    ],
    'image' => 'logo7.jpg',
    'imageAlt' => 'Training team',
    'title' => 'Whatever your industry, whatever the position, or skill eTraining will work for you',
    'text' => 'The qualities needed for a car mechanic will differ enormously from those for the matron in a care home, or a senior manager in a pharmaceutical company, or a barista in a small coffee shop. From tour guides to technical writers, to jewellers, lawyers to labourers, pharmacists to farmers, we can help.',
    'ctaText' => 'Get started',
    'ctaHref' => '#'
])

<section class="max-w-7xl mx-auto px-4 py-12 bg-gray-50">
    <h2 class="text-3xl font-bold text-gray-900 text-center mb-6">Why our users Love Us</h2>
    <p class="text-center text-gray-600 mb-10">Our system is more than just clever software</p>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">
        @foreach ($features as $feature)
            <div class="text-center p-4 bg-white rounded-lg shadow-md">
                <div class="mx-auto w-12 h-12 bg-sky-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $feature['icon'] !!}
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-gray-900">{{ $feature['title'] }}</h3>
            </div>
        @endforeach
    </div>

    <div class="flex flex-col md:flex-row items-center justify-between p-6 bg-white rounded-lg shadow-md">
        <div class="w-full md:w-1/2 mb-6 md:mb-0">
            <img src="{{ asset('storage/' . $image) }}" 
                 class="w-full h-64 object-cover rounded-lg" 
                 alt="{{ $imageAlt }}">
        </div>
        <div class="w-full md:w-1/2 md:pl-6">
            <h3 class="text-xl font-bold text-gray-900">{{ $title }}</h3>
            <p class="mt-4 text-gray-600">{{ $text }}</p>
            <a href="{{ $ctaHref }}" 
               class="mt-6 inline-block bg-sky-500 text-white font-semibold py-2 px-6 rounded-full hover:bg-sky-600 transition-colors">
                {{ $ctaText }}
            </a>
        </div>
    </div>
</section>