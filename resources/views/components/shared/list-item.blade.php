@props(['item'])

{{-- Fallback values in case the property doesn't exist on the passed model --}}
@php
    $typeBadge = $item['type'] ?? 'Unknown';
    $isPhysical = strtolower($typeBadge) === 'physical';
@endphp
  {{-- @php
            dd($item);
        @endphp --}}
<div class="bg-white rounded-lg shadow-xl flex flex-col sm:flex-row items-start sm:items-center justify-between p-4 transition-transform hover:shadow-2xl hover:scale-[1.005]">
    
    {{-- === LEFT & CENTER SECTION (Image + Details) === --}}
    {{-- Use flex-col on mobile and flex-grow to ensure it takes up the available width --}}
    <div class="flex flex-col sm:flex-row sm:items-start space-y-4 sm:space-y-0 sm:space-x-4 w-full sm:w-3/4">

        {{-- Thumbnail Container: flex-shrink-0 prevents image from collapsing --}}
        <div class="flex-shrink-0">
            <img class="w-24 h-24 rounded-lg object-cover" src="{{ $item['image_thumbnail_url'] ?? asset('storage/default.png') }}" alt="{{ $item['title'] }}">
        </div>
        
        {{-- Details: flex-grow ensures this section takes all remaining space --}}
        <div class="flex-grow">
            <h3 class="text-xl font-bold text-gray-900 leading-snug">{{ $item['title'] }}</h3>
            
            {{-- Status and Badge --}}
            <p class="text-sm text-gray-500 mb-2 mt-1">
                <span class="font-bold text-gray-700">({{ $item['registered_count'] ?? '0' }} registered)</span>
                
                {{-- Dynamic Badge based on item type --}}
                <span @class([
                    'px-2 py-1 rounded-full text-xs ml-2',
                    'bg-indigo-100 text-indigo-700' => $isPhysical,
                    'bg-green-100 text-green-700' => !$isPhysical,
                ])>
                    {{ $typeBadge }}
                </span>
            </p>

            {{-- Interaction Stats: The use of flex-wrap is critical here --}}
            <div class="flex flex-wrap items-center text-xs text-gray-600 gap-x-4 gap-y-2 mt-2">
                <x-stats.interaction-stat icon="comment" :count="$item['comments_count'] ?? 0" label="comments" />
                <x-stats.interaction-stat icon="heart" :count="$item['likes_count'] ?? 0" label="Likes" />
                <x-stats.interaction-stat icon="eye" :count="$item['views_count'] ?? 0" label="views" />
                <x-stats.interaction-stat icon="share" :count="$item['shares_count'] ?? 0" label="shares" />
            </div>
            
            {{-- Rating --}}
            <div class="flex items-center mt-2">
                <span class="text-yellow-400 text-lg">
                    {!! str_repeat('&#9733;', (int) round($item['rating'] ?? 0)) !!}
                    {!! str_repeat('&#9734;', 5 - (int) round($item['rating'] ?? 0)) !!}
                </span>
                <span class="text-xs text-gray-600 ml-1">{{ number_format($item['rating'] ?? 0, 2) }}</span>
            </div>
        </div>
    </div>
    
    {{-- === RIGHT SECTION (Price and Button) === --}}
    {{-- On mobile, this section is now full-width, justified to the end for separation --}}
    <div class="flex items-center justify-between w-full sm:w-auto sm:justify-end space-x-4 pt-4 sm:pt-0 border-t sm:border-t-0 border-gray-100 mt-4 sm:mt-0">
        <span class="text-xl font-bold text-gray-900 flex-shrink-0">{{ $item['price_formatted'] ?? 'Free' }}</span>
        
        {{-- Replaced raw button with the new reusable component --}}
        <x-shared.action-button 
            :link="$item['link'] ?? '#'" 
            :text="$item['button_text'] ?? 'View Details'" 
        />
    </div>
</div>
