<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'address',
        'giro',
    ];

    public function agents(){
        return $this->hasMany('App\Models\ClientRepresentative');
    }

    public function projects(){
        return $this->hasMany('App\Models\Project');
    }
}
