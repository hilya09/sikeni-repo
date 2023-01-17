<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetjobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
     * @param  \App\Models\Getjob  $getjob
     * @return \Illuminate\Http\Response
     */
    public function show(Getjob $getjob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Getjob  $getjob
     * @return \Illuminate\Http\Response
     */
    public function edit(Getjob $getjob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Getjob  $getjob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Getjob $getjob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Getjob  $getjob
     * @return \Illuminate\Http\Response
     */
    public function destroy(Getjob $getjob)
    {
        //
    }
}
