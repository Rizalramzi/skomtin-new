<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    @vite('resources/css/app.css') <!-- Assuming you are using Vite and Tailwind CSS -->
</head>
<body>
    <div class="px-14 mt-6">
        <h1 class="text-2xl font-semibold">Your Cart</h1>

        <!-- Display success or error message -->
        @if (session('success'))
            <div class="alert alert-success bg-green-200 p-2 rounded mt-2">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger bg-red-200 p-2 rounded mt-2">{{ session('error') }}</div>
        @endif

        @if (count($cart) > 0)
            <div class="mt-4">
                <!-- List each cart item -->
                @foreach ($cart as $item)
                    <div class="border p-4 mb-4">
                        <h2 class="font-semibold">{{ $item['name'] }} - Rp. {{ number_format($item['price'], 0, ',', '.') }}</h2>
                        <p>Quantity: {{ $item['quantity'] }}</p>
                    </div>
                @endforeach

                <!-- Checkout button -->
                <form action="{{ route('checkout') }}" method="POST" class="mt-4">
                    @csrf <!-- CSRF token for security -->
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Checkout
                    </button>
                </form>
            </div>
        @else
            <p class="text-gray-500 mt-4">Your cart is empty!</p>
        @endif
    </div>
</body>
</html>
