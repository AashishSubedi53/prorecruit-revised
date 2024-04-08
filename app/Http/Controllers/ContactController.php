<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendContactForm(Request $request)
    {
        $details = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'message' => $request->input('message')
        ];

        Mail::to('prorecruit@example.com')->send(new ContactFormMail($details));

        return redirect()->back()->with('message', 'Message sent successfully!');
    }
}
