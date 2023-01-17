<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MahasiswaController extends Controller
{
    public function registermhs()
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
            'password' => 'required|min:5|max:255',
            'address' => 'required',
            'pendidikan' => 'required',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/register')->with('addSuccess', 'Your registration was successful!');
        return redirect('/register')->with('error', 'Your registration failed!');
    }

    public function signinmhs(){
        return view('mahasiswa.signin', [
            "title" => "SIKENI - SignIn"
        ]);
    }
    public function authenticate(Request $request){
        $credentials = $request -> validate([
            'email' => 'required|email:dns|exists:users,email',
            'password' => 'required|min:5|max:30'
        ],[
            'email.exists'=> 'This email is not exists on user table'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/mahasiswa');
        }
        return redirect('/signinmahasiswa')->with('loginError', 'Login Failed!');
    }

    public function logout(){
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    }
}
