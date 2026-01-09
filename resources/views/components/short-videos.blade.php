{{-- 
    Component: Short Videos Slider
    Alpine.js powered, auto-rotates every 5s, pause on hover
    Matches original design & behavior 100%
--}}

@props([
    'slideGroups' => [
        [
            ['img' => 'img1.png', 'title' => 'Back to School', 'text' => 'Get 20% off all supplies'],
            ['img' => 'img5.png', 'title' => 'New Arrivals', 'text' => 'Fresh styles for everyone'],
            ['img' => 'img7.png', 'title' => 'Limited Offer', 'text' => 'Up to 50% discount!'],
        ],
        [
            ['img' => 'img8.jpg', 'title' => 'Back to School', 'text' => 'Get 20% off all supplies'],
            ['img' => 'logo1.jpg', 'title' => 'New Arrivals', 'text' => 'Fresh styles for everyone'],
            ['img' => 'img1.jpg', 'title' => 'Limited Offer', 'text' => 'Up to 50% discount!'],
        ],
    ]
])

<div x-data="{
        activeSlide: 0,
        slides: @js($slideGroups),
        interval: null,
        start() {
            this.interval = setInterval(() => {
                this.activeSlide = (this.activeSlide + 1) % this.slides.length
            }, 5000)
        },
        stop() {
            clearInterval(this.interval)
        }
    }"
     x-init="start()"
     @mouseenter="stop()"
     @mouseleave="start()"
     class="relative w-full max-w-7xl mx-auto overflow-hidden py-8 px-4 sm:px-6 lg:px-8 mt-12 rounded-lg shadow-lg bg-gray-200">

    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Up Coming Tutorials</h2>

    <!-- Slides -->
    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="activeSlide === index" 
             class="grid grid-cols-1 md:grid-cols-3 gap-4 transition-all duration-700 ease-in-out">
            <template x-for="banner in slide" :key="banner.img">
                <div class="relative rounded-2xl overflow-hidden shadow-md">
                    <img :src="'{{ asset('storage') }}/' + banner.img" 
                         alt="" 
                         class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-black/40 flex flex-col justify-end p-4 text-white">
                        <h3 class="text-lg font-semibold" x-text="banner.title"></h3>
                        <p class="text-sm" x-text="banner.text"></p>
                    </div>
                </div>
            </template>
        </div>
    </template>

    <!-- Controls -->
    <div class="absolute inset-y-0 flex items-center justify-between px-4 w-full pointer-events-none">
        <button @click="activeSlide = (activeSlide - 1 + slides.length) % slides.length"
                class="pointer-events-auto bg-black/50 text-white p-2 rounded-full hover:bg-black transition">
            ‹
        </button>
        <button @click="activeSlide = (activeSlide + 1) % slides.length"
                class="pointer-events-auto bg-black/50 text-white p-2 rounded-full hover:bg-black transition">
            ›
        </button>
    </div>

    <!-- Dots -->
    <div class="absolute bottom-3 left-0 right-0 flex justify-center space-x-2">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="activeSlide = index"
                    :class="{'bg-blue-600': activeSlide === index, 'bg-gray-600': activeSlide !== index}"
                    class="w-3 h-3 rounded-full transition"></button>
        </template>
    </div>
</div>