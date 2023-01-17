<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Petani;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PetanidashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has("userLogined")){
            $id_login = session("userLogined")["id_user"];
            $jobs = Petani::find($id_login)->getPosts;
            $users = User::all();

            // getting land 
            $land = 0;
            foreach ($jobs as $job) {
                $land += (int)$job->land;
            }
            
            if(session("jobs_search")){
                $jobs = session("jobs_search");
            }
            
            return view('petani.petanidash', [
                "jobs"=>$jobs,
                // "filter" => Job::latest()->filter(request(['search']))->get(),
                "title" => "Dashboard-Petani",
                "judul" => "Dashboard",
                "land" => $land,
                "users_mhs" => $users
            ]);
        }else{
            session()->invalidate();
            return redirec("/signinpetani");
        }
        
    }

    public function detail_job($slug){
        if(session()->has("userLogined")){
            $id_login = session("userLogined")["id_user"];
            $jobs = Petani::find($id_login)->getPosts;
            $job_detail = new Job;
            foreach ($jobs as $job) {
               if(Str::slug($job->job_name)== $slug){
                $job_detail = $job;
                break;
               }
            }
            return view("Petani.detailgetjob",[
                "job"=>$job_detail,
                "title" => "Detail-Petani",
                "judul" => "Detail"
            ]);
        }else{
            session()->invalidate();
            return redirec("/signinpetani");
        }
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
     * @param  \App\Models\Petani  $petani
     * @return \Illuminate\Http\Response
     */
    public function show(Petani $petani)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petani  $petani
     * @return \Illuminate\Http\Response
     */
    public function edit(Petani $petani)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petani  $petani
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petani $petani)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petani  $petani
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petani $petani)
    {
        //
    }

    public function search(Request $request){
        $id_login = session("userLogined")["id_user"];
        $jobs = Petani::find($id_login)->getPosts;
        $job_searched = [];
        foreach ($jobs as $job) {
            if(Str::slug($job->location)== Str::slug($request->search)){
            array_push($job_searched,$job);
           }            
        }

        return redirect("/petani")->with("jobs_search",$job_searched);
    }
}
