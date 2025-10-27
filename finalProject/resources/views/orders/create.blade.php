@extends('layouts.app')

@section('content')
<div class="container py-5 min-vh-100">
    <h1 class="text-center mb-5 fw-bold display-5" style="color:#ff6a00;">
        @if($dish)
            اطلب: {{ $dish->name }}
        @else
            اختر طبقًا لبدء الطلب
        @endif
    </h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            @if($dish)
                {{-- ✅ إذا تم تمرير طبق --}}
                <div class="card shadow-lg border-0" style="background-color:#fff5f0; border:1px solid #ffa36c; border-radius:0.75rem;">
                    <img src="{{ asset('images/' . ($dish->image ?? 'default.jpg')) }}"
                         class="card-img-top"
                         style="height:300px; object-fit:cover; border-top-left-radius:0.75rem; border-top-right-radius:0.75rem;"
                         alt="{{ $dish->name }}">

                    <div class="card-body">
                        <h2 class="card-title fw-bold mb-3 text-center">{{ $dish->name }}</h2>
                        <p class="text-secondary mb-2">{{ $dish->description }}</p>

                        <p class="fw-bold mb-2">
                            السعر الفردي: <span id="price">{{ number_format($dish->price, 2) }}</span> $
                        </p>

                        <p class="fw-bold mb-4">
                            السعر الإجمالي:
                            <span id="total" class="text-success">{{ number_format($dish->price, 2) }}</span> $
                        </p>

                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="dish_id" value="{{ $dish->id }}">

                            <div class="mb-3">
                                <label for="quantity" class="form-label">الكمية</label>
                                <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" required>
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">ملاحظات (اختياري)</label>
                                <textarea id="notes" name="notes" class="form-control" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn w-100 text-white" style="background-color:#ff8c42;">تأكيد الطلب</button>
                        </form>
                    </div>
                </div>
            @else
                {{-- ⚠️ إذا لم يتم تمرير طبق --}}
                <div class="alert alert-warning text-center">
                    لم يتم اختيار أي طبق. يرجى <a href="{{ route('dishes.index') }}">العودة لقائمة الأطباق</a> لاختيار طبق.
                </div>
            @endif
        </div>
    </div>
</div>

@if($dish)
<script>
    const quantityInput = document.getElementById('quantity');
    const price = parseFloat(document.getElementById('price').textContent);
    const totalDisplay = document.getElementById('total');

    quantityInput.addEventListener('input', () => {
        const quantity = parseInt(quantityInput.value) || 1;
        totalDisplay.textContent = (price * quantity).toFixed(2);
    });
</script>
@endif
@endsection
