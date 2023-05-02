<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\TableResult;
use App\Models\Item;
use App\Models\ItemMaintenance;

class SearchInput extends Component
{
    public $maintenance;
    public $search_input;
    public $result;
    public $itemMaintenance = [];
    public $maintenance_state;
    public $maintenance_id;


    public function render()
    {
        return view('livewire.search-input');
    }
    public function mount(){
        $this->itemMaintenance = ItemMaintenance::where('maintenance_id', $this->maintenance->id)->get();
        $this->result = $this->maintenance->items;
        
    }

    public function search(){
        if($this->search_input == "" || $this->search_input == null){
            $this->result = $this->maintenance->items;
        }else{
            $this->result = Item::where('serial_number', 'like', '%'.$this->search_input.'%')
            ->whereHas('project', function($query) {
                $query->whereHas('items', function($q) {
                    $q->where('serial_number', 'like', '%'.$this->search_input.'%')->where('project_id', $this->maintenance->project->id);
                });
            })
            ->get(); 
        }
    }
}
