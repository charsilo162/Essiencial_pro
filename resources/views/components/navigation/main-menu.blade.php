@php
    $navLinks = [
     
        ['name' => 'Home', 'route' => 'home', 'path_segment' => 'home'], 
        ['name' => 'category', 'route' => 'category.index', 'path_segment' => 'category.index'],
        ['name' => 'About Us', 'route' => 'about-us', 'path_segment' => 'about-us'],
        ['name' => 'FAQs', 'route' => 'faqs', 'path_segment' => 'faqs'],
    ];
@endphp

{{-- Default classes for the container (used in the new header design) --}}
<div {{ $attributes->merge(['class' => 'flex flex-1 justify-center space-x-8 text-sm font-medium']) }}>
    @foreach ($navLinks as $link)
        @php
            $href = route($link['route']);
            $isActive = request()->routeIs($link['route']) || ($link['path_segment'] !== '/' && request()->is($link['path_segment'] . '*'));
            
            // Apply styling specific to the active link
            $classes = $isActive 
                ? 'text-sky-600 font-semibold border-b-2 border-sky-600 pb-1' 
                : 'hover:text-sky-600';
        @endphp

        <a href="{{ $href }}" class="{{ $classes }}">
            {{ $link['name'] }}
        </a>
    @endforeach
</div>