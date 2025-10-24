<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'restaurant_id', // الربط مع المطعم
    ];

    // العلاقة مع المطعم
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
