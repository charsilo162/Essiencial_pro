<div class="p-6">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">My Courses</h2>
    <button wire:click="$dispatch('openPostCourseModal')" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
      + Post New Course
    </button>
  </div>

  @if ($courses->isEmpty())
    <p class="text-gray-500">You haven’t created any courses yet.</p>
  @else
    <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-6">
      @foreach ($courses as $course)
        <x-course-card :course="$course" />
      @endforeach
    </div>
  @endif
  @include('livewire.partials.course-form-modal')
</div>
