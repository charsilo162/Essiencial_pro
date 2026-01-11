<?php

namespace App\Livewire\Course;

use App\Services\ApiService;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Illuminate\Pagination\LengthAwarePaginator;

class UserCoursesList extends Component
{
    use WithPagination;

    public string $search = '';
    public $confirmingDelete = null; 
    protected $api;

    public function boot()
    {
        $this->api = app(ApiService::class);
    }

    #[On('course-updated')]
    public function refreshList()
    {
        // This can be empty; calling it just forces a re-render
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
                $this->dispatch('course-updated'); // Add this to trigger refresh
                $this->dispatch('toast', message: 'Course deleted successfully!', type: 'success');
            } else {
                throw new \Exception('API response was empty or falsey');
            }
        } catch (\Exception $e) {
            $this->confirmingDelete = null; // Optional: reset even on error
            $this->dispatch('toast', message: 'Failed to delete course: ' . $e->getMessage(), type: 'error');
        }
    }


    public function render()
    {
        $user = session('user');

        if (!$user) {
            return redirect()->route('login');
        }

        $params = [
            'include_unpublished' => true,
            'paginate' => true,
        ];

        // Only filter by uploader if the user is not an admin
        if ($user['type'] !== 'admin') {
            $params['uploader'] = $user['id'];
        }

        if ($this->search) {
            $params['search'] = $this->search;
        }

        $response = $this->api->get('courses', $params);

        // Handle both paginated and non-paginated responses
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

        // Create paginator for ->links()
        $paginator = new LengthAwarePaginator(
            $items,
            $response['meta']['total'] ?? count($rawCourses),
            $response['meta']['per_page'] ?? 12,
            $response['meta']['current_page'] ?? 1,
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