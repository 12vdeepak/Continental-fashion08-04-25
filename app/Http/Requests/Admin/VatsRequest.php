<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VatsRequest extends FormRequest
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
            'country_id' => 'required|exists:countries,id',
            'vat_percentage' => 'required|numeric|min:0|max:100',
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages(): array
    {
        return [
            'country_id.required' => 'Please select a country.',
            'country_id.exists' => 'Selected country does not exist.',
            'vat_percentage.required' => 'VAT percentage is required.',
            'vat_percentage.numeric' => 'VAT percentage must be a number.',
            'vat_percentage.min' => 'VAT percentage cannot be negative.',
            'vat_percentage.max' => 'VAT percentage cannot exceed 100%.',
        ];
    }
}
