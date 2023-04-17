<?php

namespace App\Http\Controllers;

use App\Models\ClientRepresentative;
use App\Models\Client;

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
        $client->company_reference = session('company_reference');
        $client->client_id = $request->client_id;
        $client->save();
        return redirect()->back();



    }


    public function show($id){
        //$user = ClientRepresentative::where('client_reference', '=', $id)->get();
        $user = Client::findOrFail($id);
        return $user->agents;
    }

    public function delete($id){
        $representante = ClientRepresentative::find($id);
        $representante->delete();
        return redirect()->back();
    }
}
