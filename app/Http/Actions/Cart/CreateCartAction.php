<?php

namespace App\Http\Actions\Cart;

use App\Helpers\Common;
use Illuminate\Support\Facades\DB;
use App\Http\Shared\Actions\BaseAction;
use App\Http\Tasks\Cart\CreateCartItemTask;
use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;

class CreateCartAction extends BaseAction
{

    protected $productRepository;

    protected $cartRepository;

    /**
     * @param CartRepository $cartRepository
     */
    public function __construct
    (
        CartRepository $cartRepository,
        ProductRepository $productRepository
    )
    {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * @return \Illuminate\Support\Collection|mixed
     * @throws \Exception
     */
    public function handle()
    {
        $data = $this->request->all();
        $productId = $data['product_id'];
        $userId = auth()->user()->id;
        $product = $this->productRepository->where(['id' => $productId])->first();
        $sellerID = $product->getRelationValue('user')->id;

        $dataCart = [
            'user_id' => $userId,
            'seller_id' => $sellerID
        ];

        DB::beginTransaction();

        $cartId = $this->cartRepository->where($dataCart)->first()->id;

        if(is_null($cartId)){
            $cartId = $this->cartRepository->insertGetId($dataCart, false);
        }

        resolve(CreateCartItemTask::class)->handle($data, $cartId);

        DB::commit();

    }
}
