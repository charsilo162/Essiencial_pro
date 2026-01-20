<x-layouts.app title="Contact Us - Master Tech & Life Skills">
   

  <div class="min-h-screen bg-white text-gray-900">

    <!-- HEADER -->
    <section class="max-w-7xl mx-auto px-6 pt-28 pb-20">
        <div class="max-w-3xl">
            <span class="uppercase tracking-widest text-gray-500 font-semibold">
                Contact
            </span>

            <h1 class="mt-4 text-5xl md:text-6xl font-extrabold leading-tight">
                Let’s Start the<br>
                <span class="text-gray-900">
                    Conversation
                </span>
            </h1>

            <p class="mt-8 text-xl text-gray-700 leading-relaxed">
                Whether you’re exploring courses, partnerships, or support,
                our team is ready to respond with clarity and speed.
            </p>

            <div class="mt-10 flex flex-wrap gap-6 text-gray-700">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                    </svg>
                    support@youracademy.com
                </div>

                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 5a2 2 0 012-2h2a1 1 0 011 1v3a1 1 0 01-.293.707l-1.5 1.5a11.042 11.042 0 005.086 5.086l1.5-1.5A1 1 0 0113 13h3a1 1 0 011 1v2a2 2 0 01-2 2C7.163 18 2 12.837 2 6V5z"/>
                    </svg>
                    +1 (555) 123-4567
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="max-w-7xl mx-auto px-6 pb-28">
        <div class="grid lg:grid-cols-2 gap-16">

            <!-- FORM -->
            <div class="bg-gray-100 border border-gray-200 rounded-3xl p-10">
                <livewire:contact-form />
            </div>

            <!-- INFO -->
            <div class="space-y-10">

                <div class="border border-gray-200 rounded-3xl p-8 bg-gray-50">
                    <h3 class="text-2xl font-bold mb-4 text-gray-900">Visit Our Centers</h3>
                    <p class="text-gray-700">
                        Learn offline at over <strong>50+ accredited training centers</strong>
                        across major cities.
                    </p>
                </div>

                <div class="border border-gray-200 rounded-3xl p-8 bg-gray-50">
                    <h3 class="text-2xl font-bold mb-4 text-gray-900">Fast Support</h3>
                    <p class="text-gray-700">
                        Our team responds to most inquiries within
                        <strong>2–4 business hours</strong>.
                    </p>
                </div>

                <div class="border border-gray-200 rounded-3xl p-8 bg-gray-50">
                    <h3 class="text-2xl font-bold mb-6 text-gray-900">Follow Us</h3>

                    <div class="flex gap-6">
                        <a href="#" class="px-6 py-3 border border-gray-300 rounded-full hover:bg-gray-200 transition">
                            Facebook
                        </a>
                        <a href="#" class="px-6 py-3 border border-gray-300 rounded-full hover:bg-gray-200 transition">
                            Instagram
                        </a>
                        <a href="#" class="px-6 py-3 border border-gray-300 rounded-full hover:bg-gray-200 transition">
                            YouTube
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>

    <x-navigation.footer />
</x-layouts.app>
