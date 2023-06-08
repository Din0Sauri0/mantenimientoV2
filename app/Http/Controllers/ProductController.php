<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{   
    public function index(){
        $products = Product::where('company_reference', '=', session('company_reference'))->get();
        return view('product', compact('products'));
    }
    public function create(){
        return view('create_product');
    }
    public function store(Request $request){
        $messages = [
            'required' => 'Este campo es requerido.',
            'min' => 'Este campo debe contar con al menos :min caracteres',
            'max' => 'Este campo deber tener como máximo :max caracteres',
            'unique' => 'Este modelo ya ha sido registrado'
        ];
        $request->validate([
            'product_name' => 'required|min:3|max:25',
            'model' => 'required|unique:products|min:3|max:25',
            'brand' => 'required|min:3|max:25',
            'part_number' => 'required|min:3|max:50',
            'img' => 'required',
            'characteristics' => 'required',
        ], $messages);

        $product = new Product();
        $product->model = strtoupper($request->model);
        $product->brand = $request->brand;
        $product->name = $request->product_name;
        $product->part_number = $request->part_number;
        $product->img = $request->img;
        $product->specification = $request->characteristics;
        $product->company_reference = session('company_reference');
        $product->save();

        return redirect()->route('product')->with('msg', 'El producto ha sido creado satisfactoriamente');
    }
    public function show($id){
        $product = Product::findOrFail($id);
        //$items = ProductItem::where('model', '=', $model)->where('company_reference', '=', session('company_reference'))->get();
        return view('show_product', compact('product'));
    }
    public function delete($model){
        $product = Product::where('model', $model)->delete();
        return redirect()->route('product');

    }
}
