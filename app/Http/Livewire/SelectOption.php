<?php

namespace App\Http\Livewire;

use App\Models\Person;
use Livewire\Component;

class SelectOption extends Component
{
    public $selectedUsers;

    public function render()
    {
        return view('livewire.select-option', [
            'persons' => Person::orderBy('name', 'asc')->get(),
        ]);
    }
}
