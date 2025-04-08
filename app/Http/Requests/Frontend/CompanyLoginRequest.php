<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CompanyLoginRequest extends FormRequest
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
            'email' => 'required|email|exists:company_registrations,email',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'email.exists' => 'This email is not registered in our system.',
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters long.'
        ];
    }
}
