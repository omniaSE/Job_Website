<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    //index 
    public function index(){
        $jobs = Job::with('employee')->latest()->simplePaginate(3);
        return view('jobs.index',[
            'jobs'=>$jobs
        ]);
    }
    //create
    public function create(){
        return view('jobs.create');
    }
    //show
    public function show(Job $job){
        return view('jobs.show',['job' => $job]);
    }
    //store
    public function store(){
        request()->validate([
            'title' => ['required','min:3'],
            'salary' => ['required']
        ]);
       $job = Job::create([
            'title'=> request('title'),
            'salary'=> request('salary'),
            'employee_id' => 1
        ]);
       Mail::to($job->employee->user)->queue(
            new JobPosted($job)
        );
        return redirect('/jobs');
    }
    //edit
    public function edit(Job $job){
        //Gate::authorize('edit-job',$job);
        return view('jobs.edit',['job' => $job]);
    }
    //update
    public function update(Job $job){
        request()->validate([
            'title' => ['required','min:3'],
            'salary' => ['required']
        ]);
        //$job = Job::findOrFail($id); //findOrFail in case the find method return null 
        $job->update([
            'title'=> request('title'),
            'salary'=> request('salary'),
        ]);
        return redirect('/jobs/' . $job->id);
    }
    //destroy
    public function destroy(Job $job){
        $job->delete();
    return redirect('/jobs'); 
    }
}
