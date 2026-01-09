{{-- resources/views/livewire/venue-list.blade.php --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">All Event Venues</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($venues as $venue)
            @php
                $pricing   = $venue['pricingDetails'];
                $amenities = $venue['amenities'];
                $addr      = $venue['address'];
                $hasDiscount = $pricing['discountPercentage'] > 0;
                $oldPrice  = $hasDiscount ? number_format($pricing['totalPayment']) : null;
                // $newPrice  = number_format($hasDiscount ? $venue['pricingDetails']['discountedTotalPayment'] ?? $pricing['totalPayment']);
                $newPrice = number_format($hasDiscount ? ($venue['pricingDetails']['discountedTotalPayment'] ?? $pricing['totalPayment'])
                : $pricing['totalPayment']
);

          @endphp

            <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition">
                <img src="{{ $venue['coverImage'] }}" alt="{{ $venue['title'] }}" class="w-full h-48 object-cover">

                <div class="p-5 space-y-2">
                    @if($hasDiscount)
                        <span class="text-xs font-semibold text-red-600 bg-red-50 px-2 py-1 rounded">
                            {{ $pricing['discountPercentage'] }}% OFF
                        </span>
                    @endif

                    <h3 class="text-lg font-bold text-gray-800">{{ $venue['title'] }}</h3>
                    <p class="text-sm text-gray-500">
                        <i class="fa-solid fa-location-dot"></i> {{ $addr['lga'] }}, {{ $addr['state'] }}
                    </p>

                    <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-sm text-gray-600 border-t pt-2">
                        @if($amenities['isFurnished'] ?? false)<span>Furnished</span>@endif
                        @if($amenities['hasToilet'] ?? false)<span>Restroom</span>@endif
                        @if($amenities['hasAC'] ?? false)<span>AC</span>@endif
                        @if($amenities['hasChangingRoom'] ?? false)<span>Changing Room</span>@endif
                    </div>

                    <div class="pt-3 flex items-baseline gap-3">
                        @if($hasDiscount)
                            <p class="text-sm text-gray-500 line-through">₦{{ $oldPrice }}</p>
                        @endif
                        <p class="text-xl font-semibold text-gray-900">₦{{ $newPrice }}</p>
                    </div>

                    <a href="{{ route('venues.show', $venue['slug']) }}"
                       class="mt-3 w-full bg-white border-2 border-red-500 text-red-500 font-semibold py-2 rounded-full hover:bg-red-500 hover:text-white transition inline-block text-center">
                        View Details
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Livewire pagination (styled to match your design) --}}
   @if ($venues->hasPages())
        <div class="mt-10 flex justify-center">
            {{ $venues->links() }}
        </div>
    @endif
</div>