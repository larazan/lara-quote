<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:258',
            'price' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'name.required' => 'Name is required!',
                'price.required' => 'Price',
                'image.required' => 'Image is required!',
            ];
        } else {
            return [
                'name.required' => 'Name is required!',
                'price.required' => 'Price is required!',
            ];
        }
        
    }
}
