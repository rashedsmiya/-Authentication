<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Register a new user
    public function register(Request $req){
        $req->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:5|confirmed'
        ]);
        $user = User::create([
            'name'  => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),

        ]);

        return response()->json(['message' => 'user registered!'], 201);

    }

    // login
    public function login(Request $req){
        $req->validae([
            'email'=>'required|string|email',
            'password'=> 'required|string'
        ]);

        $user = User::where('email', $req->email)->first();
        if(!user || Hash::check($req->password, $user->password)){
            throw Validationexception::withMessage([
                'email'=>['the provide email is incorrect'],
            ]);
        }

        $token = $user->createToken('user-token')->plainTextToken;
        return respons()->json([
            'token' => $token,
            'user' => $user
        ]);
    }

    // logout 
    public function logout(Request $req){
        $req->user()->token()->delete();
        return response()->json(['message'=>'user Logout!!']);
    }

    // Get User Data
    public function getUser(Request $req){
        return response()->json($req->user());
    }
}
