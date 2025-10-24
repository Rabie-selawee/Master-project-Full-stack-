<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
{
    // جلب كل المطاعم من قاعدة البيانات
    $restaurants = \App\Models\Restaurant::all();

    // تمريرها للعرض في الصفحة
    return view('home', compact('restaurants'));
}

}
