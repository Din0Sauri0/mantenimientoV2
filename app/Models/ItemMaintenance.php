<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemMaintenance extends Model
{
    use HasFactory;
    
    protected $table = 'items_maintenances';

    protected $fillable = [
        'item_id',
        'maintenance_id'
    ];
}
