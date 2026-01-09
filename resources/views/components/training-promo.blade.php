@props([
    'image' => 'img3.png',
    'title' => "It's not magic. It's training",
    'features' => [],
    'ctaText' => 'Book a Demo',
    'ctaHref' => '#',
    'subtitle' => 'Ready to ditch the CV struggle',
])

<section class="py-12 md:py-20">
    {{-- Container: Added 'gap-10 md:gap-16 lg:gap-24' for significant breathing room --}}
    <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 flex flex-col md:flex-row items-center gap-10 md:gap-16 lg:gap-24">
        
        <div class="w-full md:w-1/2 group">
            <div class="relative">
                {{-- Decorative background element (optional) --}}
                <div class="absolute -inset-2 bg-sky-100 rounded-2xl scale-95 group-hover:scale-100 transition duration-500 -z-10"></div>
                
                <img 
                    src="{{ asset('storage/' . $image) }}" 
                    alt="{{ $title }}"
                    class="w-full aspect-[4/3] object-cover rounded-xl shadow-xl transition-transform duration-500 group-hover:translate-y-[-5px]"
                >
            </div>
        </div>

        <div class="w-full md:w-1/2">
            {{-- Title --}}
            <h3 class="text-3xl lg:text-4xl font-extrabold text-gray-900 leading-tight">
                {{ $title }}
            </h3>

            {{-- Subtitle --}}
            @if ($subtitle)
                <p class="mt-4 text-lg text-gray-600 leading-relaxed">
                    {{ $subtitle }}
                </p>
            @endif

            {{-- Features List --}}
            @if ($features && count($features) > 0)
                <ul class="mt-8 space-y-4">
                    @foreach ($features as $feature)
                        <li class="flex items-start text-gray-700">
                            {{-- Replaced "Check" text with a real SVG Icon --}}
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mr-3 mt-0.5">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-base font-medium">{{ $feature }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif

            {{-- CTA Button --}}
            <div class="mt-10">
                <a 
                    href="{{ $ctaHref }}" 
                    class="inline-flex items-center justify-center bg-sky-500 text-white font-bold py-4 px-10 rounded-full hover:bg-sky-600 hover:shadow-lg transform transition active:scale-95 duration-200"
                >
                    {{ $ctaText }}
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>