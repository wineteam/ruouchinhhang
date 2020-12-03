<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAddProduct extends FormRequest
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
            'name' => 'required | string | max:255',
            'codePro' => 'required | string',
            'price' => 'required | integer',
            'size' => 'required | string | max:255',
            'vintage' => 'required | string | max:255',
            'detail' => 'max:255',
            'discount' => 'required | integer',
            'nation' => 'required | string | max:255',
            'amount' => 'required | integer',
    
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'Mảng :attribute yêu cầu bắt buộc.',

        'codePro.required' => 'Mảng :attribute yêu cầu bắt buộc.',

        'price.required' => 'Mảng :attribute yêu cầu bắt buộc.',
        'price.integer' => 'Mảng :attribute yêu câu số nguyên.',

        'size.required' => 'Mảng :attribute yêu cầu bắt buộc.',

        'vintage.required' => 'Mảng :attribute yêu cầu bắt buộc.',

        'detail.required' => 'Mảng :attribute yêu cầu bắt buộc.',

        'discount.required' => 'Mảng :attribute yêu cầu bắt buộc.',
        'discount.integer' => 'Mảng :attribute yêu câu số nguyên.',

        'nation.required' => 'Mảng :attribute yêu cầu bắt buộc.',

        'description.required' => 'Mảng :attribute yêu cầu bắt buộc.',

        'amount.required' => 'Mảng :attribute yêu cầu bắt buộc.',
        'amount.integer' => 'Mảng :attribute yêu câu số nguyên.',
    ];
}
}
