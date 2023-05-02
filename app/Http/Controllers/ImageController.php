<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function store_client(Request $request){
        $image = $request->file('file');
        $imageName = Str::uuid() .".". $image->extension();
        $imageServe = Image::make($image);
        $imageServe->fit(300, 300);
        $imagePath = public_path('uploads').'/'.$imageName;
        $imageServe->save($imagePath);
        
        return response()->json(['image' => $imageName]);
    }

    public function store_product(Request $request){
        $image = $request->file('file');
        $imageName = Str::uuid() .".". $image->extension();
        $imageServe = Image::make($image);
        $imageServe->fit(300, 300);
        $imagePath = public_path('product').'/'.$imageName;
        $imageServe->save($imagePath);
        
        return response()->json(['image' => $imageName]);
    }
}
