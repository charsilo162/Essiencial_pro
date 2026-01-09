<x-layouts.app title="Center Details">

    <x-layouts.dashboardheader />

    <div class="max-w-7xl mx-auto px-4 py-10">
        
        <!-- Banner -->
        <div class="w-full h-64 md:h-80 rounded-xl overflow-hidden shadow-lg">
            <img src="{{ asset('storage/'.$center['image_url']) }}" 
                 alt="{{ $center['name'] }}"
                 class="w-full h-full object-cover">
        </div>

        <!-- Two Box Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">

            <!-- Left Card: Address & Contact -->
            <div class="p-6 bg-white shadow-md rounded-xl border border-gray-100">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Center Info</h2>

                <div class="space-y-3 text-gray-700">
                    <p><span class="font-semibold">Address:</span> {{ $center['address'] }}</p>
                    <p><span class="font-semibold">City:</span> {{ $center['city'] }}</p>
                    <p><span class="font-semibold">Years of Experience:</span> {{ $center['years_of_experience'] }}</p>
                    {{-- <p><span class="font-semibold">Created On:</span> {{ $center['created_at']->format('M d, Y') }}</p> --}}
                </div>
            </div>

            <!-- Right Card: Description & Name -->
            <div class="p-6 bg-white shadow-md rounded-xl border border-gray-100">
                <h2 class="text-xl font-bold text-gray-900 mb-4">{{ $center['name'] }}</h2>

                <p class="text-gray-700 leading-relaxed">
                    {{ $center['description'] }}
                </p>
            </div>

        </div>

    </div>
    <livewire:course.related-courses-by-center 
    :centerId="$center['id']" 
/>
    <x-navigation.footer />

</x-layouts.app>
