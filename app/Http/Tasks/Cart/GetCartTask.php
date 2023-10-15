<?php

namespace App\Http\Tasks\Cart;

use App\Repositories\CartItemRepository;

class GetCartTask
{
    protected $cartItemRepository;

    public function __construct(CartItemRepository $cartItemRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
    }

    public function handle($carts)
    {
        return $carts->map(function ($cart) {
            $cartItems = $cart->cartItems->map(function ($cartItem) {
                return [
                    'id' => $cartItem->id,
                    'product' => $cartItem->product,
                    'quantity' => $cartItem->quantity
                ];
            });

            return [
                'id' => $cart->id,
                'cart_item' => $cartItems,
                'seller' => $cart->seller,
            ];
        });
    }
}
