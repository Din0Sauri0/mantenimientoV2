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
        $item->model = $request->model;
        $item->serial_number = $request->serial_number;
        $item->state = $request->boolean('state');
        $item->company_reference = session('company_reference');
        $item->save();
    }
}
