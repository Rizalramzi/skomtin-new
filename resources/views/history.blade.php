<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/css/font.css')
    @vite('resources/css/style.css')
    @vite('resources/js/navbar')
    <title>History</title>
</head>
<body>
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

    <section class="px-14 mt-[3vw]">
        <div class="flex items-center">
            <a href="/dashboard"><img src="{{ asset('assets/icons/back-icon.svg') }}" alt="" class="w-[3vw] h-[3vw]"></a>
            <h1 class="text-2xl font-semibold ms-[1vw]">Riwayat</h1>
        </div>
            <table class="w-full">
                <!-- Header tabel berada di luar loop, jadi hanya ditampilkan sekali -->
                <thead class="">
                    <tr>
                        <td class="p-[2vw] font-semibold text-[1.3vw]">Warung</td>
                        <td class="p-[2vw] font-semibold text-[1.3vw]">Pesanan</td>
                        <td class="p-[2vw] font-semibold text-[1.3vw]">Total Harga</td>
                    </tr>
                </thead>
                @foreach($orders as $order)
                    @php
                        $total = 0; // Inisialisasi total untuk setiap pesanan
                        $jumlahMacamItem = count($order->items); // Hitung jumlah macam item
                    @endphp
                    <tbody class="rounded border-[0.1vw] border-dark"> <!-- Menambahkan margin bottom untuk pemisahan antar tbody -->
                        <tr>
                            <!-- Kolom Warung -->
                            <td class="p-[2vw]">
                                <div class="items-center">
                                    @if(auth()->guard('customer')->check())
                                        <h1 class="text-lg font-semibold">{{ $order->store->name }}</h1>
                                    @elseif(auth()->guard('seller')->check())
                                        <h1 class="text-lg font-semibold">{{ $order->customer->first_name }} {{ $order->customer->last_name }} | {{$order->customer->class}}</h1>
                                    @endif
                                    <div class="flex items-center">
                                        <p class="text-sm">{{ $order->created_at }}</p>
                                        @if($order->status == 'pending')
                                            <span class="bg-main_bg text-main px-4 py-2 rounded-full font-semibold ms-2">Dalam Proses</span>
                                        @elseif($order->status == 'completed')
                                            <span class="bg-success_bg text-success px-4 py-2 rounded-full font-semibold ms-2">Selesai</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Kolom Pesanan -->
                            <td class="p-[2vw]">
                                <div>
                                    @foreach($order->items as $item)
                                        <p>{{ $item->item->name }}</p>
                                        @php
                                            $total += $item->price * $item->quantity;
                                        @endphp
                                    @endforeach
                                </div>
                            </td>
                            
                            <!-- Kolom Total Harga -->
                            <td class="p-[2vw]">
                                <p>Rp. {{ number_format($total, 0, ',', '.') }}</p>
                                <p>{{ $jumlahMacamItem }} Item</p>
                            </td>
                            
                            <!-- Kolom Aksi -->
                            @if(auth()->guard('customer')->check())
                                <td class="p-[2vw]">
                                    <button class="border border-main text-main px-4 py-2 rounded-full font-semibold" onclick="showPopup({{ json_encode($order->items) }})">Lihat Detail</button>
                                </td>
                            @elseif(auth()->guard('seller')->check())
                                <td class="p-[2vw]">
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
                                </td>
                            @endif  
                        </tr>
                    </tbody>
                @endforeach
            </table>
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
