<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <header>
        <h1>Dashboard</h1>
        <nav>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </nav>
    </header>
    <main>
        <h2>Daftar Toko</h2>
        <ul>
            @foreach ($stores as $store)
                <li>
                    <a href="{{ route('store.detail', $store->id) }}">{{ $store->name }}</a>
                </li>
            @endforeach
        </ul>
    </main>
</body>
</html>
