<?php

namespace App\Http\Requests\Api\v1\Emergency;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CreateCallRequest extends FormRequest
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
            'narrative' => "required",
            'location' => "required",
            'city' => "required",
            'type' => "numeric|in:1,2,3",
            'source' => "in:AVL,ENRUTE,ONSCN,BRK,OFFDTY - RPT",
            'nature' => "alpha",
            'priority' => "numeric|in:1,2,3,4,5",
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
