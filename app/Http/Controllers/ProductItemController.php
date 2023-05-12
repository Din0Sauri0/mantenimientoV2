<?php

namespace App\Http\Controllers;

use App\Models\Item;

use Illuminate\Http\Request;

class ProductItemController extends Controller
{
    public function store( Request $request){
        $messages = [
            'required' => 'Este campo es requerido.',
            'min' => 'Este campo debe contar con al menos :min caracteres',
            'max' => 'Este campo deber tener como maximo :max caracteres',
            'unique' => 'Este numero de serie ya ha sido registrado'
        ];
        $request->validate([
            'model' => 'required',
            'serial_number' => 'required|unique:items|min:3|max:25',
            'state' => 'nullable',
        ], $messages);
        $item = new Item();
        $item->model = $request->model;
        $item->serial_number = $request->serial_number;
        $item->product_id = $request->product_id;
        $item->company_reference = session('company_reference');
        $item->save();
        return redirect()->back();
    }

    public function delete($id){
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }

    public function patch(Request $request, $id){
        foreach($request->items as $item_id){
            $item = Item::findOrFail($item_id);
            $item->project_id = $id;
            $item->save();

        }
        return redirect()->back();
    }
    public function patch_delete($id){
        $item = Item::findOrFail($id);
        $item->project_id = null;
        $item->save();
        return redirect()->back();
    }
    public function patch_location(Request $request, $id){
        $item = Item::findOrFail($id);
        $item->location = $request->location;
        $item->save();
        return redirect()->back();
    }
}
