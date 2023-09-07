<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, NodeTrait, SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'parent_id',
        'description',
        'image',
        'status',
        'created_by',
        'updated_by',
    ];

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getLatestRecord()
    {
        return $this->newQuery()->latest('updated_at')->first();
    }
}
