<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    //
    public function create(){
        return view('Auth.register');
    }
    public function store(){
        $attributes =request()->validate([
            'first_name'=>['required'] ,
            'last_name'=>['required'],
            'email'=>['required','email'] ,
            'password'=>['required',Password::min(5),'confirmed']
        ]);
        $user=User::create($attributes);
        Auth::login($user);
        return redirect('/jobs');
    }
}
