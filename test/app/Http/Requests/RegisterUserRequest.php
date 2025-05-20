<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /** 
     * 
     * Validation rules
     * 
    */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'age' => 'required|integer|min:1',
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,manager',
            'profile_picture' => 'nullable|image|max:2048',
        ];
    }
}
