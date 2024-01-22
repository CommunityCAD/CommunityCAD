<?php

namespace App\Http\Requests\Civilian;

use Illuminate\Foundation\Http\FormRequest;

class OfficerUpdateRequest extends FormRequest
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
            'occupation' => 'nullable',
            'postal' => 'required|numeric',
            'street' => 'required',
            'city' => 'required',
            'picture' => 'url|nullable',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'user_department_id' => 'required|numeric',
        ];
    }
}
