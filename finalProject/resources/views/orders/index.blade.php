@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-5" style="font-size:3rem; font-weight:bold;">الطلبات</h1>

    <div class="text-center mb-4">
        <a href="{{ route('orders.create') }}" class="btn btn-dark btn-lg">إنشاء طلب جديد</a>
    </div>

    <div class="row g-4 justify-content-center">
        @foreach($orders as $order)
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-lg">
                    <div class="card-body text-center">
                        <h3 class="card-title fw-bold">{{ $order->dish->name }}</h3>
                        <p>كمية: {{ $order->quantity }}</p>
                        <p>الحالة: {{ $order->status }}</p>
                    </div>
                </div>
            </div>
        @endforeach

        @if(count($orders) == 0)
            <p class="text-center fs-5">لا توجد طلبات حالياً.</p>
        @endif
    </div>
</div>
@endsection
