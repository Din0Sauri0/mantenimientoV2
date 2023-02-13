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
            'id' => 'required| min:8| max:9| unique:users',
            'name' => 'required| min:3| max:50',
            'address' => 'required| min:4| max:100',
            'email' => 'required|email|min:10| max:120| unique:users',
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
