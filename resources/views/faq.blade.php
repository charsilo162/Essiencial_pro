<x-layouts.app title="eTalent FQA">
    {{-- <x-navigation.header /> --}}

    {{-- <x-navigation.header-original /> --}}

<!-- HOW IT WORKS Section -->
<section class="relative max-w-6xl mx-auto mt-20 px-6">
  <!-- Small Heading -->
  <div class="text-center mb-4">
    <span class="inline-block text-xs font-medium uppercase tracking-wider text-sky-500">
      It really works
    </span>
  </div>

  <!-- Main Heading -->
  <h2 class="text-center text-3xl sm:text-4xl font-bold text-gray-900 mb-8">
    How does <span class="text-sky-500">eTraining</span> work?
  </h2>

  <!-- Grid Layout -->
  <div class="grid md:grid-cols-2 gap-6 items-center">
    <!-- Accordion -->
    <div class="w-full bg-white rounded-lg shadow-md dark:bg-neutral-800 py-10">
      <div class="hs-accordion-group divide-y divide-gray-200 dark:divide-neutral-700">
        <!-- Accordion 1 -->
        <div class="hs-accordion active py-10" id="hs-basic-heading-one">
            <button class="hs-accordion-toggle hs-accordion-active:text-blue-600 px-6 py-3 inline-flex items-center gap-x-3 text-sm w-full font-semibold text-start text-gray-800 hover:text-gray-500 focus:outline-hidden focus:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400" aria-expanded="true" aria-controls="hs-basic-collapse-one">
        <svg class="hs-accordion-active:hidden hs-accordion-active:text-blue-600 hs-accordion-active:group-hover:text-blue-600 block size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M5 12h14"></path>
          <path d="M12 5v14"></path>
        </svg>
        <svg class="hs-accordion-active:block hs-accordion-active:text-blue-600 hs-accordion-active:group-hover:text-blue-600 hidden size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M5 12h14"></path>
        </svg>
        Accordion #1
      </button>
           <div id="hs-basic-collapse-one" class="py-10 hs-accordion-content w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-basic-heading-one">
        <div class="pb-4 px-6">
          <p class="text-sm text-gray-600 dark:text-neutral-200">
            It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.
          </p>
        </div>
      </div>
        </div>

        <!-- Accordion 2 -->
        <div class="hs-accordion" id="hs-basic-heading-two py-10">
          <button class="hs-accordion-toggle hs-accordion-active:text-blue-600 px-6 py-3 inline-flex items-center gap-x-3 text-sm w-full font-semibold text-start text-gray-800 hover:text-gray-500 focus:outline-hidden focus:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400" aria-expanded="false" aria-controls="hs-basic-collapse-two">
        <svg class="hs-accordion-active:hidden hs-accordion-active:text-blue-600 hs-accordion-active:group-hover:text-blue-600 block size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M5 12h14"></path>
          <path d="M12 5v14"></path>
        </svg>
        <svg class="hs-accordion-active:block hs-accordion-active:text-blue-600 hs-accordion-active:group-hover:text-blue-600 hidden size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M5 12h14"></path>
        </svg>
        Accordion #2
      </button>
      <div id="hs-basic-collapse-two" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-basic-heading-two">
        <div class="pb-4 px-6">
          <p class="text-sm text-gray-600 dark:text-neutral-200">
            It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.
          </p>
        </div>
        </div>
        </div>

        <!-- Accordion 3 -->
        <div class="hs-accordion py-10" id="hs-basic-heading-three">
          <button class="hs-accordion-toggle hs-accordion-active:text-blue-600 px-6 py-3 inline-flex items-center gap-x-3 text-sm w-full font-semibold text-start text-gray-800 hover:text-gray-500 focus:outline-hidden focus:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400" aria-expanded="false" aria-controls="hs-basic-collapse-three">
        <svg class="hs-accordion-active:hidden hs-accordion-active:text-blue-600 hs-accordion-active:group-hover:text-blue-600 block size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M5 12h14"></path>
          <path d="M12 5v14"></path>
        </svg>
        <svg class="hs-accordion-active:block hs-accordion-active:text-blue-600 hs-accordion-active:group-hover:text-blue-600 hidden size-4 text-gray-600 group-hover:text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M5 12h14"></path>
        </svg>
        Accordion #3
      </button>
      <div id="hs-basic-collapse-three" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="hs-basic-heading-three">
        <div class="pb-4 px-6">
          <p class="text-sm text-gray-600 dark:text-neutral-200">
            It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.
          </p>
        </div>
      </div>
        </div>
      </div>
    </div>

    <!-- Right Image -->
    <div class="w-full">
      <img src="{{ asset('storage/img3.png') }}" alt="Arcane Tutorial Center" class="w-full rounded-lg shadow-md">
    </div>
  </div>
</section>



<section class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Groups you may like</h2>
        <a href="#" class="text-red-500 font-medium hover:text-red-600 transition duration-150">See more</a>
    </div>

    <div class="flex space-x-4 overflow-x-auto pb-4 -mx-4 px-4 sm:mx-0 sm:px-0">
        
        <div class="flex-shrink-0 w-64 p-4 bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300">
            <div class="h-32 w-full rounded-lg overflow-hidden mb-3">
                <img src="[URL_TO_GROUP_IMAGE]" alt="Group of people smiling" class="w-full h-full object-cover">
            </div>
            <h3 class="text-md font-semibold text-gray-800 mb-1">Essential staff</h3>
            <p class="text-sm text-gray-500 mb-4">1 Member · 0 Posts today</p>
            <button class="w-full py-2 px-4 inline-flex justify-center items-center text-sm font-semibold rounded-lg border border-transparent bg-orange-500 text-white hover:bg-orange-600 transition duration-200">
                Join
            </button>
        </div>

        <div class="flex-shrink-0 w-64 p-4 bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300">
            <div class="h-32 w-full rounded-lg overflow-hidden mb-3">
                <img src="[URL_TO_GROUP_IMAGE]" alt="Group of people smiling" class="w-full h-full object-cover">
            </div>
            <h3 class="text-md font-semibold text-gray-800 mb-1">Health group</h3>
            <p class="text-sm text-gray-500 mb-4">1 Member · 0 Posts today</p>
            <button class="w-full py-2 px-4 inline-flex justify-center items-center text-sm font-semibold rounded-lg border border-transparent bg-orange-500 text-white hover:bg-orange-600 transition duration-200">
                Join
            </button>
        </div>

        <div class="flex-shrink-0 w-64 p-4 bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300">
            <div class="h-32 w-full rounded-lg overflow-hidden mb-3">
                <img src="[URL_TO_GROUP_IMAGE]" alt="Group of people smiling" class="w-full h-full object-cover">
            </div>
            <h3 class="text-md font-semibold text-gray-800 mb-1">Everyday news</h3>
            <p class="text-sm text-gray-500 mb-4">1 Member · 0 Posts today</p>
            <button class="w-full py-2 px-4 inline-flex justify-center items-center text-sm font-semibold rounded-lg border border-transparent bg-orange-500 text-white hover:bg-orange-600 transition duration-200">
                Join
            </button>
        </div>
        
        </div>
</section>
<div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-5 md:py-20">
  <div class="flex flex-col lg:flex-row gap-12 lg:gap-16">

    <div class="w-full lg:w-7/12 flex flex-col justify-center">
      <div class="mb-6">
        <span class="inline-block bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-xs font-semibold tracking-wider uppercase rounded-full px-3 py-1">
          ■ It really works
        </span>
      </div>
      <h1 class="text-4xl md:text-2xl font-extrabold text-gray-900 dark:text-gray-700 leading-tight">
        Connecting you to the best trainers and vice versa
      </h1>
      <div class="mt-8 space-y-6">
        <div class="flex items-start">
          <div class="flex-shrink-0 h-7 w-7 bg-blue-500 rounded-full flex items-center justify-center">
            <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
          </div>
        
          <p class="ml-4 text-gray-900 dark:text-gray-700">
            Psychometric screening will tell you so much more about a candidate than a CV ever can.
          </p>
        </div>
        <div class="flex items-start">
          <div class="flex-shrink-0 h-7 w-7 bg-blue-500 rounded-full flex items-center justify-center">
            <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
          </div>
          <p class="ml-4 text-gray-900 dark:text-gray-700">
            Your candidates complete a tailored online assessment specifically designed for your vacancy. Our screening incorporates personality testing (using the Big 5 or OCEAN model of personality), a behavioural profiling (using a DISC assessment), and even an optional values section to establish how suitable someone is for a role. It can also tell you how truthful a candidate has been in their responses.
          </p>
        </div>
        <div class="flex items-start">
          <div class="flex-shrink-0 h-7 w-7 bg-blue-500 rounded-full flex items-center justify-center">
            <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
          </div>
          <p class="ml-4 text-gray-900 dark:text-gray-700">
            Our software evaluates each result, removing unsuitable candidates and presenting you with a visual ordered ranking of the applicants. The interface is clear, colourful and easy to read.
          </p>
        </div>
      </div>
    </div>
<div class="w-full lg:w-5/12 pl-6 relative before:content-[''] before:absolute before:top-0 before:bottom-0 before:left-0 before:w-1 before:bg-gradient-to-b before:from-yellow-400 before:via-red-500 before:to-red-700 ">
    
    <div class="relative">
        <input type="text" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Search...">
        <div class="absolute inset-y-0 end-0 flex items-center">
            <button type="button" class="py-2 px-4 m-1 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                Search
            </button>
        </div>
    </div>

    <div class="mt-6 flex flex-wrap gap-3">
        <button type="button" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">Tech</button>
        <button type="button" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white shadow-sm">Handwork</button>
        <button type="button" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">Vocational</button>
        <button type="button" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">Business</button>
        <button type="button" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">Business</button>
        <button type="button" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">Engineering</button>
        <button type="button" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">Fashion</button>
    </div>

    <div class="mt-8 space-y-4">
        <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
            <div class="flex items-center"><span class="h-3 w-3 rounded-full bg-pink-500 mr-4 ring-1 ring-gray-300 dark:ring-gray-700"></span><span class="text-gray-900 dark:text-black font-medium">Tailoring</span></div>
            <span class="font-mono text-sm text-gray-600 dark:text-gray-400">(345)</span>
        </div>
        <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
            <div class="flex items-center"><span class="h-3 w-3 rounded-full bg-fuchsia-500 mr-4 ring-1 ring-gray-300 dark:ring-gray-700"></span><span class="text-gray-900 dark:text-black font-medium">Barbing</span></div>
            <span class="font-mono text-sm text-gray-600 dark:text-gray-400">(345)</span>
        </div>
        <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
            <div class="flex items-center"><span class="h-3 w-3 rounded-full bg-red-500 mr-4 ring-1 ring-gray-300 dark:ring-gray-700"></span><span class="text-gray-900 dark:text-black font-medium">Carpenter</span></div>
            <span class="font-mono text-sm text-gray-600 dark:text-gray-400">(345)</span>
        </div>
        <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
            <div class="flex items-center"><span class="h-3 w-3 rounded-full bg-orange-500 mr-4 ring-1 ring-gray-300 dark:ring-gray-700"></span><span class="text-gray-900 dark:text-black font-medium">Vulcanizers</span></div>
            <span class="font-mono text-sm text-gray-600 dark:text-gray-400">(345)</span>
        </div>
        <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
            <div class="flex items-center"><span class="h-3 w-3 rounded-full bg-amber-500 mr-4 ring-1 ring-gray-300 dark:ring-gray-700"></span><span class="text-gray-900 dark:text-black font-medium">Makeup Artist</span></div>
            <span class="font-mono text-sm text-gray-600 dark:text-gray-400">(345)</span>
        </div>
        <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
            <div class="flex items-center"><span class="h-3 w-3 rounded-full bg-yellow-400 mr-4 ring-1 ring-gray-300 dark:ring-gray-700"></span><span class="text-gray-900 dark:text-black font-medium">Hair dresser</span></div>
            <span class="font-mono text-sm text-gray-600 dark:text-gray-400">(345)</span>
        </div>
        <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
            <div class="flex items-center"><span class="h-3 w-3 rounded-full bg-lime-500 mr-4 ring-1 ring-gray-300 dark:ring-gray-700"></span><span class="text-gray-900 dark:text-black font-medium">Fashion Design</span></div>
            <span class="font-mono text-sm text-gray-600 dark:text-gray-400">(345)</span>
        </div>
        <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
            <div class="flex items-center"><span class="h-3 w-3 rounded-full bg-green-500 mr-4 ring-1 ring-gray-300 dark:ring-gray-700"></span><span class="text-gray-900 dark:text-black font-medium">Plumber</span></div>
            <span class="font-mono text-sm text-gray-600 dark:text-gray-400">(345)</span>
        </div>
    </div>
    
    <div class="mt-12 flex justify-end">
        <img src="https://placehold.co/150x50/000000/FFFFFF?text=e-talent&font=raleway" alt="e-talent Logo" class="opacity-80">
    </div>

</div>
</div>
</div>
    <x-navigation.footer />
</x-layouts.app>