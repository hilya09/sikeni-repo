<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('mahasiswa.register', [
            "title" => "Sign Up-Petani",
        ]);
    }
    public function store(Request $request)
    {
        // return request()-> all();
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users',
            'email' => 'required|email:dns|unique:users',
            'notelp' => 'required|max:13|min:8',
            'usertype' => 'required',
            'password' => 'required|min:5|max:255'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/register')->with('addSuccess', 'Your registration was successful!');
        return redirect('/register')->with('error', 'Your registration failed!');
    }
}
