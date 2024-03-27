<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Livewire\Component;

class UserIndex extends Component
{
    public $queryRole = '';
    public $roles = [];

    public $showUserModal = false;
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $password;
    public $passwordConfirmation;
    public $userId;
    public $userSelected;
    public $role;
    public $userStatus = 0;
    public $statuses = [
        0 => 'user',
        1 => 'admin',
    ];
    public $visible;
    public $reveal;

    public $search = '';
    public $sort = 'asc';
    public $perPage = 10;

    public $showConfirmModal = false;
    public $deleteId = '';

    protected $rules = [
        'firstName' => 'required|min:2',
        'lastName' => 'required|min:2',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:8|confirmed',
        'phone' => 'required|min:10',
        'userStatus' => 'required'
    ];

    public function mount()
    {
        $this->visible = false;
        $this->reveal = false;
    }

    public function updated()
    {

    }

    public function togglePassword()
    {
        $this->visible = !$this->visible;
    }

    public function updatedQueryRole()
    {
        $this->roles = Role::search('name', $this->queryRole)->get();
    }

    public function showCreateModal()
    {
        $this->reset(['firstName', 'lastName', 'email', 'phone', 'password']);
        $this->showUserModal = true;
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
        User::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset(['firstName', 'lastName', 'email', 'phone', 'password']);
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'User deleted successfully']);
    }

    public function createUser()
    {
        $this->validate();

        User::create([
          'first_name' => $this->firstName,
          'last_name' => $this->lastName,
          'email' => strtolower($this->email),
          'phone' => $this->phone,
          'password' => Hash::make($this->password),
          'status' => $this->userStatus,
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'User created successfully']);
    }

    public function showEditModal($userId)
    {
        $this->reset(['firstName', 'lastName', 'email', 'phone', 'password']);
        $this->userId = $userId;
        $user = User::find($userId);
        $this->firstName = $user->first_name;
        $this->lastName = $user->last_name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->userStatus = $user->status;
        $this->showUserModal = true;

        $this->userSelected = User::findOrFail($userId);
    }
    
    public function updateUser()
    {
        $this->validate();

        $user = User::findOrFail($this->userId);
        if ($this->password) {
            $user->update([
                'first_name' => $this->firstName,
                'last_name' => $this->lastName,
                'email' => strtolower($this->email),
                'phone' => $this->phone,
                'password' => Hash::make($this->password),
                'status' => $this->userStatus,
            ]);
        } else {
            $user->update([
                'first_name' => $this->firstName,
                'last_name' => $this->lastName,
                'email' => strtolower($this->email),
                'phone' => $this->phone,
                'status' => $this->userStatus,
            ]);
        }
        
        $this->reset();
        $this->showUserModal = false;
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'User updated successfully']);
    }

    public function deleteUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'User deleted successfully']);
    }

    public function closeUserModal()
    {
        $this->showUserModal = false;
        $this->reset(['userId', 'firstName', 'lastName', 'email', 'phone', 'password']);
        $this->resetValidation();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'sort', 'perPage']);
    }

    public function render()
    {
        $key = explode(' ', $this->search);
        $users = User::where(function ($q) use ($key) {
            foreach ($key as $value) {
                $q->orWhere('first_name', 'like', "%{$value}%")
                ->orWhere('last_name', 'like', "%{$value}%");
            }
        })->orderBy('id', $this->sort)->paginate($this->perPage);

        return view('livewire.admin.user-index', [
            // 'users' => User::search('first_name', $this->search)->orderBy('first_name', $this->sort)->paginate($this->perPage),
            'users' => $users,
        ]);
    }

    public function assignRole($roleName)
    {
        if ($this->userSelected->hasRole($roleName)) {
            $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Role exists']);
        }

        $this->userSelected->assignRole($roleName);
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Role assigned']);
    }

    public function removeRole($roleName)
    {
        if ($this->userSelected->hasRole($roleName)) {
            $this->userSelected->removeRole($roleName);
            $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Role removed']);
        }

        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Role not exists']);
    }
}
