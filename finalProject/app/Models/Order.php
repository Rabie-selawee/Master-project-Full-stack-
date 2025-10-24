<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'dish_id',
        'quantity',
        'status'
    ];

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}
