<?php

namespace App\Http\Tasks\Cart;

use App\Repositories\CartItemRepository;

class UpdateCartTask
{
    protected $cartItemRepository;

    public function __construct(CartItemRepository $cartItemRepository)
    {
        $this->cartItemRepository = $cartItemRepository;
    }

    public function handle($data)
    {
        $query = $this->cartItemRepository->where(['id' => $data['id']])->first();

        $quantity = isset($data['quantity']) ? $data['quantity'] : $query->quantity;

        if (isset($data['action'])) {
            $quantity = $data['action'] == 'increase' ? ++$quantity : --$quantity;
        }

        $query->update(['quantity' => $quantity]);
    }
}
