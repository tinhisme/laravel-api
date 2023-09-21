<?php

namespace App\Models;

use App\Casts\Json;
use App\Models\Category;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory, NodeTrait;
    protected $fillable = [
        'id',
        'name',
        'status',
        'category_id',
        'attribute_type_id',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'attribute_type_id' => Json::class,
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
