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
        'project_id',
        'items'
    ];

    public function project(){
        return $this->belongsTo('App\Models\Project');
    }
}
