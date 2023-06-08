<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Worker;
//Facades
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    
    public function store(Request $request){
        $messages = [
            'required' => 'Este campo es requerido.',
            'email' => 'El campo correo debe ser una dirección de correo electrónico válida',
            'min' => 'Este campo debe contar con al menos :min caracteres',
            'max' => 'Este campo deber tener como máximo :max caracteres'
        ];
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:15',
            'remember' => 'nullable'
        ], $messages);
        $credentials = request()->only('email', 'password');

        if(Auth::attempt($credentials)){
            //$companies = Company::all();
            $userId = User::select('id')->where('email', '=', $credentials['email'])->first();
            $company_user_reference = Company::select('user_reference')->where('id', '=', $userId->id)->first();
            $worker_company_reference = Worker::select('company_reference')->where('id', '=', $userId->id)->first();
            
            if($company_user_reference != null){
                session(['company_reference' => $company_user_reference->user_reference]);
                return redirect()->route('project');
            }
            session(['company_reference' => $worker_company_reference->company_reference]);
            return redirect()->route('project');
        }
        return redirect()->route('login');

    }

    public function destroy(){
        Auth::logout();
        return redirect('/login');
    }
}
