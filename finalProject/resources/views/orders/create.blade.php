@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-5" style="font-size:3rem; font-weight:bold;">إنشاء طلب جديد</h1>

    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="dish_id" class="form-label">اختر صنف:</label>
                    <select class="form-select" id="dish_id" name="dish_id" required>
                        <option value="">اختر...</option>
                        @foreach($dishes as $dish)
                            <option value="{{ $dish->id }}">{{ $dish->name }} - {{ $dish->restaurant->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">الكمية:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1" required>
                </div>

                <button type="submit" class="btn btn-dark btn-lg w-100">إرسال الطلب</button>
            </form>
        </div>
    </div>
</div>
@endsection
