<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductItem;

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
        $request->validate([
            'product_name' => 'required',
            'model' => 'required',
            'brand' => 'required',
            'part_number' => 'nullable',
            'characteristics' => 'required',
        ]);

        $product = new Product();
        $product->id = $request->model;
        $product->brand = $request->brand;
        $product->name = $request->product_name;
        $product->part_number = $request->part_number;
        $product->specification = $request->characteristics;
        $product->company_reference = session('company_reference');
        $product->save();

        return redirect()->route('product');
    }
    public function show($id){
        $product = Product::findOrFail($id);
        
        //$items = ProductItem::where('mid', '=', $id)->where('company_reference', '=', session('company_reference'))->get();
        return view('show_product', compact('product'));
    }
    public function delete($model){
        $product = Product::where('model', '=', $model)->first()->delete();
        return redirect()->route('product');

    }
}
