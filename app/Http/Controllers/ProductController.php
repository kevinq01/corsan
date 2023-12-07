<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function __construct()
    {
        //Los permisos de la aplicación
        $this->middleware('permission:ver-product|crear-product|editar-product|borrar-product')->only('index');
        $this->middleware('permission:crear-product',  ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-product', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-product', ['only' => ['destroy']]);
    }

    public function index()
    {
        $products = Product::paginate(5);
        return view('productos.index', compact('products'));
    }

    public function create()
    {
        return view('productos.crear');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required'
        ]);

        Product::create($request->all());
        return redirect()->route('productos.index');
    }


    public function show($id)
    {
        //
    }


    public function edit( $id)
    {
        $product = Product::find($id);
        return view('productos.editar', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required'
        ]);

        $product = Product::find($id);
        $product->update($request->all());

        return redirect()->route('productos.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('productos.index');
    }
}
