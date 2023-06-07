<?php

namespace App\Http\Livewire;

use App\Models\Riddle;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Component;

class RiddleIndex extends Component
{
    use WithPagination;
    
    public $showRiddleModal = false;
    public $question;
    public $answer;
    public $riddleId;

    public $riddleStatus = 'inactive';
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
        $this->showRiddleModal = true;
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
        Riddle::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Riddle deleted successfully']);
    }

    public function createRiddle()
    {
        $this->validate();
        
        Riddle::create([
          'question' => $this->question,
          'answer' => $this->answer,
          'status' => $this->riddleStatus
      ]);
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Riddle created successfully']);
    }

    public function showEditModal($riddleId)
    {
        $this->reset(['question']);
        $this->riddleId = $riddleId;
        $riddle = Riddle::find($riddleId);
        $this->question = $riddle->question;
        $this->answer = $riddle->answer;
        $this->riddleStatus = $riddle->status;
        $this->showRiddleModal = true;
    }
    
    public function updateRiddle()
    {
        $this->validate();

        $riddle = Riddle::findOrFail($this->riddleId);
        $riddle->update([
            'question' => $this->question,
          'answer' => $this->answer,
          'status' => $this->riddleStatus
        ]);
        $this->reset();
        $this->showRiddleModal = false;
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Riddle updated successfully']);
    }

    public function deleteRiddle($riddleId)
    {
        $riddle = Riddle::findOrFail($riddleId);
        $riddle->delete();
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Riddle deleted successfully']);
    }

    public function closeRiddleModal()
    {
        $this->showRiddleModal = false;
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.riddle-index', [
            'riddles' => Riddle::orderBy('id', $this->sort)->paginate($this->perPage)
        ]);
    }
}
