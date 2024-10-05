<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  @vite('resources/css/font.css')
</head>
<body class="text-dark font-outfit">

  <!-- Navbar -->
    <nav class="justify-between flex p-8 items-center">
      <div>
          <h1 class="font-semibold text-2xl">skomtin</h1>
      </div>
      <div class="hidden md:inline">
          <ul class="flex gap-x-10 ">
              <a href=""><li class="text-main font-medium">Beranda</li></a>
              <a href=""><li>Tentang Kami</li></a>
              <a href=""><li>Menu</li></a>
              <a href=""><li>Informasi</li></a>
          </ul>
      </div>
      <div class="hidden md:inline">
          <a href="{{ route('login.customer') }}" class="bg-main px-8 py-3 text-white rounded-tl-[5px] rounded-bl-[15px] rounded-tr-[15px] rounded-br-[5px] ">Masuk</a>
      </div>
    </nav>
  <!-- End Navbar -->
  
  <!-- Hero -->
  <section class="">
      <div class="w-full flex flex-col-reverse lg:flex-row items-center">
          <div class="lg:w-1/2 lg:ps-[6rem] px-[2rem]">
              <h1 class="md:text-[48px] text-[32px] font-semibold leading-tight">Solusi Mudah <span class="text-main">Beli Jajan</span> Tanpa Antri</h1>
              <p class="text-sm max-w-[87%] mt-[2rem]">Skomtin hadir untuk memudahkan hidupmu! Pesan makanan favoritmu dari kelas dan nikmati makanan lezat tanpa perlu repot antri. Skomtin, solusi praktis untuk makan siang yang menyenangkan. Jelajahi Menu Sekarang!</p>
              <div class="mt-[2.5rem]">
                  <a href="" class="bg-main px-8 py-3 text-white rounded-tl-[5px] rounded-bl-[15px] rounded-tr-[15px] rounded-br-[5px]">Selengkapnya</a>
              </div>
          </div>
          <div class="lg:w-1/2 flex justify-center">
              <img src="{{ asset('assets/images/image-hero.png') }}" alt="" width="450">
          </div>
      </div>
  </section>
  
  <!-- End Hero -->
  
  <!-- About -->
      <section class="mt-[6rem]">
          <div class="w-full md:flex relative items-center">
              <div class="lg:w-1/2 lg:ps-[6rem] px-[2rem]">
                  <h3 class="font-semibold text-xl mb-2">Tentang Kami</h3>
                  <h1 class="text-main font-bold text-5xl mb-6">Skomtin?</h1>
                  <p>Skomtin adalah website pemesanan makanan inovasi. Dengan melihat banyaknya siswa yang kebingungan ingin memesan apa di kantin, dan juga malas mengantri. Kami hadir dengan solusi untukmu siswa Skomda memilih, membeli semua di kantin dengan mudah dan cepat.</p>
                  <div class="flex md:text-2xl text-xl mt-[1rem]">
                      <div class="text-main font-bold space-y-2">
                          <h1>5</h1>
                          <h1>10+</h1>
                          <h1>30+</h1>
                      </div>
                      <div class="font-semibold ms-8 space-y-2">
                          <h1>Warung</h1>
                          <h1>Menu Makanan Berat</h1>
                          <h1>Makanan Ringan Dan Minuman</h1>
                      </div>
                  </div>
              </div>
              <div class="w-1/2 hidden lg:inline">
                  <div class="relative p-10">
                      <div class="absolute top-0 left-10 bg-main w-20 h-20 rounded-tl-[5px] rounded-bl-[15px] rounded-tr-[15px] rounded-br-[5px]"></div>
                      <div class="absolute bottom-[-50px] right-20  bg-main w-20 h-20 rounded-tl-[5px] rounded-bl-[15px] rounded-tr-[15px] rounded-br-[5px]"></div>
                      <div class="absolute bottom-[-50px] left-10 bg-main w-[200px] h-[95px] rounded-tl-[5px] rounded-bl-[15px] rounded-tr-[15px] rounded-br-[5px]"></div>
                      <div class="absolute top-0 right-20 bg-main w-[200px] h-[95px] rounded-tl-[5px] rounded-bl-[15px] rounded-tr-[15px] rounded-br-[5px]"></div>
                      
                      <div class="relative flex items-center justify-center">
                        <div class="relative z-10">
                          <img src="{{ asset('assets/images/about-0.png') }}" alt="Image 1" class="rounded-md  w-72">
                        </div>
                        <div class="absolute z-20 left-20 top-10">
                          <img src="{{ asset('assets/images/about-1.png') }}" alt="Image 2" class="rounded-md  w-80">
                        </div>
                      </div>
                    </div>
                    
              </div>
          </div>
      </section>
  <!-- End About -->
  
  <!-- Best Sellers -->
      <section class="mt-[10rem]">
          <div class="w-full px-[2rem]">
              <div class="text-center space-y-5">
                  <h1 class="font-semibold text-4xl">Menu Terlaris di <span class="text-main">Skomtin</span></h1>
                  <p class="text-[14px]">Cek makanan paling lezat dan paling laris di kantin Skomda</p>
                  <div>
                    <a href="#" class="text-main font-semibold hover:ps-4 transition-all ease-in-out duration-300">
                        Lihat Semua Menu <span class="inline-block ps-0 transition-all ease-in-out duration-300">&rarr;</span>
                      </a> 
                  </div>
              </div>
              <div class="grid grid-cols-1 md:grid-cols-3 gap-8 p-8 mt-[2rem]">
                  <!-- Item 1 -->
                  <div class="flex flex-col items-center md:items-start text-start space-y-4">
                      <img src="{{ asset('assets/images/food-image.png') }}" alt="Makanan" class="rounded-lg shadow-lg flex justify-center items-center">
                      <div class="bg-light_main p-4 rounded-full">
                        <img src="{{ asset('assets/icons/food-icon.svg') }}" alt="Icon Makanan" class="w-8 h-8">
                      </div>
                      <h2 class="text-xl font-semibold">Makanan Berat</h2>
                      <p class=" text-sm max-w-[90%]">Jelajahi beragam pilihan menu makanan berat, dari masakan tradisional hingga hidangan modern, semuanya tersedia di Skomtin.</p>
                      <a href="#" class="text-main font-semibold hover:ps-4 transition-all ease-in-out duration-300">
                        Detail <span class="inline-block ps-0 transition-all ease-in-out duration-300">&rarr;</span>
                      </a> 
                  </div>
                
                  <!-- Item 2 -->
                  <div class="flex flex-col items-center md:items-start text-start space-y-4">
                      <img src="{{ asset('assets/images/snacks-image.png') }}" alt="Jajanan" class="rounded-lg shadow-lg">
                      <div class="bg-light_main p-4 rounded-full">
                        <img src="{{ asset('assets/icons/snacks-icon.svg') }}" alt="Icon Minuman" class="w-8 h-8">
                      </div>
                      <h2 class="text-xl font-semibold">Makanan Ringan</h2>
                      <p class=" text-sm max-w-[90%]">Nikmati camilan lezat dengan kualitas terbaik, menyediakan berbagai pilihan makanan ringan yang lezat dan mengenyangkan. hanya di Skomtin.</p>
                      <a href="#" class="text-main font-semibold hover:ps-4 transition-all ease-in-out duration-300">
                        Detail <span class="inline-block ps-0 transition-all ease-in-out duration-300">&rarr;</span>
                      </a>                      
                  </div>
                
                  <!-- Item 3 -->
                  <div class="flex flex-col items-center md:items-start text-start space-y-4">
                    <img src="{{ asset('assets/images/drink-image.png') }}" alt="Minuman" class="rounded-lg shadow-lg">
                    <div class="bg-light_main p-4 rounded-full">
                      <img src="{{ asset('assets/icons/drink-icon.svg') }}" alt="Icon Minuman" class="w-8 h-8">
                    </div>
                    <h2 class="text-xl font-semibold">Minuman</h2>
                    <p class=" text-sm max-w-[90%]">Jelajahi aneka minuman dengan rasa yang enak dan menyegarkan, dengan harga terjangkau dan juga tersedia dalam berbagai rasa.</p>
                    <a href="#" class="text-main font-semibold hover:ps-4 transition-all ease-in-out duration-300">
                        Detail <span class="inline-block ps-0 transition-all ease-in-out duration-300">&rarr;</span>
                      </a> 
                  </div>
                </div>
          </div>
      </section>
  <!-- End Best Sellers -->
  
  <!-- Information -->
  <section class="mt-[10rem]">
      <div class="w-full bg-white py-8 relative">
          <div class="absolute inset-0 bg-main opacity-30 blur-[150px]"></div>
          <div class="relative z-10 text-center space-y-12">
              <h1 class="font-semibold text-4xl">Informasi <span class="text-main">Kantin</span></h1>
              <div class="flex flex-col sm:flex-row justify-center items-center lg:space-x-[6rem] md:space-x-[3rem] text-sm md:text-lg">
                  <div class="flex items-center font-semibold space-x-2 mb-4 sm:mb-0">
                      <img src="{{ asset('assets/icons/location-icon.svg') }}" alt="" width="20">
                      <h3>SMK Telkom Sidoarjo</h3>
                  </div>
                  <div class="flex items-center font-semibold space-x-2 mb-4 sm:mb-0">
                      <img src="{{ asset('assets/icons/clock-icon.svg') }}" alt="" width="20">
                      <h3>06.30 - 16.00 WIB</h3>
                  </div>
                  <div class="flex items-center font-semibold space-x-2">
                      <img src="{{ asset('assets/icons/email-icon.svg') }}" alt="" width="20">
                      <h3>skomtinskomda@gmail.com</h3>
                  </div>
              </div>
              <div class="">
                  <a href="" class="bg-main px-8 py-3 text-white rounded-tl-[5px] rounded-bl-[15px] rounded-tr-[15px] rounded-br-[5px]">Mulai Sekarang</a>
              </div>
          </div>
      </div>
  </section>
  
  <!-- End information -->
  
  <!-- Footer -->
  <footer class="mt-[10rem] py-8">
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
  <!-- End Footer -->
  </body>
</html>
