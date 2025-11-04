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

    $empleade1 = new Empleade("Carolina", "Ruescas Cruz", 24550);
    $empleade2 = new Empleade("Yolanda", "Martinez Cruz", 12200);
    $empleade3 = new Empleade("Ares", "Pepe Ruiz");
    $empleade4 = new Empleade("Ares", "Pepe Ruiz",30000);

    $empleades = [$empleade1, $empleade2, $empleade3, $empleade4];

    foreach($empleades as $empleade){
        echo "<p>";
        echo $empleade . "<br>";
        $sueldo = $empleade->pagarImpuestos();

        echo $sueldo == -1 ? "No tiene sueldom por lo que no paga impuestos." : "Impuestos a pagar: " . number_format($sueldo , 2);
        echo"</p>";
    }






    

    ?>

    
</body>
</html>