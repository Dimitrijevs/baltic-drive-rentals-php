<?php

namespace App\Http\Requests;

use App\Models\Reservation;
use Illuminate\Support\Facades\Validator;
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
        Validator::extend('car_available', function ($attribute, $value, $parameters, $validator) {
            $start_date = $validator->getData()['start_date'];
            $end_date = $validator->getData()['end_date'];
            $car_id = $validator->getData()['carId'];
        
            $reservations = Reservation::where('car_id', $car_id)
                ->where(function ($query) use ($start_date, $end_date) {
                    $query->whereBetween('start_date', [$start_date, $end_date])
                        ->orWhereBetween('end_date', [$start_date, $end_date]);
                })->count();
        
            return $reservations == 0;
        }, 'The car is already reserved in this time range.');
        
        return [
            'start_time' => 'required',
            'car_start_point' => 'required|min:3|max:60',
            'car_end_point' => 'required|min:3|max:60',
            'start_date' => ['required', 'date', 'after_or_equal:today', 'car_available'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date', 'car_available'],
            'end_price' => 'required|numeric',
            'kilometers' => 'required|numeric|min:0|max:20000',
        ];
    }
}
