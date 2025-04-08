<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CancellationRequest extends FormRequest
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
    public function rules()
    {
        return [
            'description' => 'required|min:10|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'The cancellation policy description is required.',
            'description.min' => 'The description must be at least 10 characters.',
            'description.max' => 'The description cannot exceed 10000 characters.',
        ];
    }
}
