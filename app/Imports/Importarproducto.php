<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class Importarproducto implements ToModel
{
    public function model(array $row)
    {
        // Limpiar caracteres no numéricos, como punto y coma, del valor de stock
        $cleanedStock = $this->cleanNumericValue($row[3]);

        return new Product([
            'nombre' => $row[0],
            'descripcion' => $row[1],
            'precio' => $this->cleanNumericValue($row[2]),
            'stock' => $cleanedStock !== null ? $cleanedStock : 0, // Si es nulo, establecer en 0
            'updated_at' => null,
            'created_at' => null,
        ]);
    }

    private function cleanNumericValue($value)
    {
        // Limpiar caracteres no numéricos, como punto y coma
        return is_numeric($value) ? floatval(str_replace(',', '', $value)) : null;
    }
}
