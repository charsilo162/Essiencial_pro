@props([
    'title' => 'Description', // Default title can be overridden
])

{{-- Outer container for spacing and alignment, matching the detail-wrapper width --}}
<section class="max-w-7xl mx-auto pb-10 px-4 sm:px-6 lg:px-8">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 border-b pb-4 border-gray-100">
            {{ $title }}
        </h2>
        
        <div class="prose max-w-none text-gray-700 text-[15.5px] leading-relaxed">
            {{ $slot }}
        </div>
    </div>
</section>
