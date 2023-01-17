<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MahasiswaDashController extends Controller
{
    public function index(){
        $jobs = Job::all();
        // getting land 
        $land = 0;
        foreach ($jobs as $job) {
            $land += (int)$job->land;
        }

        return view('mahasiswa.mahasiswadash', [
            "title" => "Dashboard-Mahasiswa",
            "judul" => "Dashboard",
            'jobs' => $jobs,
            "users"=> User::all(),
            "land" => $land
        ]);
    }

    public function search(Request $request){
        $jobs = Job::all();
        $job_searched = [];
        foreach ($jobs as $job) {
            if(Str::slug($job->location)== Str::slug($request->search)){
            array_push($job_searched,$job);
           }            
        }

        return redirect("/getjob")->with("jobs_search",$job_searched);
    }
}
