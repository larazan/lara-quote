<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InputTag extends Component
{
    public $articleTags;
    // public $tags;
    public $tags = [];
    public $d = 'sss, vvv';

    public function mount()
    {
        $this->tags = explode(',', $this->articleTags);
        // $this->tags = explode(',', $this->d);
    }

    public function render()
    {
        return view('livewire.input-tag');
    }
}
