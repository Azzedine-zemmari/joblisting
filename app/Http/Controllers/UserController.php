<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('users.register');
    }
    public function store(Request $request){
        $formFields = $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:6'
        ]);
        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        //create user
        $user = User::create($formFields);
        //Login

        auth()->login($user);
        return redirect('/')->with('message','User created and logged in');

    }
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You have been logged out!');
    }
    public function login(){
        return view('users.login');
    }
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message','You logged in');
        }
        return back()->withErrors(['email'=>'Invalide Credentials'])->onlyInput('email');
    }
}
