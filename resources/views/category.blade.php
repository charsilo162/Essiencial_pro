<x-layouts.home-layout>

<section class="px-4 md:px-10 py-10">

    <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

        <!-- ==========================
             LEFT SIDEBAR
        =========================== -->
        <aside class="md:col-span-1 bg-white rounded-3xl shadow-lg p-6
                       sticky top-24 h-fit"
                style="background: linear-gradient(180deg, #EEF2FF, #FBFBFF);">

            <h2 class="text-2xl font-bold mb-6">Categories</h2>

            <!-- Search -->
            <div class="flex items-center gap-2 bg-white border rounded-full px-3 py-2 shadow-sm mb-6">
                <input type="text" placeholder="Search Category"
                       class="flex-1 outline-none text-sm">
                <button class="px-4 py-1 bg-blue-600 text-white rounded-full text-sm">
                    Search
                </button>
            </div>

            <!-- Category list -->
            <div class="space-y-4 text-gray-700 text-sm">

                <div>
                    <p class="font-semibold mb-2">Specialties</p>
                    <ul class="space-y-1">
                        <li><input type="checkbox" class="mr-2"> Panel beater <span class="text-xs">700</span></li>
                        <li><input type="checkbox" class="mr-2"> Vulcanize <span class="text-xs">1000</span></li>
                        <li><input type="checkbox" class="mr-2"> Mechanic <span class="text-xs">11000</span></li>
                        <li><input type="checkbox" class="mr-2"> Rewire <span class="text-xs">700</span></li>
                    </ul>
                </div>

                <div>
                    <p class="font-semibold mb-2">Class</p>
                    <ul class="space-y-1">
                        <li><input type="checkbox" class="mr-2"> Online <span class="text-xs">10</span></li>
                        <li><input type="checkbox" class="mr-2"> Physical <span class="text-xs">10</span></li>
                    </ul>
                </div>

                <div>
                    <p class="font-semibold mb-2">Price</p>
                    <ul class="space-y-1">
                        <li><input type="checkbox" class="mr-2"> 100000+</li>
                        <li><input type="checkbox" class="mr-2"> 50000 - 100000</li>
                        <li><input type="checkbox" class="mr-2"> 10000 - 50000</li>
                        <li><input type="checkbox" class="mr-2"> 5000 - 10000</li>
                        <li><input type="checkbox" class="mr-2"> 1000 - 5000</li>
                        <li><input type="checkbox" class="mr-2"> 500 - 1000</li>
                        <li><input type="checkbox" class="mr-2"> 0 - 500</li>
                    </ul>
                </div>

                <div>
                    <p class="font-semibold mb-2">Location</p>
                    <ul class="space-y-1">
                        <li><input type="checkbox" class="mr-2"> Africa</li>
                        <li><input type="checkbox" class="mr-2"> Nigeria</li>
                        <li><input type="checkbox" class="mr-2"> China</li>
                        <li><input type="checkbox" class="mr-2"> Ghana</li>
                    </ul>
                </div>

            </div>

        </aside>

        <!-- ==========================
             RIGHT MAIN CONTENT
        =========================== -->
        <div class="md:col-span-3">

            <!-- TOP SEARCHES -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold">Top searches</h2>
            </div>

            <!-- Tabs -->
            <div class="flex gap-4 mb-8">
                <button class="px-4 py-2 bg-black text-white rounded-full">All</button>
                <button class="px-4 py-2 bg-orange-400 text-white rounded-full">Physical</button>
                <button class="px-4 py-2 bg-white border rounded-full">Online</button>
            </div>

            <!-- GRID OF COURSES -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

                @for ($i = 0; $i < 9; $i++)
                <div class="bg-white rounded-2xl shadow-md overflow-hidden">

                    <img src="{{ asset('storage/img1.jpg') }}" class="w-full h-48 object-cover" />

                    <div class="p-4">

                        <h3 class="font-bold text-lg">How to sew Male Suit</h3>
                        <p class="text-xs text-gray-500">(345 registered)</p>

                        <div class="flex items-center text-xs mt-2 gap-3 text-gray-400">
                            <span>326 Comments</span>
                            <span>123 Likes</span>
                            <span>123 Shares</span>
                        </div>

                        <div class="flex items-center text-yellow-500 mt-2 text-sm">
                            ⭐⭐⭐⭐⭐ <span class="ml-2 text-gray-600 text-xs">4.3/4 Physical</span>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <button class="px-4 py-2 bg-blue-600 text-white rounded-full text-sm">View</button>
                            <span class="font-bold text-lg">₦7,500</span>
                        </div>

                    </div>
                </div>
                @endfor

            </div>

        </div>

    </div>

</section>

</x-layouts.home-layout>
