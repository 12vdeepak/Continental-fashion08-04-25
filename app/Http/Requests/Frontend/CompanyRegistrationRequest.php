<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRegistrationRequest extends FormRequest
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
            'company_name' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'zip_code' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'gender' => 'required|in:male,female,other',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'supervisory' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:company_registrations,email',
            'new_password' => 'required|string|min:8|confirmed',
            'new_password_confirmation' => 'required|string|min:8',
            'vat_id_number' => 'required|string|max:255',
            'business_registration' => 'nullable|file|mimes:pdf|max:2048',
            'note' => 'nullable|string',
            'terms_accepted' => 'accepted',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'company_name.required' => 'Company name is required',
            'street.required' => 'Street address is required',
            'zip_code.required' => 'Zip code is required',
            'city.required' => 'City is required',
            'country.required' => 'Country is required',
            'phone_number.required' => 'Phone number is required',
            'gender.required' => 'Please select your gender',
            'gender.in' => 'Please select a valid gender option',
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'supervisory.required' => 'Supervisory selection is required',
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email is already registered',
            'new_password.required' => 'Password is required',
            'new_password.min' => 'Password must be at least 8 characters',
            'new_password.confirmed' => 'Passwords do not match',
            'vat_id_number.required' => 'VAT ID number is required',
            'business_registration.required' => 'Business registration document is required',
            'business_registration.mimes' => 'Business registration must be a PDF file',
            'business_registration.max' => 'Business registration file should not exceed 2MB',
            'terms_conditions.required' => 'You must accept the terms and conditions',
            'terms_conditions.accepted' => 'You must accept the terms and conditions',
        ];
    }
}
