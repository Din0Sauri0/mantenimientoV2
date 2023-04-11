<?php

namespace App\Http\Livewire;

use Livewire\Component;
use APP\Models\ProductItem;

class ItemCreate extends Component
{
    public $product;

    public $model;
    public $serial_number;

    protected $rules = [
        'model' => 'required',
        'serial_number' => 'required'
    ];

    public function mount($product){
        $this->model = $product->model;
    }
    
    public function render()
    {
        return view('livewire.item-create');
    }

    public function create(){
        $this->validate();
        ProductItem::create([
            'serial_number' => strtoupper($this->serial_number),
            'model' => $this->model,
            'company_reference' => session('company_reference'),
            'product_id' => $this->product->id
        ]);
        return redirect()->route('product.show', $this->product->id);
    }
}
