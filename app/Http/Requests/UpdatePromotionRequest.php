<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromotionRequest extends FormRequest
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
            'coupon' => 'required|string|unique:promotions',
            'title' => 'required|string|unique:promotions',
            'description' => 'required|string|min:20|max:255',
            'start_date' => 'required|date_format:Y-m-d H:i:s',
            'end_date' => 'required|date_format:Y-m-d H:i:s|after_field:start_date',
            'minimum_payment' => 'required|numeric|min:0|not_in:0',
            'discount' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'image_path' => 'required|string|min:6|max:255',
            'active' => 'required',
        ];
    }
}
