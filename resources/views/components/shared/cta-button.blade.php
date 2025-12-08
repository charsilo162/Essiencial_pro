@props(['href' => '#', 'text' => 'Book a call'])

<a href="{{ $href }}" {{ $attributes->merge([
    'class' => 'px-4 py-2 bg-sky-600 text-white rounded-lg font-medium hover:bg-sky-700 transition'
]) }}>
    {{ $text }}
</a>