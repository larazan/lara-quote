<?php

namespace App\Http\Livewire\Admin;

use App\Models\Newsletter;
use Livewire\WithPagination;
use Livewire\Component;

class NewsletterIndex extends Component
{
    use WithPagination;

    public $showNewsletterSubscriberModal = false;
    public $email;
    public $newsletterSubscriberId;
    public $newsletterSubscriberStatus = 0;
    public $statuses = [
        0 => 'active',
        1 => 'inactive'
    ];

    public $search = '';
    public $sort = 'asc';
    public $perPage = 5;

    public $showConfirmModal = false;
    public $deleteId = '';

    protected $rules = [
        'email' => 'required',
    ];

    public function showCreateModal()
    {
        $this->showNewsletterSubscriberModal = true;
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
        Newsletter::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'NewsletterSubscriber deleted successfully']);
    }

    public function createNewsletterSubscriber()
    {
        $this->validate();

        Newsletter::create([
          'email' => $this->email,
          'status' => $this->newsletterSubscriberStatus
        ]);

        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'NewsletterSubscriber created successfully']);
    }

    public function showEditModal($newsletterSubscriberId)
    {
        $this->reset(['newsletterSubscriberName']);
        $this->newsletterSubscriberId = $newsletterSubscriberId;
        $newsletterSubscriber = Newsletter::find($newsletterSubscriberId);
        $this->email = $newsletterSubscriber->email;
        $this->newsletterSubscriberStatus = $newsletterSubscriber->status;
        $this->showNewsletterSubscriberModal = true;
    }
    
    public function updateNewsletterSubscriber()
    {
        $this->validate();
        
        $newsletterSubscriber = Newsletter::findOrFail($this->newsletterSubscriberId);
        $newsletterSubscriber->update([
            'email' => $this->email,
            'status' => $this->newsletterSubscriberStatus
        ]);
        $this->reset();
        $this->showNewsletterSubscriberModal = false;
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'NewsletterSubscriber updated successfully']);
    }

    public function deleteNewsletterSubscriber($newsletterSubscriberId)
    {
        $newsletterSubscriber = Newsletter::findOrFail($newsletterSubscriberId);
        $newsletterSubscriber->delete();
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'NewsletterSubscriber deleted successfully']);
    }

    public function closeNewsletterSubscriberModal()
    {
        $this->showNewsletterSubscriberModal = false;
        $this->reset();
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.newsletter-index', [
            'subscribers' => Newsletter::liveSearch('email', $this->search)->orderBy('id', $this->sort)->paginate($this->perPage),
        ]);
    }
}
