<?php

namespace App\Http\Requests\Civilian;

use Illuminate\Foundation\Http\FormRequest;

class OfficerStoreRequest extends FormRequest
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
            'first_name' => 'required|alpha|max:255',
            'last_name' => 'required|max:255',
            'date_of_birth' => 'required|date',
            'height' => 'required',
            'weight' => 'required|numeric',
            'occupation' => 'nullable',
            'gender' => 'required',
            'race' => 'required',
            'postal' => 'required|numeric',
            'street' => 'required',
            'city' => 'required',
            'picture' => 'url|nullable',
            'user_department_id' => 'required|numeric',
            'phone_number' => 'string|nullable',
        ];
    }
}
