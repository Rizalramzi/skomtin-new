<!-- resources/views/history.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="text-2xl font-semibold px-14 mt-6">Riwayat Pesanan</h1>
    <div class="px-14 mt-4">
        @foreach($orders as $order)
            <div class="border p-4 mb-4">
                <h2 class="font-semibold">Pesanan #{{ $order->id }} ({{ $order->status }})</h2>
                <p>Kantin: {{ $order->store->name }}</p>
                <h3 class="font-semibold">Detail Pesanan:</h3>
                <ul>
                    @foreach($order->items as $item)
                        <li>{{ $item->item->name }} - {{ $item->quantity }} pcs - Rp. {{ number_format($item->price, 0, ',', '.') }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</body>
</html>
