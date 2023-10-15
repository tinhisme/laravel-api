<?php

namespace App\Http\Actions\Cart;

use App\Helpers\Common;
use Illuminate\Support\Facades\DB;
use App\Http\Shared\Actions\BaseAction;
use App\Http\Tasks\Cart\GetCartTask;
use App\Repositories\CartRepository;
use App\Repositories\CartItemRepository;
use App\Repositories\ProductRepository;

class GetCartAction extends BaseAction
{

    protected $cartItemRepository;

    protected $cartRepository;


    public function __construct
    (
        CartRepository $cartRepository,
        ProductRepository $cartItemRepository
    )
    {
        $this->cartRepository = $cartRepository;
        $this->cartItemRepository = $cartItemRepository;
    }

    /**
     * @return \Illuminate\Support\Collection|mixed
     * @throws \Exception
     */
    public function handle()
    {
        $userId = auth()->user()->id;
        $carts = $this->cartRepository->where(['user_id' => $userId])->get();
        return resolve(GetCartTask::class)->handle($carts);
    }
}
