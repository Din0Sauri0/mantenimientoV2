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

    protected $rules = [
        'company_name' => 'required',
        'address' => 'required',
        'giro' => 'required',
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
