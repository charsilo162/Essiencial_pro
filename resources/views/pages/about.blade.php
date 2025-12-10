<x-layouts.home-layout>

    <x-slot name="title">
        About Us - Master Tech & Life Skills
    </x-slot>

    <!-- Main Content -->
    <div class="min-h-screen bg-white py-16 px-4 sm:px-6 lg:px-8">

        <!-- Hero Section -->
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#6A3318] via-[#661437] to-[#6A4E0F] shadow-2xl">
            <div class="absolute inset-0 bg-black opacity-50"></div>

            <!-- Animated Blobs -->
            <div class="absolute top-10 left-10 w-80 h-80 bg-amber-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
            <div class="absolute top-40 right-10 w-96 h-96 bg-pink-600 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-0 left-40 w-80 h-80 bg-orange-700 rounded-full mix-blend-multiply filter blur-3xl opacity-25 animate-blob animation-delay-4000"></div>

            <div class="relative max-w-7xl mx-auto py-32 px-8 text-center text-white">
                <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight fade-in">
                    Master Skills That Matter
                </h1>
                <p class="mt-8 text-xl md:text-3xl font-light opacity-95 fade-in animation-delay-500 max-w-4xl mx-auto leading-relaxed">
                    From coding the future to leading with confidence — we offer <span class="text-yellow-300 font-bold">over 500+ courses</span> in 
                    <span class="text-pink-300 font-bold">Technology</span> and 
                    <span class="text-amber-300 font-bold">Life Skills</span> — both online and in-person.
                </p>
                <div class="mt-12 fade-in animation-delay-1000">
                    <span class="inline-block px-10 py-5 bg-white/20 backdrop-blur-md rounded-full text-2xl font-bold border border-white/30">
                        Trusted by 250,000+ Learners Worldwide
                    </span>
                </div>
            </div>
        </div>

        <!-- Skills Categories -->
        <div class="max-w-7xl mx-auto -mt-12 relative z-10 px-4">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-extrabold text-yellow-300">Explore Skills You Can Learn</h2>
                <p class="mt-4 text-xl text-gray-600">Tech or Soft Skills — we’ve got you covered</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

                <!-- Tech Skills -->
                <div class="bg-gradient-to-br from-[#6A3318]/8 to-[#6A4E0F]/8 rounded-3xl p-10 border border-[#6A3318]/10 float backdrop-blur-sm">
                    <div class="flex items-center gap-6 mb-8">
                        <div class="w-16 h-14 bg-gradient-to-br from-[#6A3318] to-[#6A4E0F] rounded-2xl flex items-center justify-center shadow-xl">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        </div>
                        <div>
                            <h3 class="text-3xl font-extrabold text-[#6A3318]">Tech & Digital Skills</h3>
                            <p class="text-gray-700 font-medium">Future-proof your career</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-5 text-gray-800">
                        @foreach(['Web Development', 'Mobile Apps', 'Python & Django', 'JavaScript & React', 'Data Science', 'Machine Learning', 'Cybersecurity', 'Cloud Computing', 'UI/UX Design', 'DevOps & Linux'] as $skill)
                            <div class="bg-white/70 backdrop-blur-sm rounded-2xl px-6 py-4 shadow hover:shadow-lg transform hover:scale-105 transition float">
                                <span class="font-semibold text-[#6A3318]">{{ $skill }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Life & Soft Skills -->
                <div class="bg-gradient-to-br from-[#661437]/8 to-pink-600/8 rounded-3xl p-10 border border-[#661437]/10 float backdrop-blur-sm">
                    <div class="flex items-center gap-6 mb-8">
                        <div class="w-16 h-14 bg-gradient-to-br from-[#661437] to-pink-600 rounded-2xl flex items-center justify-center shadow-xl">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2m-4-8h4m-4 8h4m-8-8H7a2 2 0 00-2 2v6a2 2 0 002 2h2"/></svg>
                        </div>
                        <div>
                            <h3 class="text-3xl font-extrabold text-[#661437]">Life & Professional Skills</h3>
                            <p class="text-gray-700 font-medium">Grow beyond code</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-5 text-gray-800">
                        @foreach(['Public Speaking', 'Leadership', 'Time Management', 'Emotional Intelligence', 'Negotiation Skills', 'Project Management', 'Digital Marketing', 'Personal Branding', 'Financial Literacy', 'Creative Writing'] as $skill)
                            <div class="bg-white/70 backdrop-blur-sm rounded-2xl px-6 py-4 shadow hover:shadow-lg transform hover:scale-105 transition float">
                                <span class="font-semibold text-[#661437]">{{ $skill }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="fade-in animation-delay-500">
                    <div class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#6A3318] to-[#6A4E0F]">500+</div>
                    <p class="mt-3 text-xl font-semibold text-gray-700">Courses Available</p>
                </div>
                <div class="fade-in animation-delay-700">
                    <div class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#661437] to-pink-600]">250K+</div>
                    <p class="mt-3 text-xl font-semibold text-gray-700">Happy Students</p>
                </div>
                <div class="fade-in animation-delay-900">
                    <div class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#6A3318] to-[#6A4E0F]">50+</div>
                    <p class="mt-3 text-xl font-semibold text-gray-700">Training Centers</p>
                </div>
                <div class="fade-in animation-delay-1100">
                    <div class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#661437] to-pink-600]">98%</div>
                    <p class="mt-3 text-xl font-semibold text-gray-700">Success Rate</p>
                </div>
            </div>

            <!-- Final CTA -->
            <div class="mt-20 text-center fade-in animation-delay-1300">
                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">
                    Ready to Start Learning?
                </h2>
                <a href="{{ route('category.index') }}" class="inline-block px-12 py-6 bg-gradient-to-r from-[#6A3318] via-[#661437] to-[#6A4E0F] text-white font-bold text-xl rounded-2xl shadow-2xl hover:shadow-3xl transform hover:scale-110 transition duration-300">
                    Explore All Courses →
                </a>
            </div>
        </div>
    </div>

    <!-- Same Animations as Contact Page -->
    <style>
        .fade-in { animation: fadeIn 1.6s ease-out forwards; opacity: 0; }
        .animation-delay-500 { animation-delay: 0.5s; }
        .animation-delay-700 { animation-delay: 0.7s; }
        .animation-delay-900 { animation-delay: 0.9s; }
        .animation-delay-1000 { animation-delay: 1s; }
        .animation-delay-1100 { animation-delay: 1.1s; }
        .animation-delay-1300 { animation-delay: 1.3s; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }
        .float { animation: float 6s ease-in-out infinite; }
        @keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-16px); } }
        .animate-blob { animation: blob 10s infinite; }
        @keyframes blob { 0%,100% { transform: translate(0px,0px) scale(1); } 33% { transform: translate(30px,-50px) scale(1.1); } 66% { transform: translate(-20px,30px) scale(0.9); } }
    </style>

</x-layouts.home-layout>