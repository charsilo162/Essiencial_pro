<x-layouts.app title="About Us - Master Tech & Life Skills">
    <x-navigation.header-original />

    <div class="min-h-screen bg-gradient-to-b from-black via-gray-900 to-gray-800 text-white">

        <!-- HERO : Editorial Split -->
        <section class="max-w-7xl mx-auto px-6 py-28 grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="uppercase tracking-widest text-gray-400 font-semibold">
                    About Master Tech & Life Skills
                </span>

                <h1 class="mt-6 text-5xl md:text-6xl font-extrabold leading-tight">
                    Building Skills<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-400">
                        For the Real World
                    </span>
                </h1>

                <p class="mt-8 text-xl text-gray-300 leading-relaxed max-w-xl">
                    We help individuals and institutions master technology and life skills
                    that translate directly into real-world impact, career growth,
                    and leadership confidence.
                </p>

                <div class="mt-10 flex items-center gap-6">
                    <div class="text-4xl font-extrabold">500+</div>
                    <div class="text-gray-400">
                        Industry-ready courses across tech & professional development
                    </div>
                </div>
            </div>

            <!-- Hero Visual -->
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent rounded-3xl blur-2xl"></div>
                <div class="relative rounded-3xl border border-white/10 bg-black/60 backdrop-blur-xl p-12">
                    <div class="grid grid-cols-2 gap-6 text-center">
                        <div>
                            <div class="text-4xl font-bold">250K+</div>
                            <p class="text-gray-400 mt-2">Learners</p>
                        </div>
                        <div>
                            <div class="text-4xl font-bold">98%</div>
                            <p class="text-gray-400 mt-2">Completion Rate</p>
                        </div>
                        <div>
                            <div class="text-4xl font-bold">50+</div>
                            <p class="text-gray-400 mt-2">Training Centers</p>
                        </div>
                        <div>
                            <div class="text-4xl font-bold">10+</div>
                            <p class="text-gray-400 mt-2">Years Experience</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- WHAT WE TEACH -->
        <section class="max-w-7xl mx-auto px-6 py-24">
            <h2 class="text-4xl font-extrabold mb-4">
                What We Teach
            </h2>
            <p class="text-gray-400 text-xl max-w-3xl mb-16">
                Our curriculum balances technical excellence with human-centered skills —
                because modern success requires both.
            </p>

            <div class="grid lg:grid-cols-2 gap-12">

                <!-- Tech Skills -->
                <div class="rounded-3xl border border-white/10 bg-gradient-to-br from-black to-gray-900 p-10">
                    <h3 class="text-2xl font-bold mb-6">Technology & Digital Skills</h3>

                    <div class="grid grid-cols-2 gap-4">
                        @foreach([
                            'Web Development','Mobile Apps','Python','JavaScript',
                            'Data Science','Machine Learning','Cybersecurity',
                            'Cloud Computing','UI/UX Design','DevOps'
                        ] as $skill)
                            <div class="px-5 py-3 rounded-xl bg-white/5 border border-white/10 text-gray-200">
                                {{ $skill }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Life Skills -->
                <div class="rounded-3xl border border-white/10 bg-gradient-to-br from-gray-900 to-black p-10">
                    <h3 class="text-2xl font-bold mb-6">Life & Professional Skills</h3>

                    <div class="grid grid-cols-2 gap-4">
                        @foreach([
                            'Leadership','Public Speaking','Time Management',
                            'Emotional Intelligence','Negotiation',
                            'Project Management','Digital Marketing',
                            'Personal Branding','Financial Literacy','Creative Writing'
                        ] as $skill)
                            <div class="px-5 py-3 rounded-xl bg-white/5 border border-white/10 text-gray-200">
                                {{ $skill }}
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>

        <!-- WHY CHOOSE US -->
        <section class="bg-black/60 border-t border-white/10">
            <div class="max-w-7xl mx-auto px-6 py-24 grid md:grid-cols-3 gap-12 text-center">
                <div>
                    <h4 class="text-xl font-bold mb-3">Practical Learning</h4>
                    <p class="text-gray-400">
                        Industry-aligned courses focused on real outcomes, not theory alone.
                    </p>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-3">Flexible Delivery</h4>
                    <p class="text-gray-400">
                        Learn online or in-person through our accredited training centers.
                    </p>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-3">Career Impact</h4>
                    <p class="text-gray-400">
                        Designed to help you grow, pivot, or lead in today’s workforce.
                    </p>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="max-w-7xl mx-auto px-6 py-24 text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold mb-6">
                Learn Skills That Move You Forward
            </h2>

            <p class="text-xl text-gray-400 max-w-2xl mx-auto mb-10">
                Join thousands of learners building confidence, competence,
                and careers through Master Tech & Life Skills.
            </p>

            <a href="{{ route('category.index') }}"
               class="inline-flex items-center gap-3 px-12 py-5 rounded-full
                      bg-white text-black font-bold text-lg
                      hover:bg-gray-200 transition">
                Explore Courses
                <span>→</span>
            </a>
        </section>

    </div>

    <x-navigation.footer />
</x-layouts.app>
