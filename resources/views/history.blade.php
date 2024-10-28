<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/css/font.css')
    @vite('resources/css/style.css')
    <title>History</title>
</head>
<body>
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

    <section class="px-14 mt-[3vw]">
        <div class="flex items-center">
            <img src="{{ asset('assets/icons/back-icon.svg') }}" alt="" class="w-[3vw] h-[3vw]">
            <h1 class="text-2xl font-semibold ms-[1vw]">Riwayat</h1>
        </div>
        <div class="mt-[2vw]">
            <div class="flex justify-between text-lg px-6 pb-4">
                <h1>Warung</h1>
                <h1>Pesanan</h1>
                <h1>Total Harga</h1>
                <h1></h1>
            </div>
            @if(auth()->guard('customer')->check())
                @foreach($orders as $order)
                    @php
                        $total = 0; // Inisialisasi total untuk setiap pesanan
                        $jumlahMacamItem = count($order->items); // Hitung jumlah macam item
                    @endphp
                    <div class="w-full border border-dark mb-4 px-6 py-6 rounded-lg">
                        <div class="flex justify-between items-center">
                            <div class="items-center">
                                <h1 class="text-lg font-semibold">{{ $order->store->name }}</h1>
                                <div class="flex items-center">
                                    <p class="text-sm">{{ $order->created_at }}</p>
                                    @if($order->status == 'pending')
                                        <p class="bg-main_bg text-main px-4 py-2 rounded-full font-medium ms-2">Dalam Proses</p>
                                    @elseif($order->status == 'completed')
                                        <p class="bg-success_bg text-success px-4 py-2 rounded-full font-medium ms-2">Selesai</p>
                                    @endif
                                </div>
                            </div>
        
                            <div class="flex items-center">
                                @foreach($order->items as $item)
                                    <p>{{ $item->item->name }}, </p>
                                    @php
                                        // Menghitung total harga untuk setiap item berdasarkan kuantitas
                                        $total += $item->price * $item->quantity; // Pastikan Anda menggunakan harga dan kuantitas yang benar
                                    @endphp
                                @endforeach
                            </div>
        
                            <div class="flex items-center">
                                <p>Rp. {{ number_format($total, 0, ',', '.') }}</p> <!-- Menampilkan total harga -->
                                <p>-{{ $jumlahMacamItem }} Item</p> <!-- Menampilkan jumlah item -->
                            </div>
        
                            <div>
                                <button class="border border-main text-main px-4 py-2 rounded-full font-semibold" onclick="showPopup({{ json_encode($order->items) }})">Lihat Detail</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @elseif(auth()->guard('seller')->check())
                @foreach($orders as $order)
                    @php
                        $total = 0; // Inisialisasi total untuk setiap pesanan
                        $jumlahMacamItem = count($order->items); // Hitung jumlah macam item
                    @endphp
                    <div class="w-full border border-dark mb-4 px-6 py-6 rounded-lg">
                        <div class="flex justify-between items-center">
                            <div class="items-center">
                                <h1 class="text-lg font-semibold">{{ $order->customer->first_name }} {{ $order->customer->last_name }}</h1> <!-- Nama customer -->
                                <div class="flex items-center">
                                    <p class="text-sm">{{ $order->created_at }}</p>
                                    @if($order->status == 'pending')
                                        <p class="bg-main_bg text-main px-4 py-2 rounded-full font-medium ms-2">Dalam Proses</p>
                                    @elseif($order->status == 'completed')
                                        <p class="bg-success_bg text-success px-4 py-2 rounded-full font-medium ms-2">Selesai</p>
                                    @endif
                                </div>
                            </div>
        
                            <div class="flex items-center">
                                @foreach($order->items as $item)
                                    <p>{{ $item->item->name }}, </p>
                                    @php
                                        // Menghitung total harga untuk setiap item berdasarkan kuantitas
                                        $total += $item->price * $item->quantity; // Pastikan Anda menggunakan harga dan kuantitas yang benar
                                    @endphp
                                @endforeach
                            </div>
        
                            <div class="flex items-center">
                                <p>Rp. {{ number_format($total, 0, ',', '.') }}</p> <!-- Menampilkan total harga -->
                                <p>-{{ $jumlahMacamItem }} Item</p> <!-- Menampilkan jumlah item -->
                            </div>
        
                            <div>
                                @if($order->status == 'pending')
                                    <form action="{{ route('order.updateStatus', $order->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="border border-main text-main px-4 py-2 rounded-full font-semibold">Ubah ke Selesai</button>
                                    </form>
                                @else
                                    <button class="border border-main text-main px-4 py-2 rounded-full font-semibold" disabled>Sudah Selesai</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <!-- Pop-Up untuk Rincian Pesanan -->
    <div class="fixed inset-0 bg-black bg-opacity-50 hidden z-0" id="bgDark">
        <div class="relative">
            <div class="justify-center items-center z-50 hidden absolute top-28 left-[30%] w-[100vw]" id="orderPopup">
                <div class="bg-white rounded-lg p-6 w-11/12 max-w-lg">
                    <h2 class="text-xl font-semibold">Rincian Pesanan</h2>
                    <div id="orderDetails" class="mt-4"></div>
                    <button onclick="closePopup()" class="mt-4 bg-main text-white px-4 py-2 rounded">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        function showPopup(items) {
            const orderDetails = document.getElementById('orderDetails');
            orderDetails.innerHTML = ''; // Bersihkan isi sebelumnya
            
            // Mengisi rincian pesanan
            items.forEach(item => {
                const itemDetail = document.createElement('p');
                itemDetail.classList.add('border-b', 'py-2');
                itemDetail.textContent = `${item.item.name} - ${item.quantity} pcs - Rp. ${new Intl.NumberFormat('id-ID').format(item.price * item.quantity)}`;
                orderDetails.appendChild(itemDetail);
            });
            
            document.getElementById('orderPopup').classList.remove('hidden'); // Tampilkan pop-up
            document.getElementById('bgDark').classList.remove('hidden'); // Tampilkan pop-up
        }

        function closePopup() {
            document.getElementById('orderPopup').classList.add('hidden'); // Sembunyikan pop-up
            document.getElementById('bgDark').classList.add('hidden'); // Sembunyikan pop-up
        }
    </script>
</body>
</html>
