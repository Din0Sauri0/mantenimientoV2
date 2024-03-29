<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'start',
        'state',
        'project_id'
    ];


    public function items(){
        return $this->belongsToMany(Item::class, 'items_maintenances');
    }

    public function project(){
        return $this->belongsTo('App\Models\Project');
    }
}
