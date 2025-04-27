<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'message' => 'required|string',
        ]);

        // Store message in database
        Message::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        // Get admin email from settings
        $adminEmail = Setting::getValue('contact_email', 'admin@example.com');

        // Here you would typically send an email using Laravel's Mail facade
        // For simplicity, we're just returning a success response
        // In a real application, you'd use:
        // Mail::to($adminEmail)->send(new \App\Mail\ContactFormSubmission($validated));

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your message!'
        ]);
    }
}