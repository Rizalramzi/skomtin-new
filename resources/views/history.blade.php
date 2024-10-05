<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
</head>
<body>
    <header>
        <h1>Riwayat Transaksi</h1>
    </header>
    <main>
        <h2>Transaksi Anda</h2>
        <ul>
            @foreach ($orders as $order)
                <li>
                    Order ID: {{ $order->id }} - Tanggal: {{ $order->created_at }} - Total: Rp {{ number_format($order->total_price, 2) }}
                </li>
            @endforeach
        </ul>
    </main>
</body>
</html>
