<style>
    .text-gradient {
        background: linear-gradient(to right, #f97316, #ef4444, #f59e0b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>
<header class="sticky top-0 inset-x-0 z-50 w-full text-base">
    <!-- Gradient Background Bar -->
    <div class="absolute inset-0 bg-gradient-to-r from-orange-400 via-pink-500 to-yellow-400 
                    opacity-90 dark:from-orange-600 dark:via-pink-700 dark:to-yellow-600"></div>
    
    <!-- Glassmorphism Overlay -->
    <div class="absolute inset-0 backdrop-blur-xl bg-white/70 dark:bg-neutral-900/60"></div>

    <nav class="relative max-w-7xl mx-auto flex flex-wrap md:flex-nowrap items-center justify-between py-4 px-6 lg:px-8">
        <!-- Mobile Menu Toggle -->
        <div class="lg:hidden">
            <button type="button"
                    class="hs-overlay-toggle inline-flex items-center justify-center size-10 rounded-full 
                           bg-white/20 backdrop-blur-md border border-white/30 text-white shadow-lg
                           hover:bg-white/30 transition-all duration-200"
                    data-hs-overlay="#mobile-menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Logo -->
        <div class="flex-shrink-0">
            <x-shared.logo class="h-10 w-auto" />
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden lg:flex items-center">
            <x-navigation.main-menu 
                :class="'flex items-center gap-8 text-white font-medium text-sm tracking-wide'" />
        </div>

        <!-- User Auth Section -->
        <div class="flex items-center gap-3">
            @if(session('user'))
                <div x-data="{ open: false, loggingOut: false }" class="relative">
                    <button @click="open = !open" @click.outside="open = false"
                            class="flex items-center gap-3 px-5 py-2.5 rounded-full bg-white/20 backdrop-blur-md
                                   border border-white/40 text-white font-medium text-sm
                                   hover:bg-white/30 transition-all duration-300 shadow-lg">
                        <span class="truncate max-w-32">{{ session('user.name') }}</span>
                        <svg class="w-4 h-4 transition-transform duration-200" 
                             :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute right-0 mt-3 w-56 origin-top-right rounded-2xl shadow-2xl
                                bg-white dark:bg-neutral-800 ring-1 ring-black ring-opacity-10 overflow-hidden">
                        <div class="py-2">
                            @if(in_array(session('user.role') ?? session('user.type') ?? '', ['admin', 'instructor']))
                                <a href="{{ route('profile2') }}" 
                                   class="block px-5 py-3 text-sm text-gray-700 hover:bg-gray-100 
                                          dark:text-gray-200 dark:hover:bg-neutral-700 transition-colors">
                                    Admin Panel
                                </a>
                            @endif

                                 @if((session('user.role') ?? session('user.type') ?? '') !== 'admin')
                            <a href="{{ route('profile2') }}"
                               class="block px-4 py-2 text-sm text-gray-100 hover:bg-blue-500">
                                User Panel
                            </a>
                        @endif

                            <button @click="loggingOut = true; $nextTick(() => {
                                fetch('http://127.0.0.1:8001/api/logout', {
                                    method: 'POST',
                                    headers: {
                                        'Authorization': 'Bearer {{ session('api_token') }}',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Accept': 'application/json'
                                    }
                                }).then(() => window.location = '/clear-session')
                                  .catch(() => window.location = '/clear-session');
                            })"
                                    :disabled="loggingOut"
                                    class="w-full text-left px-5 py-3 text-sm text-red-600 hover:bg-red-50 
                                           dark:text-red-400 dark:hover:bg-neutral-700 transition-colors flex items-center gap-2">
                                <span x-show="!loggingOut">Log Out</span>
                                <span x-show="loggingOut" class="flex items-center gap-2">
                                    <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                                    </svg>
                                    Logging out...
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            @else
                <!-- Guest Buttons -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('logins') }}"
                       class="px-5 py-2.5 rounded-full bg-white/20 backdrop-blur-md border border-white/40 
                              text-white font-medium text-sm hover:bg-white/30 transition-all duration-300">
                        Login
                    </a>
                    <a href="{{ route('signups') }}"
                       class="px-6 py-2.5 rounded-full bg-white text-gradient font-bold text-sm shadow-lg
                              hover:shadow-xl hover:scale-105 transition-all duration-300">
                        Sign Up
                    </a>
                </div>
            @endif
        </div>
    </nav>
</header>