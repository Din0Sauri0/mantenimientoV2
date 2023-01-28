<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//Facades
use Illuminate\Support\Facades\Hash;
//Models
use App\Models\Company;
use App\Models\User;

class RegisterUserController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'password' => 'required',

        ]);
        $user = new User();
        $company = new Company();

        $user->id = $request->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $company->id = $request->id;
        $company->address = $request->address;
        $company->user_reference = $request->id;

        $user->save();
        $company->save();
        return redirect()->route('login');
    }
}
