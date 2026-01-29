<div class="enrolled-courses-section p-4">

    {{-- Tabs --}}
    <div class="flex gap-6 mb-6 border-b border-gray-200">
        @foreach (['online', 'physical', 'hybrid'] as $tab)
            <button
                wire:click="setType('{{ $tab }}')"
                class="pb-2 border-b-2 font-medium transition
                    {{ $type === $tab
                        ? 'border-indigo-600 text-indigo-600'
                        : 'border-transparent text-gray-500 hover:text-gray-700'
                    }}"
            >
                {{ ucfirst($tab) }} Courses
            </button>
        @endforeach
    </div>
    @if (!empty($success))
<div x-data="{ show: true }" x-show="show"
     class="mb-4 flex items-start justify-between rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3">
    <span>{{ $success }}</span>
    <button @click="show = false" class="font-bold">×</button>
</div>
@endif
@if (!empty($error))
<div x-data="{ show: true }" x-show="show"
     class="mb-4 flex items-start justify-between rounded-lg bg-red-100 border border-red-300 text-red-700 px-4 py-3">
    <span>{{ $success}}</span>
    <button @click="show = false" class="font-bold">×</button>
</div>
@endif
    {{-- Search --}}
    <div class="flex justify-end mb-6">
        <input
            type="search"
            wire:model.debounce.300ms="search"
            placeholder="Search enrolled courses..."
            class="w-full md:w-1/3 px-4 py-2 border rounded-md"
        />
    </div>

    {{-- Courses --}}
    @include('livewire.course.partials.course-grid', ['courses' => $courses])

</div>
