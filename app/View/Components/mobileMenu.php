<?php

namespace App\View\Components;

use Illuminate\View\Component;

class mobileMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $path;
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.mobile-menu');
    }
}
