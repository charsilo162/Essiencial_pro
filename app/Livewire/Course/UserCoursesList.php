<?php
namespace App\Livewire\Course;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Services\ApiService; // Ensure this is correctly imported
use Illuminate\Pagination\LengthAwarePaginator;

class UserCoursesList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $publishStatus = ''; // '' = All, 'published' = Published, 'unpublished' = Unpublished
    public $confirmingDelete = null; 
    protected $api;

    public function boot()
    {
        $this->api = app(ApiService::class);
    }

    // Reset pagination when the publish status filter changes
    public function updatedPublishStatus()
    {
        $this->resetPage();
    }

    #[On('course-updated')]
    public function refreshList()
    {
        // Forces a re-render
    }

    #[On('search-updated')]
    public function updateSearch($searchTerm)
    {
        $this->search = $searchTerm;
        $this->resetPage();
    }

    public function togglePublish($courseId)
    {
        try {
            $this->api->put("courses/{$courseId}/toggle-publish");

            $this->dispatch('toast', [
                'message' => 'Course status updated!',
                'type' => 'success'
            ]);
        } catch (\Exception $e) {
            $this->dispatch('toast', [
                'message' => 'Failed to update.',
                'type' => 'error'
            ]);
        }
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = $id;
    }

    public function deleteCourse($id)
    {
        try {
            $response = $this->api->delete("courses/{$id}");

            if ($response) {
                $this->confirmingDelete = null;
                $this->dispatch('course-updated'); 
                $this->dispatch('toast', message: 'Course deleted successfully!', type: 'success');
            } else {
                throw new \Exception('API response was empty or falsey');
            }
        } catch (\Exception $e) {
            $this->confirmingDelete = null; 
            $this->dispatch('toast', message: 'Failed to delete course: ' . $e->getMessage(), type: 'error');
        }
    }

    public function render()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login');
        }

        // Base parameters for the API
        $params = [
            'paginate' => true,
            'per_page' => 12,
            'page' => $this->getPage(), // 👈 CRITICAL: Tells the backend API which page to fetch
        ];

        // Apply our new filter selection
        if ($this->publishStatus !== '') {
            $params['publish_status'] = $this->publishStatus;
        } else {
            $params['include_unpublished'] = true; // Fallback for 'all'
        }

        // Only filter by uploader if the user is not an admin
        if ($user['type'] !== 'admin') {
            $params['uploader'] = $user['id'];
        }

        if ($this->search) {
            $params['search'] = $this->search;
        }

        // Fetch data from the API with page parameters applied
        $response = $this->api->get('courses', $params);

        $rawCourses = $response['data'] ?? [];

        $items = collect($rawCourses)->map(function ($course) {
            $course['link'] = $course['url_data']['type'] === 'online'
                ? route('courses.online', $course['slug'])
                : route('courses.center', [
                    'center' => $course['url_data']['center_id'] ?? 1,
                    'course' => $course['slug']
                ]);

            return $course;
        });

        // Reconstruct the LengthAwarePaginator for front-end rendering
        $paginator = new LengthAwarePaginator(
            $items,
            $response['meta']['total'] ?? count($rawCourses),
            $response['meta']['per_page'] ?? 12,
            $response['meta']['current_page'] ?? $this->getPage(),
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );

        return view('livewire.course.user-courses-list', [
            'courses' => $paginator,
        ]);
    }
}