<section class="bg-white py-14 px-4">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-8">Our Locations</h2>

        <div class="flex flex-nowrap gap-6 overflow-x-auto pb-4">
            @foreach($centers as $center)
                <div class="min-w-[300px] flex-shrink-0 p-6 bg-white border-2 border-[#661437] rounded-xl shadow-lg transition duration-300 hover:shadow-xl">
                    @if(!empty($center['center_thumbnail_url']))
                        <img src="{{ asset('storage/' . $center['center_thumbnail_url']) }}" alt="{{ $center['name'] }}" class="w-full h-32 object-cover rounded-md mb-3" />
                    @endif
                    <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $center['name'] }}</h3>
                    
                    {{-- Rating: Hardcoded as in template since no rating field in model; can be dynamic if added later --}}
                    <div class="flex items-center space-x-1 text-yellow-500 mb-3">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                        <span class="text-sm text-gray-600">4.34</span>
                    </div>
                    
                    {{-- Contact/Address: Using address and city since phone/email not in model; description could be used if it contains contact info --}}
                    <p class="text-sm text-gray-700 leading-relaxed mb-3">
                        {{ $center['address'] }}, {{ $center['city'] }}
                        @if(!empty($center['description']))
                            <br>{{ $center['description'] }}
                        @endif
                    </p>

                    {{-- Tags: Using course titles (uppercase) from the eager-loaded courses (limited to 3 in API) --}}
                    <div class="flex flex-wrap gap-2">
                        @foreach($center['courses'] ?? [] as $course)
                            <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">{{ strtoupper($course['title'] ?? ($course['category']['name'] ?? 'UNKNOWN')) }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>