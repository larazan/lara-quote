<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Country;
use Livewire\WithPagination;
use Livewire\Component;

class CustomerIndex extends Component
{
    use WithPagination;

    public $showUserModal = false;
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $password;
    public $address1;
    public $address2;
    public $country;
    public $state;
    public $city;
    public $postCode;
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
        'phone' => 'required|min:10',
        'userStatus' => 'required'
    ];

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
        $this->address1 = $user->address1;
        $this->address2 = $user->address2;
        $this->country = $user->country_id;
        $this->state = $user->state;
        $this->city = $user->city;
        $this->postCode = $user->postcode;
        $this->userStatus = $user->status;
        $this->showUserModal = true;

        $this->userSelected = User::findOrFail($userId);
    }

    public function updateUser()
    {
        $this->validate();

        $user = User::findOrFail($this->userId);

        $user->update([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => strtolower($this->email),
            'phone' => $this->phone,
            'status' => $this->userStatus,
        ]);

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
        $key = [];
        if ($this->search) {
            $key = explode(' ', $this->search);
        }

        $customers = User::when(count($key) > 0, function ($query) use ($key) {
            foreach ($key as $value) {
                $query->orWhere('first_name', 'like', "%{$value}%")
                    ->orWhere('last_name', 'like', "%{$value}%")
                    ->orWhere('email', 'like', "%{$value}%")
                    ->orWhere('phone', 'like', "%{$value}%");
            };
        })->orderBy('order_count', 'desc')->paginate($this->perPage);

        return view('livewire.admin.customer-index', [
            'users' => User::liveSearch('first_name', $this->search)->orderBy('first_name', $this->sort)->orderBy('order_count', 'desc')->where('order_count','>',0)->paginate($this->perPage),
            'countries' => Country::orderBy('name', 'asc')->get(),
        ]);
    }

    public function routeToDetail($userId)
    {
        return redirect('/admin/customers/'.$userId);
    }
}
