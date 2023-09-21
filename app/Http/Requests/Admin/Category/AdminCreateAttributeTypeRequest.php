<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateAttributeTypeRequest extends FormRequest
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
        $rules = [];

        foreach ($this->get('data') as $key => $value) {
            $rules['data.' . $key . '.name'] = 'required|string|unique:attribute_types,name';
            // $rules['data.' . $key . '.list_units'] = 'nullable|array';
        }

        return $rules;
    }
}
