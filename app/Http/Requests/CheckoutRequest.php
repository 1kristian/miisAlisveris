<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CheckoutRequest extends Request
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
        'payment_name' => 'required',
        'payment_company' => 'required',
        'payment_address' => 'required',
        'payment_city' => 'required',
        'payment_postcode' => 'required',
        'payment_country' => 'required',
        'shipping_name' => 'required',
        'shipping_company' => 'required',
        'shipping_address' => 'required',
        'shipping_city' => 'required',
        'shipping_postcode' => 'required',
        'shipping_country' => 'required',
        ];
    }
}

 