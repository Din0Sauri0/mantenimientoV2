<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\ProductItem;

class Searchbar extends Component
{
    public $search = '';
    public $results = [];
    public $maintenance;

    public function render()
    {
        return view('livewire.searchbar');
    }
    public function mount(){
        $this->results = $this->maintenance->project->items;
    }

    public function updatedSearch()
    {
        if(!$this->search == ''){
            $this->results = ProductItem::where('serial_number', 'like', '%'.$this->search.'%')
            ->whereHas('project', function($query) {
                $query->whereHas('items', function($q) {
                    $q->where('serial_number', 'like', '%'.$this->search.'%')->where('project_id', $this->maintenance->project->id);
                });
            })
            ->get();    
            
        }else{
            $this->results = $this->maintenance->project->items;
            
        }
        
    }
}
