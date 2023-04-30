<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Maintenance;
use App\Models\ItemMaintenance;

class PDFController extends Controller
{
    public function index($id){
        $maintenance = Maintenance::find($id);
        $itemMaintenance = ItemMaintenance::where('maintenance_id', $id)->get();
        
        $pdf = Pdf::loadView('pdf', compact('maintenance', 'itemMaintenance'));
        return $pdf->download('invoice.pdf');
        //return view('pdf', compact('maintenance', 'itemMaintenance'));
    }
}
