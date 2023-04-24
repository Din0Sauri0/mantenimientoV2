<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MaintenanceStateItem;

class TableResult extends Component
{
    public $result;
    public $maintenance;
    public $maintenance_state;

    protected $listeners = ['mount'];

    public function render()
    {
        return view('livewire.table-result');
    }

    public function mount($result){
        $this->result = $result;
        $this->maintenance_state = MaintenanceStateItem::where('maintenance_id', $this->maintenance->id)->get();
        if(is_array($this->result)){
            foreach($this->maintenance_state as $item){
                if($item->item_id == $this->result['id']){
                    $this->result['state'] = $item->check_box_state;
                    break;
                }
            }
        }
        if(count($this->result) < 2){
            dd(count($this->result));
            if(is_object($this->result)){
                foreach($this->result as $r){
                    foreach($this->maintenance_state as $item){
                        if($r->id == $item->item_id){
                            $r->setAttribute('state', $item->check_box_state);
                            continue;
                        }else{
                            continue;
                        }
                    }
                }
            }
        }else{
            
        }

        $this->render();
    }
}
