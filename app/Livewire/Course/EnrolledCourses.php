<?php
namespace App\Livewire\Course;
use Livewire\Component;
use Livewire\WithPagination; // 1. Use the Pagination Trait
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Video;

class EnrolledCourses extends Component
{
    use WithPagination;
    
    // Public property for the search input
    public $search = '';

    // Pagination-related: Resets the page when the search term changes
    public function updatedSearch()
    {
        $this->resetPage();
    }

    /**
    
     * @param Course $course
     * @return Video|null
     */
    public function getFirstCourseVideo(Course $course)
    {
        // Check if the relationship is loaded, otherwise lazy load
        if ($course->relationLoaded('videos')) {
            return $course->videos->sortBy('order_index')->first();
        }
        // Fallback for safety, though eager loading is better
        return $course->videos()->orderBy('order_index', 'asc')->first();
    }
    
    /**
     * Render method to fetch the filtered and paginated data.
     */
   public function render()
{
    $params = ['paginate' => true];
    if ($this->search) {
        $params['search'] = $this->search;
    }

    $response = $this->api->withToken()->get('users/me/enrolled-courses', $params);
    $courses = $response;

    return view('livewire.course.enrolled-courses', [
        'courses' => $courses,
    ]);
}
}