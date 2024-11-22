<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Store;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $seller = auth()->guard('seller')->user();
        $store = Store::where('seller_id', $seller->id)->first();
        
        if (!$store) {
            return redirect()->back()->with('error', 'Store tidak ditemukan');
        }

        // Ambil semua kategori
        $categories = Category::all(); // Pastikan model Category ada dan terhubung ke tabel kategori

        return view('items.create', compact('store', 'categories')); // Kirim kategori ke view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'store_id' => 'required|exists:stores,id',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan gambar ke folder public/assets/items
        $imagePath = $request->file('image')->store('assets/items', 'public');

        // Buat item baru dengan menyimpan path gambar ke database
        Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'store_id' => $request->store_id,
            'category_id' => $request->category_id,
            'image' => $imagePath,
        ]);
        
        return redirect()->route('store.detail', $request->store_id)->with('success', 'Item berhasil ditambahkan.');
    }

    public function index($id)
    {
       // Ambil semua item yang memiliki store_id sesuai dengan $id
       $items = Item::where('store_id', $id)->get();

       // Kirim data items ke view
       return view('store_detail', compact('items')); //
    }


    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Ambil store berdasarkan ID
        $store = Store::findOrFail($id);

        // Kirim data store ke view
        return view('store_detail', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $seller = auth()->guard('seller')->user();
        $store = Store::where('seller_id', $seller->id)->first();

        // Cek apakah item milik seller
        if ($item->store_id != $store->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk item ini.');
        }

        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Tambahkan validasi untuk gambar
        ]);

        // Cek apakah item milik seller
        $seller = auth()->guard('seller')->user();
        $store = Store::where('seller_id', $seller->id)->first();

        if ($item->store_id != $store->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk item ini.');
        }

        // Update item
        $itemData = [
            'name' => $request->name,
            'price' => $request->price,
        ];

        // Cek apakah ada gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Simpan gambar ke folder public/assets/items
            $imagePath = $request->file('image')->store('assets/items', 'public');
            $itemData['image'] = $imagePath; // Simpan path gambar baru
        }

        // Perbarui item dengan data baru
        $item->update($itemData);

        // Mengarahkan kembali ke halaman my-store
        return redirect()->route('store.detail', $store->id)->with('success', 'Item berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $seller = auth()->guard('seller')->user();
        $store = Store::where('seller_id', $seller->id)->first();

        // Cek apakah item milik seller
        if ($item->store_id != $store->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk item ini.');
        }

        // Hapus item
        $item->delete();

        return redirect()->route('store.detail', $store->id)->with('success', 'Item berhasil dihapus.');
    }
}
