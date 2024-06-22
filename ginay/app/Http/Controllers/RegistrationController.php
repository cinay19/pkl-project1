<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create(Gallery $gallery)
    {
        return view('umkm.registration', compact('gallery'));
    }

    public function store(Request $request, Gallery $gallery)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required|integer',
            'umkm' => 'required|string',
        ]);

        $registration = new Registration([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'number' => $request->get('number'),
            'umkm' => $request->get('umkm'),
        ]);

        $gallery->registrations()->save($registration);

        return redirect()->route('umkm.welcome')
                         ->with('success', 'Registration saved successfully!');
    }
}
