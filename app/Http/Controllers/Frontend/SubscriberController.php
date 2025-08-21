<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller {
    public function store(Request $request)
    {
        // Validate email and ensure it's unique
        $request->validate([
            'subscribe' => 'required|email|unique:subscribers,email',
        ]);

        // Save to the database using Eloquent
        Subscriber::create([
            'email' => $request['email'],
        ]);

        return redirect()->back()->with('success', 'Subscribed successfully!');
    }

}
