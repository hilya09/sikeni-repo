<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilemhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.profilemhs', [
            "title" => "Profile-Mahasiswa",
            "judul" => "Profile"
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('mahasiswa.editprofilmhs', [
            "title" => "Profile-Mahasiswa",
            "judul" => "Edit Profile"
        ]);
    }

    public function editpass(User $id)
    {
        return view('mahasiswa.editpswmhs', [
            "title" => "Edit Password-Mahasiswa",
            "judul" => "Edit Password"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'username'=> 'required|max:225',
            'name'=> 'required|max:225',
            'notelp'=> 'required|max:225',
            'email'=> 'required|max:225',
            'address'=> 'required|max:225',
            'pendidikan'=> 'required|max:225',
        ];

        $validatedData =$request-> validate($rules);
        $user = User::select('id','username', 'name', 'email', 'notelp', 'address', 'pendidikan')->whereId($id)->firstOrFail();
        User::where('id', $user->id)->update($validatedData);

        return redirect('/profilmhs')->with('success', 'Your Profile has Updated');
    }

    public function updatepass(Request $request)
    {
        $rules = [
            'password_lama'=> 'required|min:5',
            'newpassword'=> 'required|min:5|confirmed'
        ];

        $validatedData =$request-> validate($rules);

        $user = User::select('id', 'password')->whereId(auth()->user()->id)->firstOrFail();

        if (Hash::check($request->password_lama, $user->password)) {
            $user->update(['password' => Hash::make($request->newpassword)]);
            return redirect('/editpassmhs')->with('statusSuccess', 'Password berhasil diperbarui');
        } else {    
            return redirect('/editpassmhs')->with('statusError', 'Password gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
