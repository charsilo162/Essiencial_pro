<div class="mt-16 text-center mb-2">
    <h3 class="text-xl font-semibold text-gray-800 mb-6">Get A Course As Well To Enhance Your Learning</h3>
    
    {{-- MODIFICATION: Change md:grid-cols-3 to md:grid-cols-4 --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-8">
        {{-- The content slot will hold the actual course cards --}}
        {{ $slot }}
    </div>
</div>