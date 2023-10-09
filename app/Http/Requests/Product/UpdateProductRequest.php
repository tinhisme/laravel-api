<?php

namespace App\Http\Requests\Product;

use App\Models\Role;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $userIdTagert = Product::find($this->get('id'))->first()->user_id;
        $user = auth()->user();
        if($userIdTagert == $user->id || $user->getRelationValue('role')->name ==  Role::ROLE_ADMIN){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $productId = $this->get('id');
        $userIdTagert = Product::where('id', $productId)->first()->user_id;
        return [
            'id' => 'required|integer|exists:products,id',
            'name' => "nullable|unique:products,name,$productId,id,user_id,$userIdTagert",
            'description' => 'nullable|string|min:20',
            'images' => 'nullable',
            'images.*' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'videos.' => 'nullable|image',
            'weight' => 'nullable|integer',
            'category_id' => 'nullable|integer|exists:categories,id',
            'attributes' => 'nullable|json',
            'tier_variation' => 'nullable|json',
            'demension' => 'nullable|json',
            'model_list' => 'nullable|json',
        ];
    }
}
