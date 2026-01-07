<div class="container mx-auto my-10 px-4"
     x-data
>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('counter', (target) => ({
                target: Number(target),
                display: 0,
                duration: 900,
                start() {
                    const startTime = performance.now();
                    const animate = (now) => {
                        const progress = Math.min((now - startTime) / this.duration, 1);
                        this.display = Math.floor(progress * this.target);
                        if (progress < 1) requestAnimationFrame(animate);
                        else this.display = this.target;
                    };
                    requestAnimationFrame(animate);
                }
            }));
        });
    </script>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-7 gap-4 justify-items-center">

        @php
            $cardBase = '
                bg-gradient-to-r from-orange-400 via-pink-500 to-yellow-400
                dark:from-orange-600 dark:via-pink-700 dark:to-yellow-600
                opacity-90 text-white shadow-lg rounded-lg
                p-4 w-full max-w-40 text-center
                hover:opacity-100 transition
            ';
        @endphp

        <!-- Total Centers -->
        <div x-data="counter({{ $stats['centers']['total'] }})" x-init="start()" class="{{ $cardBase }}">
            <svg class="h-8 w-8 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M6 3h12v18H6z" />
            </svg>
            <h2 class="text-3xl font-bold" x-text="display"></h2>
            <p class="text-xs mt-1 opacity-90">Total Centers</p>
        </div>

        <!-- Owned Centers -->
        <div x-data="counter({{ $stats['centers']['owned'] }})" x-init="start()" class="{{ $cardBase }}">
            <svg class="h-8 w-8 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l8 6v12H4V9l8-6z" />
            </svg>
            <h2 class="text-3xl font-bold" x-text="display"></h2>
            <p class="text-xs mt-1 opacity-90">Owned Centers</p>
        </div>

        <!-- Total Courses -->
        <div x-data="counter({{ $stats['courses']['total'] }})" x-init="start()" class="{{ $cardBase }}">
            <svg class="h-8 w-8 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 5h16v14H4z M4 9h16" />
            </svg>
            <h2 class="text-3xl font-bold" x-text="display"></h2>
            <p class="text-xs mt-1 opacity-90">Total Courses</p>
        </div>

        <!-- Owned Courses -->
        <div x-data="counter({{ $stats['courses']['owned'] }})" x-init="start()" class="{{ $cardBase }}">
            <svg class="h-8 w-8 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 4h12v16H6z M9 8h6" />
            </svg>
            <h2 class="text-3xl font-bold" x-text="display"></h2>
            <p class="text-xs mt-1 opacity-90">Owned Courses</p>
        </div>

        <!-- With Video -->
        <div x-data="counter({{ $stats['courses']['with_video'] }})" x-init="start()" class="{{ $cardBase }}">
            <svg class="h-8 w-8 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15 10l4-2v8l-4-2M4 6h11v12H4z" />
            </svg>
            <h2 class="text-3xl font-bold" x-text="display"></h2>
            <p class="text-xs mt-1 opacity-90">With Video</p>
        </div>

        <!-- Without Video -->
        <div x-data="counter({{ $stats['courses']['without_video'] }})" x-init="start()" class="{{ $cardBase }}">
            <svg class="h-8 w-8 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <h2 class="text-3xl font-bold" x-text="display"></h2>
            <p class="text-xs mt-1 opacity-90">Without Video</p>
        </div>

        <!-- Enrolled Users -->
        <div x-data="counter({{ $stats['engagement']['total_enrolled_users'] }})" x-init="start()"
             class="{{ $cardBase }} text-gray-900 dark:text-white">
            <svg class="h-8 w-8 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 14c3.866 0 7 1.79 7 4v2H5v-2c0-2.21 3.134-4 7-4zm0-2a4 4 0 100-8 4 4 0 000 8z" />
            </svg>
            <h2 class="text-3xl font-bold" x-text="display"></h2>
            <p class="text-xs mt-1 opacity-90">Enrolled Users</p>
        </div>

    </div>
</div>
