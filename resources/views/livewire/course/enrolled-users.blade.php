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
<div class="space-y-6 col-span-1 sm:col-span-2 lg:col-span-3 xl:col-span-4">
<p class="text-gray-600">Here are the enrolled users for each course:</p>
    </div>
    @foreach($courses as $item)
        @php
            $courseData = $item['course']; 
            $students   = $item['students'] ?? [];
            
            $totalStudents = count($students);
            $totalRevenue  = collect($students)->sum(fn($s) => $s['payment']['amount'] ?? 0);
        @endphp

        <div x-data="{ open: false }"
             class="bg-white rounded-2xl shadow hover:shadow-lg transition-all border">

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

                    {{-- Button (moved down) --}}
                   <div class="mt-3 flex justify-start sm:justify-end">
                        <button 
                            @click="open = !open"
                            class="px-4 py-2 rounded-xl bg-indigo-600 text-white text-sm hover:bg-indigo-700 transition"
                        >
                            View Students
                        </button>
                    </div>

                    {{-- Stats --}}
                    <div class="mt-4 flex flex-wrap items-start gap-3 text-sm">
                        <div class="bg-gray-100 px-4 py-2 rounded-xl">
                            👥 {{ $totalStudents }} Students
                        </div>
                        <div class="bg-green-100 px-4 py-2 rounded-xl text-green-700">
                            ₦{{ number_format($totalRevenue, 2) }} Revenue
                        </div>
                    </div>
                </div>
            </div>

            {{-- Expandable Students --}}
            <div x-show="open" x-transition.opacity class="border-t bg-gray-50">
                <div class="p-6 space-y-4">
                    @forelse($students as $student)
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-3">
                            <div class="min-w-0">
                                <h3 class="text-lg font-bold text-gray-800 leading-tight">
                                    {{ $courseData['title'] }}
                                </h3>
                                <p class="text-sm text-gray-500">
                                    {{ $courseData['category']['name'] ?? 'Uncategorized' }}
                                </p>
                            </div>

                            <button 
                                @click="open = !open"
                                class="self-start sm:self-auto px-4 py-2 rounded-xl bg-indigo-600 text-white text-sm hover:bg-indigo-700 transition whitespace-nowrap"
                            >
                                View Students
                            </button>
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
