<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class UpdateStock extends Command
{

    protected $signature = 'update:stock';
    protected $description = 'Simular actualización del stock';

    public function handle()
    {
        $products = Product::all();

        foreach ($products as $producto) {
            // Porcentaje aleatorio entre 5-10%
            $percentageChange = rand(5, 10) / 100;

            // Suma o resta al stock aleatoriamente 1 suma, 0 resta
            $variation = rand(0, 1) ? $percentageChange : -$percentageChange;

            // Aplicar la variación al stock
            $newStock = max(0, $producto->stock + round($producto->stock * $variation));

            // Actualizar el stock en la base de datos
            DB::table('products')->where('id', $producto->id)->update(['stock' => $newStock]);
            
        }

    }
}
