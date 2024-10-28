<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::all(); // Ambil semua toko
        return view('dashboard', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Ambil store berdasarkan ID
        $store = Store::findOrFail($id);

        session(['selected_store_id' => $store->id]);

        // Ambil semua item yang memiliki store_id sesuai dengan $id
        $items = Item::where('store_id', $id)->get();

        // Kirim data store dan items ke view
        return view('store_detail', compact('store', 'items')); 
    }

    public function showStoreForSeller()
    {
        // Ambil seller yang sedang login
        $seller = auth()->guard('seller')->user();

        // Ambil store berdasarkan seller_id
        $store = Store::where('seller_id', $seller->id)->first();

        // Pastikan store ada
        if (!$store) {
            return redirect()->back()->with('error', 'Store tidak ditemukan');
        }

        // Ambil semua item yang terkait dengan store
        $items = Item::where('store_id', $store->id)->get();

        // Kirim data store dan items ke view
        return view('store_detail', compact('store', 'items'));
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
