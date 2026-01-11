<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        @php
            $card = "bg-white border border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md transition";
            $title = "text-sm text-gray-500";
            $value = "text-2xl font-bold text-gray-900";
        @endphp

        {{-- Total Centers --}}
        <div 
            x-data="{ count: 0 }"
            x-init="
                let target = {{ $stats['centers']['total'] }};
                let duration = 800;
                let start = performance.now();
                let animate = (time) => {
                    let progress = Math.min((time - start) / duration, 1);
                    count = Math.floor(progress * target);
                    if (progress < 1) requestAnimationFrame(animate);
                };
                requestAnimationFrame(animate);
            "
            class="{{ $card }}"
        >
            <p class="{{ $title }}">Total Centers</p>
            <h2 class="{{ $value }}" x-text="count"></h2>
        </div>

        {{-- Owned Centers --}}
        {{-- <div x-data="{ count: 0 }" x-init="
            let target = {{ $stats['centers']['owned'] }};
            let duration = 800;
            let start = performance.now();
            let animate = (time) => {
                let progress = Math.min((time - start) / duration, 1);
                count = Math.floor(progress * target);
                if (progress < 1) requestAnimationFrame(animate);
            };
            requestAnimationFrame(animate);
        " class="{{ $card }}">
            <p class="{{ $title }}">Owned Centers</p>
            <h2 class="{{ $value }}" x-text="count"></h2>
        </div> --}}

        {{-- Total Courses --}}
        <div x-data="{ count: 0 }" x-init="
            let target = {{ $stats['courses']['total'] }};
            let duration = 800;
            let start = performance.now();
            let animate = (time) => {
                let progress = Math.min((time - start) / duration, 1);
                count = Math.floor(progress * target);
                if (progress < 1) requestAnimationFrame(animate);
            };
            requestAnimationFrame(animate);
        " class="{{ $card }}">
            <p class="{{ $title }}">Total Courses</p>
            <h2 class="{{ $value }}" x-text="count"></h2>
        </div>

        {{-- Owned Courses --}}
        {{-- <div x-data="{ count: 0 }" x-init="
            let target = {{ $stats['courses']['owned'] }};
            let duration = 800;
            let start = performance.now();
            let animate = (time) => {
                let progress = Math.min((time - start) / duration, 1);
                count = Math.floor(progress * target);
                if (progress < 1) requestAnimationFrame(animate);
            };
            requestAnimationFrame(animate);
        " class="{{ $card }}">
            <p class="{{ $title }}">Owned Courses</p>
            <h2 class="{{ $value }}" x-text="count"></h2>
        </div> --}}

        {{-- With Video --}}
        <div x-data="{ count: 0 }" x-init="
            let target = {{ $stats['courses']['with_video'] }};
            let duration = 800;
            let start = performance.now();
            let animate = (time) => {
                let progress = Math.min((time - start) / duration, 1);
                count = Math.floor(progress * target);
                if (progress < 1) requestAnimationFrame(animate);
            };
            requestAnimationFrame(animate);
        " class="{{ $card }}">
            <p class="{{ $title }}">With Video</p>
            <h2 class="{{ $value }}" x-text="count"></h2>
        </div>

        {{-- Without Video --}}
        <div x-data="{ count: 0 }" x-init="
            let target = {{ $stats['courses']['without_video'] }};
            let duration = 800;
            let start = performance.now();
            let animate = (time) => {
                let progress = Math.min((time - start) / duration, 1);
                count = Math.floor(progress * target);
                if (progress < 1) requestAnimationFrame(animate);
            };
            requestAnimationFrame(animate);
        " class="{{ $card }}">
            <p class="{{ $title }}">Without Video</p>
            <h2 class="{{ $value }}" x-text="count"></h2>
        </div>

        {{-- Enrolled Users --}}
        <div x-data="{ count: 0 }" x-init="
            let target = {{ $stats['engagement']['total_enrolled_users'] }};
            let duration = 800;
            let start = performance.now();
            let animate = (time) => {
                let progress = Math.min((time - start) / duration, 1);
                count = Math.floor(progress * target);
                if (progress < 1) requestAnimationFrame(animate);
            };
            requestAnimationFrame(animate);
        " class="{{ $card }}">
            <p class="{{ $title }}">Enrolled Users</p>
            <h2 class="{{ $value }}" x-text="count"></h2>
        </div>

    </div>
</div>
