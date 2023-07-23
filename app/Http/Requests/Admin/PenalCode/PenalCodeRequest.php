<?php

namespace App\Http\Requests\Admin\PenalCode;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class PenalCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('penal_code_manage');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'penal_code_title_id' => 'required|numeric',
            'number' => 'required|numeric',
            'name' => 'required',
            'mdcontent' => 'required',
            'notes' => 'nullable',
            'penal_code_class_id' => 'required|numeric',
            'fine' => 'sometimes|numeric',
            'bail' => 'sometimes|numeric',
            'in_game_jail_time' => 'sometimes|numeric',
            'cad_jail_time' => 'sometimes|numeric',
        ];
    }
}
