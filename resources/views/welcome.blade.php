<x-layouts.home-layout>

    <!-- HERO SECTION ------------------------------------------------------ -->
    <section class="bg-gradient-to-r from-blue-100 to-orange-100 py-16 text-center fade-in">
        <h1 class="text-4xl md:text-6xl font-extrabold uppercase text-gray-800 leading-tight">
            THERE IS A PLACE FOR YOU AT
        </h1>
        <h1 class="text-4xl md:text-6xl font-extrabold uppercase mt-2">
            <span class="text-blue-600">ESSENTIAL</span>
            <span class="text-orange-500">TRAINING</span>
        </h1>

        <!-- Hero Image Collage -->
        <div class="mt-12 flex justify-center flex-wrap gap-6 px-4">

            <!-- Left small -->
            <img src="{{ asset('storage/img1.jpg') }}"
                class="w-32 h-40 object-cover rounded-xl shadow-lg transform rotate-[-4deg] float">

            <!-- Left medium -->
            <img src="{{ asset('storage/img2.jpg') }}"
                class="w-36 h-52 object-cover rounded-xl shadow-lg transform rotate-[2deg] float">

            <!-- CENTER – LARGEST -->
            <img src="{{ asset('storage/img3.jpg') }}"
                class="w-44 h-64 object-cover rounded-xl shadow-xl transform rotate-[0deg] float">

            <!-- Right medium -->
            <img src="{{ asset('storage/img4.jpg') }}"
                class="w-36 h-52 object-cover rounded-xl shadow-lg transform rotate-[-2deg] float">

            <!-- Right small -->
            <img src="{{ asset('storage/img6.jpg') }}"
                class="w-32 h-40 object-cover rounded-xl shadow-lg transform rotate-[3deg] float">
        </div>
    </section>


    <!-- CATEGORIES ------------------------------------------------------ -->
    <section class="py-10 bg-white text-center fade-in">
        <div class="flex flex-wrap justify-center gap-4 md:gap-6 font-semibold text-gray-700">
            <a class="hover:text-blue-600">Creative</a>
            <a class="hover:text-blue-600">Development</a>
            <a class="hover:text-blue-600">Health</a>
            <a class="hover:text-blue-600">Tech</a>
            <a class="hover:text-blue-600">Business</a>
            <a class="hover:text-blue-600">Fashion</a>
            <a class="hover:text-blue-600">Language</a>

            <button class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600">
                Join Us
            </button>
        </div>
    </section>

</body>
</html>

    {{-- <!-- OUR CLASSES ------------------------------------------------------ -->
    <section class="py-20 px-6 bg-gray-100 fade-in">
        <h2 class="text-3xl font-extrabold text-gray-800 text-center mb-4">
            Our Classes
        </h2>

        <p class="text-center max-w-2xl mx-auto text-gray-600 mb-12">
            We offer a wide range of tutorials categorized under Virtual, Physical or Hybrid Classes.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- VIRTUAL Card -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition-all">
                <div class="bg-blue-600 text-white p-4 text-center font-semibold">
                    Virtual Classes
                </div>
                <p class="px-4 py-3 text-gray-600">
                    Join our interactive virtual lessons from anywhere in the world.
                </p>
                <img src="{{ asset('storage/logo5.jpg') }}"
                    class="w-full h-48 object-cover" />
            </div>

            <!-- PHYSICAL Card -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition-all">
                <div class="bg-orange-500 text-white p-4 text-center font-semibold">
                    Physical Classes
                </div>
                <p class="px-4 py-3 text-gray-600">
                    Learn onsite with hands-on experience from certified instructors.
                </p>
                <img src="{{ asset('storage/logo6.jpg') }}"
                    class="w-full h-48 object-cover" />
            </div>

            <!-- HYBRID Card -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition-all">
                <div class="bg-blue-600 text-white p-4 text-center font-semibold">
                    Hybrid Classes
                </div>
                <p class="px-4 py-3 text-gray-600">
                    Enjoy a flexible mix of virtual and physical learning.
                </p>
                <img src="{{ asset('storage/logo4.jpg') }}"
                    class="w-full h-48 object-cover" />
            </div>

        </div>
    </section> --}}

    






    <!-- ========================== NEW SECTION =============================== -->



<livewire:course.our-classes />
<livewire:category.popular-category-cards />
<livewire:category.simple-category-grid />
<!-- GRADIENT FEATURE BANNER -->





<!-- SPLIT IMAGE + TEXT SECTION -->
<section class="px-6 py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-center">

        <img src="{{ asset('storage/img6.jpg') }}"
            class="rounded-2xl shadow-lg object-cover w-full h-[350px]" />

        <div>
            <h2 class="text-3xl font-bold text-gray-800 leading-tight mb-4">
                Whatever your industry, whatever your position, or skill
                <span class="text-blue-600">Essential Training</span> will work for you
            </h2>

            <p class="text-gray-600 leading-relaxed mb-6">
                The qualities needed for a car mechanic will differ enormously from those for a senior manager,
                journalist, lawyer, pharmacist, or tech specialist. No matter your field, we equip you with the tools
                to grow and excel.
            </p>

            <button class="bg-orange-500 text-white px-6 py-3 rounded-full font-semibold hover:bg-orange-600">
                Get started
            </button>
        </div>

    </div>
</section>

<!-- ======================== END NEW SECTION ============================= -->
{{-- <section class="bg-white px-6 py-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Short Videos</h2>
        <a href="#" class="text-gray-500 font-medium hover:text-gray-700">See All</a>
    </div>

    <div class="flex items-start gap-6 overflow-x-auto pb-4">
        
        <div class="min-w-[200px] max-w-[200px] rounded-xl overflow-hidden relative group">
            <img src="{{ asset('storage/img1.jpg') }}" alt="Hot air balloon over canyon" class="h-80 w-full object-cover rounded-xl transition duration-300 group-hover:scale-105">
            <div class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/70 to-transparent flex justify-between text-white text-sm">
                <span class="flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                    <span>203</span>
                </span>
                <span>5,345 views</span>
            </div>
        </div>

        <div class="min-w-[200px] max-w-[200px] rounded-xl overflow-hidden relative group">
            <img src="{{ asset('storage/logo6.jpg') }}" alt="Tree in a clear globe" class="h-80 w-full object-cover rounded-xl transition duration-300 group-hover:scale-105">
            <div class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/70 to-transparent flex justify-between text-white text-sm">
                <span class="flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                    <span>203</span>
                </span>
                <span>5,345 views</span>
            </div>
        </div>

        <div class="min-w-[200px] max-w-[200px] rounded-xl overflow-hidden relative group">
            <img src="{{ asset('storage/logo1.jpg') }}" alt="Baby playing a toy piano" class="h-80 w-full object-cover rounded-xl transition duration-300 group-hover:scale-105">
            <div class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/70 to-transparent flex justify-between text-white text-sm">
                <span class="flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                    <span>203</span>
                </span>
                <span>5,345 views</span>
            </div>
        </div>

        <div class="min-w-[200px] max-w-[200px] rounded-xl overflow-hidden relative group">
            <img src="{{ asset('storage/logo3.jpg') }}" alt="Woman watching a film" class="h-80 w-full object-cover rounded-xl transition duration-300 group-hover:scale-105">
            <div class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/70 to-transparent flex justify-between text-white text-sm">
                <span class="flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                    <span>203</span>
                </span>
                <span>5,345 views</span>
            </div>
        </div>
        <div class="min-w-[200px] max-w-[200px] rounded-xl overflow-hidden relative group">
            <img src="{{ asset('storage/logo2.jpg') }}" alt="Woman watching a film" class="h-80 w-full object-cover rounded-xl transition duration-300 group-hover:scale-105">
            <div class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/70 to-transparent flex justify-between text-white text-sm">
                <span class="flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                    <span>203</span>
                </span>
                <span>5,345 views</span>
            </div>
        </div>
        <div class="min-w-[200px] max-w-[200px] rounded-xl overflow-hidden relative group">
            <img src="{{ asset('storage/logo7.jpg') }}" alt="Woman watching a film" class="h-80 w-full object-cover rounded-xl transition duration-300 group-hover:scale-105">
            <div class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/70 to-transparent flex justify-between text-white text-sm">
                <span class="flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                    <span>203</span>
                </span>
                <span>5,345 views</span>
            </div>
        </div>
        <div class="min-w-[200px] max-w-[200px] rounded-xl overflow-hidden relative group">
            <img src="{{ asset('storage/logo8.jpg') }}" alt="Woman watching a film" class="h-80 w-full object-cover rounded-xl transition duration-300 group-hover:scale-105">
            <div class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/70 to-transparent flex justify-between text-white text-sm">
                <span class="flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                    <span>203</span>
                </span>
                <span>5,345 views</span>
            </div>
        </div>
        
    </div>
</section> --}}


<section class="bg-white px-6 py-10">
    <div class="mx-auto text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-10">Our <span class="text-blue-600">clients</span></h2>

        <div class="flex items-center gap-x-10 gap-y-6 pb-2 overflow-x-auto">
            
            <img src="{{ asset('storage/d1.png') }}" alt="Communitas Clinics Logo" 
                 class="h-8 sm:h-10 opacity-75 hover:opacity-100 transition duration-300 flex-shrink-0">
            
            <img src="{{ asset('storage/d3.png') }}" alt="Digbyswift Logo" 
                 class="h-8 sm:h-10 opacity-75 hover:opacity-100 transition duration-300 flex-shrink-0">
            
            <img src="{{ asset('storage/d2.png') }}" alt="GetStaffed Logo" 
                 class="h-8 sm:h-10 opacity-75 hover:opacity-100 transition duration-300 flex-shrink-0">
            
            <img src="{{ asset('storage/d6.jpg') }}" alt="Logo 4" 
                 class="h-8 sm:h-10 opacity-75 hover:opacity-100 transition duration-300 flex-shrink-0">
            
            <img src="{{ asset('storage/d1.png') }}" alt="HiVac Logo" 
                 class="h-10 sm:h-12 opacity-75 hover:opacity-100 transition duration-300 flex-shrink-0">
           
                 <img src="{{ asset('storage/d3.png') }}" alt="Digbyswift Logo" 
                 class="h-8 sm:h-10 opacity-75 hover:opacity-100 transition duration-300 flex-shrink-0">
            
            <img src="{{ asset('storage/d2.png') }}" alt="GetStaffed Logo" 
                 class="h-8 sm:h-10 opacity-75 hover:opacity-100 transition duration-300 flex-shrink-0">
            
            <img src="{{ asset('storage/d6.jpg') }}" alt="Logo 4" 
                 class="h-8 sm:h-10 opacity-75 hover:opacity-100 transition duration-300 flex-shrink-0">
            
            <img src="{{ asset('storage/d1.png') }}" alt="HiVac Logo" 
                 class="h-10 sm:h-12 opacity-75 hover:opacity-100 transition duration-300 flex-shrink-0">
            
            <img src="{{ asset('storage/d4.png') }}" alt="Logo 6" 
                 class="h-10 sm:h-12 opacity-75 hover:opacity-100 transition duration-300 flex-shrink-0">
            
            <img src="{{ asset('storage/d5.png') }}" alt="HR Dept Logo" 
                 class="h-10 sm:h-12 opacity-75 hover:opacity-100 transition duration-300 flex-shrink-0">
        </div>
    </div>
</section>


{{-- <section class="bg-white px-6 py-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Groups you may like</h2>
        <a href="#" class="text-red-500 font-medium hover:text-red-600">See more</a>
    </div>

    <div class="flex items-start gap-6 overflow-x-auto pb-4">
        
        <div class="min-w-[200px] max-w-[200px] bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <img src="{{ asset('storage/img6.jpg') }}" alt="Group members" class="h-32 w-full object-cover">
            <div class="p-4">
                <h3 class="font-bold text-gray-800 truncate">Essential staff</h3>
                <p class="text-xs text-gray-500 mt-1">1 Member · 0 Posts today</p>
                <button class="mt-3 w-full py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition duration-150">
                    Join
                </button>
            </div>
        </div>
        
        <div class="min-w-[200px] max-w-[200px] bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <img src="{{ asset('storage/img1.jpg') }}" alt="Group members" class="h-32 w-full object-cover">
            <div class="p-4">
                <h3 class="font-bold text-gray-800 truncate">Essential staff</h3>
                <p class="text-xs text-gray-500 mt-1">1 Member · 0 Posts today</p>
                <button class="mt-3 w-full py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition duration-150">
                    Join
                </button>
            </div>
        </div>

        <div class="min-w-[200px] max-w-[200px] bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <img src="{{ asset('storage/img3.jpg') }}" alt="Group members" class="h-32 w-full object-cover">
            <div class="p-4">
                <h3 class="font-bold text-gray-800 truncate">Health group</h3>
                <p class="text-xs text-gray-500 mt-1">1 Member · 0 Posts today</p>
                <button class="mt-3 w-full py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition duration-150">
                    Join
                </button>
            </div>
        </div>

        <div class="min-w-[200px] max-w-[200px] bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <img src="{{ asset('storage/img6.jpg') }}" alt="Group members" class="h-32 w-full object-cover">
            <div class="p-4">
                <h3 class="font-bold text-gray-800 truncate">Everyday news</h3>
                <p class="text-xs text-gray-500 mt-1">1 Member · 0 Posts today</p>
                <button class="mt-3 w-full py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition duration-150">
                    Join
                </button>
            </div>
        </div>
        
        <div class="min-w-[200px] max-w-[200px] bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <img src="{{ asset('storage/img4.jpg') }}" alt="Group members" class="h-32 w-full object-cover">
            <div class="p-4">
                <h3 class="font-bold text-gray-800 truncate">Computer science</h3>
                <p class="text-xs text-gray-500 mt-1">1 Member · 0 Posts today</p>
                <button class="mt-3 w-full py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition duration-150">
                    Join
                </button>
            </div>
        </div>

        <div class="min-w-[200px] max-w-[200px] bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <img src="{{ asset('storage/img1.jpg') }}" alt="Group members" class="h-32 w-full object-cover">
            <div class="p-4">
                <h3 class="font-bold text-gray-800 truncate">Essential staff</h3>
                <p class="text-xs text-gray-500 mt-1">1 Member · 0 Posts today</p>
                <button class="mt-3 w-full py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition duration-150">
                    Join
                </button>
            </div>
        </div>

        <div class="min-w-[200px] max-w-[200px] bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <img src="{{ asset('storage/img3.jpg') }}" alt="Group members" class="h-32 w-full object-cover">
            <div class="p-4">
                <h3 class="font-bold text-gray-800 truncate">Essential staff</h3>
                <p class="text-xs text-gray-500 mt-1">1 Member · 0 Posts today</p>
                <button class="mt-3 w-full py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition duration-150">
                    Join
                </button>
            </div>
        </div>
        <div class="min-w-[200px] max-w-[200px] bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <img src="{{ asset('storage/img2.jpg') }}" alt="Group members" class="h-32 w-full object-cover">
            <div class="p-4">
                <h3 class="font-bold text-gray-800 truncate">Essential staff</h3>
                <p class="text-xs text-gray-500 mt-1">1 Member · 0 Posts today</p>
                <button class="mt-3 w-full py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition duration-150">
                    Join
                </button>
            </div>
        </div>

        </div>
</section> --}}

<footer class="bg-gray-400 text-black pt-10 pb-4 px-6">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            <div class="space-y-4">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                </div>
                <p class="text-lg font-semibold">Smart Learning Starts Here!</p>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-4">Useful links</h3>
                <ul class="space-y-2 text-sm text-gray-800">
                    <li><a href="#" class="hover:text-white">Home</a></li>
                    <li><a href="{{ route('category.index') }}" class="hover:text-white">Category</a></li>
                    <li><a href="{{ route('about-us') }}" class="hover:text-white">About Us</a></li>
                    <li><a href="{{ route('contact_us')}}" class="hover:text-white">Contact Us</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-4">Contact</h3>
                <address class="text-sm text-gray-800 not-italic mb-6">
                    3 Walker Street, Edinburgh, EH3 7JY
                </address>

                <h3 class="text-lg font-bold mb-3">Social media</h3>
                <div class="flex space-x-4 text-gray-800">
                    <a href="#" class="hover:text-white"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6zM4 9h4v12H4zM6 3a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/></svg></a>
                    <a href="#" class="hover:text-white font-bold text-xl">X</a>
                    <a href="#" class="hover:text-white"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0A.555.555 0 0 0 4.3 3.513c-.22.383-.34 1.144-.34 2.214v10.546c0 1.07.12 1.83.34 2.214.285.487 1.05.733 4.965.738 3.601.005 11.628.005 15.228 0a.555.555 0 0 0 .341-.33.722.722 0 0 0 .339-2.214V5.727c0-1.07-.12-1.83-.34-2.214a.555.555 0 0 0-.341-.33zM9.545 15.698V8.302L15.42 12l-5.875 3.698z"/></svg></a>
                </div>
            </div>

            {{-- <div>
                <h3 class="text-lg font-bold mb-4">Subscribe</h3>
                <form class="space-y-3">
                    <input type="text" placeholder="Full Name*" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <input type="email" placeholder="your e-mail*" class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="w-full py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-150">
                        Send
                    </button>
                </form>
            </div> --}}
        </div>

        <div class="mt-8 pt-4 border-t border-gray-700 flex flex-col sm:flex-row justify-between items-center text-xs text-gray-500">
            <p class="mb-2 sm:mb-0">
                Etraining. All Rights Reserved. Created by Essencial Media & Ciobsmith.
            </p>
            <div class="flex space-x-4">
                <a href="#" class="hover:text-white">PRIVACY POLICY</a>
                <a href="#" class="hover:text-white">GENERAL TERMS</a>
            </div>
        </div>
    </div>
</footer>
</x-layouts.home-layout>
