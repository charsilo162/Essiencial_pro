<x-layouts.dashboard title="My Courses">

    <div class="container mx-auto py-8">

        {{-- Tabs --}}
        <div class="mb-6 border-b border-gray-200">
            <nav class="flex gap-6">
                <button
                    wire:click="$set('type', 'online')"
                    class="pb-2 border-b-2 font-medium"
                >
                    Online
                </button>

                <button
                    wire:click="$set('type', 'physical')"
                    class="pb-2 border-b-2 font-medium"
                >
                    Physical
                </button>

                <button
                    wire:click="$set('type', 'hybrid')"
                    class="pb-2 border-b-2 font-medium"
                >
                    Hybrid
                </button>
            </nav>
        </div>

        {{-- Single Livewire Instance --}}
        <livewire:course.enrolled-courses />

    </div>

    <livewire:course.random-courses />

</x-layouts.dashboard>
