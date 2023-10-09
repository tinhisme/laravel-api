<?php

namespace App\Http\Requests\Product;

use App\Models\Role;
use App\Models\Product;
use App\Exceptions\AuthenticateException;
use Illuminate\Foundation\Http\FormRequest;

class DeleteProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $product = Product::where('id', $this->get('id'))->first();
        if(is_null($product)){
            throw AuthenticateException::recordNotFound();
        }

        $user = auth()->user();
        if($product->user_id == $user->id || $user->getRelationValue('role')->name ==  Role::ROLE_ADMIN){
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
        return [
            'id' => 'required|integer|exists:products,id',
        ];
    }
}
