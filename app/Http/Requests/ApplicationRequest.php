<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'department_id' => 'required|numeric',
            'why_join_department' => 'required|min:150',
            'experience_department' => 'required|min:150',
            'department_duties' => 'required|min:150',
            'scenario' => 'required|min:200',
            'about_you' => 'required|min:150',
            'skills' => 'required|min:150',
            'legal_copy' => 'required|boolean',
            'previous_member' => 'required|boolean',
            'why_join_community' => 'required|min:150',
        ];
    }
}
