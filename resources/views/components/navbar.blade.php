<nav class="bg-gradient-to-r from-[#6A3318] via-[#661437] to-[#6A4E0F]
            shadow-md py-4 px-4 md:px-6 flex justify-between items-center sticky top-0 z-50">

    {{-- Left: Logo --}}
    <div class="flex items-center">
        <img src="https://via.placeholder.com/40"
             class="w-10 h-10 rounded-full shadow-sm"
             alt="Logo" />
    </div>

    {{-- Center Links (Desktop) --}}
    <div class="hidden md:flex items-center space-x-6 text-white font-semibold mx-auto">
        {{-- <a class="hover:text-blue-600 transition" href="{{ route('home') }}">Home</a> --}}
        <a class="hover:text-blue-600 transition" href="{{ route('category.index') }}">Category</a>
        <a class="hover:text-blue-600 transition" href="{{ route('about-us') }}">About Us</a>
        <a class="hover:text-blue-600 transition" href="{{ route('contact_us') }}">Contact Us</a>
    </div>

    {{-- Right Side Auth Section --}}
    <div class="hidden md:flex items-center">

        @if(session('user'))
            {{-- USER DROPDOWN --}}
            <div x-data="{ open:false }" class="relative">
                <button @click="open=!open" @click.outside="open=false"
                        class="inline-flex items-center gap-x-2 text-sm font-medium rounded-full bg-gray-100 text-gray-800 hover:bg-gray-200 p-2">
                    {{ session('user.name') }}
                    <svg class="w-4 h-4 transition-transform" :class="{'rotate-180':open}">
                        <path fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"
                              d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="open" x-transition x-cloak
                     class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 z-50">

                    <div class="py-1">

                        @if((session('user.role') ?? session('user.type') ?? '') !== 'user')
                            <a href="{{ route('profile2') }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Admin Panel
                            </a>
                        @endif

                        {{-- LOGOUT --}}
                        <a href="#" onclick="
                            event.preventDefault();
                            fetch('{{ env('API_URL', 'http://127.0.0.1:8001') }}/api/logout', {
                                method: 'POST',
                                headers: {
                                    'Authorization': 'Bearer {{ session('api_token') }}',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                }
                            })
                            .finally(() => window.location='/clear-session');
                        " class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Log Out
                        </a>

                    </div>
                </div>
            </div>

        @else
            {{-- GUEST BUTTONS --}}
            <div class="flex items-center space-x-3">
                <a href="{{ route('signups') }}"
                   class="text-gray-800 font-semibold hover:text-blue-600 transition">
                    Register
                </a>

                <a href="{{ route('logins') }}"
                   class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600 transition shadow-md font-semibold">
                    Log In
                </a>
            </div>
        @endif

    </div>

    {{-- Mobile Menu Button --}}
    <div class="md:hidden flex items-center">
        <button id="mobile-menu-button" class="text-gray-800 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

</nav>


{{-- Mobile Dropdown --}}
<div id="mobile-menu" class="md:hidden hidden bg-white shadow-md px-4 py-6">

    <div class="flex flex-col space-y-4 text-gray-800 font-semibold">

        {{-- <a class="hover:text-blue-600 transition" href="{{ route('home') }}">Home</a> --}}
        <a class="hover:text-blue-600 transition" href="{{ route('category.index') }}">Category</a>
        <a class="hover:text-blue-600 transition" href="{{ route('about-us') }}">About Us</a>
        <a class="hover:text-blue-600 transition" href="{{ route('contact_us') }}">Contact Us</a>

        <hr class="my-2 border-gray-200">

        @if(session('user'))
            <span class="text-gray-600 text-sm">Logged in as <b>{{ session('user.name') }}</b></span>

            @if((session('user.role') ?? session('user.type') ?? '') !== 'user')
                <a href="{{ route('profile') }}" class="hover:text-blue-600">Admin Panel</a>
            @endif

            <a href="#" onclick="
                event.preventDefault();
                fetch('{{ env('API_URL', 'http://127.0.0.1:8001') }}/api/logout', {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer {{ session('api_token') }}',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .finally(() => window.location='/clear-session');
            " class="bg-red-500 text-white px-6 py-2 rounded-full hover:bg-red-600 shadow text-center">
                Log Out
            </a>
        @else
            <a href="{{ route('signups') }}" class="hover:text-blue-600">Register</a>
            <a href="{{ route('logins') }}"
               class="bg-orange-500 text-white px-6 py-2 rounded-full hover:bg-orange-600 shadow text-center">
                Log In
            </a>
        @endif
    </div>

</div>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function () {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
