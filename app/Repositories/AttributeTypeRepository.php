<?php

namespace App\Repositories;

use App\Models\AttributeType;
use App\Repositories\ActionModelTraits;
use App\Repositories\BaseRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;

class AttributeTypeRepository extends BaseRepository implements BaseRepositoryInterface
{
    use ActionModelTraits;

    public function model()
    {
        return AttributeType::class;
    }
}