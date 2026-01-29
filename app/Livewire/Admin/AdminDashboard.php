<?php
namespace App\Livewire\Admin;

use Livewire\Component;
use App\Services\ApiService;

class AdminDashboard extends Component
{
    public $stats = [];
    protected $api;

    public function boot()
    {
        $this->api = new ApiService();
    }

    public function render()
    {
        // Fetching the exact keys from your Postman response
        $this->stats = $this->api->get('admin/stats') ?? [
            'total_users' => 0,
            'total_centers' => 0,
            'total_courses' => 0,
            'total_videos' => 0,
            'recent_registrations' => 0
        ];

        return view('livewire.admin.admin-dashboard');
    }
}
