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
        $item->product_id = $request->product_id;
        $item->company_reference = session('company_reference');
        $item->save();
        return redirect()->back();
    }

    public function delete($id){
        $item = ProductItem::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }

    public function patch(Request $request, $id){
        foreach($request->items as $item_id){
            $item = ProductItem::findOrFail($item_id);
            $item->project_id = $id;
            $item->save();

        }
        return redirect()->back();
    }
    public function patch_delete($id){
        $item = ProductItem::findOrFail($id);
        $item->project_id = null;
        $item->save();
        return redirect()->back();
    }
    public function patch_location(Request $request, $id){
        $item = ProductItem::findOrFail($id);
        $item->location = $request->location;
        $item->save();
        return redirect()->back();
    }
}
