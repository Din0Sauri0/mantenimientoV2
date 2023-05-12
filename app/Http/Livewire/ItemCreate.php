<?php

namespace App\Http\Livewire;

use Livewire\Component;
use APP\Models\Item;

class ItemCreate extends Component
{
    public $product;

    public $model;
    public $serial_number;

    public function messages(){
        return [
            'required' => 'Este campo es requerido',
            'serial_number.unique' => 'El campo numero de serie ya se encuntra registrado',
        ];
    }

    protected $rules = [
        'model' => 'required',
        'serial_number' => 'required|unique:items|min:3|max:50'
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
