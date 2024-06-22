<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index() {
        $data = User::get();
        return view('index', compact('data'));
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/images/users');
            $data->image = str_replace('public/', '', $imagePath); // Adjusted path to remove 'public' from the URL
        }
    
        $data->save();
    
        return redirect()->route('index');
    }

    public function delete(Request $request, $id) {
        $data = User::find($id);
        if($data) {
            $data->delete();
        }
        return redirect()->route('index');
    }

    public function edit(Request $request,$id) {
        $data = User::find($id);
        if (!$data) {
            return redirect()->route('index')->with('error', 'User Not Found');
        }
        return view('edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email',
            'nama' => 'required',
            'password' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $find = User::find($id);
        if (!$find) {
            return redirect()->back()->with('error', 'User not found.');
        }
        $data = [
            'email' => $request->email,
            'name' => $request->nama,
        ];
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }
        $find->update($data);
        return redirect()->route('index')->with('success', 'User updated successfully.');
    }
}    
