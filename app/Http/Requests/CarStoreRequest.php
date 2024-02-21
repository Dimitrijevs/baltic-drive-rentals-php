<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
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
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'horsepower' => 'required',
            'body_type' => 'required',
            'fuel_type' => 'required|min:3',
            'emissions' => 'required',
            'gearbox' => 'required',
            'price_per_day' => 'required',
            'price_per_km' => 'required',
            'carImage1' => 'required|image',
            'carImage2' => 'required|image',
            'carImage3' => 'required|image',
            'carImage4' => 'nullable|image',
            'carImage5' => 'nullable|image',
            'carImage6' => 'nullable|image',
            'carImage7' => 'nullable|image',
            'carImage8' => 'nullable|image',
        ];
    }
}
