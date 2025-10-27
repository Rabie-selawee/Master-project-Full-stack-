<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * عرض جميع الطلبات الخاصة بالمستخدم الحالي
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('orders.index', compact('orders'));
    }

    /**
     */
  public function create($dishId = null)
{
    $dish = $dishId ? Dish::find($dishId) : null;

    $dishes = Dish::all();

    return view('orders.create', compact('dish', 'dishes'));
}



    
    public function store(Request $request)
    {
        $request->validate([
            'dish_id' => 'required|exists:dishes,id',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string|max:500',
        ]);

        $dish = Dish::findOrFail($request->dish_id);
        $total = $dish->price * $request->quantity;

        Order::create([
            'user_id' => Auth::id(),
            'dish_id' => $dish->id,
            'quantity' => $request->quantity,
            'notes' => $request->notes,
            'total_price' => $total,
            'status' => 'قيد المعالجة', 
        ]);

        return redirect()->route('orders.index')->with('success', 'تم إنشاء الطلب بنجاح ✅');
    }

    /**
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

    /**
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return back()->with('success', 'تم حذف الطلب بنجاح ❌');
    }
}
