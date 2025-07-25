<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

         return 'User Created';
    }  
}
