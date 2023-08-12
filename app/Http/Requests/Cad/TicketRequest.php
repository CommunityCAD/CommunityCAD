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
            'license_id' => 'nullable|numeric',
            'vehicle_id' => 'nullable|numeric',
            'license_was_suspended' => 'nullable',
            'vehicle_was_impounded' => 'nullable',
            'showed_id' => 'nullable',
            'location_of_offense' => 'required',
            'time' => 'required',
            'date' => 'required'
        ];
    }
}
