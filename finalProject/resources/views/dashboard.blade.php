<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
    <div class="bg-orange-100 p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold">Orders</h3>
        <p class="mt-2">عدد الطلبات: {{ $ordersCount ?? 0 }}</p>
    </div>
    <div class="bg-orange-100 p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold">Restaurants</h3>
        <p class="mt-2">عدد المطاعم: {{ $restaurantsCount ?? 0 }}</p>
    </div>
</div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
