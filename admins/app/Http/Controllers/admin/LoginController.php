<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\vaildator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // This method will show admin login page/screen
    public function index(){
        return view('admin.login');  
    }

    // This method will authenticate admin user
     public function authenticate(Request $request)
    {    
        // Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                // Login successful, redirect to dashboard or wherever needed
                return redirect()->route('admin.dashboard');
            } else {
                // Auth failed
                return redirect()->route('admin.login')
                    ->with('error', 'These credentials do not match our records.');
            }
        } else {
            return redirect()->route('admin.login')
                ->withInput()
                ->withErrors($validator);
        }
    }


}
