<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'images' => 'required',
            'images.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'videos.*' => 'nullable|image',
            'weight' => 'required|integer',
            'category_id' => 'required|integer|exists:categories,id',
            'attributes' => 'nullable',
            'tier_variation' => 'nullable|array',
            'demension' => 'nullable|array',
            'model_list' => 'nullable|array',
        ];
    }
}
