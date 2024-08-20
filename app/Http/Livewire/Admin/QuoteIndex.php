<?php

namespace App\Http\Livewire\Admin;

use App\Models\Quote;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\Component;

class QuoteIndex extends Component
{
    use WithPagination;
    
    public $showQuoteModal = false;
    public $words;
    public $authorId;
    public $quoteTags;
    public $tags = [];
    public $slug;
    public $quoteId;

    public $persons;
    public $personId;
    public $personName;

    public $query = '';
    public $results;
    protected $queryString = ['query'];

    public $catStatus = 'inactive';
    public $statuses = [
        'active',
        'inactive'
    ];

    public $search = '';
    public $sort = 'asc';
    public $perPage = 10;

    public $showConfirmModal = false;
    public $deleteId = '';

    protected $rules = [
        'name' => 'required|max:255',
    ];

    public function mount()
    {
        $this->tags = isset($this->quoteTags) ? explode(',', $this->quoteTags) : [];
    }

    public function updateQueryPerson()
    {
        $this->persons = Person::search('name', $this->query)->get();
    }

    public function pickPerson($personId)
    {
        $this->personId = $personId;
    }

    public function showCreateModal()
    {
        $this->reset();
        $this->showQuoteModal = true;
    }

    public function closeConfirmModal()
    {
        $this->showConfirmModal = false;
    }

    public function deleteId($id)
    {
        $this->showConfirmModal = true;
        $this->deleteId = $id;
    }

    public function delete()
    {
        Quote::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Quote deleted successfully']);
    }

    public function createQuote()
    {
        $this->validate();
        
        Quote::create([
          'words' => $this->words,
          'slug' => Str::random(12),
          'tags' => implode(',', $this->tags),
          'author_id' => isset($this->authorId) ? $this->authorId : Auth::user()->id
      ]);
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Quote created successfully']);
    }

    public function showEditModal($quoteId)
    {
        $this->reset(['words']);
        $this->quoteId = $quoteId;
        $quote = Quote::find($quoteId);
        $this->words = $quote->words;
        $this->slug = $quote->slug;
        $this->quoteTags = $quote->tags;
        $this->tags = isset($this->quoteTags) ? explode(',', $this->quoteTags) : [];
        // $this->tags = explode(',', $quote->tags);
        $this->authorId = $quote->author_id;
        $this->personName = $quote->author($this->authorId)->name;
        $this->showQuoteModal = true;
    }
    
    public function updateQuote()
    {
        $this->validate();

        $quote = Quote::findOrFail($this->quoteId);
        $quote->update([
            'words' => $this->words,
            'tags' => implode(',', $this->tags),
            'author_id' => isset($this->authorId) ? $this->authorId : Auth::user()->id
        ]);
        $this->reset();
        $this->showQuoteModal = false;
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Quote updated successfully']);
    }

    public function deleteQuote($quoteId)
    {
        $quote = Quote::findOrFail($quoteId);
        $quote->delete();
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Quote deleted successfully']);
    }

    public function closeQuoteModal()
    {
        $this->showQuoteModal = false;
        $this->reset();
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        // $quote = DB::table('quotes')
        // ->join('persons', 'quotes.author_id', '=', 'persons.author_id')
        // ->select('quotes.*', 'persons.name')
        // ->orderBy('quotes.words', $this->sort)
        // ->paginate($this->perPage);
        // ->paginate();

        // if (strlen($this->query) > 2){
        //     $this->results = Person::where('name', 'like', "%{$this->query}%")->get();
        // }

        $key = explode(' ', $this->search);
        $quote = Quote::where(function ($q) use ($key) {
            foreach ($key as $value) {
                $q->orWhere('words', 'like', "%{$value}%")
                ->orWhere('tags', 'like', "%{$value}%");
            }
        })->orderBy('id', $this->sort)->paginate($this->perPage);


        return view('livewire.admin.quote-index', [
            'quotes' => $quote
            // 'quotes' => Quote::search('author_id', $this->search)->orderBy('id', $this->sort)->paginate($this->perPage),
            // 'persons' => Person::orderBy('name', $this->sort), 
        ]);
    }
}
