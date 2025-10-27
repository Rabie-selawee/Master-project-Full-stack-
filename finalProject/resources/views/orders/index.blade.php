@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color:#fff5f0; min-height:100vh; padding:50px 20px;">
    <h1 class="text-center mb-5" style="font-size:3rem; font-weight:bold; color:#e97b36;">طلباتي</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if($orders->count() > 0)
        <div class="d-flex flex-column align-items-center">
            @foreach($orders as $order)
                <div class="card shadow-lg border-0 mb-4" style="width:100%; max-width:900px; border-left:6px solid #e97b36;">
                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <h3 class="fw-bold" style="color:#e97b36;">{{ $order->dish->name }}</h3>
                            <p class="mb-1"><strong>الكمية:</strong> {{ $order->quantity }}</p>
                            <p class="mb-1"><strong>الإجمالي:</strong> {{ $order->total_price }} $</p>
                            <p class="text-muted mb-0"><strong>ملاحظات:</strong> {{ $order->notes ?? '—' }}</p>
                        </div>
                        <div class="mt-3 mt-md-0">
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-dark">عرض التفاصيل</a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف الطلب؟')">حذف</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center fs-4 text-muted">لا يوجد طلبات حالياً.</p>
    @endif
</div>
@endsection
