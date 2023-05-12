<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ItemMaintenance;
use App\Models\Item;
use App\Models\Maintenance;


class ItemStateUpdate extends Component
{
    public $maintenance_id;
    public $state;
    public $maintenance;

    public function render()
    {
        return view('livewire.item-state-update');

    }

    public function update(){
        if(auth()->user()->is_admin == 0){
            return redirect()->route('maintenance.show', $this->maintenance_id)->with('unauthorized', 'Usted no tiene los permisos necesarios para realiazar esta opcion');
        }
        
        $item_maintenance = ItemMaintenance::find($this->maintenance_id);
        $maintenance = Maintenance::find($this->maintenance->id);
        $item = Item::find($item_maintenance->item_id);
        if($item->serial_number == $this->state){
            $porcentaje = (1*100)/count($maintenance->items);
            $porcentaje = $porcentaje + $maintenance->state;
            $maintenance->state = $porcentaje;
            $maintenance->save();
            $item_maintenance->state = true;
            $item_maintenance->save();

            return redirect()->route('maintenance.show', $item_maintenance->maintenance_id);
        }else{
            return redirect()->route('maintenance.show', $item_maintenance->maintenance_id);
        }
    }
}
