@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color:#e97b36ff; min-height:100vh; padding:50px 20px;">
    <h1 class="text-center mb-5 text-white" style="font-size:3.5rem; font-weight:bold;">جميع الأصناف</h1>

    <div class="row g-5 justify-content-center">
        @foreach($dishes as $dish)
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-lg border-0">
                    <div class="overflow-hidden" style="height:250px;">
                        <img src="{{ asset('images/' . $dish->image) }}" 
                             class="card-img-top hover-zoom" 
                             style="width:100%; height:100%; object-fit:cover;" 
                             alt="{{ $dish->name }}">
                    </div>

                    <div class="card-body text-center">
                        <h2 class="card-title fw-bold mb-3" style="font-size:2rem;">{{ $dish->name }}</h2>
                        <p class="text-muted mb-2">{{ Str::limit($dish->description, 100) }}</p>
                        <p class="fw-bold mb-2">السعر: {{ $dish->price }} $</p>
                        <p class="text-primary mb-0">المطعم: {{ $dish->restaurant->name }}</p>
                        <a href="#" class="btn btn-dark btn-lg w-100 mt-3">اطلب الآن</a>
                    </div>
                </div>
            </div>
        @endforeach

        @if(count($dishes) == 0)
            <p class="text-center text-white fs-5">لا توجد أصناف حالياً.</p>
        @endif
    </div>
</div>

<style>
.hover-zoom {
    transition: transform 0.4s ease;
}
.hover-zoom:hover {
    transform: scale(1.1);
}
</style>
@endsection
