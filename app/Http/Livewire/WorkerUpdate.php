<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Worker;

class WorkerUpdate extends Component
{
    public $worker_data;

    public $rut;
    public $name;
    public $last_name;
    public $email;

    public function mount($worker_data){
        $this->rut = $worker_data['id'];
        $this->name = $worker_data['name'];
        $this->last_name = $worker_data['last_name'];
        $this->email = $worker_data['email'];

    }

    protected $rules = [
        'rut' => 'required',
        'name' => 'required',
        'last_name' => 'required|min:3',
        'email' => 'required',
    ];

    public function render()
    {
        return view('livewire.worker-update');
    }
    
    public function update(){
        if(auth()->user()->is_admin == 0){
            return redirect()->route('worker.show', $this->worker_data['id'])->with('unauthorized', 'Usted no tiene los permisos necesarios para realiazar esta opcion');
        }
        $this->validate();
        $user = User::find($this->worker_data['id']);
        $worker = Worker::find($this->worker_data['id']);
        $user->update([
            'id' => $this->rut,
            'name' => $this->name,
            'email' => $this->email
        ]);
        $worker->update([
            'id' => $this->rut,
            'last_name' => $this->last_name
        ]);
        $user->save();
        $worker->save();
        return redirect()->route('worker');
        
    }
}
