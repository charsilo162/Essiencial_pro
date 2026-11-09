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
            <img src="{{ asset('storage/edu1.jpg') }}"
                class="w-32 h-40 object-cover rounded-xl shadow-lg transform rotate-[-4deg] float">

            <!-- Left medium -->
            <img src="{{ asset('storage/edu2.jpg') }}"
                class="w-36 h-52 object-cover rounded-xl shadow-lg transform rotate-[2deg] float">

            <!-- CENTER – LARGEST -->
            <img src="{{ asset('storage/t4.jpg') }}"
                class="w-44 h-64 object-cover rounded-xl shadow-xl transform rotate-[0deg] float">

            <!-- Right medium -->
            <img src="{{ asset('storage/t2.jpg') }}"
                class="w-36 h-52 object-cover rounded-xl shadow-lg transform rotate-[-2deg] float">

            <!-- Right small -->
            <img src="{{ asset('storage/t1.jpg') }}"
                class="w-32 h-40 object-cover rounded-xl shadow-lg transform rotate-[3deg] float">
        </div>
    </section>


    <!-- CATEGORIES ------------------------------------------------------ -->
    {{-- <section class="py-10 bg-white text-center fade-in">
        <div class="flex flex-wrap justify-center gap-4 md:gap-6 font-semibold text-gray-700">
            <a class="hover:text-blue-600">Creative</a>
            <a class="hover:text-blue-600">Development</a>
            <a class="hover:text-blue-600">Health</a>
            <a class="hover:text-blue-600">Tech</a>
            <a class="hover:text-blue-600">Business</a>
            <a class="hover:text-blue-600">Fashion</a>
            <a class="hover:text-blue-600">Language</a> --}}

            {{-- <button class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600">
                Join Us
            </button> --}}
        {{-- </div>
    </section> --}}

</body>
</html>

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
               Coming Soon!!
            </button>
        </div>

    </div>
</section>

<section class="bg-white py-16 px-6">
    <div class="max-w-7xl mx-auto text-center">
        
        <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-14">
            Trusted by our <span class="text-blue-600">Clients</span>
        </h2>

        <div class="flex items-center gap-x-14 gap-y-10 px-2 pb-4 overflow-x-auto scrollbar-hide">
            
            <img src="{{ asset('storage/d1.png') }}" alt="Communitas Clinics Logo"
                 class="h-14 md:h-16 opacity-80 hover:opacity-100 hover:scale-105 transition-all duration-300 flex-shrink-0">

            <img src="{{ asset('storage/d3.png') }}" alt="Digbyswift Logo"
                 class="h-12 md:h-16 opacity-80 hover:opacity-100 hover:scale-105 transition-all duration-300 flex-shrink-0">

            <img src="{{ asset('storage/d2.png') }}" alt="GetStaffed Logo"
                 class="h-12 md:h-16 opacity-80 hover:opacity-100 hover:scale-105 transition-all duration-300 flex-shrink-0">

            <img src="{{ asset('storage/d6.jpg') }}" alt="Client Logo"
                 class="h-12 md:h-16 opacity-80 hover:opacity-100 hover:scale-105 transition-all duration-300 flex-shrink-0">

            <img src="{{ asset('storage/d1.png') }}" alt="HiVac Logo"
                 class="h-14 md:h-18 opacity-80 hover:opacity-100 hover:scale-105 transition-all duration-300 flex-shrink-0">

            <img src="{{ asset('storage/d4.png') }}" alt="Client Logo"
                 class="h-14 md:h-18 opacity-80 hover:opacity-100 hover:scale-105 transition-all duration-300 flex-shrink-0">

            <img src="{{ asset('storage/d5.png') }}" alt="HR Dept Logo"
                 class="h-14 md:h-18 opacity-80 hover:opacity-100 hover:scale-105 transition-all duration-300 flex-shrink-0">
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
<livewire:testimonial-section />



<footer class="bg-slate-900 text-slate-300 pt-16 pb-6 px-6 border-t-4 border-blue-600">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
            
            {{-- Column 1: Brand & Identity --}}
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 rounded-xl bg-blue-600 flex items-center justify-center shadow-lg shadow-blue-500/20">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold tracking-wider text-white">E-Training</span>
                </div>
                <p class="text-sm font-medium text-slate-400 leading-relaxed">
                    Smart Learning Starts Here! Elevate your academic journey with expert-led courses.
                </p>
            </div>

            {{-- Column 2: Quick Links --}}
            <div>
                <h3 class="text-white text-base font-semibold tracking-wider uppercase mb-4 pb-2 border-b border-slate-800">
                    Useful Links
                </h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="text-slate-400 hover:text-blue-400 transition-colors duration-150 flex items-center gap-1"><span>Home</span></a></li>
                    <li><a href="{{ route('category.index') }}" class="text-slate-400 hover:text-blue-400 transition-colors duration-150 flex items-center gap-1"><span>Category</span></a></li>
                    <li><a href="{{ route('about-us') }}" class="text-slate-400 hover:text-blue-400 transition-colors duration-150 flex items-center gap-1"><span>About Us</span></a></li>
                    <li><a href="{{ route('contact_us') }}" class="text-slate-400 hover:text-blue-400 transition-colors duration-150 flex items-center gap-1"><span>Contact Us</span></a></li>
                </ul>
            </div>

            {{-- Column 3: Contact & Socials --}}
            <div>
                <h3 class="text-white text-base font-semibold tracking-wider uppercase mb-4 pb-2 border-b border-slate-800">
                    Get In Touch
                </h3>
                <div class="text-sm text-slate-400 space-y-2 mb-6">
                    <p class="flex items-center gap-2">
                        <span class="font-semibold text-slate-300">Call:</span> 09055556666
                    </p>
                    <address class="not-italic leading-relaxed">
                        <span class="font-semibold text-slate-300">Address:</span> 24 Iyalla Street, Lagos State.
                    </address>
                </div>

                <h4 class="text-xs font-bold uppercase tracking-widest text-slate-500 mb-3">Connect With Us</h4>
                <div class="flex space-x-4">
                    {{-- LinkedIn --}}
                    <a href="#" class="p-2 bg-slate-800 hover:bg-blue-600 rounded-lg text-slate-400 hover:text-white transition-all duration-200" title="LinkedIn">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6zM4 9h4v12H4zM6 3a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/></svg>
                    </a>
                    
                    {{-- X (Formerly Twitter) --}}
                    <a href="https://x.com/essentialacademyng" target="_blank" rel="noopener noreferrer" class="p-2 bg-slate-800 hover:bg-sky-500 rounded-lg text-slate-400 hover:text-white font-bold text-base flex items-center justify-center w-9 h-9 transition-all duration-200" title="X (Twitter)">
                        X
                    </a>
                    
                    {{-- TikTok --}}
                    <a href="#" class="p-2 bg-slate-800 hover:bg-black rounded-lg text-slate-400 hover:text-white transition-all duration-200" title="TikTok">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.02 1.63 4.15 1.13 1.18 2.69 1.88 4.31 2.01v3.91c-1.24-.04-2.47-.36-3.58-1-.79-.46-1.46-1.09-1.99-1.83v6.52c-.04 2.1-.81 4.14-2.23 5.67-1.49 1.64-3.69 2.58-5.93 2.56-2.28.02-4.51-.93-5.99-2.65-1.52-1.72-2.19-4.05-1.85-6.31.33-2.3 1.77-4.32 3.86-5.4 1.5-.79 3.21-1.12 4.88-.94v4.01c-.88-.23-1.83-.09-2.6.4-.78.48-1.32 1.33-1.47 2.24-.19 1.06.14 2.17.87 2.94.73.79 1.81 1.2 2.88 1.11 1.05-.07 2.01-.7 2.5-1.63.29-.53.42-1.13.4-1.74V.02z"/>
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Column 4: News Subscription --}}
            <div>
                <h3 class="text-white text-base font-semibold tracking-wider uppercase mb-4 pb-2 border-b border-slate-800">
                    Newsletter
                </h3>
                <livewire:news-subscriber />
            </div>

        </div>

        {{-- Bottom Copyright Strip --}}
        <div class="mt-12 pt-6 border-t border-slate-800 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500">
            <p class="mb-3 sm:mb-0 text-center sm:text-left leading-relaxed">
                &copy; {{ date('Y') }} Etraining. All Rights Reserved. <br class="sm:hidden"> Created by <span class="text-slate-400">Essencial Media</span> & <span class="text-slate-400">Ciobsmith</span>.
            </p>
            <div class="flex space-x-6">
                <a href="#" class="hover:text-white transition-colors">PRIVACY POLICY</a>
                <a href="#" class="hover:text-white transition-colors">GENERAL TERMS</a>
            </div>
        </div>
    </div>
</footer>
</x-layouts.home-layout>
