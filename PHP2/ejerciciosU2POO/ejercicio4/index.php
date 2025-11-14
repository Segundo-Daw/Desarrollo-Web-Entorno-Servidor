<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
        include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Autobus.php";
        include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Camion.php";
        include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Coche.php";
        include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Vehiculo.php";

        //Crear coches
        $coche1 = new Coche("8596 BBB", "Nissan", 5, 25600, 5);
        $coche2 = new Coche("6352 AAA", "Toyota", 4, 15000, 3);

        //Crear camiones
        $camion1 = new Camion("8596 CCC", "Chevrolet", 2, 25600, 589);
        $camion2 = new Camion("8596 DDD", "Tesla", 2, 258652, 800);

        //Crear autobus
        $autobus1 = new Autobus("8596 FFF", "Citroen", 2, 53200, 47);

        //REgistramos viajes nuevos
        $coche1->registrarKmNuevos(320);
        $coche2->registrarKmNuevos(100);
        $camion1->registrarKmNuevos(10);
        $autobus1->registrarKmNuevos(250);

        echo "INFOMACIÓN BASICA <br>";
        echo "<p>$coche1</p>";

        echo "<p>$coche2</p>";
        echo "<p>$camion1</p>";
        echo "<p>$camion2</p>";
        echo "<p>$autobus1</p>";


        //Para mostrar tambien el coste de mantenimiento y si necesita revision
        echo "<p>" . $coche1->toHtml() . "</p>";

        // Array de vehículos
        $vehiculos = [$coche1, $coche2, $camion1, $camion2, $autobus1];

        echo "<h2>Listado de vehículos</h2>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Matrícula</th><th>Tipo de vehículo</th><th>Km totales</th><th>Coste mantenimiento</th></tr>";

        foreach ($vehiculos as $vehiculo) {
            echo "<tr>";
            echo "<td>" . $vehiculo->getMatricula() . "</td>";
            echo "<td>" . get_class($vehiculo) . "</td>";
            echo "<td>" . $vehiculo->getKmRecorridos() . "</td>";
            echo "<td>" . number_format($vehiculo->calcularCosteMantenimiento(), 2) . " €</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<br>";

        //Mostrarla misma información de arriba pero sin tabla
        foreach ($vehiculos as $vehiculo) {
           
            $matricula = $vehiculo->getMatricula();
            $tipo =   get_class($vehiculo);
            $km =  $vehiculo->getKmRecorridos();
            $coste = number_format($vehiculo->calcularCosteMantenimiento(), 2);
            
            echo $matricula . " " . $tipo . " " . $km . " " . $coste . "<br>";
            
        }






    ?>
    
</body>
</html>