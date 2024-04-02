<?php

namespace App\Http\Requests\Cad;

use Illuminate\Foundation\Http\FormRequest;

class CallStoreRequest extends FormRequest
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
            'nature' => 'required',
            'location' => 'required',
            'city' => 'required',
            'priority' => 'required|numeric',
            'status' => 'required',
            'source' => 'required',
            'type' => 'required|numeric',
            'narrative' => 'required',
            'linked_civilians' => 'nullable|array',
            'linked_civilians_types' => 'nullable|array',
        ];
    }
}
