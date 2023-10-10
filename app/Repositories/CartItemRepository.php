<?php

namespace App\Repositories;

use App\Models\CartItem;
use App\Repositories\ActionModelTraits;
use App\Repositories\BaseRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;

class CartItemRepository extends BaseRepository implements BaseRepositoryInterface
{
    use ActionModelTraits;

    public function model()
    {
        return CartItem::class;
    }
}
