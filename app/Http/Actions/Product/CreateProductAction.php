<?php

namespace App\Http\Actions\Product;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Shared\Actions\BaseAction;
use App\Http\Tasks\Product\CreateProductTask;
use App\Repositories\ProductRepository;

class CreateProductAction extends BaseAction
{
    /**
     * @var ProductRepository $productRepository
     */
    protected $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return \Illuminate\Support\Collection|mixed
     * @throws \Exception
     */
    public function handle()
    {
        // dd( $this->request['images']->getRealPath());
        return resolve(CreateProductTask::class)->handle($this->request);

    }
}
