<?php

namespace App\Http\Controllers;

use App\Models\ProductItem;

use Illuminate\Http\Request;

class ProductItemController extends Controller
{
    public function store( Request $request){
        $request->validate([
            'model' => 'required',
            'serial_number' => 'required',
            'state' => 'nullable',
        ]);
        $item = new ProductItem();
        $item->product_id = $request->model;
        $item->serial_number = $request->serial_number;
        $item->company_reference = session('company_reference');
        $item->save();
    }

    public function delete($id){
        $item = ProductItem::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
}
