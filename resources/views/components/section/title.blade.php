@props(['title', 'subtitle' => null, 'class' => ''])

<section class="{{ $class }}">
    <h2 class="text-3xl font-bold text-center mb-4 text-blue-500">{{ $title }}</h2>
    @if ($subtitle)
        <p class="text-center text-gray-600 mb-10">{{ $subtitle }}</p>
    @endif
    {{ $slot }}
</section>