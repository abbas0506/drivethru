<?php

namespace App\View\Components\student;

use Illuminate\View\Component;

class newspanel extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $advertisement;
    public function __construct($advertisement)
    {
        //
        $this->advertisement = $advertisement;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.student.newspanel');
    }
}