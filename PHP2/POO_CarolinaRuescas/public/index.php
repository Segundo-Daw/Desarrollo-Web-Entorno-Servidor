<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL DE MASCOTAS - Práctica POO</title>
</head>
<body>
    <?php

        include $_SERVER["DOCUMENT_ROOT"] . "/POO_CarolinaRuescas/app/models/Ave.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/POO_CarolinaRuescas/app/models/Perro.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/POO_CarolinaRuescas/app/models/Gato.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/POO_CarolinaRuescas/app/models/Hotel.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/POO_CarolinaRuescas/app/models/Mascota.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/POO_CarolinaRuescas/app/models/Servicio.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/POO_CarolinaRuescas/app/models/Usuario.php";



        // Crear hotel
        $hotel = new Hotel("Hotel Mascotas Ruescas");

        // Crear usuarios
        $usuario1 = new Usuario("Juan Pérez", "juan@example.com", "1234");
        $usuario2 = new Usuario("Ana López", "ana@example.com", "abcd");

        // Crear mascotas y asignar servicios
        $perro1 = new Perro("Labrador", false, "Rex", 3, 5, ["Baño", "Paseo"]);
        $gato1 = new Gato("Siamés", true, "Luna", 2, 7, ["Corte de pelo", "Spa", "Cepillado"]);
        $ave1 = new Ave("Loro", true, "Kiwi", 1, 3, ["Retoque plumas"]);

        // Añadir mascotas a usuarios
        $usuario1->agregarMascota($perro1);
        $usuario1->agregarMascota($ave1);
        $usuario2->agregarMascota($gato1);

        // Añadir usuarios al hotel
        $hotel->agregarUsuario($usuario1);
        $hotel->agregarUsuario($usuario2);

        // Mostrar información del hotel
        echo "=== Información del Hotel ===\n";
        $hotel->mostrarInfoHotel();

        // Mostrar ingresos totales
        echo "\n=== Ingresos Totales del Hotel ===\n";
        echo $hotel->calcularIngresosTotales() . "€\n";

        // Mostrar servicios disponibles
        echo "\n=== Servicios Disponibles ===\n";
        Servicio::mostrarServiciosDisponibles();

        // Ejemplo de eliminar un servicio de una mascota
        echo "\n=== Eliminando servicio 'Paseo' de Rex ===\n";
        $perro1->eliminarServicio("Paseo");
        $usuario1->mostrarInfo();

        // Ejemplo de eliminar mascota de un usuario
        echo "\n=== Eliminando mascota 'Kiwi' de Juan ===\n";
        $usuario1->eliminarMascota($ave1);
        $usuario1->mostrarInfo();

        // Ejemplo de eliminar usuario del hotel
        echo "\n=== Eliminando usuario Ana López del hotel ===\n";
        $hotel->eliminarUsuario($usuario2);
        $hotel->mostrarInfoHotel();
    ?>
    
</body>
</html>