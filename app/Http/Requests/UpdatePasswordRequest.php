<?php

namespace App\Http\Requests;

use App\Rules\PasscheckRule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
        $rules = [
            'password' => ['required', 'confirmed', Password::min(8)->uncompromised()],
        ];

        if ($this->user()->hasPassword()) {
            $rules['current_password'] = ['required', new PasscheckRule()];
        }

        return $rules;
    }

    public function newPassword(): string
    {
        return $this->get('password');
    }
}
