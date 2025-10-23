<?php
include("functions/functionsCR.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parte 2 - Carolina Ruescas</title>
</head>
<body>
    <h3>Ejercicio 1</h3>
    <?php
    $filas = 5;
    $columnas = 4;
    $posiciones = [];

        for ($i = 0; $i < $filas; $i++) {
            for ($j = 0; $j < $columnas; $j++) {
                if($i % 3 == 0 || $j %3 ==0){
                    echo $posiciones[$filas][$columnas] = " multiplo ,";
                }else{
                    echo $posiciones[$filas][$columnas] = " no ,";

                }
            }
            echo"<br>";
        }
    ?>

    <h3>Ejercicio 2</h3>
    <?php

    $datos = numberAnalysis(4, -2, 7, 0, -5, 3);
    
    echo "<ul>";
    echo "<li> $datos</li>";
    echo "</ul>";

    


    ?>

    
</body>
</html>