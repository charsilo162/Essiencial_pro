@php
    // Define your navigation items. 'route' now holds the Laravel route name.
    $navLinks = [
        // 'route' is the name defined in web.php (e.g., ->name('home'))
       ['name' => 'Home', 'route' => 'home', 'path_segment' => '/'], 
        ['name' => 'How it Works', 'route' => 'vedio', 'path_segment' => 'vedio'], 
        ['name' => 'category', 'route' => 'courses.index', 'path_segment' => 'courses.index'],
        ['name' => 'About Cat', 'route' => 'about-cat', 'path_segment' => 'about-cat'],
        ['name' => 'About Us', 'route' => 'about-us', 'path_segment' => 'about-us'],
        ['name' => 'FAQs', 'route' => 'faqs', 'path_segment' => 'faqs'],
    ];

    // Get the current URI path for comparison
    // Use request()->routeIs() for named routes or request()->path() for path comparison
    $currentRouteName = request()->route()?->getName();
@endphp

<div {{ $attributes->merge(['class' => 'flex flex-col md:flex-row md:items-center md:justify-end gap-2 md:gap-5 mt-3 md:mt-0 py-2 md:py-0 md:ps-7']) }}>
    @foreach ($navLinks as $link)
        @php
            // 1. Generate the URL using the route helper
            $href = route($link['route']);

            // 2. Determine the active state using Laravel's requestIs helper
            $isActive = request()->routeIs($link['route']) || (
                // Add logic for 'work.*' or to check if the current path starts with the segment
                $link['path_segment'] !== '/' && request()->is($link['path_segment'] . '*')
            );

            // Define the base and active classes
            $baseClasses = 'py-2 px-4 md:px-1 border-b-2 ';
            $activeClasses = 'border-sky-600 font-semibold text-sky-600';
            $inactiveClasses = 'border-transparent text-gray-600 hover:text-sky-600';

            // Apply the appropriate classes
            $classes = $baseClasses . ($isActive ? $activeClasses : $inactiveClasses);
        @endphp

        <a 
            href="{{ $href }}" 
            class="{{ $classes }}" 
            @if ($isActive) aria-current="page" @endif
        >
            {{ $link['name'] }}
        </a>
    @endforeach
</div>