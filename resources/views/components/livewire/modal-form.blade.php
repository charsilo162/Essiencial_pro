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

                        <!-- Cancel button -->
                        <button type="button"
                            wire:click="$set('showModal', false)"
                            class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                            Cancel
                        </button>

                        <!-- Submit button (Gradient) -->
                        <button type="submit"
                            class="px-5 py-2 rounded-lg bg-gradient-to-r from-orange-500 via-yellow-400 to-blue-500 text-white font-semibold shadow-md hover:opacity-90 transition transform hover:scale-[1.02]">
                            {{ $submitButtonText ?? 'Submit' }}
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
