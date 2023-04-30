<?php

namespace App\Http\Livewire;

use Livewire\Component;
use APP\Models\Item;

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
        if(auth()->user()->is_admin == 0){
            return redirect()->route('product.show', $this->product->id)->with('unauthorized', 'Usted no tiene los permisos necesarios para realiazar esta opcion');
        }
        $this->validate();
        Item::create([
            'serial_number' => strtoupper($this->serial_number),
            'model' => $this->model,
            'company_reference' => session('company_reference'),
            'product_id' => $this->product->id
        ]);
        return redirect()->route('product.show', $this->product->id);
    }
}
