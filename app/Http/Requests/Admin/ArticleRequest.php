<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'article_name' => 'required|string|max:255|unique:articles,article_name',
        ];
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages()
    {
        return [
            'article_name.required' => 'The material name field is required.',
            'article_name.string' => 'The material name must be a string.',
            'article_name.max' => 'The material name must not exceed 255 characters.',
            'article_name.unique' => 'This material name already exists.',
        ];
    }
}
