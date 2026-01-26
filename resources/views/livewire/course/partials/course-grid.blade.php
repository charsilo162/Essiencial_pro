@if($courses->isEmpty())
    <div class="text-center text-gray-500 py-10">
        No {{ $type }} courses found.
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($courses as $course)
            @include('livewire.course.partials.course-card', compact('course'))
        @endforeach
    </div>

    <div class="mt-6">
        {{ $courses->links() }}
    </div>
@endif
