<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();
        
        return view('client', compact('clients'));
    }

    public function create(){

        return view('create_client');
    }

    public function store(Request $request){
        $request->validate([
            'img' => 'nullable',
            'company_name' => 'nullable',
            'address' => 'required',
            'giro' => 'nullable',
            'contact_name' => 'required',
            'contact_last_name' => 'required',
            'contact_number' => 'required',
            'email' => 'required'
        ]);
        $client = new Client();
        $client->company_name = $request->company_name;
        $client->address = $request->address;
        $client->giro = $request->giro;
        $client->contact_name = $request->contact_name;
        $client->contact_last_name = $request->contact_last_name;
        $client->contact_number = $request->contact_number;
        $client->email = $request->email;
        $client->company_reference = auth()->user()->id;
        $client->save();

        return redirect()->route('client');
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
            'company_name' => 'nullable',
            'address' => 'required',
            'giro' => 'nullable',
            'contact_name' => 'required',
            'contact_last_name' => 'required',
            'contact_number' => 'required',
            'email' => 'required'
        ]);
        $client->company_name = $request->company_name;
        $client->address = $request->address;
        $client->giro = $request->giro;
        $client->contact_name = $request->contact_name;
        $client->contact_last_name = $request->contact_last_name;
        $client->contact_number = $request->contact_number;
        $client->email = $request->email;
        $client->company_reference = auth()->user()->id;
        $client->save();

        return redirect()->route('client.show', $client->id);
    }

    public function delete($id){
        $client = Client::find($id);
        $client->delete();

        return redirect()->route('client');
    }

}
