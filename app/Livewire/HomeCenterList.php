<?php

namespace App\Livewire;

use App\Services\ApiService;  // ← ADD THIS LINE
use Livewire\Component;
use Livewire\Attributes\Url;

class HomeCenterList extends Component
{
    public int $limit = 3;
    #[Url(history: true)]
    public string $search = '';

    public $centers = [];
    public $totalCenterCount = 0;
    public $showSeeAll = true;

    protected $api; // ← Declare it

    public function boot()
    {
        $this->api = app(ApiService::class); // ← This line was missing!
    }

    public function mount()
    {
        $this->loadCenters();
    }

    public function updatedSearch()
    {
        $this->loadCenters();
    }

   public function loadCenters()
{
    $params = [
        'featured' => empty($this->search),
        'limit' => $this->limit,
    ];

    if ($this->search) {
        $params['search'] = $this->search;
    }

    $response = $this->api->get('centers', $params);
//dd($response);
    $this->centers = $response['data'] ?? [];

    // Use separate API call for total count
    $countResponse = $this->api->get('centers/count', $this->search ? ['search' => $this->search] : []);
    $this->totalCenterCount = $countResponse['total'] ?? 0;

    $this->showSeeAll = empty($this->search) && count($this->centers) >= $this->limit;
}

    public function render()
    {
        return view('livewire.home-center-list', [
            'centers' => $this->centers,
            'totalCenterCount' => $this->totalCenterCount,
            'showSeeAll' => $this->showSeeAll,
        ]);
    }
}