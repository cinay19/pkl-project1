<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function welcome()
    {
        $galleries = Gallery::all();
        return view('umkm.welcome', compact('galleries'));
    }

    public function showGallery(Gallery $gallery)
    {
        return view('umkm.gallery', compact('gallery'));
    }
}