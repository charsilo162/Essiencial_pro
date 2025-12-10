  <div>
<!-- Updated "At Essential Training" Section (Header + Search) -->
<section class="px-6 py-10">
    <div class="rounded-3xl p-10 text-white"
        style="background: linear-gradient(90deg, #2925FF, #0028FF, #5D1CFF, #FF6A00);">

        <!-- HEADING + SEARCH SIDE BY SIDE -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

            <!-- Left Text -->
            <div>
                <h1 class="text-3xl md:text-4xl font-bold mb-2">
                    At Essential Training we have it all
                </h1>

                <p class="text-sm md:text-base text-blue-100 max-w-xl">
                    Unbeatable expertise, unmatched resources, unparalleled results.
                    Elevate your skills with the best.
                </p>
            </div>

            <!-- Right Search (wired to Livewire) -->
            <div class="flex items-center bg-white rounded-full overflow-hidden shadow-lg w-full md:w-96">
                <input 
                    type="text"
                    placeholder="Search skills..."
                    class="flex-1 px-5 py-3 outline-none text-gray-700 text-sm"
                    wire:model.live.debounce.500ms="search"  <!-- Dynamic search -->
                />
                <button class="bg-orange-500 text-white px-6 py-3 font-semibold text-sm">
                    Search
                </button>
            </div>

        </div>
    </div>
</section>

<!-- Dynamic SKILLS GRID (no images, text-only cards) -->
<section class="px-6 py-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">

        <!-- Dynamic skill card reusable -->
        @forelse($categories as $category)
            <div class="border border-blue-200 rounded-xl p-5 bg-white shadow-sm hover:shadow-md transition">
                <h3 class="font-bold text-blue-900 mb-1">
                    {{ $category['name'] }} <span class="text-gray-400">({{ $category['courses_count'] }})</span>
                </h3>
                <p class="text-gray-500 text-sm">Build aesthetically pleasing digital products</p>  <!-- Adapt if description is in API data -->
            </div>
        @empty
            <p class="text-gray-500">No skills found.</p>
        @endforelse

    </div>

    <!-- Optional: Show total count or See All when not searching -->
    @if($totalCategoryCount)
        <div class="mt-6 text-center">
            <a href="/category" class="bg-orange-500 text-white px-6 py-3 rounded-full font-semibold text-sm">
                See All ({{ $totalCategoryCount }})
            </a>
        </div>
    @endif

    <!-- Loading state -->
    <div wire:loading class="text-center mt-4">Loading skills...</div>
</section>
 </div>