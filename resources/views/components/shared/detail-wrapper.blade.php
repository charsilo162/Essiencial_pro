@props([
    'imageUrl',
    'title',
    'description',
    'rating' => 0,
    'tagLabels' => [],
    'badgeText' => null,
])

@php
    $tags = collect($tagLabels);
    $fullStars = (int) round($rating);
    $emptyStars = 5 - $fullStars;
@endphp

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

        <div class="p-6 lg:p-8">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

                {{-- IMAGE --}}
                <div class="lg:col-span-2">
                    <div class="aspect-video rounded-xl overflow-hidden bg-gray-100">
                        <img 
                            src="{{ $imageUrl }}" 
                            alt="{{ $title }}"
                            class="w-full h-full object-cover"
                        />
                    </div>

                    @if ($badgeText)
                        <span class="inline-block mt-3 px-3 py-1 text-xs font-semibold bg-orange-100 text-orange-700 rounded-full">
                            {{ $badgeText }}
                        </span>
                    @endif
                </div>

                {{-- CONTENT --}}
                <div class="lg:col-span-3 space-y-5">

                    {{-- Tags --}}
                    @if($tags->count())
                        <div class="flex flex-wrap gap-2">
                            @foreach ($tags as $tag)
                                <span class="px-3 py-1 text-xs bg-gray-100 text-gray-700 rounded-full">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    {{-- Title --}}
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">
                        {{ $title }}
                    </h1>

                    {{-- Description --}}
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $description }}
                    </p>

                    {{-- Stats --}}
                    <div>
                        {{ $interactionStats ?? '' }}
                    </div>

                    {{-- Contact Area --}}
                    @if(!empty($contactArea))
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                            {{ $contactArea }}
                        </div>
                    @endif

                    {{-- Footer Area --}}
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pt-4 border-t">
                        <div>
                            {{ $thumbsBlock ?? '' }}
                        </div>

                        <div>
                            {{ $shareBlock ?? '' }}
                        </div>
                    </div>

                    <div class="pt-4">
                        {{ $footerArea ?? '' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
