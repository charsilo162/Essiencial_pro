@props(['active'])

@php
    // Define your navigation map here once
    $navItems = [
        'courses'  => ['label' => 'My Course',  'route' => route('my.course')],
        'videos'   => ['label' => 'My Videos',  'route' => route('my.videos')],
        'drafts'   => ['label' => 'My Draft',   'route' => route('courses.no-video')],
    ];
@endphp

<div class="border-b mb-6">
    <nav class="flex gap-6 text-sm">
        @foreach ($navItems as $key => $item)
            <a href="{{ $item['route'] }}"
               class="pb-2 border-b-2 transition 
               {{ $active === $key 
                  ? 'border-black font-semibold text-black' 
                  : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' 
               }}">
                {{ $item['label'] }}
            </a>
        @endforeach
    </nav>
</div>