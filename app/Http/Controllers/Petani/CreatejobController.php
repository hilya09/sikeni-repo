<?php

namespace App\Http\Controllers\Petani;

use App\Models\Job;
use App\Models\Petani;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreatejobController extends Controller
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
            return view('petani.createjob', [
                "jobs"=>$jobs,
                // "filter" => Job::latest()->filter(request(['search']))->get(),
                "title" => "CreateJob-Petani",
                "judul" => "Create Your Job"
            ]);

            // return $jobs;
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
         $validatedData = $request->validate([
            'job_name' => 'required|max:255',
            'company' => 'required|max:255',
            'location' => 'required|max:255',
            'land' => 'required|max:255',
            'position' => 'required|max:255',
            'email' => 'required|email:dns|',
            'nohp' => 'required|max:255',
            'close' => 'required',
            'foto' => 'required',
            'body' => 'required',
        ]);

        // storing data to table job 
        if($validatedData){
            $job = new Job;

            $job->job_name=$request->job_name;
            $job->company=$request->company;
            $job->location=$request->location;
            $job->land=$request->land;
            $job->position=$request->position;
            $job->email=$request->email;
            $job->nohp=$request->nohp;
            $job->close=$request->close;
            $job->body=$request->body;
            $job->foto=$request->file("foto")->store("images");
            $job->petani_id = $request->user_id;
  

            // return $request;
            if($job->save()){
                return redirect('/petani')->with('addSuccess', 'Your post added');
            }else{
                return redirect('/createjob')->with('error', 'Your registration failed!');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if(session()->has("userLogined")){
            $id_login = session("userLogined")["id_user"];
            $jobs = Petani::find($id_login)->getPosts;

            // filtering
            $job_detail = new Job;
            foreach ($jobs as $job) {
               if(Str::slug($job->job_name)== $slug){
                $job_detail = $job;
                break;
               }
            }
            return view('petani.createjob', [
                "job_detail"=>$job_detail,
                "jobs"=>$jobs,
                "url"=>"/editpost/".Str::slug($job->job_name),
                // "filter" => Job::latest()->filter(request(['search']))->get(),
                "title" => "Dashboard-Petani",
                "judul" => "Dashboard"
            ]);

            // return $jobs;
        }else{
            session()->invalidate();
            return redirec("/signinpetani");
        }
    }
    public function edit_store($slug, Request $request)
    {
        if(session()->has("userLogined")){
            $id_login = session("userLogined")["id_user"];
            $jobs = Petani::find($id_login)->getPosts;

            // filtering
            $job_detail = new Job;
            foreach ($jobs as $job) {
               if(Str::slug($job->job_name)== $slug){
                $job_detail = $job;
                break;
               }
            }
            $id_job = $job_detail->id;

            // validation
            $validatedData = $request->validate([
                'job_name' => 'required|max:255',
                'company' => 'required|max:255',
                'location' => 'required|max:255',
                'land' => 'required|max:255',
                'position' => 'required|max:255',
                'email' => 'required|email:dns|',
                'nohp' => 'required|max:255',
                'close' => 'required',
                'body' => 'required',
            ]);

            // storing data
            if($validatedData){
                $job = Job::find($id_job);
                $job->job_name=$request->job_name;
                $job->company=$request->company;
                $job->location=$request->location;
                $job->land=$request->land;
                $job->position=$request->position;
                $job->email=$request->email;
                $job->nohp=$request->nohp;
                $job->close=$request->close;
                $job->body=$request->body;
                $job->petani_id = $request->user_id;

                if(is_null($request->file("foto"))){
                    $job->foto=asset("storage/".$job->foto);
                }else{
                    $job->foto=$request->file("foto")->store("images");
                }

                if($job->save()){
                    return redirect('/createjob')->with('addSuccess', 'Your post updated');
                }else{
                    return redirect('/editpost/'.$slug)->with('error', 'Your update failed!');
                }
            }
        }else{
            session()->invalidate();
            return redirec("/signinpetani");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(Job::destroy($request->id_job_delete)){
            return redirect('/createjob')->with('addSuccess', 'Your post has deleted');
        }else{
            return redirect('/createjob')->with('error', "Your post can't deleted");
        }
        
    }
}
