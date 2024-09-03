<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class LoginModal extends Component
{
    public $firstName;
    public $lastName;
    public $email = '';
    public $username = '';
    public $password = '';
    public $confirmPassword = '';
    public $currentPath = '';
    public $showModal = false;

    public function mount()
    {
        $this->currentPath = Request::getRequestUri(); // $request()->path();
    }

    protected $rules = [
        'username' => 'required|email|string',
        'password' => 'required|string',
    ];

    public function openLoginModal()
    {
        $this->showModal = true;
    }

    public function closeLoginModal()
    {
        $this->showModal = false;
    }

    public function login(Request $request)
    {
        $this->validate();

        if ($this->attemptLogin()) {
            // login success
            $request->session()->regenerate();
            return redirect()->intended($this->currentPath);
        }

        // login failure
        session()->flash('error', 'These credentials do not match our records.');
        return;
    }

    protected function attemptLogin()
    {
        return $this->guard()->attempt(
            [
                'email' => $this->username,
                'password' => $this->password,
            ]
        );
    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function store()
    {
        $this->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed'
        ]);

        $user = User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'password'  => bcrypt($this->password)
        ]);

        if($user) {
            session()->flash('success', 'Register Berhasil!.');
            return redirect()->route('auth.login');
        }
    }
    
    public function render()
    {
        return view('livewire.login-modal');
    }
}
