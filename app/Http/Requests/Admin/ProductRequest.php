<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'product_name' => 'required|string|max:255',
            'qty_per_carton' => 'required',
            'product_details' => 'nullable|string',
            'material_id' => 'required|exists:materials,id',
            'weight_id' => 'required|exists:weights,id',
            'article_id' => 'required|exists:articles,id',
            'size_ids' => 'nullable|array|min:1',
            'size_ids.*' => 'exists:sizes,id',
            'color_ids' => 'nullable|array|min:1',
            'color_ids.*' => 'exists:colors,id',
            'brand_ids' => 'required|array|min:1',
            'brand_ids.*' => 'exists:brands,id',
            'fabric_id' => 'nullable|exists:fabrics,id',
            'pack_poly' => 'nullable|integer|min:0',
            'country_id' => 'required|exists:countries,id',
            'manufacturer_name' => 'nullable|string|max:255',
            'add_stoke' => 'nullable|integer|min:1',
            'category_1_price' => 'nullable|numeric|min:0',
            'category_2_price' => 'nullable|numeric|min:0',
            'category_3_price' => 'nullable|numeric|min:0',
            'category_4_price' => 'nullable|numeric|min:0',
            'actual_product_price' => 'nullable|numeric|min:0',
            'sale' => 'required|in:yes,no',
            'sale_percentage' => 'nullable|integer|min:0|max:100',
            'promotion_id' => 'nullable|exists:promotionals,id',
            'wear_id' => 'nullable|exists:wears,id',
            'remarks' => 'nullable|string',
        ];

        if ($this->isMethod('POST')) {
            $rules['product_images'] = 'required|array|min:1';
            $rules['product_images.*'] = 'image|mimes:jpeg,png,jpg|max:2048';
        }

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['new_product_images'] = 'nullable|array';
            $rules['new_product_images.*'] = 'image|mimes:jpeg,png,jpg|max:2048';
            $rules['remove_image_ids'] = 'nullable|array';
            $rules['remove_image_ids.*'] = 'exists:product_images,id';
        }

        if ($this->isMethod('POST')) {
            $rules['color_specific_images'] = 'required|array|min:1';
            $rules['color_specific_images.*'] = 'nullable|exists:colors,id';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'category_id.required' => 'Please select a category.',
            'sub_category_id.required' => 'Please select a sub-category.',
            'size_ids.required' => 'Please select at least one size.',
            'size_ids.min' => 'Please select at least one size.',
            'color_ids.required' => 'Please select at least one color.',
            'color_ids.min' => 'Please select at least one color.',
            'brand_ids.required' => 'Please select at least one brand.',
            'brand_ids.min' => 'Please select at least one brand.',
            'product_images.required' => 'Please upload at least one product image.',
            'product_images.min' => 'Please upload at least one product image.',


        ];
    }
}
