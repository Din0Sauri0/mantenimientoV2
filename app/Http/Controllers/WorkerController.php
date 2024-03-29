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
        $workers = Worker::where('company_reference', '=', session('company_reference'))->get();
        $user_data = [];
        foreach($workers as $worker){
            $user = User::where('id', '=', $worker->id)->get();
            foreach($user as $data){
                array_push($user_data, 
                    [
                        'name' => $data->name,
                        'last_name' => $worker->last_name,
                        'email' => $data->email,
                        'id' => $worker->id
                    ]
                );
                break;
            }
        }
        return view('worker', compact('user_data'));
    }

    public function create(){
        return view('create_worker');
    }

    public function store(Request $request){
        $messages = [
            'required' => 'Este campo es requerido.',
            'min' => 'Este campo debe contar con al menos :min caracteres',
            'max' => 'Este campo deber tener como máximo :max caracteres',
            'unique' => 'Este atributo ya se encuentra registrado',
            'email' => 'Este campo debe ser un correo electrónico válido'
        ];
        $request->validate([
            'id' => 'required| min:8| max:9| unique:users',
            'name' => 'required| min:3| max:20',
            'last_name' => 'required| min:5|max:30',
            'email' => 'required|email|min:10| max:120| unique:users',
            'password' => 'required|min:6|max:15',
            'password_confirmation' => 'required',
            'admin' => 'nullable'
        ], $messages);
        //dd($request);
        $user = new User();
        $user->id = $request->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->boolean('admin');
        $user->password = Hash::make($request->password);
        
        $worker = new Worker();
        $worker->id = $request->id;
        $worker->last_name = $request->last_name;
        $worker->user_reference = $user->id;
        $worker->company_reference = session('company_reference');
        
        $user->save();
        $worker->save();
        return redirect()->route('worker')->with('msg', 'El trabajador '.$worker->name.' '.$worker->last_name.' ha sido creado satisfactoriamente');

    }

    public function show($id){
        $worker = Worker::findOrFail($id);
        $user = User::findOrFail($id);
        $worker_data = [
            'id' => $worker->id,
            'name' => $user->name,
            'last_name' => $worker->last_name,
            'email' => $user->email,
            'password' => $user->password,
            'admin' => $worker->admin
        ];

        return view('show_worker', compact('worker_data'));
    }

    public function edit($id){
        $worker = Worker::findOrFail($id);
        $user = User::findOrFail($id);
        $worker_data = [
            'id' => $worker->id,
            'name' => $user->name,
            'last_name' => $worker->last_name,
            'email' => $user->email,
            'password' => $user->password,
            'admin' => $worker->admin
        ];
        return view('edit_worker', compact('worker_data'));

    }

    public function update($id, Request $request){
        $worker = Worker::findOrFail($id);
        $user = User::findOrFail($id);

        $request->validate([
            'id' => 'required|min:9|max:9',
            'name' => 'required|min:3|max:20',
            'last_name' => 'required|min:5|max:30',
            'email' => 'required|email|min:10| max:120',
            'admin' => 'nullable'
        ]);
        //dd($request);
        $user->id = $request->id;
        $user->name = $request->name;
        $user->email = $request->email;
        //$user->password = Hash::make($request->password);
        
        $worker->id = $request->id;
        $worker->last_name = $request->last_name;
        $worker->admin = $request->boolean('admin');
        $worker->user_reference = $user->id;
        $worker->company_reference = session('company_reference');
        
        $user->save();
        $worker->save();
        return redirect()->route('worker');
    }

    public function delete($id){
        $worker = Worker::find($id);
        $user = User::find($id);
        $worker->delete();
        $user->delete();

        return redirect()->route('worker');
    }
}
