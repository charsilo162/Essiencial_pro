{{-- resources/views/livewire/category-sidebar.blade.php --}}
<div id="mobile-menu"
     class="hs-overlay -translate-x-full transition-all duration-300 transform
            fixed top-0 start-0 bottom-0 z-40 w-64
            bg-white dark:bg-gray-900
            border-e border-gray-200 dark:border-gray-800
            lg:translate-x-0 lg:end-auto lg:bottom-0 lg:block
            pt-16"
     wire:ignore.self>

    <nav class="px-4 py-6 space-y-6">

        {{-- SECTION TITLE --}}
        <h3 class="px-3 text-xs font-semibold uppercase tracking-wider
                   text-gray-500 dark:text-gray-400">
            Dashboard
        </h3>

        {{-- MENU --}}
        <div class="space-y-1">

            @if((session('user.role') ?? session('user.type') ?? '') !== 'user')

                @php
                    $itemBase = '
                        flex items-center gap-x-3
                        py-2.5 px-3 text-sm font-medium
                        rounded-lg transition-all
                        text-gray-700 dark:text-gray-200
                        hover:text-white
                        hover:bg-gradient-to-r hover:from-orange-400 hover:via-pink-500 hover:to-yellow-400
                        dark:hover:from-orange-600 dark:hover:via-pink-700 dark:hover:to-yellow-600
                    ';
                @endphp

                <a href="{{ route('category.list') }}" class="{{ $itemBase }}">
                    <span>Categories</span>
                </a>

                <a href="{{ route('my.course') }}" class="{{ $itemBase }}">
                    <span>My Courses</span>
                </a>

                <a href="{{ route('courses.no-video') }}" class="{{ $itemBase }}">
                    <span>Draft Courses</span>
                </a>

                <a href="{{ route('my.videos') }}" class="{{ $itemBase }}">
                    <span>My Videos</span>
                </a>

                <a href="{{ route('center.centers') }}" class="{{ $itemBase }}">
                    <span>Centers</span>
                </a>

                <a href="#" class="{{ $itemBase }}">
                    <span>Profile</span>
                </a>

            @endif
        </div>

        {{-- ACTION BUTTONS --}}
        @if((session('user.role') ?? session('user.type') ?? '') !== 'user')
            <div class="pt-4 space-y-3 border-t border-gray-200 dark:border-gray-700">
               
                <livewire:post-center-button />
                <livewire:course.post-course-button />
            </div>
        @endif

    </nav>
</div>
