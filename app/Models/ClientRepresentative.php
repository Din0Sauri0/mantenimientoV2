<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRepresentative extends Model
{
    use HasFactory;

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }

    public function projects(){
        return $this->hasMany('App\Models\Project');
    }
}
