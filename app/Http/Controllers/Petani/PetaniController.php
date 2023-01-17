<?php

namespace App\Http\Controllers\Petani;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Petani;

class PetaniController extends Controller
{
    public function registerpetani()
    {
        return view('petani.register', [
            "title" => "Sign Up-Petani",
        ]);
    }

    public function store(Request $request)
    {
        // return request()-> all();
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:petanis',
            'email' => 'required|email:dns|unique:petanis',
            'notelp' => 'required|max:13|min:8',
            'usertype' => 'required',
            'password' => 'required|min:5|max:255'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);

        // storing data to table petanis 
        if($validatedData){
            $petani = new Petani;

            $petani->name=$request->name;
            $petani->username=$request->username;
            $petani->email=$request->email;
            $petani->notelp=$request->notelp;
            $petani->usertype=$request->usertype;
            $petani->password=$request->password;
            $petani->address=$request->address;
            $petani->pendidikan=$request->pendidikan;

            if($petani->save()){
                return redirect('/signinpetani')->with('addSuccess', 'Your registration was successful!');
            }else{
                return redirect('/registerpetani')->with('error', 'Your registration failed!');
            }
        }
        
    }

    public function signinpetani(){
        return view('petani.signin', [
            "title" => "SIKENI - SignIn"
        ]);
    }
    public function authenticate(Request $request){
        $credentials = $request -> validate([
            'email' => 'required|email:dns|exists:petanis,email',
            'password' => 'required'
        ]);

        $petaniLogined = Petani::where("email","=",$request->email)->get();
        if(isset($petaniLogined)){
            if($petaniLogined[0]->password == $request->password){
                session()->put("userLogined",[
                    "nama"=>$petaniLogined[0]->name,
                    "userType"=>$petaniLogined[0]->usertype,
                    "id_user"=>$petaniLogined[0]->id
                ]);
                return redirect()->intended('/petani');
            }else{
                return redirect('/signinpetani')->with('loginError', 'Login Failed!'); 
            }
        }else{
            return redirect('/signinpetani')->with('loginError', 'Login Failed!'); 
        }
        
    }

    public function logout(){
        session()->invalidate();
        return redirect('/');
    }
}
