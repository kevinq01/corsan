<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    //Llenar datos en masa
    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'updated_at', 'created_at'];

    protected $casts = [
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $dates = ['updated_at', 'created_at'];
}
