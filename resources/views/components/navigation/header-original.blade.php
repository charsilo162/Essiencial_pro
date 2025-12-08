<!-- ========== HEADER ORIGINAL (Refined for Mobile and Desktop) ========== -->
<header class="sticky top-0 inset-x-0 z-50 w-full text-base bg-white border-b shadow-sm dark:bg-neutral-900 dark:border-neutral-700">
    {{-- FIX: Added 'md:flex-nowrap' to prevent the CTA button from wrapping on desktop --}}
    <nav class="relative max-w-7xl mx-auto flex flex-wrap md:flex-nowrap items-center justify-between py-3 px-4 md:py-4">
        
        <!-- Logo Component (Left side) -->
        <x-shared.logo />
        
        {{-- Order 4 ensures this container stays on the far right on desktop --}}
        <div class="flex items-center gap-3 md:order-4 md:ms-10">
            <!-- CTA Button Component - Hide on XS screens to make room for logo/toggle -->
            <div class="hidden sm:block">
                <x-shared.cta-button text="Book a call" />
            </div>

            {{-- Mobile Toggle Button --}}
            <div class="md:hidden">
                <button type="button" class="hs-collapse-toggle flex justify-center items-center size-9 border border-gray-200 text-gray-700 rounded-full hover:bg-gray-100 focus:outline-hidden dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800" 
                        id="hs-navbar-header-floating-collapse" 
                        aria-expanded="false" 
                        data-hs-collapse="#hs-navbar-header-floating">
                    
                    {{-- Menu Icon (Hamburger) --}}
                    <svg class="hs-collapse-open:hidden shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" x2="21" y1="6" y2="6"/>
                        <line x1="3" x2="21" y1="12" y2="12"/>
                        <line x1="3" x2="21" y1="18" y2="18"/>
                    </svg>

                    {{-- Close Icon (X) --}}
                    <svg class="hs-collapse-open:block hidden shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"/>
                        <path d="m6 6 12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Collapsible Menu (Middle section on Desktop) --}}
        {{-- FIX: Changed 'basis-full grow' to 'flex-1' on desktop to consume available space --}}
        <div id="hs-navbar-header-floating" 
             class="hidden hs-collapse overflow-hidden transition-all duration-300 basis-full md:flex-1 md:block" 
             aria-labelledby="hs-navbar-header-floating-collapse">
            
            <div class="md:flex md:items-center md:justify-end">
                <!-- Navigation Menu Component -->
                <x-navigation.main-menu 
                    :class="'flex flex-col md:flex-row md:items-center md:justify-end gap-1 md:gap-5 mt-3 md:mt-0 pt-2 pb-4 md:py-0 md:ps-7 border-t md:border-t-0 text-gray-700 dark:text-gray-200'" 
                />
            </div>
        </div>
    </nav>
@if(session('error'))
    <div style="background: #f8d7da; color: #842029; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div style="background: #d1e7dd; color: #0f5132; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
        {{ session('success') }}
    </div>
@endif
    
</header>
