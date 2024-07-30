<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tag;
use Livewire\Component;

class TagsListIndex extends Component
{
    public $letters = [
        'a',
        'b',
        'c',
        'd',
        'e',
        'f',
        'g',
        'h',
        'i',
        'j',
        'k',
        'l',
        'm',
        'n',
        'o',
        'p',
        'q',
        'r',
        's',
        't',
        'u',
        'v',
        'w',
        'x',
        'y',
        'z',
    ];
    public $letter = 'z';
    public $tagId;

    // public function mount($letter)
    // {
    //     $this->letter = $letter;
    // }

    public function clickLetter($letter)
    {
        // dd($letter);
        $this->letter = $letter;
    }

    public function deleteTag($tagId)
    {
        $tag = Tag::findOrFail($tagId);
        $tag->delete();
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Tag deleted successfully']);
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.tags-list-index', [
            'tags' => Tag::where('name', 'like', $this->letter. '%')->where('status', 'active')->get()
        ]);
    }
}
