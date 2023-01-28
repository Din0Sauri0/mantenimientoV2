<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Facades
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    
    public function store(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'remember' => 'nullable'
        ]);
        $credentials = request()->only('email', 'password');
        // $remember = request()->only('remember') != null ? true : false;
        // dd($credentials);
        if(Auth::attempt($credentials)){
            return redirect()->route('home');
        }
        return redirect()->route('login');

    }

    public function destroy(){
        auth()->logout();
        return redirect()->route('login');
    }
}
