@props(['image', 'title', 'text'])

<div class="hs-carousel-slide relative w-full h-full">
    <img class="w-full h-full object-cover" src="{{ $image }}" alt="{{ $title }}">

    <!-- Overlay for text readability -->
    <div class="absolute bottom-6 left-6 max-w-md animate-fade-up">
        <div class="bg-black/50 p-4 rounded-lg">
            <h2 class="text-2xl md:text-4xl font-bold text-white">{{ $title }}</h2>
            <p class="mt-2 text-sm md:text-base text-gray-200">{{ $text }}</p>
        </div>
    </div>
</div>
