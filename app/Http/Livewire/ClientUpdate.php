<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;

class ClientUpdate extends Component
{
    public $client;

    public $company_name;
    public $address;
    public $giro;

    public function messages(){
        return [
            'required' => 'Este campo es requerido.',
            'min' => 'Este campo debe contar con al menos :min caracteres',
            'max' => 'Este campo deber tener como máximo :max caracteres',
            'unique' => 'Ya existe un cliente con este nombre'
        ];
    }

    protected $rules = [
        'company_name' => 'required|min:5|max:100',
        'address' => 'required|min:4|max:100',
        'giro' => 'required|min:4|max:100',
    ];

    public function mount($client){
        $this->company_name = $client->company_name;
        $this->address = $client->address;
        $this->giro = $client->giro;
    }

    public function render()
    {
        return view('livewire.client-update');
    }

    public function update(){
        if(auth()->user()->is_admin == 0){
            return redirect()->route('client.show', $this->client->id)->with('unauthorized', 'Usted no tiene los permisos necesarios para realiazar esta opción');
        }
        $this->validate();
        $client = Client::find($this->client->id);
        $client->update([
            'company_name' => $this->company_name,
            'address' => $this->address,
            'giro' => $this->giro
        ]);
        $client->save();
        return redirect()->route('client');
    }
}
            