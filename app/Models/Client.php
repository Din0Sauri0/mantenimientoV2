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
        'contact_name',
        'contact_last_name',
        'contact_number',
        'email'
    ];
}
