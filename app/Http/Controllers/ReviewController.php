<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReviewController extends Controller
{
    public function index($id)
    {
        // Fetch reviews for a specific product
        $response = Http::get("http://host.docker.internal/api/products/{$id}/reviews");

        if ($response->successful()) {
            $reviews = $response->json();
            return view('reviews.index', compact('reviews'));
        } else {
            return redirect()->back()->with('error', 'Failed to retrieve reviews.');
        }
    }

    public function store(Request $request)
    {
        if (!session()->has('token')) {
            return redirect()->route('login')->with('error', 'You must be logged in to post a review.');
        }

        // Enforce one review per product per user
        $existingReviewResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->get("http://host.docker.internal/api/reviews/user/{$request->product_id}");

        if ($existingReviewResponse->status() == 200) {
            return redirect()->back()->with('error', 'You have already reviewed this product.');
        }

        $formData = $request->only(['product_id', 'rating', 'review']);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->post('http://host.docker.internal/api/reviews', $formData);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Review posted successfully.');
        } elseif ($response->status() == 422) {
            return redirect()->back()->withErrors($response->json()['errors'])->withInput();
        } else {
            return redirect()->back()->with('error', 'Failed to post review.');
        }
    }

    public function update(Request $request, $id)
    {
        if (!session()->has('token')) {
            return redirect()->route('login')->with('error', 'You must be logged in to update a review.');
        }
        $formData = $request->only(['rating', 'review']);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->put("http://host.docker.internal/api/reviews/{$id}", $formData);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Review updated successfully.');
        } elseif ($response->status() == 422) {
            return redirect()->back()->withErrors($response->json()['errors'])->withInput();
        } else {
            return redirect()->back()->with('error', 'Failed to update review.');
        }
    }

    public function destroy($id)
    {
        if (!session()->has('token')) {
            return redirect()->route('login')->with('error', 'You must be logged in to delete a review.');
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . session('token'),
        ])->delete("http://host.docker.internal/api/reviews/{$id}");

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Review deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete review.');
        }
    }
}
