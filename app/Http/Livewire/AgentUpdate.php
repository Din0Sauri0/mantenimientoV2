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

    public function messages(){
        return [
            'required' => 'Este campo es requerido',
            'min' => 'Este campo debe contar con al menos :min caracteres',
            'max' => 'Este campo deber tener como máximo :max caracteres',
            'email.unique' => 'Este correo electrónico ya se encuentra registrado'
        ];
    }

    protected $rules = [
        'name' => 'required|min:3|max:15',
        'last_name' => 'required|min:3|max:25',
        'phone' => 'required|min:9|max:9',
        'email' => 'required|min:3|max:25'
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
            return redirect()->route('client.show', $this->value->client_id)->with('unauthorized', 'Usted no tiene los permisos necesarios para realiazar esta opción');
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
