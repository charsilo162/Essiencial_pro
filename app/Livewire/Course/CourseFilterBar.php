<?php

namespace App\Livewire\Course;

use Livewire\Component;

class CourseFilterBar extends Component
{
    public string $filterType = 'all';
    public string $filterPrice = 'all';

    // REMOVED: public string $searchLocation = '';  ← We delete this!

    protected $listeners = [
        'updateFilter' => 'handleFilterUpdate',
    ];

    public function handleFilterUpdate(string $key, $value): void
    {
        // Only allow filterType and filterPrice
        if (in_array($key, ['filterType', 'filterPrice'])) {
            $this->$key = $value;
        }

        // Forward the update to the parent (CourseList)
        $this->dispatch('updateFilter', key: $key, value: $value);
    }

    public function clearAllFilters(): void
    {
        $this->filterType = 'all';
        $this->filterPrice = 'all';

        // This will clear the search box in CourseList too
        $this->dispatch('clearAllFilters');
    }

    public function render()
    {
        return view('livewire.course.course-filter-bar');
    }
}