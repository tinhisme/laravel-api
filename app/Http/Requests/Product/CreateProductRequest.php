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
        $userId = auth()->user()->id;
        return [
            'name' => "required|unique:products,name,NULL,id,user_id,$userId",
            'description' => 'required|string|min:20',
            'images' => 'required',
            'images.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'videos.' => 'nullable|image',
            'weight' => 'required|integer',
            'category_id' => 'required|integer|exists:categories,id',
            'attributes' => 'nullable|json',
            'tier_variation' => 'nullable|json',
            'demension' => 'nullable|json',
            'model_list' => 'nullable|json',
        ];
    }
}
