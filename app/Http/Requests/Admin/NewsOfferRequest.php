<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsOfferRequest extends FormRequest
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
        $rules = [
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'      => 'boolean',
        ];

        // If creating a new entry, image is required
        if ($this->isMethod('post')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required'       => 'The title field is required.',
            'title.max'            => 'The title cannot exceed 255 characters.',
            'description.required' => 'The description field is required.',
            'image.required'       => 'An image is required for news/offers.',
            'image.image'          => 'The file must be an image.',
            'image.mimes'          => 'Allowed image formats: jpeg, png, jpg, gif, svg.',
            'image.max'            => 'Maximum file size allowed is 2MB.',
        ];
    }
}
