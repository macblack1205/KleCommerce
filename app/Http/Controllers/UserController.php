<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request) 
    {
        $formData = $request->all();
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $formData['photo'] = fopen($request->photo->path(), 'r');
        }

        // Send the request as multipart/form-data
        $response = Http::asMultipart()->post('http://host.docker.internal/api/register', $formData);
        $responseData = $response->json();

        if ($response->successful()) {
            return redirect()->route('login')->with('success', $responseData['message']);
        }
        else if ($response->status() == 422) {
            return redirect()->back()->withErrors($responseData['errors'])->withInput();
        }
        return redirect()->back()->with('error', $responseData['message']);
        
    }

    public function show($name = null, $id = null)
    {
        if (!session()->has('token')) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
        }
        $userID = null;
        $id ? $userID = $id : $userID = session('user_id');     //if id isnt given, forwards to profile, 
                                                                    //else, forwards to selected user's page   

        $user = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get("http://host.docker.internal/api/users/" . $userID);

        $p = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get("http://host.docker.internal/api/products");

        $products = ($p->status() == 200) ? $p->json() ?? null : null;
        if ($user->successful()) {
            return view('user.profile', ['user'=>$user->json(), 'products' =>$products]);
        }
        return back()->with('error', 'Unable to retrieve user details.');
    }

    public function update(Request $request, $id)
    {
        // Prepare data for update
        $formData = $request->all();
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $formData['photo'] = fopen($request->photo->path(), 'r');
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->asMultipart()->post('http://host.docker.internal/api/users/' . $id, $formData);
        $responseData = $response->json();
        if ($response->successful()) {
            session(['user' => $responseData['user']]);
            return redirect()->route('profile')->with('success');
        }
        else if ($response->status() == 422) {
            return redirect()->back()->withErrors($responseData['errors'])->withInput();
        }
        return redirect()->back()->with('error', $responseData['message']);
    }       

    public function destroy($id)
    {
        // Send delete request to the API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->delete("http://host.docker.internal/api/users/{$id}");

        // dd($response);
        if ($response->successful()) {
            session()->flush(); // Clear all session data
            Auth::logout();
            return redirect()->route('login')->with('success', 'User deleted successfully.');
        }
        return back()->with('error', 'Failed to delete user.');
    }
}
