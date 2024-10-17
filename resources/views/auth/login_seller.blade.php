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
    <section class="w-full flex h-screen">
        <div class="w-[35%] login-section h-screen flex justify-center items-center relative">
            <h1 class="text-white text-5xl font-semibold text-center">Selamat <br> Datang</h1>
        </div>
        <div class="w-[65%] flex items-center justify-center">
            <div class="w-full max-w-md">
                <div class="mb-4">
                    <a href="/" class="text-black">
                        <img src="{{ asset('assets/icons/back-icon.svg') }}" alt="" width="30">
                    </a>
                </div>

                <div class="bg-white p-6 rounded-lg">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">Masukkan Data Login Anda</h2>
                    <p class="text-sm text-gray-500 mb-6">Masuk ke akunmu</p>

                    <form action="{{ route('seller.login') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                            <input type="text" id="username" name="username" class="w-full p-3 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-main" placeholder="Masukkan Username" required>
                        </div>

                        <div class="mb-6">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <input type="password" id="password" name="password" class="w-full p-3 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-main" placeholder="Masukkan Password" required>
                        </div>

                        @if ($errors->any())
                            <div class="mb-4 text-red-600">
                                <strong>{{ $errors->first() }}</strong>
                            </div>
                        @endif

                        <div>
                            <button type="submit" class="block w-full text-center bg-main text-white p-3 rounded-lg font-semibold rounded-tl-[5px] rounded-bl-[15px] rounded-tr-[15px] rounded-br-[5px]">Masuk</button>
                        </div>
                    </form>
                    <h1 class="text-center mt-[1vw] text-[1vw]"><a href="/login/customer">Masuk sebagai Pembeli</a></h1>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
