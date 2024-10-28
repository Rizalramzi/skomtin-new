<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item: {{ $item->name }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/main.js')
</head>
<body>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl mb-4">Edit Item: {{ $item->name }}</h1>

        <form action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nama Item:</label>
                <input type="text" id="name" name="name" class="border rounded w-full py-2 px-3" value="{{ $item->name }}" required>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700">Harga:</label>
                <input type="number" id="price" name="price" class="border rounded w-full py-2 px-3" value="{{ $item->price }}" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Item</button>
        </form>

        <a href="{{ route('store') }}" class="mt-4 inline-block text-blue-500">Kembali ke Daftar Item</a>
    </div>
</body>
</html>
