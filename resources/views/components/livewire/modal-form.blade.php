{{-- Reusable Livewire Modal Form --}}
<div
    x-data="{ open: @entangle('showModal') }"
    x-show="open"
    x-cloak
    @keydown.escape.window="open = false"
    x-transition.opacity
    class="fixed inset-0 z-[9999]"
>

    {{-- Backdrop --}}
    <div
        class="absolute inset-0 bg-black/50 backdrop-blur-sm"
        @click="open = false"
    ></div>

    {{-- Modal Container --}}
    <div class="relative flex min-h-screen items-center justify-center px-4 py-6">
        <div
            class="relative z-[10000] w-full max-w-xl
                   rounded-xl bg-white
                   border border-gray-300
                   shadow-[0_20px_40px_-15px_rgba(0,0,0,0.35)]"
            x-transition.scale.origin.center
        >

            <form wire:submit.prevent="{{ $submitAction }}" class="flex flex-col">

                {{-- HEADER --}}
                <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ $title }}
                        </h3>

                        @isset($description)
                            <p class="mt-1 text-sm text-gray-500">
                                {{ $description }}
                            </p>
                        @endisset
                    </div>

                    <button
                        type="button"
                        @click="open = false"
                        class="rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-700
                               focus:outline-none focus:ring-2 focus:ring-black"
                    >
                        ✕
                    </button>
                </div>

                {{-- BODY --}}
                <div class="px-6 py-6 space-y-6">
                    {{ $slot }}
                </div>

                {{-- FOOTER --}}
                <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3
                            border-t border-gray-200 bg-gray-50 px-6 py-4">

                    <button
                        type="button"
                        wire:click="$set('showModal', false)"
                        class="inline-flex justify-center rounded-md
                               border border-gray-300 bg-white
                               px-5 py-3 text-base font-medium text-gray-700
                               hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-black"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="inline-flex justify-center rounded-md
                               bg-black px-6 py-3
                               text-base font-medium text-white
                               hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black"
                    >
                        {{ $submitButtonText ?? 'Save' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
