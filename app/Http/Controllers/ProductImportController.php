<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport as ImportsProductImport;
use Illuminate\Http\Request;
use App\Imports\Importarproducto;
use Maatwebsite\Excel\Facades\Excel;

class ProductImportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048',
        ]);

        try {
            // Obtener el archivo
            $file = $request->file('file');

            // Importar los productos desde el archivo CSV utilizando la clase Importarproducto
            Excel::import(new Importarproducto, $file);

            return redirect()->route('productos.index');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error en la carga masiva de productos: ' . $e->getMessage()], 500);
        }
    }
}
