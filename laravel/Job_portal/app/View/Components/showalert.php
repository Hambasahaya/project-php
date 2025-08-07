<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class showalert extends Component
{
    public $type;
    public $title;
    public $footer;

    public function __construct($type = 'success', $title = null, $footer = null)
    {
        $this->type = $type;
        $this->title = $title;
        $this->footer = $footer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.showalert');
    }
}
