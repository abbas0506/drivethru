<?php

namespace App\View\Components;

use Illuminate\View\Component;

class topbar_national extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $activeItem;
    public function __construct($activeItem)
    {
        //
        $this->activeItem = $activeItem;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.topbar_national');
    }
}