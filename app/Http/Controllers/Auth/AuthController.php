<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/**
 *  
 * APIs to manage user authentication
 *
 * To access the API, a registered user must generate a token that they will pass to the headers of the Loan API
 * 
 * @bodyParam email string required The email used for the system. Example: email@email.com
 * @bodyParam password string required Preferred password. Example: Pass&LSD2
 * @bodyParam token_name string required The name of the system querying the Loan API. Example: BankSystem
 * 
 * If you are able to Login everything is okay, you'll get a 200 OK response with the response:.
 * @respponse 200 scenario="Ok" 
 * {
    "token": "1|A9YZIwHj0ZP8GnhMN4a5HfDbCEoS6uFVRPUTwWhQ",
    "user": {
        "id": 1,
        "name": "Some Admin",
        "email": "someadmin@dfcu.co.ug",
        "email_verified_at": null,
        "created_at": "2023-10-19T12:57:16.000000Z",
        "updated_at": "2021-10-19T12:57:16.000000Z"
        }
 *  }
 * 
 * Otherwise, the request will fail with a 422 error, and a response unprocessable content
 * 
 * @response 422 scenario="Unprocessable Content" {
    "message": "The email field is required. (and 2 more errors)",
    "errors": {
        "email": [
            "The email field is required."
        ],
        "password": [
            "The password field is required."
        ],
        "token_name": [
            "The token name field is required."
        ]
      }
 * }
 *
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
}
