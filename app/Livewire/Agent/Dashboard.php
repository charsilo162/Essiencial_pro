<?php

namespace App\Livewire\Agent;

use App\Services\ApiService;
use Livewire\Component;

class Dashboard extends Component
{
    public $search = '';
    public $page = 1;

    // Go back to page 1 whenever the search text changes
    public function updatingSearch()
    {
        $this->page = 1;
    }

    public function nextPage()
    {
        $this->page++;
    }

    public function previousPage()
    {
        if ($this->page > 1) {
            $this->page--;
        }
    }

    public function render()
    {
        $users = [];
        $total = 0;
        $lastPage = 1;

        try {
            $res = (new ApiService())->get('agent/users', [
                'search' => $this->search,
                'page'   => $this->page,
            ]);

            $users    = $res['data'] ?? [];
            $total    = $res['total_registered'] ?? 0;
            $lastPage = $res['meta']['last_page'] ?? 1;
        } catch (\Exception $e) {
            // Show an empty table instead of crashing the page
        }

        return view('livewire.agent.dashboard', [
            'users'    => $users,
            'total'    => $total,
            'lastPage' => $lastPage,
        ])->layout('layouts.dashboard', ['title' => 'Agent Dashboard']);
    }
}