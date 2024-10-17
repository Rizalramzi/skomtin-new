<?php
namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:items,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        // Buat order baru
        $order = Order::create([
            'customer_id' => Auth::guard('customer')->id(),
            'store_id' => $request->store_id, // Pastikan Anda mengirim store_id dari tampilan
            'status' => 'pending',
        ]);

        // Tambahkan item ke order
        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => Item::find($item['id'])->price, // Ambil harga item dari database
            ]);
        }

        return redirect()->route('order.show', $order->id)->with('success', 'Order berhasil dibuat!');
    }

    public function show($id)
    {
        $order = Order::with('items.item')->findOrFail($id);
        return view('detail_order', compact('order'));
    }

    public function history()
    {
        $orders = Order::with('store')->where('customer_id', Auth::guard('customer')->id())->get();
        return view('history', compact('orders'));
    }
}
