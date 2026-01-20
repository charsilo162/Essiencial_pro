@props([
    'image',
    'title',
    'description',
    'rating' => null,
    'tags' => [],
    'badge' => null,
])

<section class="max-w-7xl mx-auto px-4 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        {{-- Image --}}
        <div class="relative">
            <img
                src="{{ $image }}"
                alt="{{ $title }}"
                class="w-full rounded-xl object-cover aspect-video border"
            />

            @if($badge)
                <span class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                    {{ $badge }}
                </span>
            @endif
        </div>

        {{-- Content --}}
        <div class="bg-white rounded-xl border p-6 space-y-6">

            {{-- Title --}}
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">
                    {{ $title }}
                </h1>
                <p class="text-sm text-gray-600 mt-2">
                    {{ $description }}
                </p>
            </div>

            {{-- Rating --}}
            {{-- @if($rating)
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <div class="text-yellow-400">
                        {!! str_repeat('★', (int) round($rating)) !!}
                        {!! str_repeat('☆', 5 - (int) round($rating)) !!}
                    </div>
                    <span>{{ number_format($rating, 1) }}</span>
                </div>
            @endif --}}

            {{-- Tags --}}
            @if(count($tags))
                <div class="flex flex-wrap gap-2">
                    @foreach($tags as $tag)
                        <span class="text-xs px-3 py-1 rounded-full border bg-gray-50">
                            {{ $tag }}
                        </span>
                    @endforeach
                </div>
            @endif

            {{-- Stats --}}
            {{ $interactionStats ?? '' }}

            {{-- Actions --}}
            <div class="flex items-center justify-between pt-4 border-t">
                {{ $footer }}
            </div>

            {{-- Social --}}
            <div class="flex items-center justify-between">
                {{ $thumbs ?? '' }}
                {{ $share ?? '' }}
            </div>

            {{-- Extra Info --}}
            {{ $extra ?? '' }}
        </div>
    </div>
</section>
