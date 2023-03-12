<?php

namespace App\Http\Controllers;

use App\models\ClientRepresentative;

use Illuminate\Http\Request;

class ClientRepresentativeController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $client = new ClientRepresentative();
        $client->name = $request->name;
        $client->last_name = $request->last_name;
        $client->number = $request->phone;
        $client->email = $request->email;
        $client->save();


    }
}
