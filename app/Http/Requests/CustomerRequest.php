<?php

namespace App\Http\Requests;

use App\Rules\AlphaDashSpace;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => [
                'sometimes', 'required', 'max:100',
                new AlphaDashSpace
            ],
            'last_name' => [
                'sometimes', 'required', 'max:100',
                new AlphaDashSpace
            ],
            'address' => [
                'sometimes', 'required', 'max:190'
            ],
            'postal_code' => [
                'sometimes', 'required', 'postal_code:RS'
            ],
            'city' => [
                'sometimes', 'required', 'max:100',
                new AlphaDashSpace
            ],
            'email' => [
                'sometimes', 'required', 'email', 'max:100'
            ],
            'phone' => [
                'sometimes', 'required', 'phone:RS'
            ],
        ];
    }
}
