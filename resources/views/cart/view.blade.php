<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="text-2xl font-semibold">Keranjang Belanja</h1>

    @if(session('cart') && count(session('cart')) > 0)
        <table class="w-full mt-4">
            <thead>
                <tr>
                    <th>Nama Item</th>
                    <th>Harga</th>
                    <th>Kuantitas</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>Rp. {{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td>{{ $item['quantity'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Button Checkout -->
        <div class="mt-4">
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-light_main text-main font-semibold w-32 p-[0.60rem] rounded-full">
                    Checkout
                </button>
            </form>
        </div>
    @else
        <p>Keranjang Anda kosong.</p>
    @endif
</body>
</html>
