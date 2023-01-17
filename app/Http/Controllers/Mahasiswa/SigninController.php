<?php

namespace App\Http\Controllers\Mahasiswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function index(){
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
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

}
