<?php

namespace App\View\Components;

use Illuminate\View\Component;

class university__profile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $university;
    public function __construct($university)
    {
        //
        $this->university = $university;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.university__profile');
    }
}