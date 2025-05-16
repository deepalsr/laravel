<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login():string{
        return "test login";
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

        User::create($request->all());

        return response()->json([
            'message'=> 'User created successfully',
        ]);

        
        }
}