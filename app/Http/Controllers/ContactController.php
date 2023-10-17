<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function msgViews()
    {
        $messages = Contact::latest()->get();
        return view('auth.msgs.messages', compact('messages'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        Contact::create($validatedData);

        return back()->with('success', 'Your message has been sent successfully!');
    }

    public function show($id)
    {
        $message = Contact::findOrFail($id);
        return view('auth.msgs.message-details', compact('message'));
    }

    public function delete(Request $request, $id)
    {
        $message = Contact::findOrFail($id);
        $message->delete();

        return back()->with('success', 'Message deleted successfully');
    }
}
