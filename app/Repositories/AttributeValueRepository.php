<?php

namespace App\Repositories;

use App\Models\AttributeValue;
use App\Repositories\ActionModelTraits;
use App\Repositories\BaseRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;

class AttributeValueRepository extends BaseRepository implements BaseRepositoryInterface
{
    use ActionModelTraits;

    public function model()
    {
        return AttributeValue::class;
    }
}