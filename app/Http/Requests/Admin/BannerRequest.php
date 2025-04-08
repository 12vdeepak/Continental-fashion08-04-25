<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string|max:255',
        ];

        if ($this->isMethod('post')) {
            // Validation rules for creation
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif';
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            // Validation rules for updating
            $rules['image'] = 'sometimes|image|mimes:jpeg,png,jpg,gif';
        }

        return $rules;
    }
}