<?php

namespace App\Livewire\Course;

use App\Services\ApiService;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostCourse extends Component
{
    use WithFileUploads;

    public $category_id;
    public $title;
    public $price_amount;
    public $description;
    public $image_thumb;
    public $type = 'online';
    public $center_id = null;
    public $showModal = false;

    protected $listeners = [
        'openPostCourseModal' => 'openModal',
        'categorySelected' => 'setCategory',
        'centerSelected' => 'setCenter',
    ];

    protected $api;

    public function boot()
    {
        $this->api = app(ApiService::class);
    }

    public function openModal()
    {
        $this->reset([
            'category_id', 'title', 'price_amount','description', 'image_thumb', 'type', 'center_id'
        ]);
        $this->type = 'online';
        $this->showModal = true;
    }

    public function setCategory($categoryId)
    {
        $this->category_id = $categoryId;
    }

    public function setCenter($centerId)
    {
        $this->center_id = $centerId;
    }

    public function updatedType($value)
    {
        if ($value === 'online') {
            $this->center_id = null;
        }
    }

    public function rules()
    {
        return [
            'category_id' => 'required|integer',
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'type' => 'required|in:online,physical',
            'price_amount' => 'required|numeric',
            'center_id' => $this->type === 'physical' ? 'required|integer' : 'nullable',
            'image_thumb' => 'nullable|image|max:2048',
        ];
    }

    public function postCourse()
    {
        $this->validate();

        // Data is constructed as an array of parts for multipart request
        $data = [
            ['name' => 'category_id', 'contents' => $this->category_id],
            ['name' => 'title', 'contents' => $this->title],
            ['name' => 'price_amount', 'contents' => $this->price_amount],
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

        try {
            // CRITICAL CHANGE: Use postWithFile to handle file streams
            // The previous call: $this->api->post('courses', $data, true); was causing the JSON error.
            $this->api->postWithFile('courses', $data);
            $this->dispatch('course-updated');
            $this->dispatch('toast', message: 'Course posted successfully!', type: 'success');
        } catch (\Exception $e) {
            $this->dispatch('toast', message: 'Failed to post course: ' . $e->getMessage(), type: 'error');
        }

        $this->reset(['category_id', 'title', 'description', 'image_thumb', 'type', 'center_id']);
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.course.post-course');
    }
}