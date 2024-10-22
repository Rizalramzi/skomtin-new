<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $store->name }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/main.js')
</head>
<body>
    <!-- Navbar -->
    <nav class="flex justify-between p-6 shadow-lg items-center">
        <div class="flex items-center space-x-32">
            <h1 class="font-semibold text-2xl">skomtin</h1>
            <ul class="flex space-x-4">
                <a href=""><li class="text-main">Beranda</li></a>
            </ul>
        </div>
        <div class="flex items-center space-x-6">
            <div class="flex items-center bg-secondary rounded-md">
                <img src="{{ asset('assets/icons/search-icon.svg') }}" alt="Search Icon" class="w-4 h-4 ml-3">
                <input type="text" placeholder="Cari Makan .." class="outline-none bg-secondary rounded-md ml-3 w-full py-3 pr-8 text-gray-700 placeholder-gray-500 border-none text-sm">
            </div>
            <div>
                <img src="{{ asset('assets/icons/cart-icon.svg') }}" alt="Cart Icon" class="w-6 h-6">
            </div> 
            <div class="relative">
                <img src="{{ asset('assets/images/profile-picture.png') }}" alt="Profile Picture" class="rounded-full cursor-pointer profilePicture" width="40">
                <!-- Pop-up Menu -->
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden profileMenu z-50">
                    <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                    <a href="/history" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">History</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button class="block ps-4 text-start w-full py-2 text-gray-800 hover:bg-gray-100">Log Out</button>
                    </form>
                </div>
            </div>        
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="font-medium px-14 mt-12 text-md">
        <a href="/">Beranda / </a> 
        <a href="/dashboard">Daftar Pilihan Kantin / </a> 
        <a href="#" class="text-text_secondary">{{ $store->name }}</a>
    </div>

    <!-- Store Detail Section -->
    <section class="px-14 mt-[2rem]">
        <div class="flex items-center">
            <img src="{{ asset('assets/images/canteen-image.png')}}" alt="{{ $store->name }}" class="rounded-2xl" width="300">
            <div class="ps-10 space-y-4">
                <h1 class="text-2xl font-semibold">{{ $store->name }}</h1>
                <p>Aneka pentol, es kopi dll</p>
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('assets/icons/dollar-icon.svg') }}" alt="" width="30">
                    <h3 class="font-semibold">1rb - 20rb</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Item Section -->
    <section class="px-14 mt-6">
        <h1 class="text-2xl font-semibold">Menu</h1>
        <div class="grid grid-cols-4 mt-4">
            @foreach($items as $item)
            <div class="flex justify-center items-center">
                <div class="w-[90%] max-w-xs rounded-3xl overflow-hidden border-b border-r border-l border-main my-4">
                    <div class="overflow-hidden">
                        <img class="w-full transform transition-transform duration-300 ease-in-out hover:scale-110" 
                             src="{{ asset($item->image) }}" 
                             alt="{{ $item->name }}">
                    </div>
                    <div class="px-4 py-4">
                        <h1 class="text-text_secondary font-medium text-lg">{{ $item->name }}</h1>
                        <span class="block text-md font-regular text-main font-semibold">Rp. {{ number_format($item->price, 0, ',', '.') }}</span>
                        <div class="flex justify-end">
                            <!-- Button Add -->
                            <form action="{{ route('cart.add') }}" method="POST" class="inline-block">
                                @csrf
                                <input type="hidden" name="item[id]" value="{{ $item->id }}">
                                <input type="hidden" name="item[name]" value="{{ $item->name }}">
                                <input type="hidden" name="item[price]" value="{{ $item->price }}">
                                <input type="hidden" name="item[id]" value="{{ $item->id }}"> <!-- You can keep this if you need a separate item_id -->
                                <button type="submit" class="addButton bg-light_main text-main font-semibold w-28 p-[0.60rem] rounded-full transition-transform duration-300 ease-in-out">
                                    Tambah
                                </button>
                            </form>   
                        </div>
                    </div>
                    
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <footer class="mt-[6rem] py-8">
        <div class="text-center">
            <h1 class="font-semibold text-2xl">skomtin</h1>
            <p>Copyright © 2024. Skomtin. All right reserved</p>
        </div>
    </footer>

</body>
</html>
