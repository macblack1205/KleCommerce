<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){
        if (session()->has('token')) {
            $params = $request->all();
            
            $p = Http::withHeaders([
                'Authorization' => 'Bearer ' . session('token'),
            ])->get("http://host.docker.internal/api/products", $params);
            if($p->status() == 200) $products = $p->json() ?? null;
            $products = ($p->status() == 200) ? $p->json() ?? null : null;

            $c = Http::withHeaders([
                'Authorization' => 'Bearer ' . session('token'),
            ])->get("http://host.docker.internal/api/coupons");
            $coupons = ($c->status() == 200) ? $c->json() ?? null : null;

            $a = Http::withHeaders([
                'Authorization' => 'Bearer ' . session('token'),
            ])->get("http://host.docker.internal/api/addresses");
            $address = ($a->status() == 200) ? $a->json()['0'] ?? null : null;

            session(['address' => $address]);
            session(['coupons' => $coupons]);
            return view('home', ['products' => $products]);
        }
        else
            return view('home');
    }
}
