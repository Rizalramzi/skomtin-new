<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showCustomerLogin()
    {
        return view('auth.login_customer');
    }

    public function customerLogin(Request $request)
    {
        $request->validate([
            'nisn' => 'required|string',
            'password' => 'required|string',
        ]);

        $customer = Customer::where('nisn', $request->nisn)->first();

        if ($customer && Hash::check($request->password, $customer->password)) {
            Auth::guard('customer')->login($customer);
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['nisn' => 'NISN atau password salah.']);
    }

    public function showSellerLogin()
    {
        return view('auth.login_seller');
    }

    public function sellerLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $seller = Seller::where('username', $request->username)->first();

        if ($seller && Hash::check($request->password, $seller->password)) {
            Auth::guard('seller')->login($seller);
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['username' => 'Username atau password salah.']);
    }

    public function profile()
    {
        if (Auth::guard('customer')->check()) {
            $user = Auth::guard('customer')->user();
            return view('profile', compact('user'));
        } elseif (Auth::guard('seller')->check()) {
            $user = Auth::guard('seller')->user();
            return view('profile', compact('user'));
        }

        return redirect()->route('login.customer');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        Auth::guard('seller')->logout();
        return redirect('/');
    }
}
