<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ColorSelect extends Component
{
    public $options = [];
    public $selected;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($options, $selected = '')
    {
        $this->options = $options;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.color-select');
    }
}
