<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Repositories\ActionModelTraits;
use App\Repositories\BaseRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;

class CartRepository extends BaseRepository implements BaseRepositoryInterface
{
    use ActionModelTraits;

    public function model()
    {
        return Cart::class;
    }
}
