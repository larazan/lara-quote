<?php

namespace App\Http\Livewire\Admin;

use App\Models\Person;
use App\Models\Quote;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Component;

class PersonDetail extends Component
{
    use WithPagination;
    
    public $showQuoteModal = false;
    public $name;
    public $bio;
    public $personId = 200;
    public $authorId;
    public $words;
    public $tags;
    public $person;
    // public $quotes = [];
    public $quoteId;

    public $personStatus = 'inactive';
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

    public function mount($personId) 
    {
        $this->personId = $personId;
        $person = Person::where('id', $this->personId)->first();
        $this->authorId = $person->author_id;
        $this->name = $person->name;
        // dd($person);
        // $this->quotes = Quote::liveSearch('words', $this->search)->where('author_id', $personId)->orderBy('created_at', $this->sort)->paginate($this->perPage);
    }

    public function booted()
    {
        $person = Person::where('id', $this->personId)->first();
        $this->authorId = $person->author_id;
        $this->name = $person->name;
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
        Person::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Person deleted successfully']);
    }

    public function createQuote()
    {
        $this->validate();
        
        Person::create([
            'words' => $this->words,
            'tags' => $this->tags,
            'author_id' => $this->authorId,
      ]);
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Person created successfully']);
    }

    public function showEditModal($quoteId)
    {
        $this->reset(['name']);
        $this->quoteId = $quoteId;
        $quote = Quote::find($quoteId);
        $this->words = $quote->words;
        $this->tags = explode(',', $quote->tags);
        $this->authorId = $quote->author_id;
        $this->showQuoteModal = true;
    }
    
    public function updateQuote()
    {
        $this->validate();

        $quote = Quote::findOrFail($this->quoteId);
        $quote->update([
            'words' => $this->words,
            'tags' => $this->tags,
            'author_id' => $this->authorId
        ]);

        $this->reset();
        $this->showQuoteModal = false;
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Person updated successfully']);
    }

    public function deleteQuote($personId)
    {
        $person = Person::findOrFail($personId);
        $person->delete();
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Person deleted successfully']);
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
        $key = explode(' ', $this->search);
        $quote = Quote::where(function ($q) use ($key) {
            foreach ($key as $value) {
                $q->orWhere('words', 'like', "%{$value}%")
                ->orWhere('tags', 'like', "%{$value}%");
            }
        })->orderBy('id', $this->sort)->paginate($this->perPage);

        return view('livewire.admin.person-detail', [
            'quotes' => Quote::liveSearch('words', $this->search)->where('id', $this->personId)->orderBy('created_at', $this->sort)->paginate($this->perPage),
        ]);
    }
}
