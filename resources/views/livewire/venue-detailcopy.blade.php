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
    @endphp

    <div class="max-w-5xl mx-auto px-4 py-8 space-y-8">
        {{-- Hero Image --}}
        <div class="relative rounded-2xl overflow-hidden shadow-lg">
            <img src="{{ $venue['coverImage'] }}" alt="{{ $venue['title'] }}" class="w-full h-96 object-cover">
            <div class="absolute top-4 left-4">
                @if($hasDiscount)
                    <span class="bg-red-600 text-white text-sm font-bold px-3 py-1 rounded-full">
                        {{ $p['discountPercentage'] }}% OFF
                    </span>
                @endif
            </div>
        </div>

        {{-- Title & Location --}}
        <div class="flex flex-col md:flex-row justify-between items-start gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">{{ $venue['title'] }}</h1>
                <p class="text-lg text-gray-600 mt-1">
                    <i class="fa-solid fa-location-dot text-red-500"></i>
                    {{ $addr['fullAddress'] ?? "{$addr['lga']}, {$addr['state']}" }}
                </p>
            </div>
            <div class="text-right">
                <div class="flex items-baseline gap-3">
                    @if($hasDiscount)
                        <p class="text-xl text-gray-500 line-through">₦{{ $oldPrice }}</p>
                    @endif
                    <p class="text-3xl font-bold text-red-600">₦{{ $newPrice }}</p>
                </div>
                <p class="text-sm text-gray-500">per event</p>
            </div>
        </div>

        {{-- Quick Info Pills --}}
        <div class="flex flex-wrap gap-3 text-sm">
            <span class="bg-gray-100 px-3 py-1 rounded-full">Capacity: {{ $venue['capacity'] }}</span>
            <span class="bg-gray-100 px-3 py-1 rounded-full">Type: {{ ucfirst(str_replace('_', ' ', $venue['type'])) }}</span>
            @if($venue['verified'] ?? false)
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full">Verified</span>
            @endif
        </div>

        {{-- Amenities Grid --}}
        <div class="bg-white p-6 rounded-xl shadow-sm border">
            <h3 class="text-xl font-semibold mb-4">Amenities</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                @if($a['isFurnished'] ?? false)     <div>Furnished</div> @endif
                @if($a['hasAC'] ?? false)           <div>AC</div> @endif
                @if($a['hasToilet'] ?? false)       <div>Restroom ({{ $a['toilets'] ?? 0 }})</div> @endif
                @if($a['hasBathroom'] ?? false)     <div>Bathroom ({{ $a['bathrooms'] ?? 0 }})</div> @endif
                @if($a['hasChangingRoom'] ?? false) <div>Changing Room</div> @endif
                @if($a['isInHotelPremises'] ?? false) <div>In Hotel</div> @endif
            </div>
        </div>

        {{-- Photo Gallery --}}
        @if($images->count() > 1)
            <div>
                <h3 class="text-xl font-semibold mb-4">Photo Gallery</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    @foreach($images as $img)
                        <a href="{{ $img }}" target="_blank" class="block rounded-lg overflow-hidden shadow hover:shadow-md transition">
                            <img src="{{ $img }}" alt="Gallery" class="w-full h-40 object-cover">
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
                        <span class="text-yellow-500">★ {{ number_format($venue['averageRating'], 1) }}</span>
                    @endif
                </h3>
                <div class="space-y-4">
                    @foreach($venue['reviews'] as $reviewId)
                        @php
                            // Optional: fetch full review via API if needed
                            // For now, show placeholder
                        @endphp
                        <div class="border-b pb-3">
                            <p class="font-medium">User {{ substr($reviewId, -6) }}</p>
                            <p class="text-sm text-gray-600">Rating: ★★★★☆</p>
                            <p class="text-gray-700 mt-1">Great venue for events!</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Express Interest Form --}}
        <div class="bg-white p-6 rounded-xl shadow-sm border">
            <h3 class="text-xl font-semibold mb-4">Express Interest</h3>
            <form wire:submit="submitInterest" class="space-y-4">
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

    {{-- Toast for success --}}
    <div x-data="{ show: false }" x-show="show" x-init="window.addEventListener('interest-sent', (e) => { $dispatch('notify', e.detail); show = true; setTimeout(() => show = false, 4000); })"
         class="fixed bottom-4 right-4 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50" style="display: none;">
        <span x-text="$event.detail"></span>
    </div>

@else
    <div class="text-center py-16">
        <p class="text-xl text-gray-600">{{ $error ?? 'Venue not found.' }}</p>
        <a href="{{ route('venues') }}" class="mt-4 inline-block text-red-500 hover:underline">← Back to Venues</a>
    </div>
@endif