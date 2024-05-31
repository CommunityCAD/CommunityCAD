<?php

namespace App\Http\Requests\Cad;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'type_id' => 'required|numeric',
            'call_id' => 'required|numeric',
            'license_id' => 'nullable|numeric',
            'vehicle_id' => 'nullable|numeric',
            'date' => 'required|date',
            'time' => 'required',
            'plate' => 'nullable|string',
            'license_was_suspended' => 'required|numeric',
            'vehicle_was_impounded' => 'required|numeric',
            'weather' => 'required',
            'traffic' => 'required',
            'speed' => 'numeric',
            'highway_street' => 'required',
            'officer_comments' => 'required',
            'in_city_of' => 'required',
            'at_intersection' => 'required',
            'speed_zone' => 'numeric',
            'speed_clocked_mode' => 'nullable|string',
            'is_dui' => 'required|numeric',
            'is_drugs' => 'required|numeric',
            'dui_test_method' => 'string|nullable',
            'dui_test_result' => 'nullable',
            'dui_test_by' => 'string|nullable',
        ];
    }
}
