<?php

namespace App\Http\Tasks\Cart;

use App\Repositories\CartItemRepository;

class CreateCartItemTask
{
    protected $cartItemRepository;

    public function __construct(CartItemRepository $cartItemRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
    }

    public function handle($data, $cartId)
    {
        $cartItem =  $this->cartItemRepository->where([
            'product_id' => $data['product_id'],
            'cart_id' => $cartId
        ])->first();

        if(is_null($cartItem)){
            $this->cartItemRepository->insert([$data], false);
        }else{
            $data['quantity'] += $cartItem->quantity;
            $this->cartItemRepository->where(['id' => $cartItem->id])->update(['quantity' => $data['quantity']]);
        }
    }
}
