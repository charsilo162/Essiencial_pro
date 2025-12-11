<?php
namespace App\Livewire\Center;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Services\ApiService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\URL;

class CentersList extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search = '';
    public $showModal = false;
    public $editingId;
    public $name;
    public $description;
    public $address;
    public $city;
    public $years_of_experience;
    public $center_thumbnail;

    protected $api;

    public function boot()
    {
        $this->api = new ApiService();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function openEdit($centerId)
    {
        $this->editingId = $centerId;

        $response = $this->api->get("centers/{$centerId}");

        $center = $response['data'] ?? $response;

        $this->fill([
            'name' => $center['name'] ?? '',
            'description' => $center['description'] ?? '',
            'address' => $center['address'] ?? '',
            'city' => $center['city'] ?? '',
            'years_of_experience' => $center['years_of_experience'] ?? 0,
        ]);

        $this->center_thumbnail = null;
        $this->resetErrorBag();
        $this->showModal = true;

        $this->dispatch('open-edit-center-modal');
    }

    public function getRules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'years_of_experience' => 'required|integer|min:0',
            'center_thumbnail' => 'nullable|image|max:1024',
        ];
    }

    public function updateCenter()
    {
        $this->validate($this->getRules());

        $formData = [
            ['name' => '_method', 'contents' => 'PUT'],
            ['name' => 'name', 'contents' => $this->name],
            ['name' => 'description', 'contents' => $this->description],
            ['name' => 'address', 'contents' => $this->address],
            ['name' => 'city', 'contents' => $this->city],
            ['name' => 'years_of_experience', 'contents' => $this->years_of_experience],
        ];

        if ($this->center_thumbnail) {
            $formData[] = [
                'name'     => 'center_thumbnail_url',
                'contents' => fopen($this->center_thumbnail->getRealPath(), 'r'),
                'filename' => $this->center_thumbnail->getClientOriginalName(),
            ];
        }

        \Log::info('Sending update data (POST with _method=PUT):', $formData);

        $response = $this->api->postWithFile("centers/{$this->editingId}/update", $formData);

        if (!empty($response['error'])) {
            $this->dispatch('error-notification', message: $response['message'] ?? 'Update failed');
            return;
        }

        $this->showModal = false;
        $this->dispatch('success-notification', message: 'Center updated successfully!');
        $this->reset(['name', 'description', 'address', 'city', 'years_of_experience', 'center_thumbnail']);
    }

    public function render()
    {
        $perPage = 10;
        $params = [
            'search' => $this->search,
            'per_page' => $perPage,
            'page' => $this->page,
        ];

        $response = $this->api->get('centers', $params);

        $items = $response['data'] ?? [];
        $total = $response['total'] ?? 0;
        $currentPage = $this->page;

        $centers = new LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $currentPage,
            ['path' => URL::current(), 'query' => $params]
        );

        return view('livewire.center.centers-list', [
            'centers' => $centers,
        ]);
    }
}