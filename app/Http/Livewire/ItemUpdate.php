<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;

class ItemUpdate extends Component
{
    public $value;
    public $serial_number;

    protected $rules = [
        'serial_number' => 'required',
    ];

    public function mount($value){
        $this->serial_number = $value->serial_number;
    }

    public function render()
    {
        return view('livewire.item-update');
    }

    public function update(){
        if(auth()->user()->is_admin == 0){
            return redirect()->route('product.show', $this->value->product_id)->with('unauthorized', 'Usted no tiene los permisos necesarios para realiazar esta opcion');
        }
        $this->validate();
        $product = Item::findOrFail($this->value->id);
        if($product){
            $product->update([
                'serial_number' => strtoupper($this->serial_number)
            ]);
            return redirect()->route('product.show', $this->value->product_id);
        }
    }
}
