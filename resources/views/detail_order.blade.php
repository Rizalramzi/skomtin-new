<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Order</title>
</head>
<body>
    <header>
        <h1>Detail Order</h1>
    </header>
    <main>
        <h2>Item yang Dipesan</h2>
        <ul>
            @foreach ($order->items as $item)
                <li>
                    {{ $item->name }} - Jumlah: {{ $item->pivot->quantity }} - Total: Rp {{ number_format($item->pivot->quantity * $item->pivot->price, 2) }}
                </li>
            @endforeach
        </ul>
        <h3>Total Harga: Rp {{ number_format($order->total_price, 2) }}</h3>
        <form action="{{ route('order.confirm', $order->id) }}" method="POST">
            @csrf
            <label>Pilihan Pembayaran:</label>
            <select name="payment_method">
                <option value="cash">Cash</option>
                <option value="cashless">Cashless</option>
            </select>
            <button type="submit">Konfirmasi Pesanan</button>
        </form>
    </main>
</body>
</html>
