<div x-data="{ open: @entangle('showModal') }"
     x-show="open"
     class="fixed inset-0 z-50 overflow-y-auto overscroll-contain"
     style="display: none;"
     x-transition.duration.300ms>

    <!-- Dark overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity z-40"></div>

    <!-- Modal container -->
    <div class="relative z-50 flex items-center justify-center min-h-screen px-4 text-center">

        <!-- Modal Gradient Border Wrapper -->
        <div class="inline-block w-full max-w-lg bg-gradient-to-r from-orange-500 via-yellow-400 to-blue-500 p-[2px] rounded-xl shadow-2xl">

            <!-- Modal box -->
            <div class="bg-white rounded-xl text-left overflow-y-auto max-h-[90vh] transform transition-all">

                <form wire:submit.prevent="{{ $submitAction }}">
                    
                    <!-- Header -->
                 
                    <div class="px-6 py-5 bg-gradient-to-r from-orange-500 via-yellow-400 to-blue-500 rounded-t-xl">
                        <h3 class="text-xl font-bold text-white flex items-center gap-2">
                            {{ $title }}
                        </h3>
                        <p class="text-sm text-white/90 mt-1">
                            Please complete the form below
                        </p>
                    </div>


                    <!-- Body -->
                    <div class="px-6 py-4 space-y-4">
                        {{ $slot }}
                    </div>

                    <!-- Footer -->
                    <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 border-t border-gray-100">

                            <button type="button"
                                wire:click="$set('showModal', false)"
                                wire:loading.attr="disabled"
                                class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition disabled:opacity-50">
                                Cancel
                            </button>

                            <button type="submit"
                                wire:loading.attr="disabled"
                                wire:target="{{ $submitAction }}"
                                class="relative px-5 py-2 rounded-lg bg-gradient-to-r from-orange-500 via-yellow-400 to-blue-500 text-white font-semibold shadow-md hover:opacity-90 transition transform hover:scale-[1.02] disabled:opacity-70 disabled:cursor-not-allowed disabled:scale-100">
                                
                                <span wire:loading.remove wire:target="{{ $submitAction }}">
                                    {{ $submitButtonText ?? 'Submit' }}
                                </span>

                                <span wire:loading wire:target="{{ $submitAction }}" class="flex items-center gap-2">
                                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Processing...
                                </span>
                            </button>
                        </div>
                </form>

            </div>
        </div>
    </div>
</div>
