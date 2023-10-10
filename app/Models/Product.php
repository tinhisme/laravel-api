<?php

namespace App\Models;

use App\Casts\Json;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'description',
        'images',
        'list_videos',
        'weight',
        'attributes',
        'tier_variation',
        'demension',
        'model_list',
        'status',
        'created_by',
        'updated_by',
        'category_id',
        'user_id',
        'stock',
        'quantity'
    ];

    protected $casts = [
        'attributes' => 'array',
        'tier_variation' => 'array',
        'demension' => 'array',
        'model_list' => 'array',
        'list_images' => Json::class
    ];

    public function getLatestRecord()
    {
        return $this->newQuery()->latest('updated_at')->first();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
