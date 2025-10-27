<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'dish_id', 'quantity', 'total_price', 'status', 'notes', 'restaurant_id'
    ];

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}


