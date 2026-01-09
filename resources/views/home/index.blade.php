<x-layouts.app title="eTalent Home">

    {{-- Hero Carousel --}}
  <section
    x-data="{
        active: 0,
        slides: [
            {
                image: '/storage/img3.png',
                title: 'Discover Our Services',
                text: 'We provide top-quality solutions to help your business grow and succeed.'
            },
            {
                image: '/storage/img5.png',
                title: 'Modern Workspaces',
                text: 'Flexible, innovative spaces designed for productivity and comfort.'
            },
            {
                image: '/storage/img2.jpg',
                title: 'Join Our Community',
                text: 'Connect, collaborate, and create with like-minded professionals.'
            }
        ],
        start() {
            setInterval(() => {
                this.active = (this.active + 1) % this.slides.length
            }, 5000)
        }
    }"
    x-init="start"
    class="relative w-full h-[75vh] overflow-hidden"
>
    <!-- Slides -->
    <template x-for="(slide, index) in slides" :key="index">
        <div
            x-show="active === index"
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 scale-105"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute inset-0"
        >
            <!-- Background Image -->
            <div
                class="absolute inset-0 bg-cover bg-center"
                :style="`background-image: url(${slide.image})`"
            ></div>

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/50"></div>

            <!-- Content -->
            <div class="relative z-10 max-w-5xl mx-auto h-full flex items-center px-6">
                <div class="text-white max-w-xl">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4" x-text="slide.title"></h1>
                    <p class="text-lg md:text-xl mb-6" x-text="slide.text"></p>

                    <a href="#"
                       class="inline-block px-6 py-3 rounded bg-sky-500 hover:bg-sky-600 transition">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </template>

    <!-- Navigation Dots -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-3 z-20">
        <template x-for="(slide, index) in slides" :key="index">
            <button
                @click="active = index"
                class="w-3 h-3 rounded-full transition"
                :class="active === index ? 'bg-white scale-125' : 'bg-white/50 hover:bg-white'"
            ></button>
        </template>
    </div>
</section>


    {{-- Popular Categories --}}
    <livewire:popular-category-cards />

    {{-- Home Center List --}}
    <livewire:home-center-list />

    {{-- Short Videos --}}
    <x-short-videos />

    {{-- Banner CTA --}}
    <x-banner.overlay
        image="img3.png"
        title="Be engaged with the best Tutors Nationwide"
        subtitle="with experiences from different parts of the Globe"
        :button="['text' => 'Apply', 'href' => '#']"
    />

    {{-- Training Promo --}}
    <x-training-promo
        image="img3.png"
        title="It's not magic. It's training"
        :features="[
            'Your online and Offline training in one place',
            'Certificate to acquire at the best price',
            'Over 1k skills to learn'
        ]"
        subtitle="Ready to ditch the CV struggle"
        cta-text="Check Category"
        cta-href="{{ route('category.index') }}"
    />

    {{-- Why Users Love Us --}}
    <x-why-love-us />

    <livewire:featured-venues />

    {{-- Clients --}}
    <x-clients-section :logos="['logo4.png', 'logo3.png', 'logo5.png', 'logo1.jpg', 'logo2.jpg']" />

    {{-- Footer --}}
    <x-navigation.footer />

</x-layouts.app>
