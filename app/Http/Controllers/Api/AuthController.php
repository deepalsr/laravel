<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request){
        $request ->validate([
            "email"=> "required|email",
            "password"=> "required",
            ]);
            
        
    }

    public function register(Request $request){

        
        $request->validate([
            'name'=>'required|min:1|max:255',
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        $existingUser = User::where('email', $request->email)->exists();

        if($existingUser){
            throw ValidationException::withMessages([
                'email'=> 'Email already in use',
                ]);
                }

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make( $request->password),
        ]);

        return response()->json([
            'message'=> 'User created successfully',
        ]);

        
        }

        
    
//This function is used for logging out user
        public function logout(Request $request){
            
        }
}
