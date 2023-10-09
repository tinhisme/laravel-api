<?php

namespace App\Http\Actions\Category;

use App\Http\Shared\Actions\BaseAction;
use App\Repositories\ProductRepository;

class ListCategoryOfUserAction extends BaseAction
{
    protected $productRepository;


    public function __construct
    (
        ProductRepository $productRepository,
    )
    {
        $this->productRepository = $productRepository;
    }

    public function handle()
    {
        $userId = $this->request->get('user_id') ?? auth()->user()->id;
        $products = $this->productRepository->where(['user_id' => $userId])->get();
        foreach ($products as  $product) {
            $data['category'][] = $product->getRelationValue('category')->toArray();
        }

        return $data;
    }
}
