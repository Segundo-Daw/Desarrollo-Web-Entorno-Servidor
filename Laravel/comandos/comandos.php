Primera migración:
    -  php artisan migrate
    -  php artisan migrate:refresh

Para ver las rutas:
    -  php artisan route:list

Para crear modelos:
    - php artisan make:model Animal


    php artisan make:migration create_animals_table -m -r (si pongo la m para crear la tabla y -r para los controladores)

Para crear seeders:
    -  php artisan make:seeder AnimalSeeder

Para lanzar los seeders:
    -  php artisan db:seed
Si tenemos varios seeders pero solo queremos ejecutar uno concreto:
    -  php artisan db:seed --class=AnimalSeeder

Para crear controladores:
    -  php artisan make:controller AnimalController   (para el de API)
    -  php artisan make:controller AnimalController -r


Para crear vistas:
    -  php artisan make:view animal.index 

    VISTAS CON POST (store y create)
    -  php artisan make:view animal.create

    VISTAS CON PUT (update y edit)
    -  php artisan make:view animal.edit

Incluir vistas en vistas y componentes
    - php artisan make:view partials.navbar
    - php artisan make:component forms/create-animal     más compleja




