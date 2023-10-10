<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'seller_id',
        'quantity',
        'product_id'
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }
}
