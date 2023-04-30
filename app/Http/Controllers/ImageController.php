<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function store_client(Request $request){
        $image = $request->file('file');
        $imageName = Str::uuid() .".". $image->extension();
        return response()->json(['image' => ]);
    }
}
