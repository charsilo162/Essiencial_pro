{{-- 
    Component: Our Clients Logos
    Matches original grayscale hover effect
--}}

@props([
    'logos' => ['logo4.png', 'logo3.png', 'logo5.png', 'logo1.jpg', 'logo2.jpg'],
    'title' => 'Our clients'
])

<section class="max-w-7xl mx-auto pt-2 pb-2 px-4 sm:px-6 lg:px-8 text-center">
    <h2 class="text-3xl font-bold text-center mb-4 text-blue-500">{{ $title }}</h2>
   
    <div class="flex justify-center items-center gap-x-12 flex-wrap py-8">
        @foreach ($logos as $logo)
            <div class="flex items-center justify-center h-10 my-4">
                <img src="{{ asset('storage/' . $logo) }}" 
                     alt="Client Logo" 
                     class="max-h-full w-auto filter grayscale opacity-75 hover:grayscale-0 hover:opacity-100 transition duration-300">
            </div>
        @endforeach
    </div>
   
    <div class="flex justify-center mt-4 space-x-2">
        <span class="h-2 w-2 bg-gray-400 rounded-full"></span>
        <span class="h-2 w-2 bg-blue-500 rounded-full"></span>
        <span class="h-2 w-2 bg-gray-400 rounded-full"></span>
    </div>
</section>