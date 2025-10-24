@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color:#e97b36ff; min-height:100vh; padding:50px 20px;">
    <h1 class="text-center mb-5 text-white" style="font-size:3.5rem; font-weight:bold;">{{ $restaurant->name }}</h1>
    <p class="text-center text-white mb-5">{{ $restaurant->description }}</p>

    <div class="d-flex flex-column align-items-center">
        @foreach($restaurant->dishes as $dish)
            <div class="card shadow-lg border-0 d-flex flex-row align-items-center mb-4" style="width:100%; max-width:900px;">
                <!-- صورة الطبق -->
                <div class="overflow-hidden" style="width:40%; height:250px;">
                    <img src="{{ asset('images/' . $dish->image) }}" 
                         class="hover-zoom rounded" 
                         style="width:100%; height:100%; object-fit:cover;" 
                         alt="{{ $dish->name }}">
                </div>

                <!-- معلومات الطبق -->
                <div class="card-body d-flex flex-column justify-content-center" style="flex:1;">
                    <h2 class="fw-bold mb-3" style="font-size:2.5rem;">{{ $dish->name }}</h2>
                    <p class="text-muted mb-2">{{ Str::limit($dish->description, 150) }}</p>
                    <p class="fw-bold mb-3">السعر: {{ $dish->price }} $</p>
                    <a href="#" class="btn btn-dark btn-lg w-50">اطلب الآن</a>
                </div>
            </div>
        @endforeach

        @if(count($restaurant->dishes) == 0)
            <p class="text-center text-white fs-5">لا توجد أصناف لهذا المطعم حالياً.</p>
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
