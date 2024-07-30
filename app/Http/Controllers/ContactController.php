<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        return $this->loadTheme('contact.index');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:10',
        ]);

        // Contact::create($request->all());
        Contact::create($validated);

        // Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($validated));

        return redirect('/contact')->with('success', 'Thank you for your message!');
    }
}
