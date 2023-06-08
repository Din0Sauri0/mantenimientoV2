<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Maintenance;
use App\Models\ItemMaintenance;

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
        foreach($this->project->items as $item){
            $itemMaintenance = ItemMaintenance::create([
                'item_id' => $item->id,
                'maintenance_id' => $maintenance->id
            ]);
            $itemMaintenance->save();
        }
        return redirect()->route('project.show', $this->project->id)->with('msg', 'Mantención agendada');
    }

    public function render()
    {
        return view('livewire.maintenance-create');
        
    }
}
