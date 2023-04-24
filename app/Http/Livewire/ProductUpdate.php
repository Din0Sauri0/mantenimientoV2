<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Item;

class ProductUpdate extends Component
{
    public $product;

    public $brand;
    public $product_name;
    public $model;
    public $part_number;
    public $characteristics;

    protected $rules = [
        'brand' => 'required',
        'product_name' => 'required',
        'model' => 'required',
        'part_number' => 'required',
        'characteristics' => 'required'
    ];

    public function mount($product){
        $this->brand = $product->brand;
        $this->product_name = $product->name;
        $this->model = $product->model;
        $this->part_number = $product->part_number;
        $this->characteristics = $product->specification;
    }
    

    public function render()
    {
        
        return view('livewire.product-update');
    }

    public function update(){
        $this->validate();
        $product = Product::findOrFail($this->product->id);
        $item = Item::where('product_id', $this->product->id);
        if($product){
            $product->update([
                'brand' => $this->brand,
                'name' => $this->product_name,
                'model' => $this->model,
                'part_number' => $this->part_number,
                'specification' => $this->characteristics
            ]);
            $item->update([
                'model' => $this->model
            ]);
            return redirect()->route('product.show', $this->product->id);
        }
        
    }

}
