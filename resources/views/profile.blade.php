<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header>
        <h1>Profil Pengguna</h1>
        <nav>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </nav>
    </header>
    <main>
        @if (Auth::guard('customer')->check())
            @php
                $user = Auth::guard('customer')->user();
            @endphp
            <h2>Selamat datang, {{ $user->name }}</h2>
            <p>NISN: {{ $user->nisn }}</p>
            <p>Kelas: {{ $user->class }}</p>

            <h3>Daftar Pesanan Anda:</h3>
            <ul>
                @foreach ($user->orders as $order)
                    <li>Pesanan ID: {{ $order->id }} - Status: {{ $order->status }}</li>
                @endforeach
            </ul>
        @elseif (Auth::guard('seller')->check())
            @php
                $user = Auth::guard('seller')->user();
            @endphp
            <h2>Selamat datang, {{ $user->name }}</h2>
            <p>Username: {{ $user->username }}</p>

            <h3>Daftar Toko Anda:</h3>
            <ul>
                @foreach ($user->stores as $store)
                    <li>Toko: {{ $store->name }}</li>
                @endforeach
            </ul>
        @else
            <h2>Anda belum login.</h2>
            <a href="{{ route('login.customer') }}">Masuk sebagai Customer</a>
            <a href="{{ route('login.seller') }}">Masuk sebagai Seller</a>
        @endif
    </main>
</body>
</html>
