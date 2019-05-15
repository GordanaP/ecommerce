<?php

namespace App\Http\Requests;

use App\Rules\AlphaDashSpace;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name' => [
                'required', 'max: 100',
                Rule::unique('brands')->ignore($this->brand),
                new AlphaDashSpace
            ]
        ];
    }
}
