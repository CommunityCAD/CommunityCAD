<?php

namespace App\Http\Requests\Api\v1\Civilian;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CreateCivilianRequest extends FormRequest
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
            'user_id' => 'required|numeric',
            'first_name' => 'required|alpha|max:255',
            'last_name' => 'required|max:255',
            'date_of_birth' => 'required|date',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'occupation' => 'nullable',
            'gender' => 'required',
            'race' => 'required',
            'postal' => 'required|numeric',
            'street' => 'required',
            'city' => 'required',
            'picture' => 'url|nullable',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
