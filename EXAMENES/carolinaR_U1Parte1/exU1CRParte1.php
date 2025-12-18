<?php
include("./modeloB.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>examen parte 1 - Carolina Ruescas</title>
</head>
<body>
    <?php

    echo "<h2>Ejercicio 1</h2>";
    echo "<ul>";
    foreach($menuItems as $name => $valor){
        if ($valor ["category"] == "Main Course"){
            echo "<li>$valor[name] tiene un nivel  $valor[spicy_level]</li>";
        }
    }
    echo "</ul>";



    echo "<h2>Ejercicio 2</h2>";

    $pre = 0;
    foreach ($menuItems as $precio){
        if ($precio ["category"] == "Main Course"){
            $pre += $menuItems["precio"];
            $precioMedio = $pre /2; 

            echo "<p>El precio medio de Main Course es $precioMedio </p>";

        }
    }

    

    echo "<h2>Ejercicio 3</h2>";
    echo "<ul>";
    
    foreach($menuItems as $name => $valor){
        if ($valor ["category"] == "Dessert"){
            asort($valor);
            echo "<li>$valor[name]</li>";
        }
    }
    echo "</ul>";








    ?>




    
</body>
</html>