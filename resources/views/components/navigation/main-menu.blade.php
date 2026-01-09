@php
$navLinks = [
    ['label' => 'Home', 'route' => 'home'],
    ['label' => 'Category', 'route' => 'category.index'],
    ['label' => 'About Us', 'route' => 'about-us'],
    ['label' => 'Contact Us', 'route' => 'contact_us'],
    ['label' => 'FAQs', 'route' => 'faqs'],
];
@endphp

<div {{ $attributes->merge(['class' => 'flex gap-6']) }}>
    @foreach ($navLinks as $link)
        <a
            href="{{ route($link['route']) }}"
            class="text-sm font-medium transition-colors
            {{ request()->routeIs($link['route'])
                ? 'text-sky-400 border-b-2 border-sky-400'
                : 'text-white hover:text-sky-400' }}"
        >
            {{ $link['label'] }}
        </a>
    @endforeach
</div>
