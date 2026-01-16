<div class="space-y-6">
        {{-- Filters --}}
        

    {{-- Loading Skeleton --}}
    @if($loading)
        <div class="animate-pulse grid grid-cols-1 md:grid-cols-2 gap-6">
            @for ($i = 0; $i < 4; $i++)
                <div class="h-40 bg-gray-200 rounded-2xl"></div>
            @endfor
        </div>
    @endif

    {{-- Courses --}}

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

    @foreach($courses as $item)
@php
    $courseData = $item['course']; 
    $students   = $item['students'] ?? [];
    
    $totalStudents = count($students);
    $totalRevenue  = collect($students)->sum(fn($s) => $s['payment']['amount'] ?? 0);
@endphp

<div x-data="{ open: false }"
     class="bg-white rounded-2xl border shadow hover:shadow-lg transition-all">

    {{-- Header --}}
    <div class="p-6 flex gap-5">
        <img 
            src="{{ $courseData['image_thumbnail_url'] ?? asset('storage/img3.png') }}" 
            class="w-28 h-20 rounded-xl object-cover"
        >

        <div class="flex-1 min-w-0">
            {{-- Title --}}
            <h3 class="text-lg font-bold text-gray-800 leading-tight">
                {{ $courseData['title'] }}
            </h3>

            {{-- Category --}}
            <p class="text-sm text-gray-500">
                {{ $courseData['category']['name'] ?? 'Uncategorized' }}
            </p>

            {{-- Button --}}
            <div class="mt-3 flex justify-end">
                <button
                    @click="open = !open"
                    class="
                        group inline-flex items-center gap-2
                        px-3 sm:px-4 py-2 rounded-xl text-sm font-medium
                        text-orange-600
                        bg-white
                        border-2 border-transparent
                        bg-origin-border
                        bg-clip-padding
                        [background-image:linear-gradient(white,white),linear-gradient(to_right,#fb923c,#ec4899,#facc15)]
                        hover:text-white
                        hover:[background-image:linear-gradient(to_right,#fb923c,#ec4899,#facc15)]
                        transition
                        shadow-sm
                    "
                >
                    {{-- Icon (always visible) --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-4 h-4"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>

                    {{-- Text (hidden on mobile) --}}
                    <span class="hidden sm:inline">
                        View Students
                    </span>
                </button>
            </div>

            {{-- Stats --}}
            <div class="flex gap-6 mt-4 text-sm">
                <div class="bg-gray-100 px-4 py-2 rounded-xl">
                    👥 {{ $totalStudents }} Students
                </div>

                <div class="px-4 py-2 rounded-xl text-orange-700
                            bg-gradient-to-r from-orange-100 via-pink-100 to-yellow-100">
                    ₦{{ number_format($totalRevenue, 2) }} Revenue
                </div>
            </div>
        </div>
    </div>

    {{-- Expandable Students --}}
    <div x-show="open" x-transition.opacity class="border-t bg-gray-50">
        <div class="p-6 space-y-4">
            @forelse($students as $student)
                <div class="flex justify-between items-center bg-white p-4 rounded-xl shadow-sm">
                    <div class="min-w-0">
                        <p class="font-semibold truncate">{{ $student['name'] }}</p>
                        <p class="text-sm text-gray-500 truncate">{{ $student['email'] }}</p>
                    </div>

                    <p class="text-green-600 font-semibold text-sm whitespace-nowrap">
                        ₦{{ number_format($student['payment']['amount'] ?? 0, 2) }}
                    </p>
                </div>
            @empty
                <p class="text-gray-500">No students enrolled yet.</p>
            @endforelse
        </div>
    </div>

</div>
@endforeach

        {{-- Custom Pagination Links --}}
        @if(isset($pagination['links']) && count($pagination['links']) > 3)
            <div class="mt-8 flex justify-center">
                <nav class="inline-flex rounded-xl shadow-sm bg-white p-1 border">
                    @foreach($pagination['links'] as $link)
                        <button 
                            wire:click="gotoPage({{ $link['label'] == 'Next &raquo;' ? $page + 1 : ($link['label'] == '&laquo; Previous' ? $page - 1 : $link['label']) }})"
                            @disabled(!$link['url'] || $link['active'])
                            class="px-4 py-2 mx-1 rounded-lg text-sm font-medium transition-all {{ $link['active'] ? 'bg-indigo-600 text-white' : 'text-gray-500 hover:bg-gray-100 disabled:opacity-50' }}"
                        >
                            {!! $link['label'] !!}
                        </button>
                    @endforeach
                </nav>
            </div>
            
            <div class="text-center mt-2 text-xs text-gray-400">
                Showing {{ $pagination['from'] }} to {{ $pagination['to'] }} of {{ $pagination['total'] }} results
            </div>
        @endif
</div>

</div>
