<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tags extends Component
{
    public $tranTags;
    public $tags = [];

    public function mount()
    {
        $this->tags = ['sss', 'vvv'];
    }

    public function updatedTags()
    {
        dd($this->tags);
    }
    
    
    public function render()
    {
        return view('livewire.tags');
    }
}
