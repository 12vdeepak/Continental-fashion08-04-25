<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
            'material_name' => 'required|string|max:255|unique:materials,material_name',
        ];
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages()
    {
        return [
            'material_name.required' => 'The material name field is required.',
            'material_name.string' => 'The material name must be a string.',
            'material_name.max' => 'The material name must not exceed 255 characters.',
            'material_name.unique' => 'This material name already exists.',
        ];
    }
}
