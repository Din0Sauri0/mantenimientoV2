<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\MaintenanceCheckbox;


class TableResult extends Component
{
    public $result;
    public $maintenance;
    protected $listeners = ['mount'];

    public function render()
    {
        return view('livewire.table-result');
    }

    public function mount($result){
        $this->result = $result;
        $this->render();
    }
}
