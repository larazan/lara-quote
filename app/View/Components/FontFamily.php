<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FontFamily extends Component
{
    public $fonts = [];
    public $language;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fonts, $language = '')
    {
        $this->fonts = $fonts;
        $this->language = $language;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.font-family');
    }
}
