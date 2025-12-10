<?php

namespace App\Livewire\Course;

use Livewire\Component;

class CourseTypeFilter extends Component
{
    public string $filterType;

    public function mount(string $filterType)
    {
        $this->filterType = $filterType;
    }

    public function setTypeFilter(string $type)
    {
        $this->dispatch('updateFilter', key: 'filterType', value: $type);
    }

    public function render()
    {
        return view('livewire.course.course-type-filter');
    }
}