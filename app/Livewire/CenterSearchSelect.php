<?php

namespace App\Livewire;

use App\Services\ApiService;
use Livewire\Component;

class CenterSearchSelect extends Component
{
    public $searchTerm = '';
    public $centers = [];
    public $selectedId = null;
    public $selectedName = '';
    public $placeholder = 'Search or select a training center...';
 protected $api;


    public function mount($initialId = null)

    {
         $this->api = new ApiService();
        if ($initialId) {
            $this->loadSingleCenter($initialId);
        }
        $this->loadInitialCenters();
    }

    public function loadSingleCenter($id)
    {
        $response = $this->api->get("centers/{$id}");
        if ($response['data'] ?? null) {
            $center = $response['data'];
            $this->selectedId = $center['id'];
            $this->selectedName = $center['name'];
        }
    }

    public function loadInitialCenters()
    {
        $response = $this->api->get('centers', ['per_page' => 10]);
        $this->centers = $response['data'];
    }

    public function updatedSearchTerm($value)
    {
        if (strlen($value) < 2) {
            $this->loadInitialCenters();
            return;
        }

        $response = $this->api->get('centers', ['search' => $value, 'per_page' => 10]);
        $this->centers = $response['data'];
    }

    public function selectCenter($id, $name)
    {
        $this->selectedId = $id;
        $this->selectedName = $name;
        $this->searchTerm = '';
        $this->dispatch('centerSelected', centerId: $id);
    }

    public function render()
    {
        return view('livewire.center-search-select');
    }
}