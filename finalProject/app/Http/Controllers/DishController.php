<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of all dishes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // جلب جميع الأصناف مع بيانات المطعم المرتبط بها
        $dishes = Dish::with('restaurant')->get();

        // تمريرها للعرض
        return view('dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new dish.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created dish.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display a specific dish.
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing a dish.
     */
    public function edit(Dish $dish)
    {
        //
    }
}