<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    //Llenar datos en masa
    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock'];
}
