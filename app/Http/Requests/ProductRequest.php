<?php

namespace App\Http\Requests;

use App\Brand;
use App\Category;
use App\Rules\AlphaDashSpace;
use Illuminate\Validation\Rule;
use App\Rules\IsTwoDecimalsFloat;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'sometimes','required', 'max:250',
                new AlphaDashSpace,
                Rule::unique('products')->ignore($this->product),
            ],
            'description' => ['sometimes', 'required'],
            'price' => [
                'required',
                new IsTwoDecimalsFloat
            ],
            'category_id' => [
                'sometimes', 'required',
                Rule::in(Category::all()->pluck('id')),
            ],
            'brand_id' => [
                'sometimes', 'required',
                Rule::in(Brand::all()->pluck('id')),
            ],
        ];
    }
}
