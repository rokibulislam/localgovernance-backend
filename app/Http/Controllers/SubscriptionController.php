<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriptionController extends Controller
{
    
    public function subscribe(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email|unique:subscribers', // Example validation rules
        ]);

        Subscriber::create([
            'email' => $request->email,
        ]);

        // You can also send a welcome email or perform any other action here

        // Redirect back with a success message
        return back()->with('success', 'Thank you for subscribing!');
    }
}
