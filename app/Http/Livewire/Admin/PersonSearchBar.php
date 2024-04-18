<?php

namespace App\Http\Livewire\Admin;

use App\Models\Person;
use Livewire\Component;

class PersonSearchBar extends Component
{

    public $selectedPerson;
    public $personName = '';
    public $persons;
    public $personId = NULL;

    public function mount()
    {
        $this->persons = Person::all();
        $this->selectedPerson = null;
    }

    public function getPersonProperty()
    {
        if ($this->personName != NULL) {
            return Person::where('name', 'like', '%'.$this->personName.'%')->paginate(10);
        } else {
            // return Player::all();
            return Person::orderBy('id', 'asc')->paginate(20);
        }
    }

    public function render()
    {
        return view('livewire.admin.person-search-bar', [
            'people' => Person::orderBy('id', 'asc')->get()->toArray()
        ]);
    }

    public function routeToDetail($personId)
    {
        return redirect('/admin/persons/'.$personId);
    }
}
