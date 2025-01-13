<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    function loginPost(Request $request){
        //Validate login details
        $request->validate([
            "email" => "required",
            "password" => "required",
        ]);
        $credentials = $request->only("email", "password");
        //Proceed to company page if success
        if(Auth::attempt($credentials)){
            return redirect()->intended(("companies"));
        }
        //Show login error if failed
        return redirect(route("login"))->with("error","Login failed");
    }
}
