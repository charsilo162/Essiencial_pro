<?php
namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\ApiService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\URL;

class AdminCourseList extends Component
{
    use WithPagination;

    public $search = '';
    protected $api;

    public function boot()
    {
        $this->api = new ApiService();
    }

    public function togglePublish($courseId)
    {
        // Hits the admin-specific toggle endpoint
        $response = $this->api->patch("admin/courses/{$courseId}/toggle-publish", []);

        if (isset($response['error'])) {
            $this->dispatch('error-notification', message: 'Failed to update course status');
        } else {
            $this->dispatch('success-notification', message: 'Course visibility updated');
        }
    }

    public function render()
    {
        $currentPage = $this->paginators['page'] ?? 1;

        $response = $this->api->get('admin/courses', [
            'search' => $this->search,
            'page' => $currentPage
        ]);

        $courses = new LengthAwarePaginator(
            $response['data'] ?? [],
            $response['meta']['total'] ?? 0,
            $response['meta']['per_page'] ?? 15,
            $currentPage,
            ['path' => URL::current()]
        );

        return view('livewire.admin.admin-course-list', ['courses' => $courses]);
    }
}