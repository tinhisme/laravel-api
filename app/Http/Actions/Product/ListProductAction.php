<?php

namespace App\Http\Actions\Product;

use App\Http\Shared\Actions\BaseAction;
use App\Repositories\ProductRepository;


class ListProductAction extends BaseAction
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
        $products = $this->productRepository->where(['user_id' => $userId]);

        if(!empty($this->request->get('category_id'))){
            $products->where('category_id', $this->request->get('category_id'));
        }

        return $products->get();
    }
}
