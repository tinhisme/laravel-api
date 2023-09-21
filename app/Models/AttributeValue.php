<?php

namespace App\Models;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttributeValue extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'attribute_id',
        'created_by',
        'updated_by',
    ];

    public function attribute() {
        return $this->belongsTo(Attribute::class);
    }

}
