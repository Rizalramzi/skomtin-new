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
        $orders = Order::where('customer_id', Auth::guard('customer')->id())
            ->with('items.item', 'store') 
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('history', compact('orders'));
    }
    
    
    public function addToCart(Request $request)
    {
        $item = $request->input('item');

        $cart = Session::get('cart', []);
        $cart[$item['id']] = [
            'name' => $item['name'],
            'price' => $item['price'],
            'id' => $item['id'], 
            'quantity' => isset($cart[$item['id']]) ? $cart[$item['id']]['quantity'] + 1 : 1,
        ];

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Item added to cart!');
    }
    

    public function checkout()
    {
        $cart = Session::get('cart', []);
    
        if (empty($cart)) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
        }
    
        $order = Order::create([
            'customer_id' => auth()->guard('customer')->id(), 
            'store_id' => 1,
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
        $cart = Session::get('cart', []);
        return view('cart', compact('cart'));
    }
}
