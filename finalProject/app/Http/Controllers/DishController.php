<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::with('restaurant')->get();

        return view('dishes.index', compact('dishes'));
    }

    /**
     */
    public function create()
    {
        //
    }

    /**
     */
    public function store(Request $request)
    {
        //
    }

   
    public function show(Dish $dish)
    {
        //
    }

    
    public function edit(Dish $dish)
    {
        //
    }
}