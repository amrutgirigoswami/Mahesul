<?php

namespace App\View\Components\users;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class breadcrumb extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $breadcrumb;
    public function __construct($title, $breadcrumb)
    {
        $this->title = $title;
        $this->breadcrumb = $breadcrumb;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.users.breadcrumb');
    }
}
