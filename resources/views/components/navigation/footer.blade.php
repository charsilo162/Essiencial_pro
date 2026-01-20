<footer class="bg-gray-900 text-gray-300 mt-16">
    <!-- Top -->
    <div class="max-w-screen-xl mx-auto px-6 sm:px-8 py-14">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">

            <!-- Brand -->
            <div>
                <img
                    src="{{ asset('storage/logo.png') }}"
                    alt="Company Logo"
                    class="w-28 mb-4"
                />

                <p class="text-white text-lg font-semibold mb-3">
                    Smart Hiring Starts Here
                </p>

                <p class="text-sm leading-relaxed text-gray-400">
                    Connecting learners, centers, and opportunities through
                    modern digital education.
                </p>
            </div>

            <!-- Links -->
            <div>
                <h4 class="text-white text-sm font-semibold uppercase tracking-wide mb-4">
                    Useful Links
                </h4>

                <ul class="space-y-3 text-sm">
                    <li>
                        <a href="{{ route('homes') }}" class="hover:text-blue-400 transition">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about-us') }}" class="hover:text-blue-400 transition">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category.index') }}" class="hover:text-blue-400 transition">
                            Categories
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('faqs') }}" class="hover:text-blue-400 transition">
                            FAQs
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-white text-sm font-semibold uppercase tracking-wide mb-4">
                    Contact
                </h4>

                <p class="text-sm leading-relaxed text-gray-400">
                    3 Walker Street<br />
                    Edinburgh, EH3 7JY
                </p>

                <p class="text-sm mt-3">
                    <a href="mailto:support@example.com" class="hover:text-blue-400 transition">
                        support@example.com
                    </a>
                </p>
            </div>

            <!-- Social -->
            <div>
                <h4 class="text-white text-sm font-semibold uppercase tracking-wide mb-4">
                    Follow Us
                </h4>

                <div class="flex items-center gap-4">
                    <a href="#" class="hover:text-blue-400 transition">Twitter</a>
                    <a href="#" class="hover:text-blue-400 transition">LinkedIn</a>
                    <a href="#" class="hover:text-blue-400 transition">Facebook</a>
                </div>
            </div>

        </div>
    </div>

    <!-- Divider -->
    <div class="border-t border-gray-800"></div>

    <!-- Bottom -->
    <div class="max-w-screen-xl mx-auto px-6 sm:px-8 py-6 flex flex-col sm:flex-row items-center justify-between text-sm text-gray-500">
        <p>
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </p>
{{-- 
        <div class="flex gap-6 mt-4 sm:mt-0">
            <a href="#" class="hover:text-blue-400 transition">Privacy Policy</a>
            <a href="#" class="hover:text-blue-400 transition">Terms of Service</a>
        </div> --}}
    </div>
</footer>
