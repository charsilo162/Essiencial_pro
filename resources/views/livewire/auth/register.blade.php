<div class="min-h-screen flex items-center justify-center bg-white font-sans">

    <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 items-center gap-10 px-6 py-10">
        
        <!-- Left Side – Form -->
        <div class="space-y-5">
            <h2 class="text-3xl font-semibold text-gray-800">Create your account</h2>

            <form wire:submit.prevent="register" class="space-y-4">

                {{-- Name --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" wire:model="name"
                        class="w-full border border-gray-200 rounded-lg px-4 py-2 
                               focus:ring-2 focus:ring-sky-400 focus:outline-none">
                    @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" wire:model="email"
                        class="w-full border border-gray-200 rounded-lg px-4 py-2 
                               focus:ring-2 focus:ring-sky-400 focus:outline-none">
                    @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" wire:model="password"
                        class="w-full border border-gray-200 rounded-lg px-4 py-2 
                               focus:ring-2 focus:ring-sky-400 focus:outline-none">
                    @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Re type Password</label>
                    <input type="password" wire:model="password_confirmation"
                        class="w-full border border-gray-200 rounded-lg px-4 py-2 
                               focus:ring-2 focus:ring-sky-400 focus:outline-none">
                </div>

                {{-- Phone (OPTIONAL — REMOVE if API doesn’t need it) --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone no</label>
                    <input type="text" wire:model="phone"
                        class="w-full border border-gray-200 rounded-lg px-4 py-2 
                               focus:ring-2 focus:ring-sky-400 focus:outline-none">
                </div>

                {{-- Submit --}}
            <button type="submit"
    class="w-full bg-sky-400 hover:bg-sky-500 text-white font-semibold py-2 rounded-lg transition disabled:opacity-60"
    wire:loading.attr="disabled">

    <span wire:loading.remove>Sign up</span>

    <span wire:loading class="flex items-center justify-center gap-2">
        <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 100 16v-4l-3 3 3 3v-4a8 8 0 01-8-8z">
            </path>
        </svg>
        Processing...
    </span>

</button>


                <p class="text-sm text-gray-600 text-center">
                    Already have an account?
                    <a href="{{ route('logins') }}" class="text-sky-500 hover:underline">Sign in</a>
                </p>
            </form>
        </div>

        <!-- Right Side – Image + Role Selection -->
        <div class="flex flex-col items-center space-y-5">

            <!-- Profile Image Placeholder -->
            <div class="relative">
                <img src="{{ asset('storage/img3.png') }}" alt="Profile"
                     class="w-40 h-40 object-cover rounded-md border">

                <button type="button"
                    class="absolute inset-0 flex items-center justify-center bg-black/40 rounded-md text-white opacity-0 hover:opacity-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 7h2l2-3h10l2 3h2a2 2 0 012 2v11a2 2 0 01-2 2H3a2 2 0 01-2-2V9a2 2 0 012-2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 11a3 3 0 100 6 3 3 0 000-6z" />
                    </svg>
                </button>
            </div>

            <p class="text-gray-700 font-medium text-center">What are you registering as</p>

            <!-- Role selection buttons -->
            <div class="flex gap-3">

                <button type="button"
                    wire:click="$set('type','user')"
                    class="px-5 py-2 rounded-full border 
                           {{ $type === 'user' ? 'bg-sky-400 text-white shadow-md' : 'border-sky-400 text-sky-500 hover:bg-sky-50' }}">
                    User
                </button>

                <button type="button"
                    wire:click="$set('type','center')"
                    class="px-5 py-2 rounded-full border 
                           {{ $type === 'center' ? 'bg-sky-400 text-white shadow-md' : 'border-sky-400 text-sky-500 hover:bg-sky-50' }}">
                    Center
                </button>

                <button type="button"
                    wire:click="$set('type','tutor')"
                    class="px-5 py-2 rounded-full border 
                           {{ $type === 'tutor' ? 'bg-sky-400 text-white shadow-md' : 'border-sky-400 text-sky-500 hover:bg-sky-50' }}">
                    Trainer
                </button>

            </div>
        </div>
    </div>
</div>
