<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Product extends FormRequest
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
			'name' => 'required|string',
            'types'=> "required",
            'description'=>"required|string",
            'price_anchor'=> 'required|numeric|min:0',
            'price_promotional'=> 'required|numeric|min:0',
            'product_payment_id' => 'nullable|exists:App\Models\ProductPayment,id'
        ];
    }
}
