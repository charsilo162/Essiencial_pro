@props(['course'])

<div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition w-full flex flex-col">
    <div class="relative">
        <img class="w-full h-56 object-cover" src="{{ $course['image'] ?? asset('storage/img3.png') }}" alt="{{ $course['title'] ?? 'Course' }}" />
        @if(isset($course['badge']))
            <span class="absolute top-4 left-4 bg-blue-500 text-white px-3 py-1 text-sm font-semibold rounded-lg">{{ $course['badge'] }}</span>
        @endif
    </div>

    <div class="p-5 flex flex-col flex-grow">
        <h4 class="text-lg font-semibold text-gray-800">{{ $course['title'] ?? 'Default Course Title' }}</h4>
        <p class="text-sm text-gray-600 mt-2">{{ $course['description'] ?? 'Course description goes here.' }}</p>

        <div class="flex items-center mt-4 justify-between">
            @if(isset($course['old_price']))
                <span class="text-sm text-gray-500 line-through">₦{{ number_format($course['old_price'], 2) }}</span>
            @endif
            <span class="text-lg font-semibold text-gray-800 ml-auto">₦{{ number_format($course['price'] ?? 7000, 2) }}</span>
        </div>
        
        <!-- The button container aligned to the left -->
        <div class="mt-auto text-left">
            <button 
                type="button" 
                class="py-3 px-4 inline-flex items-center gap-x-2
                text-sm font-medium rounded-lg border border-transparent
                bg-gray-900 text-white hover:bg-gray-800
                focus:outline-none focus:bg-gray-700
                disabled:opacity-50 disabled:pointer-events-none">
                Add to Cart
            </button>
        </div>
    </div>
</div>
