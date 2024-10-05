<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Toko</title>
</head>
<body>
    <header>
        <h1>{{ $store->name }}</h1>
    </header>
    <main>
        <h2>Item yang Dijual</h2>
        <ul>
            @foreach ($store->items as $item)
                <li>
                    {{ $item->name }} - Rp {{ number_format($item->price, 2) }}
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <label for="quantity">Jumlah:</label>
                        <input type="number" name="quantity" min="1" value="1" required>
                        <button type="submit">Pesan</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </main>
</body>
</html>
