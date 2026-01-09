@if (session('user'))
    <div x-data="{ open: false }" class="relative">
        <button
            @click="open = !open"
            class="flex items-center gap-2 text-sm bg-slate-800 text-white
                   rounded-full px-3 py-2 hover:bg-slate-700 focus:outline-none"
        >
            {{ session('user.name') }}

            <svg class="w-4 h-4 transition-transform"
                 :class="{ 'rotate-180': open }"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <div
            x-show="open"
            x-transition
            x-cloak
            class="absolute right-0 mt-2 w-48 bg-slate-800 text-white
                   rounded-lg shadow-lg z-50"
        >
            <a href="{{ route('profile2') }}"
               class="block px-4 py-2 text-sm hover:bg-slate-700">
                Dashboard
            </a>

            <a href="#"
               onclick="event.preventDefault(); logoutUser();"
               class="block px-4 py-2 text-sm hover:bg-slate-700">
                Log Out
            </a>
        </div>
    </div>
@else
    <div class="flex items-center gap-2">
        <a href="{{ route('logins') }}"
           class="px-4 py-2 text-sm rounded bg-slate-800 text-white hover:bg-slate-700">
            Login
        </a>

        <a href="{{ route('registers') }}"
           class="px-4 py-2 text-sm rounded bg-sky-500 text-white hover:bg-sky-600">
            Sign Up
        </a>
    </div>
@endif

<script>
function logoutUser() {
    fetch('http://127.0.0.1:8001/api/logout', {
        method: 'POST',
        headers: {
            'Authorization': 'Bearer {{ session('api_token') }}',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    }).finally(() => {
        window.location = '/clear-session';
    });
}
</script>
