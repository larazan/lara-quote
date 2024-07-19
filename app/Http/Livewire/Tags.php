<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tags extends Component
{
    public $tranTags;
    public $tags;
    public $d;

    public function mount()
    {
        $this->tags = [];
        // $this->tags = explode(',', $this->d);

    }

    public function updatedTags()
    {
        // dd($this->tags);

        $this->tags = $this->tags;
    }
    
    
    public function render()
    {
        return view('livewire.tags');
    }
}
