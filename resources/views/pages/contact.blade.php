<x-layouts.home-layout>

    <x-slot name="title">
        Contact Us - Get in Touch
    </x-slot>

    <!-- Main Content -->
    <div class="min-h-screen bg-white py-16 px-4 sm:px-6 lg:px-8">

        <!-- Hero Header -->
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#6A3318] via-[#661437] to-[#6A4E0F] shadow-2xl">
            <div class="absolute inset-0 bg-black opacity-50"></div>

            <!-- Animated Blobs -->
            <div class="absolute top-10 left-10 w-72 h-72 bg-amber-500 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob"></div>
            <div class="absolute top-32 right-20 w-96 h-96 bg-pink-600 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-32 w-80 h-80 bg-orange-700 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-4000"></div>

            <div class="relative max-w-7xl mx-auto py-24 px-8 text-center text-white">
                <h1 class="text-5xl md:text-6xl font-bold tracking-tight fade-in">Get in Touch</h1>
                <p class="mt-6 text-xl md:text-2xl font-light opacity-90 fade-in animation-delay-500">
                    Have questions about our online or offline courses?<br>We're here to help you start your learning journey.
                </p>
                <div class="mt-10 flex flex-col sm:flex-row justify-center gap-6 fade-in animation-delay-1000">
                    <div class="flex items-center justify-center gap-3 bg-white/10 backdrop-blur-sm rounded-full px-8 py-4">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                        <span class="font-medium">support@youracademy.com</span>
                    </div>
                    <div class="flex items-center justify-center gap-3 bg-white/10 backdrop-blur-sm rounded-full px-8 py-4">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7 2a1 1 0 00-.707 1.707L7 4.414v3.172a3 3 0 01-.879 2.12l-3.828 3.83a1 1 0 001.414 1.414l3.828-3.83a3 3 0 012.12-.879h3.172l.707.707a1 1 0 101.414-1.414L14.586 9H11.414a1 1 0 00-.707.293l-3.828 3.83a1 1 0 101.414 1.414l3.828-3.83A3 3 0 0014 9.586V6.414l.707-.707A1 1 0 1016.414 4L15 5.414V4a1 1 0 00-1-1H7z" clip-rule="evenodd"/></svg>
                        <span class="font-medium">+1 (555) 123-4567</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form + Info Section -->
        <div class="max-w-6xl mx-auto -mt-12 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                <!-- Contact Form (unchanged) -->
                <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-12 border border-gray-100">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Send Us a Message</h2>
                    <form wire:submit="sendMessage" class="space-y-6">
                        <!-- Your form stays exactly the same -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" wire:model.live="name" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white focus:ring-2 focus:ring-[#6A3318] focus:border-transparent transition" placeholder="John Doe">
                                @error('name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" wire:model.live="email" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white focus:ring-2 focus:ring-[#6A3318] focus:border-transparent transition" placeholder="john@example.com">
                                @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                            <select wire:model="subject" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white focus:ring-2 focus:ring-[#6A3318] focus:border-transparent">
                                <option value="">Choose a topic...</option>
                                <option>Online Course Inquiry</option>
                                <option>Offline Center Registration</option>
                                <option>Partnership Opportunities</option>
                                <option>Technical Support</option>
                                <option>Refund & Billing</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                            <textarea wire:model.live="message" rows="6" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white focus:ring-2 focus:ring-[#6A3318] focus:border-transparent transition resize-none" placeholder="How can we help you today?"></textarea>
                            @error('message') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex items-center justify-between flex-wrap gap-4">
                            <button type="submit" wire:loading.attr="disabled"
                                    class="px-10 py-4 bg-gradient-to-r from-[#6A3318] via-[#661437] to-[#6A4E0F] text-white font-bold rounded-xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition duration-300 disabled:opacity-70">
                                <span wire:loading.remove wire:target="sendMessage">Send Message</span>
                                <span wire:loading wire:target="sendMessage">Sending...</span>
                            </button>
                            @if(session()->has('success'))
                                <div class="text-green-600 font-semibold animate-pulse">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Info & Social Cards – NOW WITH BOLD, RICH TEXT -->
                <div class="space-y-8">

                    <!-- Visit Our Centers – BOLDER -->
                    <div class="bg-gradient-to-br from-[#6A3318]/8 to-[#6A4E0F]/8 rounded-3xl p-8 border border-[#6A3318]/10 float backdrop-blur-sm">
                        <div class="flex items-start gap-5">
                            <div class="w-14 h-14 bg-gradient-to-br from-[#6A3318] to-[#6A4E0F] rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-extrabold text-[#6A3318]">Visit Our Centers</h3>
                                <p class="mt-3 text-lg font-medium text-gray-700">
                                    Join offline classes at any of our <span class="text-[#6A3318] font-bold">50+ training centers</span> worldwide.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Fast Response – BOLDER -->
                    <div class="bg-gradient-to-br from-[#661437]/8 to-pink-600/8 rounded-3xl p-8 border border-[#661437]/10 float backdrop-blur-sm">
                        <div class="flex items-start gap-5">
                            <div class="w-14 h-14 bg-gradient-to-br from-[#661437] to-pink-600 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-extrabold text-[#661437]">Fast Response</h3>
                                <p class="mt-3 text-lg font-medium text-gray-700">
                                    We reply to all messages within <span class="text-[#661437] font-bold">2–4 hours</span> on weekdays.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Card – unchanged but clean -->
                    <div class="bg-white rounded-3xl p-8 shadow-2xl border border-gray-100">
                        <h3 class="text-2xl font-bold text-gray-900 mb-8">Follow Us</h3>
                        <div class="grid grid-cols-3 gap-6">
                            <a href="#" class="group text-center transform hover:scale-110 transition">
                                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-[#6A3318] to-[#6A4E0F] rounded-2xl flex items-center justify-center shadow-lg"><span class="text-2xl text-white font-bold">f</span></div>
                                <p class="mt-3 text-sm text-gray-600">Facebook</p>
                            </a>
                            <a href="#" class="group text-center transform hover:scale-110 transition">
                                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-[#661437] to-pink-600 rounded-2xl flex items-center justify-center shadow-lg"><span class="text-2xl text-white font-bold">IG</span></div>
                                <p class="mt-3 text-sm text-gray-600">Instagram</p>
                            </a>
                            <a href="#" class="group text-center transform hover:scale-110 transition">
                                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-[#6A3318] to-[#6A4E0F] rounded-2xl flex items-center justify-center shadow-lg"><span class="text-2xl text-white font-bold">YT</span></div>
                                <p class="mt-3 text-sm text-gray-600">YouTube</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Animations (unchanged) -->
    <style>
        .fade-in { animation: fadeIn 1.4s ease-out forwards; opacity: 0; }
        .animation-delay-500 { animation-delay: 0.5s; }
        .animation-delay-1000 { animation-delay: 1s; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .float { animation: float 6s ease-in-out infinite; }
        @keyframes float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-16px); } }
        .animate-blob { animation: blob 8s infinite; }
        @keyframes blob { 0%,100% { transform: translate(0px,0px) scale(1); } 33% { transform: translate(30px,-50px) scale(1.1); } 66% { transform: translate(-20px,30px) scale(0.9); } }
    </style>

</x-layouts.home-layout>