<?php

namespace App\Http\Requests\Civilian;

use Illuminate\Foundation\Http\FormRequest;

class BusinessStoreRequest extends FormRequest
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
            'name' => 'required|max:255',
            'about' => 'nullable|max:255',
            'owner_id' => 'required|numeric',
            'postal' => 'required|numeric',
            'street' => 'required',
            'city' => 'required',
            'logo' => 'url|nullable',
        ];
    }
}
