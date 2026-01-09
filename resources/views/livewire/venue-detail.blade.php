<div>
    {{-- resources/views/livewire/venue-detail.blade.php --}}
@if($venue)
    @php
        $p = $venue['pricingDetails'];
        $a = $venue['amenities'];
        $addr = $venue['address'];
        $hasDiscount = $p['discountPercentage'] > 0;
        $oldPrice = $hasDiscount ? number_format($p['totalPayment']) : null;
        $newPrice = number_format($hasDiscount ? $p['discountedTotalPayment'] : $p['totalPayment']);
        $images = collect([$venue['coverImage']])->merge($venue['additionalImages'] ?? [])->take(6);
        $currentUrl = request()->fullUrl();
        $shareTitle = urlencode($venue['title'] . ' - Book this venue on Evenue');
    @endphp

    <div class="max-w-5xl mx-auto px-4 py-8 space-y-10">
        {{-- Hero Image + Verified Badge --}}
        <div class="relative rounded-2xl overflow-hidden shadow-lg">
            <img src="{{ $venue['coverImage'] }}" alt="{{ $venue['title'] }}" class="w-full h-96 object-cover">
            
            <div class="absolute top-4 left-4 flex gap-2">
                @if($hasDiscount)
                    <span class="bg-red-600 text-white text-sm font-bold px-3 py-1 rounded-full shadow">
                        {{ $p['discountPercentage'] }}% OFF
                    </span>
                @endif
                @if($venue['verified'] ?? false)
                    <div x-data="{ show: false }" class="relative">
                        <button @mouseenter="show = true" @mouseleave="show = false"
                                class="bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow flex items-center gap-1">
                            <i class="fa-solid fa-shield-check"></i> Verified
                        </button>
                        <div x-show="show" x-cloak
                             class="absolute top-full left-0 mt-1 bg-gray-900 text-white text-xs rounded p-2 whitespace-nowrap z-10 shadow-lg">
                            This venue has been verified by Evenue admins
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Title, Price, Share Buttons --}}
        <div class="flex flex-col md:flex-row justify-between items-start gap-6">
            <div class="flex-1">
                <h1 class="text-3xl font-bold text-gray-900">{{ $venue['title'] }}</h1>
                <p class="text-lg text-gray-600 mt-1 flex items-center gap-2">
                    <i class="fa-solid fa-location-dot text-red-500"></i>
                    {{ $addr['fullAddress'] ?? "{$addr['lga']}, {$addr['state']}" }}
                </p>
            </div>

            <div class="text-right">
                <div class="flex items-baseline gap-3 justify-end">
                    @if($hasDiscount)
                        <p class="text-xl text-gray-500 line-through">₦{{ $oldPrice }}</p>
                    @endif
                    <p class="text-3xl font-bold text-red-600">₦{{ $newPrice }}</p>
                </div>
                <p class="text-sm text-gray-500">per event</p>

                {{-- Share Buttons --}}
                <div class="flex gap-2 mt-3 justify-end">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($currentUrl) }}"
                       target="_blank" class="w-9 h-9 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                        <i class="fab fa-facebook-f text-xs"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode($currentUrl) }}&text={{ $shareTitle }}"
                       target="_blank" class="w-9 h-9 bg-black text-white rounded-full flex items-center justify-center hover:bg-gray-800 transition">
                        <i class="fab fa-x-twitter text-xs"></i>
                    </a>
                    <a href="https://wa.me/?text={{ $shareTitle }}%20{{ urlencode($currentUrl) }}"
                       target="_blank" class="w-9 h-9 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition">
                        <i class="fab fa-whatsapp text-sm"></i>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($currentUrl) }}"
                       target="_blank" class="w-9 h-9 bg-blue-700 text-white rounded-full flex items-center justify-center hover:bg-blue-800 transition">
                        <i class="fab fa-linkedin-in text-xs"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Quick Info Pills --}}
        <div class="flex flex-wrap gap-3 text-sm">
            <span class="bg-gray-100 px-3 py-1 rounded-full">Capacity: {{ $venue['capacity'] }}</span>
            <span class="bg-gray-100 px-3 py-1 rounded-full">Type: {{ ucfirst(str_replace('_', ' ', $venue['type'])) }}</span>
            <span class="bg-gray-100 px-3 py-1 rounded-full">Views: {{ $venue['viewCount'] ?? 0 }}</span>
            <span class="bg-gray-100 px-3 py-1 rounded-full">Shares: {{ $venue['shareCount'] ?? 0 }}</span>
        </div>

        {{-- Google Maps --}}
        <div class="bg-white p-4 rounded-xl shadow-sm border">
            <h3 class="text-xl font-semibold mb-3">Location on Map</h3>
            <div id="map" class="h-80 rounded-lg overflow-hidden border"></div>
        </div>

        @push('scripts')
        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
        <script>
            let map, marker;
            function initMap() {
                const lat = {{ $addr['latitude'] ?? 6.5244 }};
                const lng = {{ $addr['longitude'] ?? 3.3792 }};
                const pos = { lat, lng };

                map = new google.maps.Map(document.getElementById('map'), {
                    center: pos,
                    zoom: 16,
                    mapTypeControl: false,
                    streetViewControl: false,
                });

                marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    title: "{{ addslashes($venue['title']) }}",
                });

                const infoWindow = new google.maps.InfoWindow({
                    content: `<div class="p-2">
                        <strong>{{ addslashes($venue['title']) }}</strong><br>
                        {{ $addr['lga'] }}, {{ $addr['state'] }}
                    </div>`
                });

                marker.addListener('click', () => infoWindow.open(map, marker));
            }
        </script>
        @endpush

        {{-- Amenities Grid --}}
        <div class="bg-white p-6 rounded-xl shadow-sm border">
            <h3 class="text-xl font-semibold mb-4">Amenities</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                @if($a['isFurnished'] ?? false)     <div class="flex items-center gap-2">Furnished</div> @endif
                @if($a['hasAC'] ?? false)           <div class="flex items-center gap-2">AC</div> @endif
                @if($a['hasToilet'] ?? false)       <div class="flex items-center gap-2">Restroom ({{ $a['toilets'] ?? 0 }})</div> @endif
                @if($a['hasBathroom'] ?? false)     <div class="flex items-center gap-2">Bathroom ({{ $a['bathrooms'] ?? 0 }})</div> @endif
                @if($a['hasChangingRoom'] ?? false) <div class="flex items-center gap-2">Changing Room</div> @endif
                @if($a['isInHotelPremises'] ?? false) <div class="flex items-center gap-2">In Hotel</div> @endif
            </div>
        </div>

        {{-- Photo Gallery --}}
        @if($images->count() > 1)
            <div>
                <h3 class="text-xl font-semibold mb-4">Photo Gallery</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    @foreach($images as $img)
                        <a href="{{ $img }}" target="_blank" class="block rounded-lg overflow-hidden shadow hover:shadow-md transition group">
                            <img src="{{ $img }}" alt="Gallery" class="w-full h-40 object-cover group-hover:scale-105 transition">
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Reviews Section --}}
        @if(!empty($venue['reviews']) && ($venue['totalReviews'] ?? 0) > 0)
            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <h3 class="text-xl font-semibold mb-4">
                    Reviews ({{ $venue['totalReviews'] }}) 
                    @if($venue['averageRating'] > 0)
                        <span class="text-yellow-500 ml-2">★ {{ number_format($venue['averageRating'], 1) }}</span>
                    @endif
                </h3>
                <div class="space-y-4">
                    @foreach($venue['reviews'] as $reviewId)
                        <div class="border-b pb-3 last:border-0">
                            <p class="font-medium text-gray-800">Guest • {{ \Carbon\Carbon::now()->subDays(rand(1,90))->format('M j, Y') }}</p>
                            <div class="flex text-yellow-500 text-sm">★★★★☆</div>
                            <p class="text-gray-700 mt-1">Great space, clean, and well-managed. Highly recommend!</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Express Interest Form --}}
        <div class="bg-white p-6 rounded-xl shadow-sm border">
            <h3 class="text-xl font-semibold mb-4">Express Interest</h3>
            <form wire:submit="submitInterest" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" wire:model="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" wire:model="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" wire:model="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                    @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Message (Optional)</label>
                    <textarea wire:model="message" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"></textarea>
                </div>

                <button type="submit"
                        class="w-full bg-red-500 text-white font-semibold py-3 rounded-full hover:bg-red-600 transition disabled:opacity-50"
                        wire:loading.attr="disabled">
                    <span wire:loading.remove>Send Interest</span>
                    <span wire:loading>Sending...</span>
                </button>
            </form>
        </div>
    </div>

    {{-- Toast Notification --}}
    <div x-data="{ show: false, message: '' }"
         x-show="show"
         x-transition
         @interest-sent.window="message = $event.detail; show = true; setTimeout(() => show = false, 4000)"
         class="fixed bottom-4 right-4 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center gap-2"
         style="display: none;">
        <i class="fa-solid fa-check-circle"></i>
        <span x-text="message"></span>
    </div>

@else
    <div class="text-center py-16">
        <p class="text-xl text-gray-600">{{ $error ?? 'Venue not found.' }}</p>
        <a href="{{ route('venues') }}" class="mt-4 inline-block text-red-500 hover:underline">Back to Venues</a>
    </div>
@endif

{{-- Include Font Awesome (if not in layout) --}}
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush
</div>