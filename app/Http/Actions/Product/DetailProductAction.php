<?php

namespace App\Http\Actions\Product;

use App\Models\Attribute;
use App\Http\Shared\Actions\BaseAction;
use App\Repositories\ProductRepository;
use App\Exceptions\AuthenticateException;
use App\Repositories\AttributeRepository;
use App\Repositories\AttributeValueRepository;

class DetailProductAction extends BaseAction
{
    protected $productRepository;
    protected $attributeRepository;
    protected $attributValueRepository;


    public function __construct
    (
        ProductRepository $productRepository,
        AttributeRepository $attributeRepository,
        AttributeValueRepository $attributValueRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
        $this->attributValueRepository = $attributValueRepository;
    }

    public function handle()
    {
        $id = $this->request['id'];

        $product = $this->productRepository->where(['id' => $id])->first();

        if(is_null($product)){
            throw AuthenticateException::recordNotFound();
        }

        $attributes = [];

        foreach ($product->attributes as $attribute) {
            $name = Attribute::find($attribute['attribute_id'])->name;

            if (isset($attribute['attribute_values']['value_id'])) {
                $value = $this->attributValueRepository->find($attribute['attribute_values']['value_id'])->name;
            } else {
                $value = $attribute['attribute_values']['raw_value'] . $attribute['attribute_values']['unit'];
            }

            $attributes[] = [
                'name' => $name,
                'value' => $value
            ];
        }

        $data = [
            'name' => $product->name,
            'description' => $product->description,
            'weight' => $product->weight,
            'tier_variation' => $product->tier_variation,
            'models' => $product->model_list,
            'category' => $product->getRelationValue('category'),
            'attributes' => $attributes,
        ];

        return $data;
    }
}
