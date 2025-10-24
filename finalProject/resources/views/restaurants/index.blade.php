@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Restaurants</h1>

<a href="{{ route('restaurants.create') }}" class="bg-red-500 text-white px-4 py-2 rounded">Add Restaurant</a>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
    @foreach($restaurants as $restaurant)
    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-xl font-semibold">{{ $restaurant->name }}</h2>
        <p class="text-gray-600">{{ $restaurant->location }}</p>
        <p class="mt-2 text-sm">{{ $restaurant->description }}</p>
        <a href="{{ route('restaurants.show', $restaurant->id) }}" class="text-red-500 mt-3 inline-block">View</a>
    </div>
    @endforeach
</div>
@endsection
