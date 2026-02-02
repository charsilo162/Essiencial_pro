<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\ApiService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\URL;

class AdminCentersList extends Component
{
    use WithPagination;
 
    public $search = '';
    protected $api;

    public function boot() {
        $this->api = new ApiService();
    }

    // Toggle Active Status via Admin API
    public function toggleStatus($centerId) {
        $response = $this->api->put("admin/centers/{$centerId}/toggle", []);
        //dd($response);
        if (!empty($response['error'])) {
            $this->dispatch('error-notification', message: 'Failed to update status');
        } else {
            $this->dispatch('success-notification', message: 'Status updated!');
        }
    }

    public function deleteCenter($centerId)
    {
        $response = $this->api->delete("admin/centers/{$centerId}");
        
        if (isset($response['error'])) {
            $this->dispatch('error-notification', message: $response['message'] ?? 'Delete failed');
        } else {
            $this->dispatch('success-notification', message: 'Center deleted globally');
        }
    }

    public function render()
    {
        $currentPage = $this->paginators['page'] ?? 1;

        $response = $this->api->get('admin/centers', [
            'search' => $this->search,
            'page' => $currentPage,
            'per_page' => 15
        ]);

        // Mapping response to Laravel's Paginator
        $items = $response['data'] ?? [];
        $meta = $response['meta'] ?? [];

        $centers = new LengthAwarePaginator(
            $items,
            $meta['total'] ?? 0,
            $meta['per_page'] ?? 15,
            $currentPage,
            ['path' => URL::current()]
        );
        

        return view('livewire.admin.admin-centers-list', [
            'centers' => $centers
        ]);
    }
}