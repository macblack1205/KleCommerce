<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Check if the form submission is for checking the email
        if ($request->has('email') && !$request->filled('password')) {
            $response = Http::post('http://host.docker.internal/api/login', [
                'email' => $request->email
            ]);
            $data = $response->json();
            // Check if the email exists
            if ($response->status() == 200) {
                session(['user_email' => $request->email]);
                return view('auth.login-password')->with('success', $data['message']);
            } 
            else if($response->status() == 422){
                return redirect()->back()->withErrors($data['errors'])->withInput();
            }
            return redirect()->back()->with('error', $data['message']);
        }
        
        // If the form submission is with both email and password
        if ($request->has(['password'])) {
            $loginResponse = Http::post('http://host.docker.internal/api/login', [
                'email' => $request->email ? $request->email : session('user_email'),
                'password' => $request->password,
            ]);
            $data = $loginResponse->json();
            if ($loginResponse->status() == 200) {
                session(['user_id' => $data['user']['id']]);
                session(['user' => $data['user']]);
                session(['token' => $data['token']]);
                $request->session()->forget('user_email');
                return redirect()->route('home')->with('success', $data['message']);
            } 
            if($loginResponse->status() == 422){
                return redirect()->back()->withErrors($data['errors'])->withInput();
            }
            else{
                return redirect()->back()->with('error', $data['message']);
            }
            
        }
    
    }
    
    public function logout(Request $request){ //logout from all devices or current device
        if (!session()->has('token')) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
        }
        $allDevices = $request->query('all', false) == 'true'; // Checking if the 'all' query parameter is set to true

        if ($allDevices) {
            // Logout from all devices
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . session('token'),
            ])->post('http://host.docker.internal/api/logout', ['all' => true]);
        } else {
            // Logout from current device
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . session('token'),
            ])->post('http://host.docker.internal/api/logout');
        }

        if ($response->successful()) {
            $responseData = $response->json();
            session()->flush(); // Clear all session data
            Auth::logout(); // Logout the user from the application
            return redirect()->route('home')->with('success', $responseData['message']);
        }

        $responseData = $response->json();
        return back()->with('error', $responseData['message']);
    }
}
