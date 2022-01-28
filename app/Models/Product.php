<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillale = [
        'protected_id',
        'protected_name',
        'protected_type',
        'price',
    ];
}
