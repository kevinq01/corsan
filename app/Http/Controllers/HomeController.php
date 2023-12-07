<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $products = Product::paginate(5);

        // Datos para las tarjetas
        $productosEnStock = $products->sum('stock');
        $productosSinStock = Product::where('stock', 0)->count();

        // Datos para los graficos
        $labels = $products->pluck('nombre')->toArray();
        $data = $products->pluck('stock')->toArray();

        return view('home', compact('products', 'productosEnStock', 'productosSinStock', 'labels', 'data'));
    }
}
