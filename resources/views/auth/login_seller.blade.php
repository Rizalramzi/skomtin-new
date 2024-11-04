<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/css/font.css')
    <style>
        .login-section {
            background-image: url('{{ asset('assets/images/login-image.png') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <div class="w-[100vw] sm:overflow-visible overflow-hidden">
        <section>
            <div class="w-full flex lg:flex-row flex-col">
                <div class="lg:w-[37.5vw] w-full h-[60vw] login-section lg:h-screen flex flex-col justify-center items-center relative">
                   
                    <h1 class="text-white text-[4vw] lg:text-[1.667vw] absolute top-[10vw] left-[8vw] lg:top-[3.5vw] lg:left-[3.5vw] z-20 font-semibold">Skomtin</h1>
                    <h1 data-aos="fade-right" class="text-white opacity-60 lg:opacity-100 text-[12vw] lg:text-[5.208vw] font-medium text-start  absolute flex items-center justify-center lg:inset-0 bottom-[12vw] lg:bottom-0 lg:left-[10vw] leading-[5.958vw]">
                        Selamat Datang
                    </h1>
                </div>
                
                <div class="lg:w-[62.5vw] w-full flex items-center justify-center mt-[10vw] lg:mt-0">
                    <div class="w-full lg:max-w-[30vw] max-w-[80vw]">
                        <!-- Back Icon -->
                        <div  class="">
                            <a href="index.html" class="text-black">
                                <img src="{{asset('assets/icons/back-icon.svg')}}" alt="" width="" class="w-[8vw] h-[8.2vw] lg:w-[2.302vw] lg:h-[2.448vw]">
                            </a>
                        </div>
            
                        <!-- Form Content -->
                        <form action="{{route('seller.login')}}" method="POST">
                            @csrf
                            <div class="bg-white pt-2 rounded-lg space-y-[4vw]  lg:space-y-[1.5vw]">
                                <div class="space-y-[0.3vw]">
                                    <h2 class="text-[7vw] lg:text-[2.083vw] font-semibold text-gray-800">Masukkan Data Login Anda</h2>
                                    <p class="text-[3vw] lg:text-[1.042vw] text-gray-500">Masuk ke akunmu</p>
                                </div>
                                <div class="grid grid-cols-1 space-y-[4vw] lg:space-y-[0.5vw]">
                                    <!-- Username Input -->
                                    <div data-aos="fade-left" data-aos-duration="500" data-aos-delay="350" class=" ">
                                        <label for="username" class="block text-[4.5vw] lg:text-[1.25vw] font-medium text-gray-700 mb-[0.833vw]">Username</label>
                                        <input type="username" id="username" name="username" class="w-full p-[3vw] lg:p-[1vw]  border bg-gray-100 focus:outline-none focus:ring-2 focus:ring-main rounded-[0.781vw] lg:placeholder:text-[0.938vw] placeholder:text-[3.5vw] text-[4.5vw] lg:text-[1.25vw]" placeholder="Masukkan Username" autocomplete="off" required>
                                    </div>
        
                                    <!-- Password Input -->
                                    <div  class=" ">
                                        <label for="password" class="block text-[4.5vw] lg:text-[1.25vw] font-medium text-gray-700 mb-[0.833vw]">Password</label>
                                        <input type="password" id="password" name="password" class="w-full p-[3vw] lg:p-[1vw]  border bg-gray-100 focus:outline-none focus:ring-2 focus:ring-main rounded-[0.781vw] lg:placeholder:text-[0.938vw] placeholder:text-[3.5vw] text-[4.5vw] lg:text-[1.25vw]" placeholder="Masukkan Password" autocomplete="off" required>
                                    </div>

                                    @if ($errors->any())
                                        <div class="mb-4 text-red-600">
                                            <strong>{{ $errors->first() }}</strong>
                                        </div>
                                    @endif  
    
                                    <!-- Login Button -->
                                    <div class="">
                                        <button type="submit" class="block w-full text-center bg-main text-white p-[3vw] lg:p-[1vw] font-medium text-[4vw] lg:text-[1.302vw] mt-[1vw] rounded rounded-tr-[1.042vw] rounded-bl-[1.042vw] rounded-tl-[0.26vw] rounded-br-[0.26vw]">Masuk</button>
                                    </div>
                                </div>
                
                                <div  class="text-center text-[3vw] lg:text-[1.042vw]">
                                    <p class="">Kamu Pembeli? <span class="font-semibold"><a href="{{route('customer.login')}}">Masuk disini</a></span></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
</body>
</html>
