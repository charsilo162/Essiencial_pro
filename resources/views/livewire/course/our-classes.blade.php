<section class="py-20 px-6 bg-gray-100 fade-in">
    <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-4">
        Our Classes
    </h2>

    <p class="text-center max-w-2xl mx-auto text-gray-600 mb-12">
        We offer a wide range of tutorials categorized under Virtual, Physical or Hybrid Classes.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        @foreach($classTypes as $type => $data)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition-all">
                <div class="{{ $data['color'] }} text-white p-4 text-center font-semibold">
                    {{ $data['title'] }}
                </div>
                <p class="px-4 py-3 text-gray-600">
                    {{ $data['description'] }} <span class="text-gray-400">({{ $data['count'] }} courses)</span>
                </p>
                <img 
                    src="{{ $data['featured']['thumbnail_url'] ?? asset('storage/logo' . ($loop->index + 4) . '.jpg') }}" 
                    class="w-full h-48 object-cover" 
                    alt="{{ $data['title'] }}" 
                />
                <div class="px-4 py-3 text-center">
                    <a href="/category?type={{ $type }}" class="bg-gray-800 text-white px-4 py-2 rounded-md font-semibold hover:bg-gray-700">
                        Explore
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Loading state -->
    <div wire:loading class="text-center mt-4">Loading classes...</div>
</section>