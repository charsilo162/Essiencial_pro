<?php

namespace App\Livewire\Course;

use App\Services\ApiService;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Illuminate\Pagination\LengthAwarePaginator;

class CourseList extends Component
{
    use WithPagination;

    // Filters and Search
    #[Url(as: 'type', except: 'all')] public string $filterType = 'all';
    #[Url(as: 'price', except: 'all')] public string $filterPrice = 'all';
    #[Url(as: 'q', except: '')] public string $searchQuery = '';
    #[Url(as: 'location', except: '')] public string $searchLocation = '';

    // Contextual Properties
    public ?string $categorySlug = null;
    public ?string $categoryName = null;
    public ?int $tutorId = null;
    public bool $usePagination = false;
    public ?int $limit = null;

    protected $listeners = ['updateFilter' => 'handleFilterUpdate', 'clearAllFilters' => 'clearFilters'];

    protected $api;

    public function boot()
    {
        $this->api = app(ApiService::class);
    }

    public function mount(?string $categorySlug = null, ?int $tutorId = null, bool $usePagination = false)
    {
        $this->categorySlug = $categorySlug;
        $this->tutorId = $tutorId;
        $this->usePagination = $usePagination;
        $this->limit = $usePagination ? null : 6;

        if ($this->categorySlug) {
            $this->fetchCategoryName();
        }
    }

    private function fetchCategoryName(): void
    {
        $response = $this->api->get('categories', ['slug' => $this->categorySlug]);
        if (isset($response['data'][0]['name'])) {
            $this->categoryName = $response['data'][0]['name'];
        }
    }

    public function handleFilterUpdate(string $key, $value): void
    {
        if (property_exists($this, $key)) {
            $this->$key = $value;
            $this->resetPage();
        }
    }

    public function clearFilters(): void
    {
        $this->filterType = 'all';
        $this->filterPrice = 'all';
        $this->searchQuery = '';
        $this->searchLocation = '';
        $this->resetPage();
    }

    public function render()
    {
        // 1. Prepare API Parameters
        $params = [
            'paginate' => $this->usePagination,
            'limit'    => $this->limit,
            'page'     => $this->getPage(),
        ];

        if ($this->categorySlug)          $params['category'] = $this->categorySlug;
        if ($this->tutorId)               $params['tutor']    = $this->tutorId;
        if ($this->filterType !== 'all')  $params['type']     = $this->filterType;
        if ($this->filterPrice !== 'all') $params['price']    = $this->filterPrice;
        
        // Both search functionalities active
        if ($this->searchQuery)           $params['search']   = $this->searchQuery;
        if ($this->searchLocation)        $params['location'] = $this->searchLocation;

        // 2. Fetch Data
        $response = $this->api->get('courses', $params);
        $rawCourses = $response['data'] ?? [];

        // 3. Transform Data
        $items = collect($rawCourses)->map(function ($course) {
            $data = $course['url_data'] ?? $course;

            $course['link'] = ($data['type'] === 'online')
                ? route('courses.online', $course['slug'])
                : route('courses.center', [
                    'center' => $data['center_id'] ?? 1,
                    'course' => $course['slug']
                ]);

            $course['button_text'] = ($data['type'] === 'online') ? 'Start Learning Now' : 'View Details';

            return $course;
        });

        // 4. Handle Pagination
        $courses = null;
        if ($this->usePagination) {
            $courses = new LengthAwarePaginator(
                $items,
                $response['total'] ?? 0,
                $response['per_page'] ?? 10,
                $response['current_page'] ?? 1,
                [
                    'path' => request()->url(),
                    'query' => request()->query(),
                ]
            );
        }

        return view('livewire.course.course-list', [
            'items'        => $items,
            'courses'      => $courses,
            'sectionTitle' => $this->calculateTitle(),
        ]);
    }

    private function calculateTitle(): string
    {
        return match (true) {
            $this->searchQuery !== ''     => "Search: \"{$this->searchQuery}\"",
            $this->searchLocation !== ''  => "Courses in \"{$this->searchLocation}\"",
            $this->categoryName !== null  => "Courses in " . $this->categoryName,
            $this->tutorId !== null       => "Other Courses by this Tutor",
            $this->filterType === 'physical' => 'Our Physical Trainings',
            $this->filterType === 'online'   => 'Our Virtual Trainings',
            default                       => 'All Available Trainings',
        };
    }
}