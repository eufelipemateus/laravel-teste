<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Payment extends FormRequest
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
            'max_portion'=> 'required|integer|min:1',
            'pix_discount'=> 'required|integer|between:0,100',
            'billet_discount'=>'required|integer|between:0,100',
            'min_portion_value'=>'required|integer'
        ];
    }
}
