<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport as ImportsProductImport;
use Illuminate\Http\Request;
use App\Models\ProductImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048', // Ajusta según tus necesidades
        ]);

        try {
            // Obtener el archivo
            $file = $request->file('file');

            // Verificar si el archivo tiene filas antes de importar
            $rows = Excel::toArray(ProductImport::class, $file);
            if (empty($rows) || count($rows[0]) === 0) {
                return response()->json(['message' => 'El archivo está vacío o no contiene datos'], 422);
            }
    
            // Importar los productos desde el archivo CSV utilizando la clase ProductImport
            Excel::import(ProductImport::class, $file);
    
            return response()->json(['message' => 'Carga masiva de productos exitosa'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error en la carga masiva de productos: ' . $e->getMessage()], 500);
        }
    }
}
