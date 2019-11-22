<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            'order_id' => 'required|exists:orders,id|unique:payments',
            'user_id' => 'required|exists:users',
            'bank' => 'required|in:BCA,BRI,Mandiri,BNI,Maybank BII,Other',
            'card_number' => 'required|numeric',
            'card_name' => 'required|string|min:6|max:255',
        ];
    }
}
