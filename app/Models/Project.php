<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'client_id',
        'agent_id'
    ];

    public function items(){
        return $this->hasMany('App\Models\ProductItem');
    }

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }

    public function agent(){
        return $this->belongsTo('App\Models\ClientRepresentative');
    }
}
