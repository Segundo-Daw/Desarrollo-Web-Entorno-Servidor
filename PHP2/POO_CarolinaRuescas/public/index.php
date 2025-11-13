<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link a Font Awesome 6 para los emojis-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Link a mi css-->
    <link rel="stylesheet" href="css/style.css">
    

</head>
<body>
    <?php

        include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Ave.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Perro.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Gato.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Hotel.php";
        include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Mascota.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Servicio.php";
        include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Usuario.php";


        // Crear hotel
        $hotel = new Hotel("Oasis Animal");

        // Crear usuarios
        $usuario1 = new Usuario("Juan Pérez", "juan@example.com", "1234");
        $usuario2 = new Usuario("Ana López", "ana@example.com", "abcd");

        //Inicializamos los servicios
         Servicio::initServicios();

         // Obtener los servicios como objetos
        $baño = Servicio::obtenerPorNombre("Baño");
        $paseo = Servicio::obtenerPorNombre("Paseo");
        $cortePelo = Servicio::obtenerPorNombre("Corte de pelo");
        $spa = Servicio::obtenerPorNombre("Spa");
        $cepillado = Servicio::obtenerPorNombre("Cepillado");
        $retoquePlumas = Servicio::obtenerPorNombre("Retoque plumas");

        // Crear mascotas y asignar servicios
        $perro1 = new Perro("Labrador", true, "Rex", 3, 5, [$baño, $paseo]);
        $gato1 = new Gato("Siamés", false, "Luna", 2, 7, [$cortePelo, $spa, $cepillado]);
        $ave1 = new Ave("Loro", true, "Kiwi", 1, 3, [$retoquePlumas]);

        // Añadir mascotas a usuarios
        $usuario1->agregarMascota($perro1);
        $usuario1->agregarMascota($ave1);
        $usuario2->agregarMascota($gato1);

        // Añadir usuarios al hotel
        $hotel->agregarUsuario($usuario1);
        $hotel->agregarUsuario($usuario2);
        ?>


        <header class="header">
            <h1><?php echo $hotel->getNombre();?></h1>
        </header>

        <!-- Precios por tipo de mascota -->
        <section class="precios">
            <div class="card-precio">
                <i class="fa-solid fa-dog"></i>                
                <h2>PERROS</h2>
                <p>Precio inicial de <?= Perro::TARIFA_BASE_DIA?>€ por día</p>
            </div>

            <div class="card-precio">
                    <i class="fa-solid fa-cat"></i>                    
                    <h2>GATOS</h2>
                    <p>Precio inicial de <?= Gato::TARIFA_BASE_DIA ?>€ por día</p>
                </div>
                <div class="card-precio">
                    <i class="fa-solid fa-crow"></i>
                    <h2>AVES</h2>
                    <p>Precio inicial de <?= Ave::TARIFA_BASE_DIA?>€ por día</p>
                </div>
        </section>

        <!-- HOTEL-->
        <div class="titulos">
            <h2>··· Información del Hotel ···</h2>
        </div>

        <section class="hotel">
            <div class="card-hotel">
            <!-- Información del hotel -->
                <h3>Información general</h3>
                <?php echo $hotel->mostrarInfoHotel();?>
                <!-- Información sobre los ingresos totales -->
                <h3>Información Económica</h3>
                <?php echo $hotel->calcularIngresosTotales();?>
            </div> 
               
            <!-- Servicios disponibles -->
            <div class="card-servicio">
                <h3>Servicios disponibles</h3>
                <?php Servicio::mostrarServiciosDisponibles(); ?>
            </div>
        </section>


        <!--MASCOTAS-->
        <div class="titulos">
            <h2>··· Información específica de cada mascota ···</h2>
        </div>
        <section class="mascotas">
            <div class="card-mascota">
                <h3>Precio total de cada mascota que esta hospedada en el hotel</h3>
                <ul>
                    <li><?= $perro1->getName() ?>: <?= $perro1->calcularPrecioTotal() ?> €</li>
                    <li><?= $gato1->getName() ?>: <?= $gato1->calcularPrecioTotal() ?> €</li>
                    <li><?= $ave1->getName() ?>: <?= $ave1->calcularPrecioTotal() ?> €</li>
                </ul>
            </div>
            <div class="card-informacion-mascota">
                <h3>Desglose de información de cada mascota</h3>
                <ul>
                    <li><pre><?= $perro1->mostrarInfoCompleta() ?></pre></li>
                    <li><pre><?= $gato1->mostrarInfoCompleta() ?></pre></li>
                    <li><pre><?= $ave1->mostrarInfoCompleta() ?></pre></li>
                </ul>
            </div> 
        </section>


            <?php

            //Eliminar servicio
            $perro1->eliminarServicio("Paseo");
            $gato1->eliminarServicio("Spa");

            //Eliminar mascota
            $usuario1->eliminarMascota($ave1);
           
            ?>

            <!--Cambios después de emplear métodos-->
            <div class="titulos">
                <h2>··· Cambios realizados con métodos ···</h2>
            </div>
            <section class="mascotas">
                <div class="card-mascota">
                    <h3>Precio total de cada mascota que esta hospedada en el hotel</h3>
                    <?php
                        foreach ($hotel->getUsuarios() as $usuario) {
                            echo "<h3>Usuario: " . $usuario->getNameUser() . "</h3>";
        
                            foreach ($usuario->getMascotas() as $mascota) {
                                echo "<p>Nombre de la mascota: " . $mascota->getName() . "</p>";
                                echo "<p>Precio total: " . $mascota->calcularPrecioTotal() . " €</p>";
                            }
                        }
                    ?>
                </div>
                <div class="card-informacion-mascota">
                    <h3>Desglose de información de cada mascota</h3>
                    <!-- Como hemos eliminado a la mascota KIWI ahora tenemos que volver a recorrer el array para que solo nos muestre los que hay-->
                    <?php
                        foreach ($hotel->getUsuarios() as $usuario) {
                            foreach ($usuario->getMascotas() as $mascota) {
                                echo "<pre>" . $mascota->mostrarInfoCompleta() . "</pre>";
                            }
                        }
                    ?>
                   
                </div> 
            </section>
    </body>
</html>