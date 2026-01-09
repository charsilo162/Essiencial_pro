@props(['image', 'title', 'subtitle', 'button' => null])

<section class="relative max-w-6xl mx-auto mt-12 px-6 bg-gray-50 py-12">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $image) }}');">
        <div class="absolute inset-0 bg-black opacity-40"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl sm:text-4xl font-semibold text-white mb-6">{{ $title }}</h2>
        <p class="text-lg sm:text-xl text-white mb-8">{{ $subtitle }}</p>

        @if ($button)
            <x-section.cta :href="$button['href'] ?? '#'" class="w-full sm:w-auto">
                {{ $button['text'] }}
            </x-section.cta>
        @endif
    </div>
</section>