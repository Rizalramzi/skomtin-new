<?php
namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function history()
    {
        if (Auth::guard('customer')->check()) {
            // Jika yang login adalah customer
            $orders = Order::where('customer_id', Auth::guard('customer')->id())
                ->with('items.item', 'store') 
                ->orderBy('created_at', 'desc')
                ->get();

            return view('history', ['orders' => $orders, 'role' => 'customer']);
        }

        if (Auth::guard('seller')->check()) {
            // Jika yang login adalah seller
            $orders = Order::where('store_id', Auth::guard('seller')->user()->store->id)
                ->with('items.item', 'customer') // Mengambil data customer
                ->orderBy('created_at', 'desc')
                ->get();

            return view('history', ['orders' => $orders, 'role' => 'seller']);
        }

        return redirect()->route('login.seller');
    }

    
    public function updateStatus($id)
    {
        // Cari order berdasarkan ID
        $order = Order::find($id);

        // Pastikan order ditemukan dan statusnya masih pending
        if ($order && $order->status == 'pending') {
            $order->status = 'completed'; // Ubah status menjadi completed
            $order->save(); // Simpan perubahan
        }

        // Redirect kembali ke halaman history dengan pesan sukses
        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }


    public function addToCart(Request $request)
    {
        // Validasi input
        $request->validate([
            'item.id' => 'required|exists:items,id',
        ]);

        // Logika untuk menambahkan item ke keranjang
        // Anda bisa menggunakan session untuk menyimpan keranjang atau model lain
        $cart = session()->get('cart', []);

        // Menambahkan item ke keranjang
        $itemId = $request->input('item.id');
        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity']++;
        } else {
            $item = Item::find($itemId);
            $cart[$itemId] = [
                'name' => $item->name,
                'quantity' => 1,
                'price' => $item->price,
                'id' => $itemId,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Item berhasil ditambahkan ke keranjang.');
    }
    

    public function checkout()
    {
        $cart = Session::get('cart', []);


        $storeId = Session::get('selected_store_id');

        if (empty($cart)) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
        }
    
        $order = Order::create([
            'customer_id' => auth()->guard('customer')->id(), 
            'store_id' => $storeId,
            'status' => 'pending',
        ]);
    
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $item['id'], 
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }
    
        Session::forget('cart');
    
        return redirect()->route('history')->with('success', 'Order placed successfully!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart');
        return view('cart.view', compact('cart')); // Pastikan Anda memiliki view untuk menampilkan keranjang
    }

    public function remove($index)
    {
        $cart = session('cart', []);
        
        // Menghapus item berdasarkan index
        if (isset($cart[$index])) {
            unset($cart[$index]);
        }

        // Mengatur ulang session cart
        session(['cart' => array_values($cart)]); // Menjaga urutan array

        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }

}
