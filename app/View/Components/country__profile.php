<?php

namespace App\View\Components;

use Illuminate\View\Component;

class country__profile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $country;
    public function __construct($country)
    {
        $this->country = $country;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.country__profile');
    }
}