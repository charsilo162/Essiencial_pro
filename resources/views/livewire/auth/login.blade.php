<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-sky-100 via-indigo-100 to-white overflow-hidden">

    <!-- Animated Glow Background -->
    <div class="absolute top-20 left-10 w-48 h-48 bg-sky-300 opacity-20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-10 w-56 h-56 bg-indigo-400 opacity-20 rounded-full blur-3xl"></div>

    <!-- Main Auth Card -->
    <div class="relative w-full max-w-5xl grid grid-cols-1 md:grid-cols-2 bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-100">

        <!-- Left Form Section -->
        <div class="flex flex-col justify-center px-8 py-12 md:px-12 bg-white">
            
            <h2 class="text-3xl font-extrabold text-gray-800 mb-4">Welcome Back 👋</h2>

            <p class="text-gray-600 mb-8 text-sm leading-relaxed">
                Log in to continue your learning journey and access your course dashboard.
           
           
            </p>
       @if(session('error'))
    <div style="background: #f8d7da; color: #842029; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div style="background: #d1e7dd; color: #0f5132; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
        {{ session('success') }}
    </div>
@endif
            <form wire:submit.prevent="login" class="space-y-6">
                
                <!-- Email -->
                <div class="relative">
                    <input 
                        type="text"
                        wire:model="email"
                        class="peer w-full border border-gray-300 rounded-lg px-4 py-3 bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                        placeholder=" "
                    />
                    <label class="absolute left-4 top-3 text-gray-500 text-sm transition-all 
                          peer-placeholder-shown:top-3
                          peer-placeholder-shown:text-gray-400 
                          peer-focus:top-[-8px] 
                          peer-focus:text-xs 
                          peer-focus:text-indigo-600 bg-white px-1">
                        Email or Username
                    </label>
                       @error('email')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
                </div>

                <!-- Password -->
        <div class="relative" x-data="{ show: false }">
    <input 
        :type="show ? 'text' : 'password'"
        wire:model="password"
        class="peer w-full border border-gray-300 rounded-lg px-4 py-3 pr-12 bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
        placeholder=" "
    />
    <label class="absolute left-4 top-3 text-gray-500 text-sm transition-all 
          peer-placeholder-shown:top-3
          peer-placeholder-shown:text-gray-400
          peer-focus:top-[-8px] 
          peer-focus:text-xs 
          peer-focus:text-indigo-600 bg-white px-1">
        Password
    </label>

    <!-- Toggle Button -->
    <button 
        type="button"
        @click="show = !show"
        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-indigo-600 focus:outline-none"
    >
        <!-- Eye (show) -->
        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>

        <!-- Eye Slash (hide) -->
        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
        </svg>
    </button>

    @error('password')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

                <!-- Button -->
                <button 
                    type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-lg font-semibold shadow-md transition-all duration-300"
                    wire:loading.attr="disabled"
                >
                    <span wire:loading.remove>Login</span>
                    <span wire:loading>Authenticating...</span>
                </button>

                <!-- Link -->
                <p class="text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('signups') }}" class="font-semibold text-indigo-600 hover:text-indigo-700">Sign up</a>
                </p>
                                    <div class="text-right">
                        <a href="{{ route('password.request') }}"
                        class="text-sm text-gray-600 hover:text-black">
                            Forgot password?
                        </a>
                    </div>

            </form>

        </div>

        <!-- Right Illustration -->
        <div class="hidden md:flex items-center justify-center bg-gradient-to-br from-indigo-600 to-sky-500 p-6">
            <img 
                src="{{ asset('storage/img1.png') }}" 
                class="w-72 max-w-full object-contain drop-shadow-2xl"
            >
        </div>

    </div>

</div>
