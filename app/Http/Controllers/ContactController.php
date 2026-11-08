<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string',
            'website' => 'nullable', // honeypot field
        ]);

        // Honeypot: if website field is filled, it's probably a bot
        if (!empty($validated['website'])) {
            abort(403, 'Anti-spam validation failed.');
        }

        ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
        ]);

        return redirect()->route('contact.show')
            ->with('message', 'Votre message a bien été envoyé. Merci, je vous répondrai dès que possible !');
    }
}
