<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function registerForm(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name' =>'required|string|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|string|confirmed|min:5|max:30',
        ]);

       $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect(url('/cats'));
    }
}
