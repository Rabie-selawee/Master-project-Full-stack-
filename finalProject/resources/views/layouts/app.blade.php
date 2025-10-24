<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Delivery App</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="bg-red-500 text-white p-4 flex justify-between">
        <a href="/" class="font-bold text-xl">🍔 FoodApp</a>
        <div>
           <a href="{{ route('restaurants.index') }}" class="px-3 hover:underline">Restaurants</a>
<a href="{{ route('dishes.index') }}" class="px-3 hover:underline">Dishes</a>
<a href="{{ route('orders.index') }}" class="px-3 hover:underline">Orders</a>

        </div>
    </nav>

    <div class="container mx-auto p-6">
        @yield('content')
    </div>
</body>
</html>
