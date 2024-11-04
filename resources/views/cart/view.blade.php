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
                <tr class="">
                    <th>Nama Item</th>
                    <th>Harga</th>
                    <th>Kuantitas</th>
                    <th>Aksi</th> <!-- Kolom untuk aksi -->
                </tr>
            </thead>
            <tbody >
                @foreach(session('cart') as $index => $item) <!-- Tambahkan index untuk menghapus item -->
                    <tr class="border border-red-500 mt-[2vw]">
                        <td class="text-center">{{ $item['name'] }}</td>
                        <td class="text-center">Rp. {{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td class="text-center">{{ $item['quantity'] }}</td>
                        <td class="text-center">
                            <!-- Form untuk menghapus item dari keranjang -->
                            <form action="{{ route('cart.remove', $index) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white font-semibold w-24 p-[0.60rem] rounded-full">
                                    Hapus
                                </button>
                            </form>
                        </td>
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
