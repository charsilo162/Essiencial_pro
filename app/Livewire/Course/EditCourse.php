<?php
namespace App\Livewire\Course;

use App\Services\ApiService;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCourse extends Component
{
    use WithFileUploads;
    public $course = [];
    public $courseId; // To load via API
    public $category_id;
    public $title;
    public $description;
    public $image_thumb;
    public $type = 'online';
    public $center_id = null;
    public $publish = false;
    public $showModal = false;

    protected $listeners = [
        'openEditCourseModal' => 'openModal',
        'categorySelected' => 'setCategory',
        'centerSelected' => 'setCenter',
    ];

    protected $api;

    public function boot()
    {
        $this->api = new ApiService();
    }

 public function openModal($courseId)
{
    $this->courseId = $courseId;

    // Use the dedicated edit route — always ID
    $response = $this->api->get("courses/{$courseId}/edit");

    $course = $response['data'] ?? $response;
    // dd($course); // Remove this after testing

    $this->fill([
        'category_id' => $course['category']['id'] ?? null,  // <-- Fixed: Access nested 'category.id'
        'title'       => $course['title'] ?? '',
        'description' => $course['description'] ?? '',
        'type'        => $course['type'] ?? 'online',
        'center_id'   => data_get($course, 'centers.0.id'),
        'publish'     => $course['publish'] ?? false,
    ]);
    $this->course = $course;
    $this->image_thumb = null;
    $this->resetErrorBag();
    $this->showModal = true;

    $this->dispatch('open-edit-course-modal');
}

    public function updatedType($value)
    {
        if ($value === 'online') {
            $this->center_id = null;
        }
    }

    public function getRules()
    {
        return [
            'category_id' => 'required|integer',
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'type' => 'required|in:physical,online',
            'center_id' => $this->type === 'physical' ? 'required|integer' : 'nullable',
            'publish' => 'boolean',
            'image_thumb' => 'nullable|image|max:1024',
        ];
    }

    public function setCategory($categoryId)
    {
        $this->category_id = $categoryId;
    }

    public function setCenter($centerId)
    {
        $this->center_id = $centerId;
    }
public function updateCourse()
{
    // 1. Validate the input fields
    $this->validate($this->getRules());

    // 2. Build form data: All fields will be sent as multipart form parts
    $formData = [
        ['name' => '_method', 'contents' => 'PUT'], 
        ['name' => 'category_id', 'contents' => $this->category_id],
        ['name' => 'title',       'contents' => $this->title],
        ['name' => 'description', 'contents' => $this->description],
        ['name' => 'type',        'contents' => $this->type],
        ['name' => 'publish',     'contents' => $this->publish ? 1 : 0],
    ];

    if ($this->type === 'physical' && $this->center_id) {
        $formData[] = ['name' => 'center_id', 'contents' => $this->center_id];
    }

    if ($this->image_thumb) {
        $formData[] = [
            'name'     => 'image_thumb',
            'contents' => fopen($this->image_thumb->getRealPath(), 'r'),
            'filename' => $this->image_thumb->getClientOriginalName(),
        ];
    }

    \Log::info('Sending update data (POST with _method=PUT):', $formData);

    // 3. Send the request
    $response = $this->api->postWithFile("courses/{$this->courseId}/update", $formData);

    // 4. Handle 422 or other errors gracefully
    if (!empty($response['error'])) {
        $this->dispatch('error-notification', message: $response['message'] ?? 'Update failed');
        return; // stop execution
    }

    // 5. Handle success
    $this->showModal = false;
    $this->dispatch('success-notification', message: 'Course updated successfully!');
    $this->reset();
}

    public function render()
    {
        return view('livewire.course.edit-course');
    }
}