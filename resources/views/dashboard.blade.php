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
    <nav class="flex justify-between px-[2vw] py-[1.5vw] shadow-lg items-center">
        <div class="flex items-center space-x-[7vw]">
            <h1 class="font-semibold text-[1.5vw]">skomtin</h1>
            <ul class="flex space-x-[1vw]">
                <a href="" class="text-[1.2vw]"><li class="text-main">Beranda</li></a>
            </ul>
        </div>
        <div class="flex items-center space-x-[2vw]">
            <div class="flex items-center bg-secondary rounded-md">
                <img src="{{ asset('assets/icons/search-icon.svg') }}" alt="Search Icon" class="w-[1.2vw] h-[1.2vw] ml-[1vw]">
                <input type="text" placeholder="Cari Makan .." class="outline-none bg-secondary rounded-[0.6vw] placeholder:text-[1.1vw] ml-[1vw] w-full py-[1vw] pr-[2vw] text-gray-700 placeholder-gray-500 border-none text-[1vw]">
            </div>
            <div>
                <img src="{{ asset('assets/icons/cart-icon.svg') }}" alt="Cart Icon" class="w-[1.8vw] h-[1.8vw]">
            </div> 
            <div class="relative">
                <img src="{{ asset('assets/images/profile-picture.png') }}" alt="Profile Picture" class="rounded-full cursor-pointer profilePicture w-[2.3vw] h-[2.3vw]">
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

    <section class="mt-[4vw] px-[4.271vw]">
        <div class="w-full bg-main py-[5vw] relative rounded-lg">
            <div class="px-[3vw]  relative flex">
                <div class="space-y-[1vw]">
                    @if(auth()->guard('customer')->check())
                        <h1 class="font-semibold text-[2.083vw] text-white">Selamat Datang, {{ $user->first_name }} {{ $user->last_name }}</h1>
                    @elseif(auth()->guard('seller')->check())
                        <h1 class="font-semibold text-[2.083vw] text-white">Selamat Datang, {{ $user->name }}</h1>
                    @endif

                    <p class="text-[1.1vw] text-white max-w-[49.167vw] font-normal">Cari makanan dan minuman enak kesukaanmu di sini, dari segernya es jeruk sampai pedesnya ayam geprek bisa kamu temuin disini</p>
                </div>
                <img src="{{ asset('assets/images/welcome-food-image.png') }}" alt="" class="absolute right-0 bottom-[-11.1vw] w-[21.875vw] h-[31.823vw] object-contain">
            </div>
        </div>
    </section>

    @if(auth()->guard('customer')->check())
        <div class="font-medium px-[4.271vw] mt-[4vw] text-[1vw]">
            <a href="">Beranda / <a href="" class="text-text_secondary">Daftar Pilihan Kantin</a></a>
        </div>

        <section class="px-[4.271vw] mt-[3vw]">
            <div class="w-full">
                <h1 class="text-[1.8vw] font-semibold">Aneka Menu</h1>
                <p class="text-[1vw] font-light">Lihat semua jenis makanan dari makanan ringan sampai minuman semuanya disini</p>
                <div class="grid grid-cols-6 mt-[2.5vw] justify-center items-center gap-[2vw]">
                    @foreach ($categories as $category)
                        <a href="">
                            <div class="flex flex-col items-center space-y-[1.3vw]">
                                <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" class="rounded-full w-[11.563vw] h-[11.563vw] object-cover">
                                <h1 class="font-semibold text-[1.3vw]">{{ $category->name }}</h1>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="px-[4.271vw] mt-[3vw]">
            <div class="w-full">
                <h1 class="text-[1.8vw] font-semibold">Pilihan Kantin Kami</h1>
                <p class="text-[1vw] font-light">Lihat semua pilihan kantin, cari yang paling cocok buat seleramu</p>
                <div class="grid grid-cols-4 mt-[2.5vw] justify-center items-center gap-[2vw]">
                    @foreach($stores as $store)
                    <a href="{{ route('store.detail', $store->id) }}">    
                        <div class="flex justify-center">
                            <div class="card bg-white pb-[1vw] shadow space-y-[1vw] rounded-[1.2vw]">
                                <img src="{{ asset('storage/' . $store->image) }}" alt="{{ $store->name }}" class=" w-[22.031vw] h-[12.448vw] object-cover rounded-t-[1.2vw]">
                                <h1 class="text-center text-[1.4vw] font-semibold">{{ $store->name }}</h1>
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
    

    
    <footer class="px-[10vw] py-[2vw] mt-[3vw]">
        <div class="text-center space-y-[2vw]">
            <h1 class="text-[2vw] font-semibold text-dark">skomtin</h1>
            <p class="text-dark text-[1.042vw]">Copyright © 2024. Skomtin. All right reserved</p>
            <div class="flex items-center space-x-[1.198vw] justify-center">
                <img src="{{asset('assets/icons/whatsapp-icon.svg')}}" alt="" class="w-[1.458vw] h-[1.458vw]">
                <img src="{{asset('assets/icons/insta-icon.svg')}}" alt="" class="w-[1.458vw] h-[1.458vw]">
                <img src="{{asset('assets/icons/youtube-icon.svg')}}" alt="" class="w-[1.719vw] h-[1.25vw]">
                <img src="{{asset('assets/icons/facebook-icon.svg')}}" alt="" class="w-[0.677vw] h-[1.29vw]">
            </div>
        </div>
    </footer>
</body>
</html>