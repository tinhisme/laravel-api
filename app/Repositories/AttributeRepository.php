<?php

namespace App\Repositories;

use App\Models\Attribute;
use App\Repositories\ActionModelTraits;
use App\Repositories\BaseRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;

class AttributeRepository extends BaseRepository implements BaseRepositoryInterface
{
    use ActionModelTraits;

    public function model()
    {
        return Attribute::class;
    }
}