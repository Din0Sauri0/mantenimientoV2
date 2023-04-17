<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceStateItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'check_box_state',
        'maintenance_id',
        'item_id'
    ];
}
