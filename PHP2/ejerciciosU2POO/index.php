<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleade</title>
</head>
<body>
    <?php
    include $_SERVER["DOCUMENT_ROOT"] . "/PHP2/ejerciciosU2POO/clases/Empleade.php";

    $empleade1 = new Empleade("Carolina", "Ruescas Cruz",[], 24550);
    $empleade2 = new Empleade("Yolanda", "Martinez Cruz", [], 12200);
    $empleade3 = new Empleade("Ares", "Pepe Ruiz",[]);
    $empleade4 = new Empleade("Ares", "Pepe Ruiz",[], 30000);

    //Añadimos los teléfonos
    $empleade1->anadirTelefono("618387331");
    $empleade2->anadirTelefono("689429548");

    $empleades = [$empleade1, $empleade2, $empleade3, $empleade4];

    foreach($empleades as $empleade){
        echo "<p>";
        echo $empleade . "<br>";
        
        $sueldo = $empleade->pagarImpuestos();

        echo $sueldo == -1 ? "No tiene sueldo por lo que no paga impuestos." : "Impuestos a pagar: " . number_format($sueldo , 2) . " €";


        //Mostrar telefono si lo tiene
        $telefonos = $empleade->mostrarTelefonos();
        if(!empty($telefonos)){
            echo "<br>Teléfonos: " . implode(", ", $telefonos);
        }
        echo"</p>";
    }

    //Listar todos los número de telefono separados por comas

    echo "<p>Listado de teléfonos: ";
    foreach($empleades as $empleade){
        $telefonos = $empleade->listarTelefonos();
        if(!empty($telefonos)){
            echo  $telefonos . ", ";
        }
    }
    echo "</p>";

    //Eliminar los numeros de teléfono 
    echo "<p>Listado de telefonos (están eliminados por eso no salen): </p>";
    foreach($empleades as $empleade){
        $empleade-> vaciarTelefonos();
        
    }
    //volvemos a recorrer los empleados para comprobar que ya no hay telefonos
    foreach($empleades as $empleade){
        $telefonos = $empleade->listarTelefonos();
        if(!empty($telefonos)){
            echo  $telefonos . ", ";
        }
    }



    





    


















    

    ?>

    
</body>
</html>