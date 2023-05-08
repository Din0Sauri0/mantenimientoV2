<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Maintenance;
use App\Models\ItemMaintenance;

class SearchResultController extends Controller
{
    public function index($search, $project_id, $maintenance_id){
        $itemMaintenance = ItemMaintenance::where('maintenance_id', $maintenance_id)->get();
        $maintenance = Maintenance::find($maintenance_id);
        $result = Item::where('serial_number', 'like', '%'.$search.'%')
            ->whereHas('project', function($query) use($search, $project_id) {
                $query->whereHas('items', function($q) use ($search, $project_id) {
                    $q->where('serial_number', 'like', '%'.$search.'%')->where('project_id', $project_id);
                });
            })
        ->get(); 
        
        return view('result', compact('maintenance', 'result', 'itemMaintenance'));
    }
}
