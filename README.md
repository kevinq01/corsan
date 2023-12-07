Requisitos
PHP 8.1.12
Composer
Acceso a una base de datos (puedes utilizar MySQL, PostgreSQL, SQLite, entre otros)
En el desarrollo se uso XAMPP para el servidor de MySql

Paquetes usados
    Spatie
    Laravel Collective
    Laravel UI Stisla 

Instalación
1- Descarga o clona el repositorio de GitHub en tu entorno de desarrollo.
2- Accede a la carpeta del proyecto en tu terminal.
3- Ejecuta "composer install" y "npm install" para instalar las dependencias del proyecto.
4- Renombra el archivo .env.example a .env y configura la conexión a la base de datos en este archivo.
5- Ejecuta "php artisan migrate" para crear las tablas en la base de datos.
6- Ejecuta "php artisan db:seed --class=DatosPorDefecto", Para crear los datos por defecto
7- Ejecuta "php artisan serve" y "npm run dev" para iniciar el servidor de desarrollo.
8- Accede a http://localhost:8000 en tu navegador para verificar que la instalación se haya realizado correctamente.

Para ejecutar la tarea programada
    php artisan schedule:work

API 
    http://127.0.0.1:8000/api/products
    http://127.0.0.1:8000/api/products/2