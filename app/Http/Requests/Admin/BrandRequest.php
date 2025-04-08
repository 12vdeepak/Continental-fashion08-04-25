<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $rules = [
            'brand_name' => 'required|string|max:255',

        ];

        if ($this->isMethod('post')) {
            // Validation rules for creation
            $rules['brand_logo'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Validation rules for updating
            $rules['brand_logo'] = 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        return $rules;
    }
}
