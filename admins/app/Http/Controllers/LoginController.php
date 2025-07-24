<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    // This method will show login page for customer
    public function index()
    {
        return view('login');
    }

    // This method will authenticate user
    public function authenticate(Request $request)  
    {
      $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',   
      ]);
      
      if($validator->passes()){

      } else{
        return redirect()->route('account.login')
        ->withInput()
        ->withErrors($validator);
      }
    }    
}
