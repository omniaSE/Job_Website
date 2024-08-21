<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\LoginUserController;
use App\Jobs\TranslateJob;
use App\Models\Job;

//home Route
Route::view('/','home');

//content Route
Route::view('/content','content');

//Job Route
/* Route::resource('jobs',JobController::class)->only(['index','show']);
   Route::resource('jobs',JobController::class)->except(['index','show'])->middleware('auth'); */
Route::get('/jobs',[JobController::class,'index']);
Route::get('/jobs/create',[JobController::class,'create']);
Route::post('/jobs',[JobController::class,'store'])->middleware('auth');
Route::get('/jobs/{job}',[JobController::class,'show']);
Route::get('/jobs/{job}/edit',[JobController::class,'edit'])->middleware('auth')->can('edit','job');//the job in the can and the job in {} must be identical
Route::patch('/jobs/{job}',[JobController::class,'update']);
Route::delete('/jobs/{job}',[JobController::class,'destroy']);

//Aute
//register
Route::get('/register',[RegisterUserController::class,'create']);
Route::post('/register',[RegisterUserController::class,'store']);
//login
Route::get('/login',[LoginUserController::class,'create'])->name('login');
Route::post('/login',[LoginUserController::class,'store']);
Route::post('/logout',[LoginUserController::class,'destroy']);

Route::get('test', function(){
   $job = Job::first();
 TranslateJob::dispatch($job);
   return 'Done';
});