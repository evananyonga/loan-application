<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


/**
 *  
 * APIs to manage user authentication apis 
*/
class AuthController extends Controller
{
   public function login(Request $request){
        $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
            'token_name'=> 'required'
        ]);

       $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)){;
            $token = $request->user()->createToken($request->token_name);

            return response([
                'token' => $token->plainTextToken,
                'user' => Auth::user()
            ], 200);

        }
        return response([
            'message'=>'Username/Password Incorrect!',
            'status_code' => 403
        ], 403);
    }

   /**
    * Logout a user
    *
    *
    */
   public function logOut(Request $request) {
       $request->user()->tokens()->delete();

        return response([
            'message' => 'Logged out Successfully'
        ], 200);
    }

    public function users()
    {
        $users = User::with(['role'])->latest()->paginate(10);
        return view('auth.registered-users', compact('users'));
    }
}
