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
        $messages = [
            'required' => 'Este campo es requerido.',
            'email' => 'El campo correo debe ser una dirección de correo electronico valida',
            'min' => 'Este campo debe contar con al menos :min caracteres',
            'max' => 'Este campo deber tener como maximo :max caracteres',
            'unique' => 'Este atributo ya ha sido registrado'
        ];
        $request->validate([
            'id' => 'required| min:8| max:9| unique:users',
            'name' => 'required| min:3| max:50',
            'address' => 'required| min:4| max:100',
            'email' => 'required|email|min:10| max:120| unique:users',
            'password' => 'required|min:6|max:15',

        ], $messages);

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
