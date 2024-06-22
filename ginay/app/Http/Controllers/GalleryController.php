<?php

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Gallery::create([
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description,
        ]);

        return redirect()->route('galleries.index')
                         ->with('success','Gallery created successfully.');
    }

    public function edit(Gallery $gallery)
    {
        return view('galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $gallery->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('galleries.index')
                         ->with('success','Gallery updated successfully');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('galleries.index')
                         ->with('success','Gallery deleted successfully');
    }
}

