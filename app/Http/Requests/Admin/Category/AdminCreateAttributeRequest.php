<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateAttributeRequest extends FormRequest
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
            'status' => 'nullable|integer',
            'category_id' => 'nullable|integer|exists:categories,id',
            'parent_id' => 'nullable|integer',
            'attribute_type_ids.*' => 'nullable|integer|exists:attribute_types,id',
        ];  
    }
}
