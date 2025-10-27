@extends('layouts.app')

@section('content')
<div class="container py-5" style="min-height:80vh;">
    <div class="card shadow-lg border-0 mx-auto" style="max-width:800px; border-top:6px solid #e97b36;">
        <div class="card-body">
            <h1 class="text-center mb-4" style="font-weight:bold; color:#e97b36;">تفاصيل الطلب</h1>

            <div class="d-flex flex-column flex-md-row align-items-center mb-4">
                <img src="{{ asset('images/' . $order->dish->image) }}" alt="{{ $order->dish->name }}"
                     style="width:300px; height:200px; object-fit:cover; border-radius:10px; margin-right:20px;">
                <div class="mt-3 mt-md-0">
                    <h2 class="fw-bold">{{ $order->dish->name }}</h2>
                    <p class="text-muted">{{ $order->dish->description }}</p>
                </div>
            </div>

            <hr>

            <p><strong>الاسم:</strong> {{ $order->name }}</p>
            <p><strong>رقم الهاتف:</strong> {{ $order->phone }}</p>
            <p><strong>الكمية:</strong> {{ $order->quantity }}</p>
            <p><strong>الإجمالي:</strong> {{ $order->total_price }} $</p>
            <p><strong>ملاحظات:</strong> {{ $order->notes ?? 'لا توجد ملاحظات' }}</p>
            <p class="text-muted"><strong>تاريخ الطلب:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>

            <div class="text-center mt-4">
                <a href="{{ route('orders.index') }}" class="btn btn-dark px-4">رجوع إلى الطلبات</a>
            </div>
        </div>
    </div>
</div>
@endsection
