<?php

namespace App\View\Components;

use Illuminate\View\Component;

class national__sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $user, $activeItem;

    public function __construct($user, $activeItem)
    {
        $this->user = $user;
        $this->activeItem = $activeItem;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.national__sidebar');
    }
}