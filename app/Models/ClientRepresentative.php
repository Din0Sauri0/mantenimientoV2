<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRepresentative extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'number',
        'email'
    ];

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }

    public function projects(){
        return $this->hasMany('App\Models\Project');
    }
}
