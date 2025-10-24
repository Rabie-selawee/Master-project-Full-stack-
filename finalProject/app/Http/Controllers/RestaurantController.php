<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('home', compact('restaurants'));
    }

    public function show(Restaurant $restaurant)
{
    $restaurant->load('dishes');

    if($restaurant->dishes->isEmpty()) {
        $restaurant->dishes = collect([
            (object)[
                'name' => '  Original Recipe Chicken ',
                'price' => 7.99,
                'description' => 'Tender and juicy chicken pieces, seasoned with Colonel Sanders secret blend of 11 herbs and spices, then pressure-fried to golden perfection. Served hot and crispy, just like the classic KFC favorite',
                'image' => 'download (3).jpg'
            ],
            (object)[
                'name' =>'French Fries',
                'price' => 8.50,
                'description' => 'Crispy golden potato fries, lightly salted and perfectly cooked for a crunchy exterior and fluffy interior. A classic side dish that complements any chicken meal.',
                'image' => 'download (4).jpg'
            ],
            (object)[
                'name' => '  Chicken ',
                'price' => 5.99,
                'description' => 'بروستد بدون عضم 5 قطع',
                'image' => 'download (3).jpg'
            ],
        ]);
    }

    return view('restaurants.show', compact('restaurant'));
}

}
