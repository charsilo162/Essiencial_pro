@if(session('user'))
<div x-data="{ open: false, loggingOut: false }" class="relative">

    <button
        @click="open = !open"
        @click.outside="open = false"
        class="flex items-center gap-3 px-5 py-2 rounded-full
               bg-white/10 border border-white/20
               text-white text-sm font-medium
               hover:bg-white/20 transition"
    >
        <span class="truncate max-w-32">
            {{ session('user.name') }}
        </span>

        <svg class="w-4 h-4 transition-transform"
             :class="{ 'rotate-180': open }"
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                  d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <div
        x-show="open"
        x-transition
        class="absolute right-0 mt-3 w-56 rounded-xl shadow-xl
               bg-white ring-1 ring-black/10 overflow-hidden"
    >
        <div class="py-2 text-sm">

            @if(in_array(session('user.role') ?? session('user.type') ?? '', ['admin','instructor']))
                <a href="{{ route('profile2') }}"
                   class="block px-5 py-3 text-gray-700 hover:bg-gray-100">
                    Admin Panel
                </a>
            @endif

            @if((session('user.role') ?? session('user.type') ?? '') !== 'admin')
                <a href="{{ route('profile2') }}"
                   class="block px-5 py-3 text-gray-700 hover:bg-gray-100">
                    User Panel
                </a>
            @endif

            <button
                @click="loggingOut = true; $nextTick(() => {
                    fetch('{{ url('/api/logout') }}', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer {{ session('api_token') }}',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    }).finally(() => window.location = '/clear-session')
                })"
                :disabled="loggingOut"
                class="w-full text-left px-5 py-3 text-red-600 hover:bg-red-50
                       flex items-center gap-2 transition"
            >
                <span x-show="!loggingOut">Log Out</span>
                <span x-show="loggingOut" class="flex items-center gap-2">
                    <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8v8z"/>
                    </svg>
                    Logging out...
                </span>
            </button>
        </div>
    </div>
</div>
@else
<div class="flex items-center gap-3">
    <a href="{{ route('logins') }}"
       class="px-5 py-2 rounded-full bg-white/10 border border-white/20
              text-white text-sm hover:bg-white/20 transition">
        Login
    </a>

    <a href="{{ route('signups') }}"
       class="px-6 py-2 rounded-full bg-white font-bold text-sm
              text-gradient shadow hover:shadow-lg transition">
        Sign Up
    </a>
</div>
@endif
