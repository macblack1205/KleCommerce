<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        if (!session()->has('token')) {
            return redirect()->route('login')->with('fail', 'You must be logged in to view this page.');
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get("http://host.docker.internal/api/coupons");

        if ($response->successful()) {
            $coupons = $response->json();
            return view('coupons', compact('coupons'));
        } else {
            return redirect()->back()->with('error', 'Failed to retrieve coupons.');
        }
    }

    public function store(Request $request)
    {
        if (!session()->has('token')) {
            return redirect()->route('login')->with('fail', 'You must be logged in to view this page.');
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->post("http://host.docker.internal/api/coupons", $request->all());
        $res = $response->json();

        $c = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get("http://host.docker.internal/api/coupons");

        $coupons = $c->json();

        if ($response->successful()) {
            session(['coupons' => $coupons]);
            return redirect()->back()->with('success', $res['message']);
        }
        else if ($response->status() == 422) {
            return redirect()->back()->withErrors($res['errors'])->withInput();
        } else {
            return redirect()->back()->with('error', $res['message']);
        }
    }

    public function show($id)
    {
        if (!session()->has('token')) {
            return redirect()->route('login')->with('fail', 'You must be logged in to view this page.');
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get("http://host.docker.internal/api/coupons/{$id}");

        if ($response->successful()) {
            $coupon = $response->json();
            return view('coupons', compact('coupon'));
        } else {
            return redirect()->back()->with('error', 'Coupon not found.');
        }
    }

    public function update(Request $request, $id)
    {
        if (!session()->has('token')) {
            return redirect()->route('login')->with('fail', 'You must be logged in to view this page.');
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->post("http://host.docker.internal/api/coupons/{$id}", $request->all());

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Coupon updated successfully.');
        } else {
            return redirect()->back()->withErrors($response->json()['errors'])->withInput();
        }
    }

    public function destroy($id)
    {
        if (!session()->has('token')) {
            return redirect()->route('login')->with('fail', 'You must be logged in to view this page.');
        }
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->delete("http://host.docker.internal/api/coupons/{$id}");


        $c = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get("http://host.docker.internal/api/coupons");

        $coupons = $c->json();

        
        if ($response->successful()) {
            session(['coupons' => $coupons]);
            return redirect()->back()->with('success', 'Coupon deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete coupon.');
        }
    }
}
