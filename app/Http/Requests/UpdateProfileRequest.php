<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.Auth::id(),
            'username' => 'required|alpha_dash|max:255|unique:users,username,'.Auth::id(),
        ];
    }

    public function bio(): string
    {
        return (string) $this->get('bio', '');
    }

    public function first_name(): string
    {
        return (string) $this->get('first_name');
    }

    public function last_name(): string
    {
        return (string) $this->get('last_name');
    }

    public function email(): string
    {
        return (string) $this->get('email');
    }

    public function username(): string
    {
        return (string) $this->get('username');
    }

}
