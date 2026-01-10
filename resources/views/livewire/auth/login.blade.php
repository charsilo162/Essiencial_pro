<div>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-sky-100 via-white to-sky-50 relative overflow-hidden font-sans px-4">

    <!-- Floating shapes -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-sky-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float animation-delay-2000"></div>

    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">
        
        <!-- Left: Form -->
        <div class="flex flex-col justify-center px-8 py-12 md:py-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-3">Welcome back!</h2>
            <p class="text-gray-500 mb-8">Sign in to access your courses and continue learning anytime, anywhere.</p>

            <form wire:submit.prevent="login" class="space-y-6">
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
                    class="w-full py-3 rounded-xl bg-gradient-to-r from-sky-500 to-indigo-500 hover:from-indigo-500 hover:to-sky-500 text-white font-semibold transition-all duration-300 shadow-lg hover:shadow-xl flex justify-center items-center"
                    wire:loading.attr="disabled">
                    <span wire:loading.remove>Login</span>
                    <span wire:loading>Logging in...</span>
                </button>

                <div class="text-center mt-4 text-gray-500 text-sm">
                    Don't have an account? 
                    <a href="{{ route('registers') }}" class="text-indigo-500 hover:underline font-medium">Sign up</a>
                </div>
            </form>
        </div>

        <!-- Right: Illustration -->
        <div class="hidden md:flex items-center justify-center bg-sky-50">
            <img src="{{ asset('storage/img1.png') }}" 
                 class="max-w-xs md:max-w-sm lg:max-w-md object-contain rounded-xl shadow-lg animate-fadeIn">
        </div>
    </div>
</div>

<!-- Tailwind Animations -->
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