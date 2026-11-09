<div class="min-h-screen flex items-center justify-center bg-white font-sans">

    <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 gap-10 px-6 py-10">

        <!-- LEFT SIDE — FORM -->
        <div class="space-y-6">

            <h2 class="text-3xl font-semibold text-gray-800">Create your account</h2>

            <form wire:submit.prevent="register" class="space-y-4" enctype="multipart/form-data">

                {{-- Name --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" wire:model="name"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">
                    @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" wire:model="email"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">
                    @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

             
          {{-- OPTIONAL PROFILE PHOTO --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Profile Photo (optional)</label>
                <input type="file" wire:model="photo" accept="image/*"
                    class="w-full text-sm border border-gray-300 rounded-lg px-3 py-2 bg-white">
                @error('photo') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- 📸 TEMPORARY IMAGE PREVIEW SECTION 📸 --}}
            @if ($photo)
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Image Preview</label>
                    <img 
                        src="{{ $photo->temporaryUrl() }}" 
                        class="w-32 h-32 object-cover rounded-full border-2 border-sky-400 shadow-md" 
                        alt="Profile Photo Preview"
                    >
                </div>
            @endif
{{-- Password --}}
<div class="relative" x-data="{ show: false }">
    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
    <input 
        :type="show ? 'text' : 'password'" 
        wire:model="password"
        class="w-full border border-gray-300 rounded-lg px-4 py-2 pr-12 focus:ring-2 focus:ring-sky-400 focus:outline-none"
    >
    
    <button 
        type="button"
        @click="show = !show"
        class="absolute right-3 top-[38px] text-gray-500 hover:text-sky-500 focus:outline-none"
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

    @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
</div>

{{-- Confirm Password --}}
<div class="relative" x-data="{ show: false }">
    <label class="block text-sm font-medium text-gray-700 mb-1">Re-type Password</label>
    <input 
        :type="show ? 'text' : 'password'" 
        wire:model="password_confirmation"
        class="w-full border border-gray-300 rounded-lg px-4 py-2 pr-12 focus:ring-2 focus:ring-sky-400 focus:outline-none"
    >
    
    <button 
        type="button"
        @click="show = !show"
        class="absolute right-3 top-[38px] text-gray-500 hover:text-sky-500 focus:outline-none"
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
</div>

                {{-- Phone --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                    <input type="text" wire:model="phone"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-sky-400 focus:outline-none">
                </div>

                {{-- Submit Button --}}
                <button type="submit"
                    class="w-full bg-sky-500 hover:bg-sky-600 text-white font-semibold py-2 rounded-lg transition disabled:opacity-60"
                    wire:loading.attr="disabled">

                    <span wire:loading.remove>Sign up</span>

                    <span wire:loading class="flex items-center justify-center gap-2">
                        <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4"></circle>
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

        <!-- RIGHT SIDE — STATIC BANNER IMAGE -->
        <div class="hidden md:flex items-center justify-center">
            <img src="{{ asset('storage/t4.jpg') }}"
                 class="w-full h-auto rounded-xl shadow-md object-cover" alt="Signup Banner">
        </div>

    </div>
</div>
 