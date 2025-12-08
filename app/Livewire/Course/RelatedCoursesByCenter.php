<?php
namespace App\Livewire\Course;
use App\Models\Course; // We need the Course model now
use App\Services\ApiService;
use Livewire\Component;

class RelatedCoursesByCenter extends Component
{
    // The ID you pass from the parent view (the Center's ID)
    public int $centerId; 
   protected $api;

    public function boot()
    {
        $this->api = new ApiService();
    }

    public function mount(int $centerId)
    {
        $this->centerId = $centerId;
    }

  // app/Livewire/Course/RelatedCoursesByCenter.php
public function render()
{
    $response = $this->api->get('courses', [
        'center_id' => $this->centerId,
        'limit' => 6,
    ]);

    $courses = $response['data'];

    return view('livewire.course.related-courses-by-center', [
        'courses' => $courses,
        'title' => 'Courses Offered by This Center',
        'showSearch' => false,
        'showSeeAll' => true,
    ]);
}
}