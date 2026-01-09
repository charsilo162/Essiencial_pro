{{-- Column 4: Subscribe Form --}}
<div>
    <h4 class="text-lg font-semibold mb-4">Subscribe</h4>
    
    @if ($message)
        <div class="text-green-400 mb-4">{{ $message }}</div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-4">
        <div>
            <input 
                type="text" 
                wire:model.defer="fullName" 
                placeholder="Full Name*" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-900" 
            />
            @error('fullName') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div>
            <input 
                type="email" 
                wire:model.defer="email" 
                placeholder="Your Email*" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-900" 
            />
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Send
        </button>
    </form>
</div>