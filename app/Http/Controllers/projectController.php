<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class projectController extends Controller
{
    public function index(){
        return view('project');
    }
    public function create(){
        return view('create_project');
    }
}
