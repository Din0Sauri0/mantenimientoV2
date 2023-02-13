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
            'rut' => 'nullable',
            'name' => 'nullable',
            'last_name' => 'nullable',
            'email' => 'nullable',
            'admin' => 'nullable'
        ]);
        //dd($request);
        $user->id = $request->rut;
        $user->name = $request->name;
        $user->email = $request->email;
        //$user->password = Hash::make($request->password);
        
        $worker->id = $request->rut;
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
