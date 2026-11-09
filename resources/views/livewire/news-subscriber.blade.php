<div>
    <p class="text-xs text-slate-400 mb-3 leading-relaxed">
        Subscribe to get our latest course updates and academic announcements.
    </p>

    <form wire:submit.prevent="submitSubscription" class="space-y-2">
        <div class="relative">
            <input 
                type="email" 
                wire:model="email" 
                placeholder="Your email address" 
                class="w-full text-sm px-3 py-2 bg-slate-800 border border-slate-700 rounded-md focus:outline-none focus:border-blue-500 text-white placeholder-slate-500 transition-colors @error('email') border-red-500 @enderror"
            >
        </div>

        <button 
            type="submit" 
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm py-2 px-3 rounded-md transition duration-150 flex items-center justify-center gap-1 disabled:opacity-50"
            wire:loading.attr="disabled"
        >
            <span wire:loading.remove>Subscribe</span>
            <span wire:loading>Processing...</span>
        </button>
    </form>

    @if ($status === 'success')
        <div class="mt-3 p-2.5 bg-green-950/50 border border-green-800 text-green-400 rounded-md text-xs">
            {{ $message }}
        </div>
    @elseif ($status === 'error')
        <div class="mt-3 p-2.5 bg-red-950/50 border border-red-900 text-red-400 rounded-md text-xs">
            {{ $message }}
        </div>
    @endif
</div>