<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductItem;

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
        $this->validate();
        $product = ProductItem::findOrFail($this->value->id);
        if($product){
            $product->update([
                'serial_number' => strtoupper($this->serial_number)
            ]);
            return redirect()->route('product.show', $this->value->product_id);
        }
    }
}
