<?php

namespace App\Http\Requests\Mark;

use Illuminate\Foundation\Http\FormRequest;

class StoreMarkRequest extends FormRequest
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
        $rules = [];
        $rules['mark'] = ['required', 'numeric', 'between:0,100'];
        $rules['student_id'] = ['required', 'exists:users,id'];
        $rules['subject_id'] = ['required', 'exists:subjects,id'];
        return $rules;
    }
}
