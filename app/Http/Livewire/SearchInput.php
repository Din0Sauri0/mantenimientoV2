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


    public function render()
    {
        return view('livewire.search-input');
    }
    // public function mount(){
    //     $this->itemMaintenance = ItemMaintenance::where('maintenance_id', $this->maintenance->id)->get();
    //     $this->result = $this->maintenance->items;
        
    // }

    public function search(){
        if($this->search_input == "" || $this->search_input == null){
            return redirect()->route('maintenance.show', $this->maintenance->id);
        }else{
            return redirect()->route('result',['search'=> $this->search_input, 'project_id' => $this->maintenance->project_id, 'maintenance_id' => $this->maintenance->id]);
            
        }
    }
}
