<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Delivery App</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-orange-300">

    <nav class="bg-red-500 text-orange-300 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <!-- شعار بعيد عن الروابط -->
            <a href="/" class="font-bold text-2xl">🍔 FoodApp</a>

            <!-- روابط التنقل -->
            <div class="space-x-4 hidden md:flex">
                <a href="{{ route('restaurants.index') }}" class="hover:bg-red-600 px-3 py-2 rounded transition">Restaurants</a>
                <a href="{{ route('dishes.index') }}" class="hover:bg-red-600 px-3 py-2 rounded transition">Dishes</a>
                <a href="{{ route('orders.index') }}" class="hover:bg-red-600 px-3 py-2 rounded transition">Orders</a>
            </div>

            <!-- حالة المستخدم -->
            <div class="space-x-4 flex items-center">
                @guest
                    <a href="{{ route('login') }}" class="hover:bg-red-600 px-3 py-2 rounded transition" >Login</a>
                    <a href="{{ route('register') }}" class="hover:bg-red-600 px-3 py-2 rounded transition">Register</a>
                @else
                    <span class="px-3 py-2 bg-red-700 rounded">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:bg-red-600 px-3 py-2 rounded transition">Logout</button>
                    </form>
                @endguest
            </div>

            <div class="md:hidden flex items-center">
                <button id="menu-button" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden mt-2 space-y-2 px-4">
    <a href="{{ route('restaurants.index') }}" class="block bg-orange-400 border border-orange-600 px-3 py-2 rounded transition hover:bg-orange-500">Restaurants</a>
    <a href="{{ route('dishes.index') }}" class="block bg-orange-400 border border-orange-600 px-3 py-2 rounded transition hover:bg-orange-500">Dishes</a>
    <a href="{{ route('orders.index') }}" class="block bg-orange-400 border border-orange-600 px-3 py-2 rounded transition hover:bg-orange-500">Orders</a>
    

    @guest
        <a href="{{ route('login') }}" class="block bg-orange-400 border border-orange-600 px-3 py-2 rounded transition hover:bg-orange-500">Login</a> 
        <a href="{{ route('register') }}" class="block bg-orange-400 border border-orange-600 px-3 py-2 rounded transition hover:bg-orange-500">Register</a>
    @else
        
            @csrf
            <button type="submit" class="block w-full text-left bg-orange-400 border border-orange-600 px-3 py-2 rounded transition hover:bg-orange-500">Logout</button>
        </form>
    @endguest
</div>

    </nav>

    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    <script>
        const menuButton = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
