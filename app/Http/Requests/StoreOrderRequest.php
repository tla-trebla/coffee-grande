<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'order_number' => 'required|string|unique:orders',
            'status' => 'required|in:not paid,being processed,ready to take,sending,done,canceled|',
            'name' => 'required|string|min:6|max:255',
            'address' => 'required|string|min:6|max:255',
            'phone' => 'required|numeric|phone_number|size:12',
            'delivery_method' => 'required|in:take away,GOFOOD',
            'delivery_cost' => 'required|numeric|min:0|not_in:0',
            'discount' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'sub_total' => 'required|numeric|min:0|not_in:0',
            'total' => 'required|numeric|min:0|not_in:0',
            'expired_date' => 'required|date_format:Y-m-d H:i:s|after:1 hours',
        ];
    }
}
