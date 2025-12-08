<?php
namespace App\Livewire\Course;

use Livewire\Component;

class CourseTypeFilter extends Component
{
    public string $currentType;

    public function mount(string $currentType): void
    {
        $this->currentType = $currentType;
    }

    public function setFilter(string $type): void
    {
        $this->currentType = $type;
        
        // Dispatch event to the CourseList parent
        $this->dispatch('updateFilter', key: 'filterType', value: $type);
    }

    public function render()
    {
        return view('livewire.course.course-type-filter');
    }
}