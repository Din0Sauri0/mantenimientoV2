<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
class MaintenanceController extends Controller
{
    
    public function show($id){
        $maintenance = Maintenance::findOrFail($id);
        return view('show_maintenance', compact('maintenance'));
    }
}
