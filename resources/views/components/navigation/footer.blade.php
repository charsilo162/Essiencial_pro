<footer class="bg-gray-900 text-gray-200 py-6 mt-16">
    <div class="max-w-screen-xl mx-auto px-6 sm:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Logo & Tagline -->
            <div>
                <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="w-20 mb-2" />
                <p class="text-sm font-medium">Smart Learning and enhance your skills!!</p>
            </div>

            <!-- Useful Links -->
            <div>
                <h4 class="text-sm font-semibold mb-2">Useful Links</h4>
                <ul class="space-y-1 text-xs">
                    <li>
                        <a href="{{ route('category.index') }}" class="hover:text-blue-400 transition-colors">Category</a>
                    </li>
                    <li>
                        <a href="{{ route('about-us') }}" class="hover:text-blue-400 transition-colors">About US</a>
                    </li>
                    <li>
                        <a href="{{ route('contact_us') }}" class="hover:text-blue-400 transition-colors">Contact Us</a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-sm font-semibold mb-2">Contact</h4>
                <p class="text-xs">3 Walker Street, Edinburgh, EH3 7JY</p>
                <p class="text-xs mt-1">Email: info@example.com</p>
                <p class="text-xs mt-1">Phone: +44 1234 567890</p>
            </div>

            <!-- Premium / Modal Section -->
            {{-- <div class="flex flex-col space-y-2">
                <h4 class="text-sm font-semibold mb-2">Premium Access</h4>
                <button 
                    class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium py-2 px-4 rounded transition"
                    onclick="openPremiumModal()"
                >
                    Upgrade Now
                </button>
                <button 
                    class="bg-gray-700 hover:bg-gray-600 text-white text-xs font-medium py-2 px-4 rounded transition"
                    onclick="openModal('newsletter')"
                >
                    Subscribe
                </button>
            </div> --}}

        </div>

        <!-- Optional copyright -->
        <div class="mt-6 text-center text-xs text-gray-500">
            &copy; {{ date('Y') }} Essencial. All rights reserved.
        </div>
    </div>
</footer>

{{-- <script>
    function openPremiumModal() {
        // trigger your premium modal here
        console.log('Open Premium Modal');
    }
    function openModal(type) {
        console.log('Open Modal:', type);
    }
</script> --}}
