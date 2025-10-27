@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color: #e97b36ff; min-height:100vh; padding:50px 20px;">
    <h1 class="text-center text-white mb-5" style="font-size:4rem; font-weight:bold;">قائمة المطاعم</h1>

    <div class="d-flex flex-column align-items-center">
        @foreach($restaurants as $restaurant)
            <div class="card shadow-lg p-3 d-flex flex-row align-items-center mb-4" style="width: 100%; max-width: 1000px; transition: transform 0.3s;">
                <a href="{{ route('restaurants.show', $restaurant->id) }}" 
   style="flex-shrink:0; width:250px; height:200px; overflow:hidden; display:block;"
   class="restaurant-img-link">
    <img src="{{ asset('images/' . $restaurant->image) }}" 
         class="rounded" 
         style="width:100%; height:100%; object-fit:cover; transition: transform 0.3s;" 
         alt="{{ $restaurant->name }}">
</a>

                <div class="ms-4 d-flex flex-column justify-content-center" style="flex:1;">
                    <h2 class="fw-bold mb-2" style="font-size:3rem;">{{ $restaurant->name }}</h2>
                    <p class="mb-1"><strong>الموقع:</strong> {{ $restaurant->location }}</p>
                    <p class="mb-3">{{ Str::limit($restaurant->description, 150) }}</p>
                    <a href="tel:{{ $restaurant->phone }}" class="btn btn-dark btn-lg">{{ $restaurant->phone }}</a>
                </div>
            </div>
        @endforeach

        @if(count($restaurants) == 0)
            <p class="text-center text-white fs-4">لا يوجد مطاعم حالياً.</p>
        @endif
    </div>
</div>

<style>
    .restaurant-img-link img:hover {
        transform: scale(1.05);
        cursor: pointer;
    }
</style>
@endsection
