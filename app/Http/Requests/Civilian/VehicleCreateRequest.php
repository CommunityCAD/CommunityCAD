<?php

namespace App\Http\Requests\Civilian;

use Illuminate\Foundation\Http\FormRequest;

class VehicleCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'plate' => 'required|unique:vehicles,plate',
            'model' => 'required',
            'color' => 'required',
            'vehicle_status' => 'required',
        ];
    }
}
