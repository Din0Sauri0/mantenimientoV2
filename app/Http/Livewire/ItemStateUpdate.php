<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ItemMaintenance;
use App\Models\Item;


class ItemStateUpdate extends Component
{
    public $maintenance_id;
    public $state;

    protected $middleware = [
        \App\Http\Middleware\AdminMiddleware::class,
    ];

    public function render()
    {
        return view('livewire.item-state-update');
        dd($this->id);
    }

    public function update(){
        // if(auth()->user()->is_admin == 0){
        //     return redirect()->route('maintenance.show', $item_maintenance->maintenance_id)->with('unauthorized', 'Usted no tiene los permisos necesarios para realiazar esta opcion');
        // }
        $item_maintenance = ItemMaintenance::find($this->maintenance_id);
        $item = Item::find($item_maintenance->item_id);
        if($item->serial_number == $this->state){
            $item_maintenance->state = true;
            $item_maintenance->save();
            return redirect()->route('maintenance.show', $item_maintenance->maintenance_id);
        }else{
            dd('no son iguales');
        }
    }
}
