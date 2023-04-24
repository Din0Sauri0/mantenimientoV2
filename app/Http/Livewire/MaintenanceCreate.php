<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Maintenance;

class MaintenanceCreate extends Component
{
    public $project;
    public $date;


    protected $rules = [
        'date' => 'required'
    ];

    public function create(){
        $this->validate();
        $maintenance = Maintenance::create([
            'start' => $this->date,
            'state' => '0',
            'project_id' => $this->project->id,
        ]);
        $maintenance->save();
        return redirect()->route('project.show', $this->project->id)->with('msg', 'Mantencion agendada');
    }

    public function render()
    {
        return view('livewire.maintenance-create');
        
    }
}
