<?php

namespace App\Http\Controllers;

use App\Models\ClientRepresentative;
use App\Models\Client;

use Illuminate\Http\Request;

class ClientRepresentativeController extends Controller
{
    public function store(Request $request){
        $messages = [
            'required' => 'Este campo es requerido.',
            'min' => 'Este campo debe contar con al menos :min caracteres',
            'max' => 'Este campo deber tener como maximo :max caracteres',
            'unique' => 'El correo ya ha sido registrado'
        ];
        $request->validate([
            'name' => 'required|min:3|max:15',
            'last_name' => 'required|min:4|max:20',
            'phone' => 'required',
            'email' => 'required|unique:client_representatives|email',
        ], $messages);

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
