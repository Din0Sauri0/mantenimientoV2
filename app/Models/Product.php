<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'name',
        'brand',
        'part_number',
        'specification'
    ];

    public function items(){
        return $this->hasMany('App\Models\Item');
    }
}
