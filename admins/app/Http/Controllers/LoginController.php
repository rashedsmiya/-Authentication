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
 
}
