<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GroupsYouMayLike extends Component
{
    public $groups;
    public $title;
    public $seeMoreHref;

    public function __construct($groups = [], $title = 'Groups you may like', $seeMoreHref = '#')
    {
        $this->groups = !empty($groups) ? $groups : [
            ['image' => 'img/group1.jpg', 'title' => 'Essential staff', 'members' => 1, 'posts' => 0],
            ['image' => 'img/group2.jpg', 'title' => 'Health group', 'members' => 1, 'posts' => 0],
            ['image' => 'img/group3.jpg', 'title' => 'Everyday news', 'members' => 1, 'posts' => 0],
        ];
        $this->title = $title;
        $this->seeMoreHref = $seeMoreHref;
    }

    public function render()
    {
        return view('components.groups-you-may-like');
    }
}