<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:10'
        ]);

        // Here you would typically send an email
        // Mail::to('hello@alexmorgan.dev')->send(new ContactMail($validated));

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your message! I\'ll get back to you soon.'
        ]);
    }
}