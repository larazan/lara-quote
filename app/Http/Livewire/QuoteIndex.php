<?php

namespace App\Http\Livewire;

use App\Models\Quote;
use App\Models\Person;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Component;

class QuoteIndex extends Component
{
    use WithPagination;
    
    public $showQuoteModal = false;
    public $words;
    public $authorId;
    public $tags;
    public $quoteId;

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
          'tags' => $this->tags,
          'author_id' => $this->authorId
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
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.quote-index', [
            'quotes' => Quote::search('author_id', $this->search)->orderBy('words', $this->sort)->paginate($this->perPage),
            'persons' => Person::orderBy('name', $this->sort), 
        ]);
    }
}
