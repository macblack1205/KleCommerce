<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AddressController extends Controller
{
    // Base URL for API requests
    protected $baseUri = 'http://host.docker.internal/api/addresses';

    public function index(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
            ])->get($this->baseUri);
        $addresses = $response->json();
        
        return view('user.profile', compact('addresses'));
    }

    public function store(Request $request)
    {   
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
            ])->post($this->baseUri, $request->all());
        $res = $response->json();
        if ($response->successful()) {
            return redirect()->back()->with( ['address' => $res['address']]);
        }
        else if ($response->status() == 422) {
            return redirect()->back()->withErrors($res['errors'])->withInput();
        } else {
            return redirect()->back()->with('error', $res['message']);
        }
    }

    public function show($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->post($this->baseUri, $id);
        
        if ($response->successful()) {
            $address = $response->json();
            return view('user.profile', compact('address'));
        } else {
            return redirect()->back()->withErrors($response->json()['message']);
        }
    }

    public function update(Request $request, $id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
            ])->post("{$this->baseUri}/{$id}", $request->all());

        $res = $response->json();
        if ($response->successful()) {
            return redirect()->back()->with('success');
        }
        else if ($response->status() == 422) {
            return redirect()->back()->withErrors($res['errors'])->withInput();
        } else {
            return redirect()->back()->with('error', $res['message']);
        }
    }

    public function destroy($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
            ])->delete("{$this->baseUri}/{$id}");
        
        if ($response->successful()) {
            return redirect()->back()->with('success', 'Address deleted successfully!');
        } else {
            return redirect()->back()->withErrors($response->json()['message']);
        }
    }
}
