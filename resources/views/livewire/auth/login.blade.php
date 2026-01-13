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
                <div class="relative">
                    <input 
                        type="password"
                        wire:model="password"
                        class="peer w-full border border-gray-300 rounded-lg px-4 py-3 bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
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
