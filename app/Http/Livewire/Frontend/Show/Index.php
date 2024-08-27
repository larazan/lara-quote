<?php

namespace App\Http\Livewire\Frontend\Show;

use App\Models\Quote;
use Livewire\Component;

class Index extends Component
{
    public $id;
    public $type;
    public $quote;
    public $author;
    public $tags;
    
    public $fontSize;
    public $fontColor;
    public $fontAlign;
    public $fontFamily;
    public $bgColor;

    public function mount($id, $type, $quote, $author, $tags) 
    {
        $this->id = $id;
        $this->type = $type;
        $this->quote = $quote;
        $this->author = $author;
        $this->tags = $tags;
    }

    public function render()
    {
        return view('livewire.frontend.show.index');
    }
}
