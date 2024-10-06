<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if (!session()->has('token')) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
        }

        $params = $request->all(); 
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get("http://host.docker.internal/api/products", $params);

        if ($response->successful()) {
            $products = $response->json();
            return view('home', ['products' => $products]);
        } else {
            return redirect()->back()->with('error', $response->json()['message']);
        }
    }

    public function show($slug, $id)
    {
        if (!session()->has('token')) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get("http://host.docker.internal/api/products/" . $id);

        if ($response->successful()) {
            $data = $response->json();
            $product = $data['product'];
            $seller = $data['seller'];
            $topRatedProduct = $data['topRatedProduct'];

            $otherProductsResponse = Http::withHeaders([
                'Authorization' => 'Bearer ' . session('token'),
            ])->get("http://host.docker.internal/api/products");

            if ($otherProductsResponse->successful()) {
                $sellerProducts = collect($otherProductsResponse->json());

                // Exclude the current product and limit to 5 products
                $similarProducts = $sellerProducts->filter(function ($item) use ($product) {
                    return $item['id'] != $product['id'];
                })->take(5);
            } else {
                $similarProducts = collect();
            }

            return view('product.index', compact('product', 'seller', 'topRatedProduct', 'similarProducts'));
        } else {
            return redirect()->back()->with('error', $response->json()['message']);
        }
    }


    public function store(Request $request)
    {
        $formData = $request->all();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $formData['image'] = fopen($request->image->path(), 'r');
        }
        $headers = [
            'Authorization' => 'Bearer ' . session('token'),
        ];
        // Send the request as multipart/form-data
        $response = Http::withHeaders($headers)->asMultipart()->post('http://host.docker.internal/api/products', $formData);
        $responseData = $response->json();
        if ($response->successful()) {
            return redirect()->back()->with('success', $responseData['message']);
        } 
        if ($response->status() == 422) {
            return redirect()->back()->withErrors($responseData['errors'])->withInput();
        }
        return redirect()->back()->with('error', $responseData['message']);
    }

    public function update(Request $request, $id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->post("http://host.docker.internal/api/products/{$id}", $request->all());

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Product updated successfully.');
        } else {
            return redirect()->back()->withInput()->withErrors($response->json()['errors']);
        }
    }

    public function destroy($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->delete("http://host.docker.internal/api/products/{$id}");

        if ($response->successful()) {
            return redirect()->route('home')->with('success', 'Product deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete product.');
        }
    }
}
