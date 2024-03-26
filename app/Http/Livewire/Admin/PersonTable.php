<?php

namespace App\Http\Livewire\Admin;

use App\Models\Quote;
use Livewire\WithPagination;
use Livewire\Component;

class PersonTable extends Component
{
    use WithPagination;

    public $queryQuote = '';
    public $quotes;
    // public $quotes = [];

    public $search = '';
    public $sort = 'asc';
    public $perPage = 10;

    public function mount($authorId)
    {
        $this->quotes = Quote::search('words', $this->search)->where('author_id', $authorId)->orderBy('created_at', $this->sort)->get();
    }

    // public function updatedQueryTag()
    // {
    //     $this->quotes = Quote::search('author_id', $this->queryQuote)->get();
    // }

    public function render()
    {
        return view('livewire.admin.person-table', [
            // 'quotes' => Quote::search('words', $this->search)->where('author_id', 28249)->orderBy('id', $this->sort)->paginate($this->perPage),
        ]);
    }
}
