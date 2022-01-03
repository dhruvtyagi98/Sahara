<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'product_name'        => 'required|string|max:100',
            'product_description' => 'required|max:1000',
            'product_category'    => 'required',
            'gender'              => 'required',
            'product_size'        => 'required',
            'product_quantity'    => 'required',
            'product_location'    => 'required',
            'product_price'       => 'required|digits_between:1,6',
        ];
    }
}
