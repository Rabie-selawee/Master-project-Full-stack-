<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Dish;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // عرض جميع الطلبات
    public function index()
    {
        $orders = Order::with('dish')->get();
        return view('orders.index', compact('orders'));
    }

    // نموذج إنشاء طلب جديد
    public function create()
    {
        $dishes = Dish::all();
        return view('orders.create', compact('dishes'));
    }

    // تخزين الطلب الجديد
    public function store(Request $request)
    {
        $request->validate([
            'dish_id' => 'required|exists:dishes,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $order = Order::create([
            'dish_id' => $request->dish_id,
            'quantity' => $request->quantity,
            'status' => 'جديد'
        ]);

        return redirect()->route('orders.index')->with('success', 'تم إنشاء الطلب بنجاح!');
    }
}
