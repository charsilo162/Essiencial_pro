<?php

namespace App\Livewire\Course;

use Livewire\Component;

class CourseLocationSearch extends Component
{
    // wire:model.live.debounce will update this property automatically
    public string $searchLocation = '';

    public function mount(string $searchLocation): void
    {
        $this->searchLocation = $searchLocation;
    }
    
   public function updatedSearchLocation($value)
{
    $this->dispatch('updateFilter', key: 'searchLocation', value: $value);
}
    
    // Optional: Keep the explicit search method if not using wire:model.live
    public function doSearch(): void
    {
        $this->dispatch('updateFilter', key: 'searchLocation', value: $this->searchLocation);
    }


    public function render()
    {
        return view('livewire.course.course-location-search');
    }
}