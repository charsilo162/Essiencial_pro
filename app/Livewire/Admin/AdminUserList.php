<?php
namespace App\Livewire\Admin;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\ApiService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\URL;

class AdminUserList extends Component
{
    use WithPagination;

    public $search = '';
    protected $api;

    public function boot()
    {
        $this->api = new ApiService();
    }

    public function toggleUserStatus($userId)
    {
        // Hits the PATCH endpoint we created in AdminUserController
        $response = $this->api->put("admin/users/{$userId}/toggle", []);

        if (isset($response['error'])) {
            $this->dispatch('error-notification', message: $response['error']);
        } else {
            $this->dispatch('success-notification', message: $response['message']);
        }
    }

    public function deleteUser($userId)
    {
        $response = $this->api->delete("admin/users/{$userId}");

        if (isset($response['error'])) {
            $this->dispatch('error-notification', message: $response['error']);
        } else {
            $this->dispatch('success-notification', message: 'User deleted permanently');
        }
    }

    public function render()
    {
        $currentPage = $this->paginators['page'] ?? 1;

        $response = $this->api->get('admin/users', [
            'search' => $this->search,
            'page' => $currentPage
        ]);

        $users = new LengthAwarePaginator(
            $response['data'] ?? [],
            $response['total'] ?? 0,
            $response['per_page'] ?? 20,
            $currentPage,
            ['path' => URL::current()]
        );
        //dd($users);

        return view('livewire.admin.admin-user-list', ['users' => $users]);
    }
}