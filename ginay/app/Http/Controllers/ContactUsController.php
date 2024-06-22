<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function index()
    {
        $contacts = ContactUs::latest()->get();
        return view('contact-us.index', compact('contacts'));
    }

    public function create()
    {
        return view('contact-us.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        ContactUs::create($request->all());

        return redirect()->route('lina.contact-us.index')
                         ->with('success', 'Message sent successfully.');
    }

    public function destroy($id)
    {
        $contact = ContactUs::findOrFail($id);
        $contact->delete();

        return redirect()->route('lina.contact-us.index')
                         ->with('success', 'Message deleted successfully.');
    }
}
