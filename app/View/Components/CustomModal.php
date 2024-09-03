<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CustomModal extends Component
{
    public $submitLabel;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $identifier,
        public string $title,
        public string $action,
        public string $type = 'delete',
        string $submitLabel = null
    ) {
        $this->submitLabel = $submitLabel ?: $this->title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.custom-modal');
    }

    public function method()
    {
        return match ($this->type) {
            'delete' => 'delete',
            'update' => 'put',
            default => 'post',
        };
    }
}
