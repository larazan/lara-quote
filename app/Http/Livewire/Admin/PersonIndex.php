<?php

namespace App\Http\Livewire\Admin;

use App\Models\Person;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Component;

class PersonIndex extends Component
{
    use WithPagination;
    
    public $showPersonModal = false;
    public $name;
    public $bio;
    public $personId;
    public $authorId;

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

    public function showCreateModal()
    {
        $this->reset();
        $this->showPersonModal = true;
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

    public function createPerson()
    {
        $this->validate();
        
        Person::create([
          'name' => $this->name,
          'slug' => Str::slug($this->name),
          'author_id' => Str::random(12),
          'bio' => $this->bio,
      ]);
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Person created successfully']);
    }

    public function showEditModal($personId)
    {
        $this->reset(['name']);
        $this->personId = $personId;
        $person = Person::find($personId);
        $this->name = $person->name;
        $this->bio = $person->bio;
        $this->authorId = $person->author_id;
        $this->showPersonModal = true;
    }
    
    public function updatePerson()
    {
        $this->validate();

        $person = Person::findOrFail($this->personId);
        $person->update([
            'name' => $this->name,
            'slug'     => Str::slug($this->name),
            'author_id' => Str::random(12),
            'bio' => $this->bio,
        ]);
        $this->reset();
        $this->showPersonModal = false;
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Person updated successfully']);
    }

    public function deletePerson($personId)
    {
        $person = Person::findOrFail($personId);
        $person->delete();
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Person deleted successfully']);
    }

    public function closePersonModal()
    {
        $this->showPersonModal = false;
    }

    public function resetFilters()
    {
        $this->reset(['personId']);
    }
    
    public function render()
    {
        return view('livewire.admin.person-index', [
            'persons' => Person::search('name', $this->search)->orderBy('name', $this->sort)->paginate($this->perPage)
        ]);
    }

    public function routeToDetail($personId)
    {
        return redirect('/admin/persons/'.$personId);
    }
}
