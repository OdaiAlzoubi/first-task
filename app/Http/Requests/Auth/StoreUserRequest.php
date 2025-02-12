<?php

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rule;
use App\Constants\User\UserRoleConstants;
use App\Constants\User\UserStatusConstants;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        $rules['email'] = ['required', 'email', 'unique:users,email'];
        $rules['password'] = ['required', 'min:8', 'confirmed'];
        $rules['role'] = ['nullable', Rule::in(array_keys(UserRoleConstants::ROLES))];
        $rules['status']=['nullable',Rule::in(array_keys(UserStatusConstants::STATUS))];
        return $rules;
    }
}
