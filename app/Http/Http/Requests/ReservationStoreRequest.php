<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => '',
            'car_id' => '',
            'start_time' => 'required',
            'car_start_point' => 'required|min:3|max:40',
            'car_end_point' => 'required|min:3|max:40',
            'start_date' => 'required',
            'end_date' => 'required',
            'end_price' => 'required|numeric',
            'kilometers' => 'required|numeric|min:0|max:20000',
        ];
    }
}
