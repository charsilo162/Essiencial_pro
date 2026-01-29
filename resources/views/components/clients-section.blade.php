{{-- 
    Component: Our Clients Logos (Improved UI)
--}}

@props([
    'logos' => ['l1.jpg', 'l2.jpg', 'l3.jpg', 'l4.jpg', 'l5.jpg'],
    'title' => 'Trusted by our clients'
])

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    {{-- Title --}}
    <div class="text-center mb-10">
        <h2 class="text-4xl font-bold text-gray-800">
            {{ $title }}
        </h2>
        <p class="mt-2 text-gray-500">
            Companies and brands that trust our services
        </p>
    </div>

    {{-- Logos --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 items-center">
        @foreach ($logos as $logo)
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-md transition p-6 flex items-center justify-center group">
                <img 
                    src="{{ asset('storage/' . $logo) }}" 
                    alt="Client Logo"
                    class="h-16 object-contain  group-hover:grayscale-0 transition duration-300 scale-100 group-hover:scale-105"
                >
            </div>
        @endforeach
    </div>

</section>
