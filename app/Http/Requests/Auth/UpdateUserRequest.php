<?php

namespace App\Http\Requests\Auth;

use App\Constants\User\UserRoleConstants;
use Illuminate\Validation\Rule;
use App\Constants\User\UserStatusConstants;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $rules['name'] = ['nullable', 'min:3', 'string'];
        $rules['username'] = ['required', 'min:8', 'string'];
        $rules['email'] = ['required', 'email', 'unique:users,email,'.$this->id];
        $rules['password'] = ['nullable', 'min:8', 'confirmed'];
        $rules['status'] = ['nullable', Rule::in(array_keys(UserStatusConstants::STATUS))];
        $rules['roles'] = ['nullable', Rule::in(array_keys(UserRoleConstants::ROLES))];
        return $rules;
    }
}
