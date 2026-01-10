<?php
namespace App\Livewire\Course;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CourseManager extends Component
{
    use WithFileUploads;

    public $courses;
    public $showModal = false;

    // Form fields
    public $course_id;
    public $category_id;
    public $title;
    public $description;
    public $image_thumb;
    public $type = 'online';
    public $center_id;

    // 🚀 CORRECTLY PLACED LISTENERS ARRAY
    protected $listeners = [
        'course-updated' => '$refresh',
        'edit-course' => 'loadCourse',
        'openPostCourseModal' => 'openModal', // From post-course-button
        'categorySelected' => 'setCategory', // From category-search-select
        'centerSelected' => 'setCenter',     // From center-search-select
    ];
    
    public function mount()
    {
        $this->loadCourses();
    }

    // 🚀 GUARANTEES COURSES ARE LOADED WITH RELATIONSHIPS
public function loadCourses()
{
    $response = $this->api->withToken()->get('courses', ['uploader' => auth()->id() ?? 1]);
    $this->courses = $response['data'];
}

    public function getRules()
    {
        return [
            'category_id' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:100|unique:courses,title,' . $this->course_id,
            'description' => 'required|string',
            'type' => 'required|in:physical,online',
            'center_id' => $this->type === 'physical' ? 'required|integer|exists:centers,id' : 'nullable',
            'image_thumb' => 'nullable|image|max:1024',
        ];
    }

    public function openModal()
    {
        $this->resetForm();
        $this->showModal = true;
        $this->loadCourses(); // 💡 Defensive reload to prevent LazyLoadingViolation on re-render
    }

   public function loadCourse($courseId)
{
    $response = $this->api->withToken()->get("courses/{$courseId}");
    $course = $response['data'];

    $this->course_id = $course['id'];
    $this->category_id = $course['category_id'];
    $this->title = $course['title'];
    $this->description = $course['description'];
    $this->type = $course['type'];
    $this->center_id = $course['centers'][0]['id'] ?? null;
    $this->showModal = true;
}

  public function saveCourse()
{
    $this->validate();

    $data = [
        ['name' => 'category_id', 'contents' => $this->category_id],
        ['name' => 'title', 'contents' => $this->title],
        ['name' => 'description', 'contents' => $this->description],
        ['name' => 'type', 'contents' => $this->type],
    ];

    if ($this->type === 'physical' && $this->center_id) {
        $data[] = ['name' => 'center_id', 'contents' => $this->center_id];
    }

    if ($this->image_thumb) {
        $data[] = [
            'name' => 'image_thumb',
            'contents' => fopen($this->image_thumb->getRealPath(), 'r'),
            'filename' => $this->image_thumb->getClientOriginalName(),
        ];
    }

    $endpoint = $this->course_id ? "courses/{$this->course_id}" : 'courses';
    $method = $this->course_id ? 'put' : 'post';

    $this->api->withToken()->$method($endpoint, $data, true);

    $this->dispatch('success-notification', message: 'Course saved!');
    $this->showModal = false;
    $this->resetForm();
    $this->loadCourses();
}
public function deleteCourse($id)
{
    try {
        $this->api->withToken()->delete("courses/{$id}");

        $this->dispatch('success-notification', 
            message: 'Course deleted successfully.', 
            type: 'course'
        );

        $this->loadCourses(); // Refreshes list from API
    } catch (\Exception $e) {
        $this->dispatch('error-notification', 
            message: 'Failed to delete course. Please try again.'
        );
    }
}

    private function resetForm()
    {
        $this->reset(['course_id', 'category_id', 'title', 'description', 'image_thumb', 'type', 'center_id']);
        $this->type = 'online';
    }

    // 🚀 NEW: Setter methods for child search-select components
    public function setCategory($categoryId)
    {
        $this->category_id = $categoryId;
    }

    public function setCenter($centerId)
    {
        $this->center_id = $centerId;
    }

    public function render()
    {
        return view('livewire.course.course-manager');
    }
}