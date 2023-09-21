<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttributeType extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'list_units',
        'created_by',
        'updated_by',
    ];


}
