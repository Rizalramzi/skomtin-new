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

    <section class="mt-[2rem] px-64">
        <div class="w-full space-y-12">
            <div class="flex items-center space-x-4">
                <h1 class="font-semibold text-2xl">Pengaturan Profil</h1>
            </div>

            <div class="flex mt-8">
                <div class="w-[15%] flex flex-col items-center pt-6">
                    <img src="{{ asset('assets/images/profile-picture.png')}}" alt="Profile Picture">
                    <div class="mt-6">
                        <a href="" class="bg-main text-sm px-5 py-3 text-white rounded-tl-[5px] rounded-bl-[15px] rounded-tr-[15px] rounded-br-[5px]">Unggah</a>
                    </div>
                </div>

                <div class="w-[85%] ps-16">
                    <form action="" method="POST">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-4 grid-cols-1">
                            @if(auth()->guard('customer')->check())
                                <!-- Form untuk Customer -->
                                <div>
                                    <label for="first_name" class="block text-md font-semibold text-gray-700 mb-2">First Name</label>
                                    <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" class="w-full px-3 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-main text-text_secondary">
                                </div>

                                <div>
                                    <label for="last_name" class="block text-md font-semibold text-gray-700 mb-2">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" class="w-full px-3 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-main text-text_secondary">
                                </div>

                                <div>
                                    <label for="nis" class="block text-md font-semibold text-gray-700 mb-2">NIS</label>
                                    <input type="text" id="nis" name="nis" value="{{ $user->nisn }}" class="w-full px-3 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-main text-text_secondary">
                                </div>

                                <div>
                                    <label for="class" class="block text-md font-semibold text-gray-700 mb-2">Class</label>
                                    <input type="text" id="class" name="class" value="{{ $user->class }}" class="w-full px-3 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-main text-text_secondary">
                                </div>

                                <div>
                                    <label for="email" class="block text-md font-semibold text-gray-700 mb-2">Email</label>
                                    <input type="text" id="email" name="email" value="{{ $user->email }}" class="w-full px-3 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-main text-text_secondary">
                                </div>

                                <div>
                                    <label for="telephone" class="block text-md font-semibold text-gray-700 mb-2">Contact</label>
                                    <input type="text" id="telephone" name="telephone" value="{{ $user->telephone }}" class="w-full px-3 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-main text-text_secondary">
                                </div>
                            @elseif(auth()->guard('seller')->check())
                                <!-- Form untuk Seller -->
                                <div>
                                    <label for="name" class="block text-md font-semibold text-gray-700 mb-2">Name</label>
                                    <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full px-3 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-main text-text_secondary">
                                </div>

                                <div>
                                    <label for="contact" class="block text-md font-semibold text-gray-700 mb-2">Contact</label>
                                    <input type="text" id="contact" name="contact" value="{{ $user->contact }}" class="w-full px-3 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-main text-text_secondary">
                                </div>

                                <div>
                                    <label for="username" class="block text-md font-semibold text-gray-700 mb-2">Username</label>
                                    <input type="text" id="username" name="username" value="{{ $user->username }}" class="w-full px-3 py-3 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-main text-text_secondary">
                                </div>
                            @endif

                            <div class="mt-4 col-span-2">
                                <button type="submit" class="bg-main text-sm px-5 py-3 text-white rounded-tl-[5px] rounded-bl-[15px] rounded-tr-[15px] rounded-br-[5px]">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
