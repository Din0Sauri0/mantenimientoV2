<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientRepresentative;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::where('company_reference', '=', session('company_reference'))->get();
        return view('client', compact('clients'));
    }

    public function create(){

        return view('create_client');
    }

    public function store(Request $request){
        $request->validate([
            'img' => 'nullable',
            'company_name' => 'required|min:5|max:100',
            'address' => 'required|min:4|max:100',
            'giro' => 'required|min:4|max:100',
            'img' => 'required'
        ]);
        $client = new Client();
        $client->company_name = $request->company_name;
        $client->address = $request->address;
        $client->giro = $request->giro;
        $client->img = $request->img;
        $client->company_reference = session('company_reference');
        $client->save();

        return redirect()->route('client')->with('msg', 'El cliente '.$client->company_name.' ha sido creado satisfactoriamente');
    }

    public function show($id){
        $client = Client::findOrFail($id);

        return view('show_client', compact('client'));
    }

    public function edit($id){
        $client = Client::findOrFail($id);
        return view('edit_client', compact('client'));
    }

    public function update($id, Request $request){
        $client = Client::findOrFail($id);
        $request->validate([
            'img' => 'nullable',
            'company_name' => 'required|min:5|max:100',
            'address' => 'required|min:4|max:100',
            'giro' => 'required|min:4|max:100',
            'contact_name' => 'required|min:3|max:20',
            'contact_last_name' => 'required|min:5|max:20',
            'contact_number' => 'required|min:8|max:9',
            'email' => 'required|email|min:10| max:120'
        ]);
        $client->company_name = $request->company_name;
        $client->address = $request->address;
        $client->giro = $request->giro;
        $client->contact_name = $request->contact_name;
        $client->contact_last_name = $request->contact_last_name;
        $client->contact_number = $request->contact_number;
        $client->email = $request->email;
        $client->company_reference = session('company_reference');
        $client->save();

        return redirect()->route('client.show', $client->id);
    }

    public function delete($id){
        $client = Client::find($id);
        $client->delete();

        return redirect()->route('client');
    }

}
