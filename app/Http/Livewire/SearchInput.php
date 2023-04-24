<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\TableResult;
use App\Models\Item;

class SearchInput extends Component
{
    public $maintenance;
    public $search_input;
    public $result;
    public $result_function;
    public $childId;

    public function render()
    {
        return view('livewire.search-input');
    }
    public function mount(){
        $this->result = $this->maintenance->project->items;
    }

    public function search(){
        if($this->search_input == "" || $this->search_input == null){
            $this->result = [];
            $this->result = $this->maintenance->project->items;
            $this->emit('mount', $this->result);
        }else{
            $this->result = [];
            $this->result = Item::where('serial_number', 'like', '%'.$this->search_input.'%')
            ->whereHas('project', function($query) {
                $query->whereHas('items', function($q) {
                    $q->where('serial_number', 'like', '%'.$this->search_input.'%')->where('project_id', $this->maintenance->project->id);
                });
            })
            ->get(); 
            if(count($this->result) == 1){
                $this->result = Item::where('serial_number', 'like', '%'.$this->search_input.'%')
                ->whereHas('project', function($query) {
                    $query->whereHas('items', function($q) {
                        $q->where('serial_number', 'like', '%'.$this->search_input.'%')->where('project_id', $this->maintenance->project->id);
                    });
                })
                ->first(); 
                $this->emit('mount', $this->result);
            }else{
                $this->emit('mount', $this->result);
            }
        }
    }
}
