<?php

namespace App\Http\Requests;

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
        return [
            'email' => 'required|email|max:255|unique:users,email',
            'fullName' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'educationalLevel' => 'required|string|max:255',
            'role' => 'required|in:admin,intern',
            'bioInfo' => 'nullable|array',
            'bioInfo.*' => 'string|max:255',
            'skills' => 'nullable|array',
            'skills.*' => 'string|max:255',
        ];
    }
}
