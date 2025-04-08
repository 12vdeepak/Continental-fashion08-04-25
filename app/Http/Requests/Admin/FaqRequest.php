<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'question.required' => 'The question field is required.',
            'question.string' => 'The question must be a valid text.',
            'question.max' => 'The question cannot exceed 255 characters.',
            'answer.required' => 'The answer field is required.',
            'answer.string' => 'The answer must be a valid text.',
        ];
    }
}
