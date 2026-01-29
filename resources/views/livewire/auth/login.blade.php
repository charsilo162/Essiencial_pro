<div>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-sky-100 via-white to-sky-50 relative overflow-hidden font-sans px-4 py-8">

        <div class="absolute top-0 left-0 w-72 h-72 bg-sky-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float -z-10"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float animation-delay-2000 -z-10"></div>

        <div class="relative z-10 w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">
            
            <div class="flex flex-col justify-center px-6 py-10 sm:px-10 md:py-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-3">Welcome back!</h2>
                <p class="text-gray-500 mb-8">Sign in to access your courses and continue learning anytime, anywhere.</p>
                
                @if(session('success'))
                    <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit.prevent="login" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email or Username</label>
                        <input type="text" wire:model="email" placeholder="you@example.com"
                            class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:ring-2 focus:ring-sky-400 focus:border-sky-400 transition-shadow duration-300 shadow-sm"
                        >
                        @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" wire:model="password" placeholder="••••••••"
                            class="w-full rounded-xl border border-gray-200 px-4 py-3 focus:ring-2 focus:ring-sky-400 focus:border-sky-400 transition-shadow duration-300 shadow-sm"
                        >
                        @error('password') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit"
                        class="w-full py-3.5 rounded-xl bg-gradient-to-r from-sky-500 to-indigo-500 hover:from-indigo-500 hover:to-sky-500 text-white font-semibold transition-all duration-300 shadow-lg hover:shadow-xl flex justify-center items-center active:scale-[0.98]"
                        wire:loading.attr="disabled">
                        <span wire:loading.remove>Login</span>
                        <span wire:loading>Logging in...</span>
                    </button>

                    <div class="text-right">
                        <a href="{{ route('password.request') }}"
                        class="text-sm font-medium text-sky-600 hover:text-indigo-600 transition-colors py-2 px-1">
                            Forgot password?
                        </a>
                    </div>

                    <div class="text-center mt-6 text-gray-500 text-sm">
                        Don't have an account? 
                        <a href="{{ route('registers') }}" class="text-indigo-600 hover:underline font-semibold p-2">
                            Sign up
                        </a>
                    </div>
                </form>
            </div>

            <div class="hidden md:flex items-center justify-center bg-sky-50 p-8">
                <img src="{{ asset('storage/p1.jpg') }}" 
                     class="max-w-xs md:max-w-sm lg:max-w-md object-contain rounded-xl shadow-lg animate-fadeIn">
            </div>
        </div>
    </div>

    <style>
    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-20px); }
    }
    .animate-float { animation: float 6s ease-in-out infinite; }
    .animation-delay-2000 { animation-delay: 2s; }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn { animation: fadeIn 1s ease forwards; }
    </style>
</div>