<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

//Spatie
use Spatie\Permission\Models\Permission;

class DatosPorDefecto extends Seeder
{
    public function run()
    {
        //Datos por defecto
        $permisos = [
            //Tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //Tabla productos
            'ver-product',
            'crear-product',
            'editar-product',
            'borrar-product',
        ];

        foreach($permisos as $permiso){
            Permission::create(['name' => $permiso]);
        }
        $this->continuarConCodigo();
    }

    // Función que contiene el código restante
    private function continuarConCodigo()
    {
        $usuario = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $rol = Role::create(['name' => 'Administrador']);
        $permisos = Permission::pluck('id', 'id')->all();

        $rol->syncPermissions($permisos);
        $usuario->assignRole('Administrador');
    }
}