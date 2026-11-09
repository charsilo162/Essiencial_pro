<div class="relative bg-amber-50/40 dark:bg-[#1e1e1e] py-16 px-4 sm:px-6 lg:px-8 overflow-hidden transition-colors duration-300">
    <div class="absolute top-0 inset-x-0 h-20 bg-gradient-to-b from-white dark:from-[#2C2C2C] to-transparent pointer-events-none"></div>

    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold tracking-tight text-[#2C2C2C] dark:text-gray-100 sm:text-4xl">
                What Our <span class="text-[#C6A157]">Happy Client</span> Say
            </h2>
        </div>

        <div class="relative group">
            <button class="absolute -left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 bg-zinc-700/60 hover:bg-zinc-800 text-white rounded-full flex items-center justify-center transition focus:outline-none shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </button>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
                @foreach($testimonials as $testimonial)
                    <div class="bg-white dark:bg-[#2C2C2C] rounded-none shadow-sm border border-gray-100 dark:border-zinc-800 p-6 flex flex-col justify-between transition-transform duration-200 hover:shadow-md">
                        <div>
                            <div class="flex items-center space-x-1 mb-4">
                                @for($i = 0; $i < $testimonial['stars']; $i++)
                                    <svg class="w-4 h-4 text-[#C6A157]" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>

                            <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed mb-6 font-normal">
                                "{{ $testimonial['feedback'] }}"
                            </p>
                        </div>

                        <div class="pt-4 border-t border-gray-100 dark:border-zinc-700">
                            <h4 class="font-bold text-sm text-[#2C2C2C] dark:text-white">
                                {{ $testimonial['name'] }},
                            </h4>
                            <p class="text-xs text-gray-400 dark:text-gray-400 mt-1 leading-snug">
                                {{ $testimonial['role'] }} <span class="block text-gray-400/80">{{ $testimonial['company'] }}</span>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="absolute -right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 bg-zinc-700/60 hover:bg-zinc-800 text-white rounded-full flex items-center justify-center transition focus:outline-none shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>
    </div>
</div>