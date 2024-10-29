<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @vite('resources/css/font.css')
  @vite('resources/js/navbar.js')
</head>
<body class="text-dark">
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
                @if(auth()->guard('customer')->check())
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden profileMenu z-50">
                        <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                        <a href="/history" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">History</a>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button class="block ps-4 text-start w-full py-2 text-gray-800 hover:bg-gray-100">Log Out</button>
                        </form>
                    </div>
                @elseif(auth()->guard('seller')->check())
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden profileMenu z-50">
                        <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                        <a href="/history" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Order</a>
                        <a href="{{ route('store') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">My Store</a> <!-- Tautan ke toko seller -->
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button class="block ps-4 text-start w-full py-2 text-gray-800 hover:bg-gray-100">Log Out</button>
                        </form>
                    </div>
                @endif
            </div>        
        </div>
    </nav>

    <section class="mt-[3rem] px-14">
        <div class="w-full bg-main py-16 relative rounded-lg">
            <div class="px-12  relative flex">
                <div class="space-y-3">
                    @if(auth()->guard('customer')->check())
                        <h1 class="font-semibold text-2xl text-white">Selamat Datang, {{ $user->last_name }}</h1>
                    @elseif(auth()->guard('seller')->check())
                        <h1 class="font-semibold text-2xl text-white">Selamat Datang, {{ $user->name }}</h1>
                    @endif

                    <p class="text-sm text-white max-w-[60%] font-light">Cari makanan dan minuman enak kesukaanmu di sini, dari segernya es jeruk sampai pedesnya ayam geprek bisa kamu temuin disini</p>
                </div>
                <img src="{{ asset('assets/images/welcome-food-image.png') }}" alt="" class="absolute right-0 bottom-[-63px]" width="
                250">
            </div>
        </div>
    </section>

    @if(auth()->guard('customer')->check())
        <div class="font-medium px-14 mt-12 text-sm">
            <a href="">Beranda / <a href="" class="text-text_secondary">Daftar Pilihan Kantin</a></a>
        </div>

        <section class="px-14 mt-10">
            <div class="w-full">
                <h1 class="text-2xl font-semibold">Aneka Menu</h1>
                <p class="text-sm max-w-[60%] font-light">Lihat semua jenis makanan dari makanan ringan sampai minuman semuanya disini</p>
                <div class="grid grid-cols-6 mt-8 justify-center items-center">
                    @foreach ($categories as $category)
                        <a href="">
                            <div class="flex flex-col items-center space-y-4">
                                <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" class="rounded-full w-[100px] h-[100px] object-cover">
                                <h1 class="font-semibold">{{ $category->name }}</h1>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="px-14 mt-10">
            <div class="w-full">
                <h1 class="text-2xl font-semibold">Pilihan Kantin Kami</h1>
                <p class="text-sm max-w-[60%] font-light">Lihat semua pilihan kantin, cari yang paling cocok buat seleramu</p>
                <div class="grid grid-cols-4 mt-6 justify-center items-center">
                    @foreach($stores as $store)
                    <a href="{{ route('store.detail', $store->id) }}">    
                        <div class="flex justify-center">
                            <div class="card bg-white pb-4 border shadow rounded-2xl space-y-4">
                                <img src="{{ asset('storage/' . $store->image) }}" alt="{{ $store->name }}" width="240" class="rounded-xl">
                                <h1 class="text-center text-md font-semibold">{{ $store->name }}</h1>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </section>
    @elseif(auth()->guard('seller')->check())
        <div>
            <h1>MAKASIH ORANG BAIK</h1>
        </div>
    @endif
    

    
    <footer class="mt-[6rem] py-8">
        <div class="w-full">
            <div class="text-center space-y-5">
                <h1 class="font-semibold text-2xl">skomtin</h1>
                <p>Copyright © 2024. Skomtin. All right reserved</p>
                <div class="flex items-center justify-center space-x-4">
                    <img src="{{ asset('assets/icons/whatsapp-icon.svg') }}" alt="" width="20">
                    <img src="{{ asset('assets/icons/insta-icon.svg') }}" alt="" width="20">
                    <img src="{{ asset('assets/icons/youtube-icon.svg') }}" alt="" width="20">
                    <img src="{{ asset('assets/icons/facebook-icon.svg') }}" alt="" width="10">
                </div>
            </div>
        </div>
    </footer>
</body>
</html>