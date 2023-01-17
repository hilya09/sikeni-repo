<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Petani;
use Illuminate\Http\Request;

class ProfilepetaniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = session("userLogined")["id_user"];
        $user = Petani::find($id_user);
        return view('petani.profilepetani', [
            "title" => "Profile-Petani",
            "user" => $user,
            "judul" => "My Profile"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id_user = session("userLogined")["id_user"];
        $user = Petani::find($id_user);
        return view('petani.editprofilpetani', [
            "user"=> $user,
            "title" => "Profile-Petani",
            "judul" => "Edit Profile"
        ]);
    }
    public function update_profile(Request $request){
        if(session()->has("userLogined")){
            $id_login = session("userLogined")["id_user"];

            // validation
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'username' => 'required|max:255',
                'email' => 'required|email:dns',
                'notelp' => 'required|max:13|min:8',
                'address' => 'required',
                'pendidikan' => 'required'
            ]);

            // storing data
            if($validatedData){
                $petani = Petani::find($id_login);

                $petani->name=$request->name;
                $petani->username=$request->username;
                $petani->email=$request->email;
                $petani->notelp=$request->notelp;
                $petani->address=$request->address;
                $petani->pendidikan=$request->pendidikan;

                if($petani->save()){
                    return redirect('/profilpetani')->with('addSuccess', 'Your Profile has updated');
                }else{
                    return redirect('/editprofilpetani')->with('error', "Your profile can't update!");
                }
            }
        }
    }

    public function editpass()
    {
        $id_user = session("userLogined")["id_user"];
        $user = Petani::find($id_user);

        return view('petani.editpswpetani', [
            "title" => "Profile-Petani",
            "user"=> $user,
            "judul" => "Edit Password"
        ]);
    }

    public function editpassStore(Request $request){
        $id_user = session("userLogined")["id_user"];
        $user = Petani::find($id_user);

        $validate = $request->validate([
            "newpassword" => "required",
            "password_lama" => "required",
            "newpassword_confirmation" => "required"        
        ]);

        if($validate){
            // checking newpassword is same with newpassword_confirmation
            if($validate["newpassword"] == $validate["newpassword_confirmation"]){
                // checking last password
                if($user->password == $validate["password_lama"]){
                    // checking last password with new password
                    if($user->password == $validate["newpassword"]){
                        return redirect('/editpasspetani')->with('same', "Your last password must different with new password");
                    }else{
                        $user->password = $validate["newpassword"];
                        if($user->save()){
                            return redirect('/profilpetani')->with('status', 'Your Password has updated');
                        }else{
                            return redirect('/editpasspetani')->with('failed', "Your Password can't update!");
                        }
                    }
                }else{
                    return redirect('/editpasspetani')->with('pass_different', "Your last password is different");  
                }
            }else{
                return redirect('/editpasspetani')->with('confir_different', "Your confirmation password is different");
            }
        }

        

        return $request;
    }

    public function update(){

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatepass(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
