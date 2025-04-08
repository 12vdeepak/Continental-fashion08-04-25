<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
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
            'color_code' => ['required', 'string'],
            'color_image' => [
                $this->isMethod('post') ? 'nullable' : 'nullable',  // Required only on create
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048'
            ],
        ];
    }
}
