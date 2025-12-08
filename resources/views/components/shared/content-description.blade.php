@props([
    'title' => 'Description', // Default title can be overridden
])

{{-- Outer container for spacing and alignment, matching the detail-wrapper width --}}
<section class="max-w-7xl mx-auto pb-10 px-4 sm:px-6 lg:px-8">
    
    {{-- Inner card styling --}}
    <div class="bg-white p-8 rounded-xl shadow-2xl">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-6 border-b pb-2">
            {{ $title }}
        </h2>
        
        {{-- The slot holds the actual description content passed from the view --}}
        <div class="prose max-w-none text-gray-700">
            {{ $slot }}
        </div>
    </div>
    
</section>
