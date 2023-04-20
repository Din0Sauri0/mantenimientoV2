<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MaintenanceStateItem;
use App\Models\Maintenance;

class MaintenanceCheckbox extends Component
{
    public $maintenance_id;
    public $item_id;
    public $is_checked;

    public function mount(){
        $state = MaintenanceStateItem::where('maintenance_id', $this->maintenance_id)->where('item_id', $this->item_id)->first();
        $this->is_checked = ($state!=null)?$state->check_box_state:false;
    }

    public function render()
    {
        return view('livewire.maintenance-checkbox');
    }

    public function isClick(){
        $exist = MaintenanceStateItem::where('maintenance_id', $this->maintenance_id)->where('item_id', $this->item_id)->first();
        $maintenance = Maintenance::findOrFail($this->maintenance_id);
        if($exist==null){
            $maintenanceItem = MaintenanceStateItem::create([
                'check_box_state' => $this->is_checked,
                'maintenance_id' => $this->maintenance_id,
                'item_id' => $this->item_id
            ]);
            $maintenanceItem->save();
            return $this->render();
            
        }else{
            $exist->update([
                'check_box_state' => $this->is_checked,
                'maintenance_id' => $this->maintenance_id,
                'item_id' => $this->item_id
            ]);
            $exist->save();
            return $this->render();
        }
        // $this->porcentaje($maintenance, $this->is_checked);
    }


    // public function porcentaje($maintenance, $checked){
    //     if($checked){
    //         $total = $maintenance->project->items->count();
    //         $porcentaje = 
    //     }else{
    //         dd(false);
    //     }
    // }
}
