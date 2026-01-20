<?php

namespace App\Livewire\Course;

use Livewire\Component;
use App\Services\ApiService;

class EnrolledUsers extends Component
{

    public array $courses = [];
    public array $courseOptions = [];
    public array $pagination = []; 

    public string $search = '';
    public string $selectedCourse = '';
    public string $fromDate = '';
    public string $toDate = '';
    public string $minAmount = '';
    public int $page = 1; // Track current page
    

    public bool $loading = true;

    protected ApiService $api;

    public function boot()
    {
        $this->api = new ApiService();
    }

    public function mount()
    {
        $this->fetchCourses();
        $this->fetchEnrollments();
    }

    public function updated()
    {
        $this->page = 1;
        $this->fetchEnrollments(); // auto refresh on filter change
    }
  public function gotoPage($page)
    {
        $this->page = $page;
        $this->fetchEnrollments();
    }
 public function fetchCourses()
    {
        $response = $this->api->get('instructor/enrollments');
        //dd($response);
        if (isset($response['data'])) {
            // 1. Store the FULL data for the Blade @foreach loop
            $this->courses = $response['data'];

            // 2. Keep your existing logic for the dropdown options
            $this->courseOptions = collect($response['data'])
                ->map(function ($item) {
                    return [
                        'id'    => $item['course']['id'] ?? null,
                        'title' => $item['course']['title'] ?? 'Untitled course',
                    ];
                })
                ->filter(fn ($course) => !is_null($course['id']))
                ->unique('id')
                ->values()
                ->toArray();
        }
    }

   public function fetchEnrollments()
    {
        $this->loading = true;

        $params = array_filter([
            'search'     => $this->search,
            'course_id'  => $this->selectedCourse,
            'from_date'  => $this->fromDate,
            'to_date'    => $this->toDate,
            'min_amount' => $this->minAmount,
            'page'       => $this->page, // Pass current page to API
        ]);

        $response = $this->api->get('instructor/enrollments', $params);

        $this->courses = $response['data'] ?? [];
        // Store the pagination meta (current_page, last_page, links, etc.)
        $this->pagination = $response['meta'] ?? []; 
        
        $this->loading = false;
    }

    public function resetFilters()
    {
        $this->reset(['search', 'selectedCourse', 'fromDate', 'toDate', 'minAmount']);
        $this->fetchEnrollments();
    }

     public function render()
    {
        return view('livewire.course.enrolled-users');
    }
}
