<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class MenuItem extends Component
{
    public $routeName;

    public $label;

    public function __construct($routeName, $label)
    {
        $this->routeName = $routeName;
        $this->label = $label;
    }

    public function isCurrentRoute() {
        return $this->routeName === Route::currentRouteName();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.menu-item');
    }
}
