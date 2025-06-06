<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => 'Invalid credentials'
            ]);
        }
        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'Invalid credentials'
            ]);
        }

        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json([
            'token' => $token,
            'user' => [
                'name'=>$user->name,
                'email'=>$user->email,
            ]
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

        public function getprofile(Request $request){
        
        return 'Hello';
    }
}
