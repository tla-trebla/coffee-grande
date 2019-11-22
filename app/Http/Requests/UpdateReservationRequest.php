<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
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
            'reservation_number' => 'required|string|unique:reservations',
            'name' => 'required|string|min:6|max:255',
            'phone' => 'required|numeric|phone_number|size:12',
            'email' => 'required|email|min:6|max:255',
            'date' => 'date|nullable',
            'time' => 'required|regex:/(\d+\:\d+)/',
            'description' => 'required|min:6|max:255',
            'status' => 'required',
        ];
    }
}
