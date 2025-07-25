<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request){
         $request->validate([
             'name' => 'required',
             'email' => 'required|email|unique:users,email',
             'password' => 'required|confirmed'
         ]);

         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
         ]);

         Auth::attempt($request->only('email', 'password'));    

         return redirect('/dashboard')->with('message', 'Registration successful!');
    }  
}
