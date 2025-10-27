@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color:#e97b36ff; min-height:100vh; padding:50px 20px;">
    <h1 class="text-center text-white mb-5" style="font-size:3.5rem; font-weight:bold;">جميع الأصناف</h1>

    <div class="row g-4 justify-content-center">
        @forelse($dishes as $dish)
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100 shadow-lg border-0" style="background-color:#fff5f0; border:1px solid #ffa36c; border-radius:0.75rem;">
                   <div class="overflow-hidden" style="height:180px;">
    <img src="{{ asset('images/' . $dish->image) }}" 
         class="card-img-top hover-zoom" 
         style="width:100%; height:100%; object-fit:contain;" 
         alt="{{ $dish->name }}">
</div>

                    <div class="card-body text-center" style="padding:1.5rem;">
                        <h2 class="fw-bold mb-2" style="font-size:2rem;">{{ $dish->name }}</h2>
                        <p class="text-orange-800 mb-1">{{ Str::limit($dish->description, 100) }}</p>
                        <p class="fw-bold mb-1">السعر: {{ $dish->price }} $</p>
                        <p class="text-orange-900 mb-1">المطعم: {{ $dish->restaurant->name }}</p>
                        <a href="{{ route('orders.create', ['dish' => $dish->id]) }}" 
                           class="btn w-100 text-white" style="background-color:#ff8c42;">اطلب الآن</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-white fs-5">لا توجد أصناف حالياً.</p>
        @endforelse
    </div>
</div>

<style>
.hover-zoom {
    transition: transform 0.4s ease;
}
.hover-zoom:hover {
    transform: scale(1.1);
    cursor: pointer;
}
</style>
@endsection
