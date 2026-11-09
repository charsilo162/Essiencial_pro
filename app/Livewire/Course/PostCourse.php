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
    public $showModal = false;
    public $description;
    public $image_thumb;
    public $type = 'online';
    public $center_id = null;

    // 🔥 New: Dynamic "About the Course" field
    public $about_course = [];

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
            'category_id',
            'title',
            'price_amount',
            'description',
            'image_thumb',
            'type',
            'center_id',
            'about_course'
        ]);

        $this->type = 'online';
        $this->about_course = ['']; // Start with one empty field

        $this->resetErrorBag();
        $this->resetValidation();

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

    // Add new point
    public function addAboutPoint()
    {
        $this->about_course[] = '';
    }

    // Remove point
    public function removeAboutPoint($index)
    {
        unset($this->about_course[$index]);
        $this->about_course = array_values($this->about_course);
    }

    public function rules()
    {
        return [
            'category_id'   => 'required|integer',
            'title'         => 'required|string|max:100',
            'description'   => 'required|string',
            'about_course'  => 'required|array|min:1',
            'about_course.*'=> 'required|string|min:5|max:500',
            'type'          => 'required|in:online,physical',
            'price_amount'  => 'required|numeric|min:0',
            'center_id'     => $this->type === 'physical' ? 'required|integer' : 'nullable',
            'image_thumb'   => 'nullable|image|max:2048',
        ];
    }

public function postCourse()
{
    $this->validate();

    $data = [
        ['name' => 'category_id',   'contents' => $this->category_id],
        ['name' => 'title',         'contents' => $this->title],
        ['name' => 'price_amount',  'contents' => $this->price_amount],
        ['name' => 'description',   'contents' => $this->description],
        ['name' => 'type',          'contents' => $this->type],
    ];

    // 🔥 Send about_course as proper array for multipart
    foreach ($this->about_course as $index => $point) {
        $data[] = [
            'name'     => "about_course[{$index}]",
            'contents' => $point
        ];
    }

    if ($this->type === 'physical' && $this->center_id) {
        $data[] = ['name' => 'center_id', 'contents' => $this->center_id];
    }

    if ($this->image_thumb) {
        $data[] = [
            'name'     => 'image_thumb',
            'contents' => fopen($this->image_thumb->getRealPath(), 'r'),
            'filename' => $this->image_thumb->getClientOriginalName(),
        ];
    }

    try {
        $response = $this->api->postWithFile('courses', $data);

        $this->dispatch('course-updated');
        $this->dispatch('toast', message: 'Course posted successfully!', type: 'success');

        // Reset
        $this->reset([
            'category_id', 'title', 'price_amount', 'description',
            'image_thumb', 'type', 'center_id', 'about_course'
        ]);

        $this->type = 'online';
        $this->about_course = [''];

        $this->resetErrorBag();
        $this->resetValidation();

        $this->showModal = false;

    } catch (\Exception $e) {
        $this->dispatch('toast', message: 'Failed to post course: ' . $e->getMessage(), type: 'error');
    }
}

    public function render()
    {
        return view('livewire.course.post-course');
    }
}