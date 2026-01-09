<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\EvenueService;
use Illuminate\Pagination\LengthAwarePaginator;

class VenueList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render(EvenueService $service)
    {
        $page = $this->getPage();
        $perPage = 6;

        $data = $service->getAllVenues(page: $page, limit: $perPage);

        $venues = collect($data['venues'] ?? []);

        // Create a fake paginator
        $paginator = new LengthAwarePaginator(
            $venues,
            $data['totalVenues'] ?? $venues->count(),
            $perPage,
            $page,
            [
                'path' => url()->current(),
                'pageName' => 'page',
            ]
        );

        return view('livewire.venue-list', [
            'venues' => $paginator
        ])->layout('layouts.app');
    }
}