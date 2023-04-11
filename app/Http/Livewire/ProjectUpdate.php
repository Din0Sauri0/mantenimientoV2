<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\ClientRepresentative;
use App\Models\Project;

class ProjectUpdate extends Component
{
    public $project;

    public $name;
    public $description;
    public $client;
    public $client_repre;

    public $clients = [];
    public $agents = [];

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'client' => 'required',
        'client_repre' => 'required'
    ];

    public function mount($project){
        $this->name = $project->name;
        $this->description = $project->description;
        $this->client = $project->client->id;
        $this->client_repre = $project->agent->id;

        $this->clients = Client::all();
        $this->agents = collect();
    }
    public function updatedClient($value){
        $this->agents = ClientRepresentative::where('client_id', $value)->get();
        $this->client_repre = $this->agents->first()->id ?? null;
    }

    public function update(){
        $this->validate();
        $project = Project::find($this->project->id);
        $project->update([
            'name' => $this->name,
            'description' => $this->description,
            'client_id' => $this->client,
            'agent_id' => $this->client_repre
        ]);
        $project->save();
        return redirect()->route('project');
    }

    public function render()
    {
        return view('livewire.project-update');
    }
}
