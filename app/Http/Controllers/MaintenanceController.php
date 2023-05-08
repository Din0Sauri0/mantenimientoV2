<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\ItemMaintenance;
class MaintenanceController extends Controller
{
    
    public function show($id){
        $maintenance = Maintenance::findOrFail($id);
        $itemMaintenance = ItemMaintenance::where('maintenance_id', $maintenance->id)->get();
        return view('show_maintenance', compact('maintenance', 'itemMaintenance'));
    }

}
