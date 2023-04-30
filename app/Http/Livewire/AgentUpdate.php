<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ClientRepresentative;

class AgentUpdate extends Component
{
    public $value;

    public $name;
    public $last_name;
    public $phone;
    public $email;

    protected $rules = [
        'name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
        'email' => 'required'
    ];


    public function mount($value){
        $this->name = $value->name;
        $this->last_name = $value->last_name;
        $this->phone = $value->number;
        $this->email = $value->email;
    }

    public function render()
    {
        return view('livewire.agent-update');
    }

    public function update(){
        if(auth()->user()->is_admin == 0){
            return redirect()->route('client.show', $this->value->client_id)->with('unauthorized', 'Usted no tiene los permisos necesarios para realiazar esta opcion');
        }
        $this->validate();
        $agent = ClientRepresentative::findOrFail($this->value->id);
        if($agent){
            $agent->update([
                'name' => $this->name,
                'last_name' => $this->last_name,
                'number' => $this->phone,
                'email' => $this->email
            ]);
            
            return redirect()->route('client.show', $this->value->client_id);
        }
    }
}
