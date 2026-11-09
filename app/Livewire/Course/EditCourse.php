<?php

namespace App\Livewire\Course;

use App\Services\ApiService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class EditCourse extends Component
{
    use WithFileUploads;

    public $courseId;
    public $category_id;
    public $title;
    public $description;
    public $image_thumb;
    public $type = 'online';
    public $price_amount;
    public $center_id = null;
    public $publish = false;
    public $current_image_url;

    // 🔥 New: About the Course
    public $about_course = [];

    public $showModal = false;

    protected $api;

    public function boot()
    {
        $this->api = new ApiService();
    }

    public function mount() 
    {
        // Do nothing here. Data will be filled by openModal listener.
    }

    #[On('categorySelected')]
    public function setCategory($categoryId)
    {
        $this->category_id = $categoryId;
    }

    #[On('centerSelected')]
    public function setCenter($centerId)
    {
        $this->center_id = $centerId;
    }

    #[On('openEditCourseModal')]
    public function openModal($courseId)
    {
        $this->courseId = $courseId;
        
        $response = $this->api->get("courses/{$courseId}/edit");
        $course = $response['data'] ?? $response;

        $this->fill([
            'category_id'     => $course['category']['id'] ?? null,
            'title'           => $course['title'] ?? '',
            'description'     => $course['description'] ?? '',
            'type'            => $course['type'] ?? 'online',
            'center_id'       => data_get($course, 'centers.0.id'),
            'price_amount'    => $course['current_price']['amount'] ?? '',
            'publish'         => (bool)($course['publish'] ?? false),
            'current_image_url' => $course['image_thumbnail_url'] ?? null,
            'about_course'    => $course['about_course'] ?? [''],   // ← Important
        ]);

        $this->resetErrorBag();
        $this->image_thumb = null;

        $this->showModal = true;

        // Sync category dropdown
        $this->dispatch('update-selected-category', id: $this->category_id);
    }

    // Add & Remove About Course Points
    public function addAboutPoint()
    {
        $this->about_course[] = '';
    }

    public function removeAboutPoint($index)
    {
        unset($this->about_course[$index]);
        $this->about_course = array_values($this->about_course);
    }

    public function updateCourse()
    {
        $this->validate([
            'category_id'   => 'required|integer',
            'title'         => 'required|max:100',
            'description'   => 'required|string',
            'about_course'  => 'required|array|min:1',
            'about_course.*'=> 'required|string|min:5|max:500',
            'price_amount'  => 'required|numeric',
            'center_id'     => $this->type === 'physical' ? 'required|integer' : 'nullable',
        ]);

        $formData = [
            ['name' => '_method',      'contents' => 'PUT'],
            ['name' => 'category_id',  'contents' => $this->category_id],
            ['name' => 'title',        'contents' => $this->title],
            ['name' => 'description',  'contents' => $this->description],
            ['name' => 'type',         'contents' => $this->type],
            ['name' => 'price_amount', 'contents' => $this->price_amount],
            ['name' => 'publish',      'contents' => $this->publish ? 1 : 0],
        ];

        // Send About Course as array
        foreach ($this->about_course as $index => $point) {
            $formData[] = [
                'name'     => "about_course[{$index}]",
                'contents' => $point
            ];
        }

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

        $this->api->postWithFile("courses/{$this->courseId}/update", $formData);

        $this->showModal = false;
        $this->dispatch('course-updated');
        $this->dispatch('toast', message: 'Course updated successfully!', type: 'success');
    }

    public function render()
    {
        return view('livewire.course.edit-course');
    }
}