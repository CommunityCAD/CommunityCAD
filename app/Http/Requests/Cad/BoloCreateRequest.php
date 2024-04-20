<?php

namespace App\Http\Requests\Cad;

use Illuminate\Foundation\Http\FormRequest;

class BoloCreateRequest extends FormRequest
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
            'type' => 'required',
            'civilian_id' => 'numeric|nullable',
            'call_id' => 'numeric|nullable',
            'vehicle_id' => 'numeric|nullable',
            'last_location' => 'string|nullable',
            'last_appearance' => 'string|nullable',
            'last_transportation' => 'string|nullable',
            'wanted' => 'string|nullable',
            'warning' => 'string|nullable',
            'additional_information' => 'string|nullable',
        ];
    }
}
