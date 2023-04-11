<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_number',
        'model',
        'company_reference',
        'product_id'
    ];

    public function project(){
        return $this->belongsTo('App\Models\Project');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
