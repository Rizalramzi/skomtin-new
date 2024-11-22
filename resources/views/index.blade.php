<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @vite('resources/css/font.css')
  @vite('resources/css/style.css')
</head>
<body class="text-white">

  <!-- Navbar -->
  <nav class="px-[10vw] py-[2vw] ">
    <div class="flex justify-between items-center">
        <div class="text-dark">
            <h1 class="text-[2vw] font-semibold">skomtin</h1>
        </div>
        <div class="text-dark font-medium text-[1vw]">
            <ul class="flex space-x-[2vw]">
                <a href=""><li class="nav__active">Home</li></a>
                <a href=""><li>Tentang Kami</li></a>
                <a href=""><li>Menu</li></a>
                <a href=""><li>Informasi</li></a>
            </ul>
        </div>
        <div>
            <button class="bg-main px-[2.083vw] py-[1.042vw] font-semibold text-[1.042vw] rounded rounded-tr-[1.042vw] rounded-bl-[1.042vw] rounded-tl-[0.26vw] rounded-br-[0.26vw]"><a href="{{ route('login.customer')}}">Masuk</a></button>
        </div>
    </div>
</nav>
  <!-- End Navbar -->
  
  <!-- Hero -->
  <section class="px-[10vw] ">
    <div class="w-full flex items-center">
        <div class="w-[60%] space-y-[1.875vw]">
            <h1 class="text-[3.333vw] text-dark font-semibold max-w-[44.271vw]">Solusi Mudah <span class="text-main">Beli Jajan</span> Tanpa Antri</h1>
            <p class="text-dark font-medium max-w-[37.708vw] text-[0.938vw] leading-[1.563vw]">Skomtin hadir untuk memudahkan hidupmu! Pesan makanan favoritmu dari kelas dan nikmati makanan lezat tanpa perlu repot antri. Skomtin, solusi praktis untuk makan siang yang menyenangkan. Jelajahi Menu Sekarang!</p>
            <button class="bg-main px-[2.083vw] py-[1.042vw] font-semibold text-[1.042vw] rounded rounded-tr-[1.042vw] rounded-bl-[1.042vw] rounded-tl-[0.26vw] rounded-br-[0.26vw]">Selengkapnya</button>
        </div>
        <div class="w-[40%] flex justify-center items-center">
            <img src="{{asset('assets/images/image-hero.png')}}" alt="">
        </div>
    </div>
</section>
  
  <!-- End Hero -->
  
  <!-- About -->
  <section class="px-[10vw] mt-[10vw] relative">
    <div class="w-full flex items-center relative">
        <div class="w-[50%] space-y-[1vw]">
            <div>
                <h1 class="text-dark text-[1.25vw] font-medium">Tentang Kami</h1>
                <h1 class="text-[3.333vw] text-main font-semibold">Skomtin?</h1>
            </div>
            <p class="text-dark font-medium text-[0.938vw] leading-[1.563vw] max-w-[34.323vw]">Skomtin adalah website pemesanan makanan inovasi. Dengan melihat banyaknya siswa yang kebingungan ingin memesan apa di kantin, dan juga malas mengantri. Kami hadir dengan solusi untukmu siswa Skomda memilih, membeli semua di kantin dengan mudah dan cepat.</p>
            <div class="flex">
                <div class="space-y-[0.6vw]">
                    <h1 class="text-[2.083vw] text-main font-semibold">5</h1>
                    <h1 class="text-[2.083vw] text-main font-semibold">10+</h1>
                    <h1 class="text-[2.083vw] text-main font-semibold">30+</h1>
                </div>
                <div class="ps-[2vw] space-y-[0.6vw]">
                    <h1 class="text-[2.083vw] text-dark font-semibold">Warung</h1>
                    <h1 class="text-[2.083vw] text-dark font-semibold">Menu Makanan Berat </h1>
                    <h1 class="text-[2.083vw] text-dark font-semibold">Makanan Ringan dan Minuman</h1>
                </div>
            </div>
        </div>
        <div class="w-[50%] relative">
            <div class="absolute top-[-10vw] right-0 bg-main w-[19.167vw] h-[8.542vw]  rounded-tl-[0.26vw] rounded-bl-[1.563vw] rounded-tr-[1.563vw] rounded-br-[0.26vw]"></div>
            <div class="absolute top-[-10vw] left-0 bg-main w-[6.354vw] h-[5.781vw] rounded-tl-[0.26vw] rounded-bl-[1.563vw] rounded-tr-[1.563vw] rounded-br-[0.26vw]"></div>
            <div class="absolute bottom-[-12vw] left-0 bg-main w-[19.167vw] h-[8.542vw] rounded-tl-[0.26vw] rounded-bl-[1.563vw] rounded-tr-[1.563vw] rounded-br-[0.26vw]"></div>
            <div class="absolute bottom-[-12vw] right-0 bg-main w-[6.354vw] h-[5.781vw] rounded-tl-[0.26vw] rounded-bl-[1.563vw] rounded-tr-[1.563vw] rounded-br-[0.26vw]"></div>
            <div class="relative flex justify-center items-center">
                <img src="{{asset('assets/images/about-1.png')}}" alt="" class="absolute z-20 w-[23.75vw] h-[14.688vw] bottom-[-9.771vw] left-[2.083vw]">
                <img src="{{asset('assets/images/about-0.png')}}" alt="" class="absolute z-10 w-[23.75vw] h-[14.688vw] right-[2.083vw]">
            </div>
        </div>
    </div>
</section>
  <!-- End About -->
  
  <!-- Best Sellers -->
  <section class="mt-[10vw] px-[10vw]">
    <div class="w-full">
        <div class="text-center space-y-[1vw]">
            <h1 class=" text-[3.333vw] text-dark font-semibold">Menu Terlaris di <span class="text-main">Skomtin</span></h1>
            <div>
            <p class="text-dark text-[0.938vw] font-medium">Cek makanan paling lezat dan paling laris di kantin Skomda</p>
            <div class="mt-[1vw]">
                <p class="text-main font-semibold text-[1.146vw]"><a href="" class="">Lihat Semua Menu <span>--></span></a></p>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-3 mt-[4vw]">
        <div class="flex justify-center items-center">
            <div class="space-y-[1.5vw]">
                <img src="{{asset('assets/images/food-image.png')}}" alt="" class="w-[23.906vw] h-[15.573vw]">
                <div class="w-[5.208vw] h-[5.208vw] rounded-full bg-main_bg flex items-center justify-center">
                    <img src="{{asset('assets/icons/food-icon.svg')}}" alt="" class="w-[2.604vw] h-[2.5vw]">
                </div>
                <h1 class="text-dark text-[1.563vw] font-semibold">Makanan Berat</h1>
                <p class="text-[0.938vw] leading-[1.458vw] text-dark max-w-[23.906vw]">Jelajahi beragam pilihan menu makanan berat, dari masakan tradisional hingga hidangan modern, semuanya tersedia di Skomtin.</p>
                <div class="mt-[1vw]">
                    <p class="text-main font-semibold text-[1.146vw]"><a href="" class="">Selengkapnya <span>--></span></a></p>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center">
            <div class="space-y-[1.5vw]">
                <img src="{{asset('assets/images/snacks-image.png')}}" alt="" class="w-[23.906vw] h-[15.573vw]">
                <div class="w-[5.208vw] h-[5.208vw] rounded-full bg-main_bg flex items-center justify-center">
                    <img src="{{asset('assets/icons/snacks-icon.svg')}}" alt="" class="w-[2.604vw] h-[2.5vw]">
                </div>
                <h1 class="text-dark text-[1.563vw] font-semibold">Makanan Berat</h1>
                <p class="text-[0.938vw] leading-[1.458vw] text-dark max-w-[23.906vw]">Jelajahi beragam pilihan menu makanan berat, dari masakan tradisional hingga hidangan modern, semuanya tersedia di Skomtin.</p>
                <div class="mt-[1vw]">
                    <p class="text-main font-semibold text-[1.146vw]"><a href="" class="">Selengkapnya <span>--></span></a></p>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center">
            <div class="space-y-[1.5vw]">
                <img src="{{asset('assets/images/drink-image.png')}}" alt="" class="w-[23.906vw] h-[15.573vw]">
                <div class="w-[5.208vw] h-[5.208vw] rounded-full bg-main_bg flex items-center justify-center">
                    <img src="{{asset('assets/icons/drink-icon.svg')}}" alt="" class="w-[2.604vw] h-[2.5vw]">
                </div>
                <h1 class="text-dark text-[1.563vw] font-semibold">Makanan Berat</h1>
                <p class="text-[0.938vw] leading-[1.458vw] text-dark max-w-[23.906vw]">Jelajahi beragam pilihan menu makanan berat, dari masakan tradisional hingga hidangan modern, semuanya tersedia di Skomtin.</p>
                <div class="mt-[1vw]">
                    <p class="text-main font-semibold text-[1.146vw]"><a href="" class="">Selengkapnya <span>--></span></a></p>
                </div>
            </div>
        </div>
    </div>
</section>
  <!-- End Best Sellers -->
  
  <!-- Information -->
  <section class="relative py-[2vw] w-full mt-[10vw] px-[10vw]">
    <div class="absolute inset-0 w-full h-[23.75vw] bg-main_bg blur-[2vw] z-0"></div>
    <div class="mt-[1vw] relative">
        <div class="relative px-[10vw] z-10">
            <h1 class="text-[3.333vw] text-dark font-semibold text-center">Informasi <span class="text-main">Kantin</span></h1>
        </div>
        <div class="absolute inset-0 flex justify-center items-center mt-[10vw]">
            <div class="flex justify-center items-center space-x-[6vw]">
                <div class="flex items-center space-x-[2vw]">
                    <img src="{{asset('assets/icons/location-icon.svg')}}" alt="" class="w-[2.083vw] h-[2.652vw]">
                    <h1 class="text-dark font-semibold text-[1.563vw]">SMK Telkom Sidoarjo</h1>
                </div>
                <div class="flex items-center space-x-[2vw]">
                    <img src="{{asset('assets/icons/clock-icon.svg')}}" alt="" class="w-[2.083vw] h-[2.652vw]">
                    <h1 class="text-dark font-semibold text-[1.563vw]">06.30 - 16.00 WIB</h1>
                </div>
                <div class="flex items-center space-x-[2vw]">
                    <img src="{{asset('assets/icons/email-icon.svg')}}" alt="" class="w-[2.083vw] h-[2.652vw]">
                    <h1 class="text-dark font-semibold text-[1.563vw]">skomtinskomda@gmail.com</h1>
                </div>
            </div>
        </div>
        <div class="absolute inset-0 flex justify-center items-center mt-[17vw]">
            <button class="bg-main px-[2.083vw] py-[1.042vw] font-semibold text-[1.042vw] rounded rounded-tr-[1.042vw] rounded-bl-[1.042vw] rounded-tl-[0.26vw] rounded-br-[0.26vw]"><a href="{{ route('login.customer')}}">Mulai Sekarang</a></button>
        </div>
    </div>
</section>
  
  <!-- End information -->
  
  <!-- Footer -->
  <footer class="px-[10vw] py-[2vw] mt-[30vw]">
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
