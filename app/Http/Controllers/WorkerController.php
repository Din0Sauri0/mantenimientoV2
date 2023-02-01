<?php

namespace App\Http\Controllers;

//Models
use App\Models\Worker;
use App\Models\User;
//Facades
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index(){
        return view('worker');
    }

    public function create(){
        return view('create_worker');
    }

    public function store(Request $request){
        $request->validate([
            'rut' => 'nullable',
            'name' => 'nullable',
            'last_name' => 'nullable',
            'email' => 'nullable',
            'password' => 'nullable',
            'password_confirmation' => 'nullable',
            'admin' => 'nullable'
        ]);
        //dd($request);
        $user = new User();
        $user->id = $request->rut;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        $worker = new Worker();
        $worker->id = $request->rut;
        $worker->last_name = $request->last_name;
        $worker->admin = $request->boolean('admin');
        $worker->user_reference = $user->id;
        $worker->company_reference = session('company_reference');
        
        $user->save();
        $worker->save();
        return redirect()->route('worker');

    }
}
