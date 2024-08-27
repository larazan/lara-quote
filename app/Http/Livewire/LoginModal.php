<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class LoginModal extends Component
{
    public $username = '';
    public $password = '';
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
    
    public function render()
    {
        return view('livewire.login-modal');
    }
}
