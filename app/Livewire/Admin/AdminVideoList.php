<?php
namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\ApiService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\URL;

class AdminVideoList extends Component
{
    use WithPagination;

    public $search = '';
    protected $api;

    public function boot()
    {
        $this->api = new ApiService();
    }

   // In AdminVideoList.php

    public function toggleActive($videoId)
        {
            // We now target the 'is-active' endpoint instead of 'toggle-publish'
            $response = $this->api->put("admin/videos/{$videoId}/toggle-active", []);
           // dd($response);
            if (isset($response['error'])) {
                $this->dispatch('error-notification', message: 'Failed to update administrative status');
            } else {
                $this->dispatch('success-notification', message: 'Global visibility updated');
            }
        }

    public function render()
    {
        $currentPage = $this->paginators['page'] ?? 1;

        $response = $this->api->get('admin/videos', [
            'search' => $this->search,
            'page' => $currentPage
        ]);

        $videos = new LengthAwarePaginator(
            $response['data'] ?? [],
            $response['meta']['total'] ?? 0,
            $response['meta']['per_page'] ?? 20,
            $currentPage,
            ['path' => URL::current()]
        );

        return view('livewire.admin.admin-video-list', ['videos' => $videos]);
    }
}