<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Project;
use App\Models\Item;

class projectController extends Controller
{
    public function index(){
        $projects = Project::where('company_reference', '=', session('company_reference'))->get();
        return view('project', compact('projects'));
    }
    public function create(){
        $client = Client::where('company_reference', '=', session('company_reference'))->get();
        return view('create_project', compact('client'));
    }

    public function store(Request $request){
        $messages = [
            'required' => 'Este campo es requerido.',
            'min' => 'Este campo debe contar con al menos :min caracteres',
            'max' => 'Este campo deber tener como máximo :max caracteres',
        ];
        $request->validate([
            'name' => 'required|min:3|max:25',
            'description' => 'required',
            'client' => 'required',
            'client_repre' => 'required',
        ], $messages);

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->client_id = $request->client;
        $project->agent_id = $request->client_repre;
        $project->company_reference = session('company_reference');
        $project->save();
        return redirect()->route('project')->with('msg', 'El proyecto ha sido creado satisfactoriamente.');
    }

    public function show($id){
        $project = Project::findOrFail($id);
        $items = Item::all()->where('company_reference', '=', session('company_reference'));
        //dd($products);
        return view('show_project', compact('project', 'items'));
    }

    public function delete($id){
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('project');
    }
}
