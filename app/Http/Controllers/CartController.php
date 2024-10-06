<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get("http://host.docker.internal/api/cart");

        $a = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get("http://host.docker.internal/api/addresses");

        $address = $a->json()['0'] ?? null;
        if ($response->successful()) {
            $cart = $response->json();
            return view('cart', compact('cart', 'address'));
        } else {
            return redirect()->back()->with('error', 'Cart is Empty! Add something first.');
        }
    }

    public function add($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->post("http://host.docker.internal/api/cart/add/{$id}");

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Product added to cart');
        } else {
            return redirect()->back()->with('error', $response->json()['message']);
        }
    }

    public function update(Request $request, $id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->put("http://host.docker.internal/api/cart/update/{$id}", [
            'quantity' => $request->quantity
        ]);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Cart updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update cart');
        }
    }

    public function remove($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->post("http://host.docker.internal/api/cart/remove/{$id}");

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Product removed from cart');
        } else {
            return redirect()->back()->with('error', 'Failed to remove product from cart');
        }
    }

    public function applyCoupon(Request $request)
    {
        $coupon = $request->coupon;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->post("http://host.docker.internal/api/cart/apply-coupon", [
            'coupon' => $coupon
        ]);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Coupon applied successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to apply coupon');
        }
    }

}
