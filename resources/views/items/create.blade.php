<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Item Baru</title>
    @vite('resources/css/app.css')
    @vite('resources/js/main.js')
</head>
<body>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl mb-4 text-center">Tambah Item Baru</h1>

        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-[1vw] flex flex-col items-center justify-center">
            @csrf
            <input type="hidden" name="store_id" value="{{ $store->id }}">

            <div class="mb-4">
                <label for="image" class="block text-md font-semibold text-gray-700 mb-2">Foto :</label>
                <input type="file" id="image" name="image" class=" px-3 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-main  form-control @error('image') is-invalid @enderror w-[50vw]" 
                    @error('image')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                >
            </div>

            <div>
                <label for="name" class="block text-md font-semibold text-gray-700 mb-2">Nama Item :</label>
                <input type="text" id="name" name="name" class="w-[50vw] px-3 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-main text-text_secondary" required autocomplete="off">
            </div>

            <div>
                <label for="price" class="block text-md font-semibold text-gray-700 mb-2">Harga :</label>
                <input type="text" id="price" name="price" class="w-[50vw] px-3 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-main text-text_secondary" required autocomplete="off">
            </div>
            
            <div>
                <label for="quantity" class="block text-md font-semibold text-gray-700 mb-2">Stok :</label>
                <input type="text" id="quantity" name="quantity" class="w-[50vw] px-3 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-main text-text_secondary" required autocomplete="off">
            </div>
            

            <div class="mb-4">
                <label for="category_id" class="block text-md font-semibold text-gray-700 mb-2">Nama Item :</label>
                <select id="category_id" name="category_id" class="w-[50vw] px-3 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-main " required>
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div> 
                <button type="submit" class="bg-main text-sm px-5 py-3 text-white rounded-tl-[5px] rounded-bl-[15px] rounded-tr-[15px] rounded-br-[5px] w-[50vw]">Tambah Item</button>
            </div>
        </form>

        <a href="{{ route('store') }}" class="mt-4 inline-block text-blue-500">Kembali ke Daftar Item</a>
    </div>
</body>
</html>
