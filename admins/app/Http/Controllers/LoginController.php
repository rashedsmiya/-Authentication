<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;    
use Illuminate\Support\Facades\Password;
=======
use Illuminate\Support\Facades\Validator; 
>>>>>>> fc7981a (WIP: Save current changes before pull)
class LoginController extends Controller
{
    // Show login page
    public function index()
    {
        return view('login');
    }
<<<<<<< HEAD

    // Authenticate user
    public function authenticate(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Login successful, redirect to dashboard or wherever needed
                return redirect()->route('account.dashboard');
            } else {
                // Auth failed
                return redirect()->route('account.login')
                    ->with('error', 'These credentials do not match our records.');
            }
        } else {
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    // Show register page
    public function register()
    {
        return view('register');
    }
    
    // Process register
    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        if ($validator->passes()) {
            // Here, you would usually create the user in DB:
            // User::create([...]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'customer';
            $user->save();
            
            return redirect()->route('account.login')
                ->with('success', 'Account created successfully. Please log in.');
        } else {
            return redirect()->route('account.register')
                ->withInput()
                ->withErrors($validator);
        }
    }


    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('account.login');
    }   

=======
 
>>>>>>> fc7981a (WIP: Save current changes before pull)
}
