<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL DE MASCOTAS - Práctica POO</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php

        require $_SERVER["DOCUMENT_ROOT"] . "/app/models/Ave.php";
        require $_SERVER["DOCUMENT_ROOT"] . "/app/models/Perro.php";
        require $_SERVER["DOCUMENT_ROOT"] . "/app/models/Gato.php";
        require $_SERVER["DOCUMENT_ROOT"] . "/app/models/Hotel.php";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Mascota.php";
        require $_SERVER["DOCUMENT_ROOT"] . "/app/models/Servicio.php";
        require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Usuario.php";



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


        $hotel = $hotel->mostrarInfoHotel(); 





        ?>

        <div class="header">
            <h2>Hotel para Mascotas Ruescas</h2>

        </div>


        <!-- Información del hotel -->
        <div class="hotel">
            <h2>Información del Hotel</h2>
            <p class="total-usuarios"><strong>Nombre del hotel:</strong> <?php echo $hotel->getNombre(); ?></p>
            <p class="total-usuarios"><strong>Total de usuarios:</strong> <?php echo count($hotel->getUsuarios()); ?></p>

        </div>

        <!-- Servicios disponibles -->
        <div class="servicio">
            <h2>Servicios disponibles</h2>
            <pre><?php Servicio::mostrarServiciosDisponibles(); ?></pre>
        </div>

        <!-- Información completa de cada usuario-->
        
            
    

        

        




        
    
</body>
</html>