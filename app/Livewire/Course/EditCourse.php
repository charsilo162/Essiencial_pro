<?php

namespace App\Livewire\Course;

use App\Services\ApiService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class EditCourse extends Component
{
    use WithFileUploads;

    public $courseId, $category_id, $title, $description, $image_thumb;
    public $type = 'online', $price_amount, $center_id = null, $publish = false;
    public $showModal = false;
    public $current_image_url;

    protected $api;

    public function boot() {
        $this->api = new ApiService();
    }

    public function mount() 
    {
        // Do nothing here. 
        // The data will be filled by the openModal($courseId) listener.
    }

    // Listeners for Child components
    #[On('categorySelected')]
    public function setCategory($categoryId) {  // <-- Changed $id to $categoryId
        $this->category_id = $categoryId;     // <-- Updated to use $categoryId
    }

    #[On('centerSelected')]
    public function setCenter($centerId) {    // <-- Changed $id to $centerId (assuming similar dispatch)
        $this->center_id = $centerId;         // <-- Updated to use $centerId
    }

 #[On('openEditCourseModal')]
public function openModal($courseId)
{
    // FULL reset
    $this->reset([
        'category_id',
        'title',
        'description',
        'type',
        'center_id',
        'price_amount',
        'publish',
        'current_image_url',
        'image_thumb',
    ]);

    $this->resetErrorBag();

    $this->courseId = $courseId;

    $response = $this->api->get("courses/{$courseId}/edit");
    $course = $response['data'] ?? $response;

    $this->fill([
        'category_id'       => $course['category']['id'] ?? null,
        'title'             => $course['title'] ?? '',
        'description'       => $course['description'] ?? '',
        'type'              => $course['type'] ?? 'online',
        'center_id'         => data_get($course, 'centers.0.id'),
        'price_amount'      => $course['current_price']['amount'] ?? '',
        'publish'           => (bool)($course['publish'] ?? false),
        'current_image_url' => $course['image_thumbnail_url'] ?? null,
    ]);

    // 🔥 Reset Alpine preview explicitly
   // $this->dispatchBrowserEvent('reset-image-preview');

    $this->showModal = true;
}

    public function updateCourse()
    {
        $this->validate([
            'category_id' => 'required',
            'title' => 'required|max:100',
            'description' => 'required',
            'price_amount' => 'required|numeric',
        ]);

        // Build Payload
        $formData = [
            ['name' => '_method', 'contents' => 'PUT'],
            ['name' => 'category_id', 'contents' => $this->category_id],
            ['name' => 'title', 'contents' => $this->title],
            ['name' => 'description', 'contents' => $this->description],
            ['name' => 'type', 'contents' => $this->type],
            ['name' => 'price_amount', 'contents' => $this->price_amount],
            ['name' => 'publish', 'contents' => $this->publish ? 1 : 0],
        ];

        if ($this->image_thumb) {
            $formData[] = [
                'name' => 'image_thumb',
                'contents' => fopen($this->image_thumb->getRealPath(), 'r'),
                'filename' => $this->image_thumb->getClientOriginalName(),
            ];
        }

        $this->api->postWithFile("courses/{$this->courseId}/update", $formData);
        $this->reset(['courseId', 'category_id', 'title', 'description', 'image_thumb', 'price_amount', 'current_image_url']);
        // CLEANUP & NOTIFY
        $this->showModal = false; // Closes modal
        $this->dispatch('course-updated'); // Refreshes List
        
        $this->dispatch('toast', message: 'Course updated successfully!', type: 'success');
    }

    public function render() {
        return view('livewire.course.edit-course');
    }
}