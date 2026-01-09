{{-- resources/views/livewire/featured-venues.blade.php --}}
<div class="bg-gray-50 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Featured Event Venues</h2>

        @if($loading)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @for($i = 0; $i < 4; $i++)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 animate-pulse">
                        <div class="h-48 bg-gray-200 rounded-t-2xl"></div>
                        <div class="p-5 space-y-3">
                            <div class="h-4 bg-gray-200 rounded w-3/4"></div>
                            <div class="h-3 bg-gray-200 rounded w-1/2"></div>
                            <div class="h-10 bg-gray-200 rounded-full mt-4"></div>
                        </div>
                    </div>
                @endfor
            </div>
        @elseif($error)
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 text-center">
                <p class="text-yellow-800 font-medium">
                    <i class="fa-solid fa-triangle-exclamation mr-2"></i>
                    {{ $error }}
                </p>
                <p class="text-sm text-yellow-600 mt-2">
                    The rest of the site is working normally.
                </p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($venues as $venue)
                    @php
                        $pricing   = $venue['pricingDetails'];
                        $addr      = $venue['address'];
                        $hasDiscount = $pricing['discountPercentage'] > 0;
                        $oldPrice  = $hasDiscount ? number_format($pricing['totalPayment']) : null;
                        $newPrice  = number_format($hasDiscount ? $pricing['discountedTotalPayment'] : $pricing['totalPayment']);
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
                                Location: {{ $addr['lga'] }}, {{ $addr['state'] }}
                            </p>

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

            <div class="mt-8 text-center">
                <a href="{{ route('venues') }}"
                   class="inline-block px-8 py-3 bg-red-500 text-white font-semibold rounded-full hover:bg-red-600 transition">
                    See More Venues
                </a>
            </div>
        @endif
    </div>
</div>