<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Project;

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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'client' => 'required',
            'client_repre' => 'required',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->client_reference = $request->client;
        $project->client_representative = $request->client_repre;
        $project->company_reference = session('company_reference');
        $project->save();
    }

    public function show($id){
        $project = Project::findOrFail($id);
        return view('show_project', compact('project'));
    }
}
