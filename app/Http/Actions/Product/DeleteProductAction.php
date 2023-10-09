<?php

namespace App\Http\Actions\Product;

use App\Http\Shared\Actions\BaseAction;
use App\Repositories\ProductRepository;
use App\Exceptions\AuthenticateException;

class DeleteProductAction extends BaseAction
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
        $product = $this->productRepository->where(['id' => $this->request->get('id')])->get();

        if(is_null($product)){
            throw AuthenticateException::recordNotFound();
        }

        $this->productRepository->delete($this->request->get('id'));
        return $this->setMessage('delete_success', 'product', null, null);
    }
}
