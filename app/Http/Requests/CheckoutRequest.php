<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name' => 'required',
            'card-number' => 'required|min:1000000000|max:9999999999|numeric',
            'cvv' => 'required|min:100|max:999|numeric',
            'exp-month' => 'required|min:1|max:12|numeric',
            'exp-year' => 'required|min:2020|numeric',
        ];
    }

    public function messages()
    {
        return [
            'card-number.min' => 'Card Number must be 10 number',
            'card-number.max' => 'Card Number must be 10 number',
            'cvv.min' => 'CVV must be 3 number',
            'cvv.max' => 'CVV must be 3 number',
        ];
    }
}
