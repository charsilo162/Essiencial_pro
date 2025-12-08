<x-layouts.home-layout>

<!-- =================================== -->
<!-- MAIN 4-COLUMN GRID LAYOUT          -->
<!-- =================================== -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 px-4 md:px-8 py-6">

    <!-- ========================= -->
    <!-- MOBILE VIDEO FIRST        -->
    <!-- ========================= -->
    <div class="md:hidden">
        <!-- VIDEO -->
        <div class="w-full rounded-xl overflow-hidden shadow-lg mb-6">
            <img src="{{ asset('storage/img1.jpg') }}"
                class="w-full h-[240px] object-cover"
                alt="Video Thumbnail">
        </div>

        <!-- MOBILE COLLAPSIBLE TOPICS -->
        <div x-data="{ open: false }"
             class="md:hidden mb-6 bg-white rounded-xl border shadow-sm p-4">
             
            <button @click="open = !open"
                class="w-full flex items-center justify-between text-sm font-semibold text-gray-800">
                Topics
                <span x-text="open ? '▲' : '▼'"></span>
            </button>

            <div x-show="open" class="mt-3 space-y-1" x-transition>
                <a href="#" class="block px-3 py-2 bg-blue-50 text-blue-600 font-semibold rounded-md">
                    Introduction - Preview
                </a>
                <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Topic 1</a>
                <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Topic 2</a>
                <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Topic 3</a>
                <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Topic 4</a>
                <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Topic 5</a>
            </div>
        </div>
    </div>

    <!-- ========================= -->
    <!-- DESKTOP LEFT SIDEBAR     -->
    <!-- ========================= -->
    <div class="hidden md:block md:col-span-1 bg-white rounded-xl border shadow-sm p-4 h-fit sticky top-24 max-h-[82vh] overflow-y-auto">
        <h3 class="text-sm font-semibold text-gray-900 mb-3">Topics</h3>

        <div class="space-y-1">
            <a href="#" class="block px-3 py-2 bg-blue-50 text-blue-600 font-semibold rounded-md">
                Introduction - Preview
            </a>
            <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Topic 1</a>
            <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Topic 2</a>
            <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Topic 3</a>
            <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Topic 4</a>
            <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Topic 5</a>
        </div>
    </div>

    <!-- ========================= -->
    <!-- MAIN RIGHT CONTENT        -->
    <!-- ========================= -->
    <div class="md:col-span-3 space-y-10">

        <!-- DESKTOP VIDEO -->
        <div class="hidden md:block w-full rounded-xl overflow-hidden shadow-lg">
            <img src="{{ asset('storage/img1.jpg') }}"
                class="w-full h-[320px] md:h-[380px] object-cover"
                alt="Video Thumbnail">
        </div>

        <!-- DESCRIPTION BOX -->
        <div class="bg-gradient-to-b from-white to-orange-50 rounded-xl p-6 shadow-sm">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Lecture Description</h3>

            <p class="text-gray-700 leading-relaxed mb-4">
                Another great experience with our school! I've recently been involved in teaching...
                They abbreviated "dolorem" (meaning "pain") to "lorem," which carries no meaning in Latin.
                "Ipsum" translates to "itself," and the text frequently includes phrases such as
                "consectetur adipiscing elit" and "ut labore et dolore."
                Lorem Ipsum text doesn't actually say anything meaningful.
            </p>
        </div>

        <!-- GALLERY -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <img src="{{ asset('storage/img1.jpg') }}" class="w-full h-40 object-cover rounded-lg shadow" />
            <img src="{{ asset('storage/img2.jpg') }}" class="w-full h-40 object-cover rounded-lg shadow" />
            <img src="{{ asset('storage/img1.jpg') }}" class="w-full h-40 object-cover rounded-lg shadow" />
            <img src="{{ asset('storage/img6.jpg') }}" class="w-full h-40 object-cover rounded-lg shadow" />
            <img src="{{ asset('storage/img1.jpg') }}" class="w-full h-40 object-cover rounded-lg shadow" />
            <img src="{{ asset('storage/img1.jpg') }}" class="w-full h-40 object-cover rounded-lg shadow" />
        </div>

    </div>
</div> <!-- END GRID -->
<section class="bg-white py-14 px-4">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-8">Our Locations</h2>

        <div class="flex flex-nowrap gap-6 overflow-x-auto pb-4">
            
            <div class="min-w-[300px] flex-shrink-0 p-6 bg-white border border-gray-200 rounded-xl shadow-lg transition duration-300 hover:shadow-xl">
                <h3 class="text-lg font-bold text-gray-900 mb-1">Berger Essential Centre</h3>
                
                <div class="flex items-center space-x-1 text-yellow-500 mb-3">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <span class="text-sm text-gray-600">4.34</span>
                </div>
                
                <p class="text-sm text-gray-700 leading-relaxed mb-3">
                    08056374859, 0906687936456 Arcanebukstor@gmail.com
                </p>

                <div class="flex flex-wrap gap-2">
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">TAILORING</span>
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">FASHION DESIGN</span>
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">TAILORING</span>
                </div>
            </div>

            <div class="min-w-[300px] flex-shrink-0 p-6 bg-white border border-gray-200 rounded-xl shadow-lg transition duration-300 hover:shadow-xl">
                <h3 class="text-lg font-bold text-gray-900 mb-1">Berger Essential Centre</h3>
                <div class="flex items-center space-x-1 text-yellow-500 mb-3">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <span class="text-sm text-gray-600">4.34</span>
                </div>
                <p class="text-sm text-gray-700 leading-relaxed mb-3">
                    08056374859, 0906687936456 Arcanebukstor@gmail.com
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">TAILORING</span>
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">FASHION DESIGN</span>
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">TAILORING</span>
                </div>
            </div>

            <div class="min-w-[300px] flex-shrink-0 p-6 bg-white border border-gray-200 rounded-xl shadow-lg transition duration-300 hover:shadow-xl">
                <h3 class="text-lg font-bold text-gray-900 mb-1">Berger Essential Centre</h3>
                <div class="flex items-center space-x-1 text-yellow-500 mb-3">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <span class="text-sm text-gray-600">4.34</span>
                </div>
                <p class="text-sm text-gray-700 leading-relaxed mb-3">
                    08056374859, 0906687936456 Arcanebukstor@gmail.com
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">TAILORING</span>
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">FASHION DESIGN</span>
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">TAILORING</span>
                </div>
            </div>

            <div class="min-w-[300px] flex-shrink-0 p-6 bg-white border border-gray-200 rounded-xl shadow-lg transition duration-300 hover:shadow-xl">
                <h3 class="text-lg font-bold text-gray-900 mb-1">Berger Essential Centre</h3>
                <div class="flex items-center space-x-1 text-yellow-500 mb-3">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <span class="text-sm text-gray-600">4.34</span>
                </div>
                <p class="text-sm text-gray-700 leading-relaxed mb-3">
                    08056374859, 0906687936456 Arcanebukstor@gmail.com
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">TAILORING</span>
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">FASHION DESIGN</span>
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">TAILORING</span>
                </div>
            </div>

            <div class="min-w-[300px] flex-shrink-0 p-6 bg-white border border-gray-200 rounded-xl shadow-lg transition duration-300 hover:shadow-xl">
                <h3 class="text-lg font-bold text-gray-900 mb-1">Berger Essential Centre</h3>
                <div class="flex items-center space-x-1 text-yellow-500 mb-3">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.31 6.91.99-5 4.88 1.18 6.93L12 18.27l-6.18 3.24 1.18-6.93-5-4.88 6.91-.99L12 2z"/></svg>
                    <span class="text-sm text-gray-600">4.34</span>
                </div>
                <p class="text-sm text-gray-700 leading-relaxed mb-3">
                    08056374859, 0906687936456 Arcanebukstor@gmail.com
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">TAILORING</span>
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">FASHION DESIGN</span>
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">TAILORING</span>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- =================================== -->
<!-- COMMENTS SECTION (CENTERED)         -->
<!-- =================================== -->
<div class="mt-14 w-full flex justify-center px-4">
    <div class="w-full max-w-3xl md:max-w-4xl">

        <h3 class="text-xl font-bold text-gray-900 mb-2">Comments</h3>
        <p class="text-sm text-gray-500 mb-6">324 comments</p>

        <!-- Search Box -->
        <div class="flex items-center bg-white border rounded-full overflow-hidden shadow-sm w-full max-w-xl mb-8">
            <input type="text" placeholder="Search comments..."
                class="flex-1 px-5 py-3 outline-none text-gray-700" />
            <button class="bg-blue-600 text-white px-6 py-3 font-semibold">
                Search
            </button>
        </div>

        <!-- Comment Items -->
        <div class="space-y-7">
            @for($i = 0; $i < 5; $i++)
            <div class="flex space-x-4">
                <img src="{{ asset('storage/img1.jpg') }}"
                    class="w-10 h-10 rounded-full shadow-sm" />

                <div class="flex-1">
                    <div class="flex items-center justify-between">
                        <h4 class="font-semibold text-gray-800">Rizal Gradian</h4>
                        <span class="text-xs text-gray-400">6:24 AM</span>
                    </div>

                    <p class="text-gray-700 text-sm mt-1">
                        Hi Everybody 👋 <br>
                        Can you show me the progress of Lesta Real Estate App?
                    </p>

                    <div class="flex items-center space-x-4 text-xs text-gray-500 mt-2">
                        <span>123 Likes</span>
                        <span>123 Views</span>
                    </div>
                </div>
            </div>
            @endfor
        </div>

    </div>
</div>


<!-- =================================== -->
<!-- OTHER PHYSICAL TRAININGS            -->
<!-- =================================== -->
<div class="mt-20 px-4 md:px-8">

    <h2 class="text-2xl font-extrabold text-gray-900 tracking-wide mb-6">
        OTHER PHYSICAL TRAININGS CENTRES OFFERING THIS
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @for($i = 0; $i < 3; $i++)
        <div class="rounded-2xl shadow-lg overflow-hidden bg-white hover:shadow-xl transition">
            <img src="{{ asset('storage/img1.jpg') }}"
                class="w-full h-48 object-cover">

            <div class="p-4">
                <h4 class="font-semibold text-gray-900">How to sew Male Suit</h4>

                <div class="flex justify-between items-center mt-3">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                        View
                    </button>

                    <span class="font-bold text-gray-900">#7,500</span>
                </div>
            </div>
        </div>
        @endfor
    </div>

</div>


<!-- =================================== -->
<!-- OTHER VIRTUAL TRAININGS             -->
<!-- =================================== -->
<div class="mt-16 mb-20 px-4 md:px-8">

    <h2 class="text-2xl font-extrabold text-gray-900 tracking-wide mb-6">
        OTHER VIRTUAL TRAININGS OFFERING THIS
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @for($i = 0; $i < 3; $i++)
        <div class="rounded-2xl shadow-lg overflow-hidden bg-white hover:shadow-xl transition">
            <img src="{{ asset('storage/img1.jpg') }}"
                class="w-full h-48 object-cover">

            <div class="p-4">
                <h4 class="font-semibold text-gray-900">How to sew Male Suit</h4>

                <div class="flex justify-between items-center mt-3">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                        View
                    </button>

                    <span class="font-bold text-gray-900">#7,500</span>
                </div>
            </div>
        </div>
        @endfor
    </div>

</div>

</x-layouts.home-layout>
