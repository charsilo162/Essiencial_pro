<?php

namespace App\Livewire\Course;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Video;
use App\Services\ApiService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

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

    protected $api;

    public function boot()
    {
        $this->api = new ApiService();
    }

    /**
     * @param array $course
     * @return array|null
     */
    public function getFirstCourseVideo($course)
    {
        if (isset($course['videos']) && is_array($course['videos']) && !empty($course['videos'])) {
            // Sort by pivot.order_index
            usort($course['videos'], function ($a, $b) {
                return ($a['pivot']['order_index'] ?? 0) <=> ($b['pivot']['order_index'] ?? 0);
            });
            return $course['videos'][0];
        }
        return null;
    }

    /**
     * Render method to fetch the filtered and paginated data.
     */
    public function render()
    {
        $params = [];
        if ($this->search) {
            $params['search'] = $this->search;
        }
        // Include the current page from Livewire's pagination state
        $params['page'] = $this->getPage();

        $response = $this->api->get('me/enrolled-courses', $params);

        // Convert the API response to a LengthAwarePaginator for seamless integration with Livewire and the view
        $items = collect($response['data'] ?? []);
        $total = $response['meta']['total'] ?? 0;
        $perPage = $response['meta']['per_page'] ?? 9;
        $currentPage = $response['meta']['current_page'] ?? 1;

        $courses = new LengthAwarePaginator($items, $total, $perPage, $currentPage, [
            'path' => \Illuminate\Pagination\Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

        // Optionally set the query string for search persistence in pagination links
        $courses->withQueryString();

        return view('livewire.course.enrolled-courses', [
            'courses' => $courses,
        ]);
    }
}