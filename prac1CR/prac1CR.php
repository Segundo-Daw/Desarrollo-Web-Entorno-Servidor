<?php
    include("functions/functionsCR.php");
    include("functions/shopCR.php");
    include("functions/notasCR.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 1</title>
    <link rel="stylesheet" href="styles/styleCR.css">
    <link rel="stylesheet" href="styles/styleNotasCR.css">
</head>
<body>
    <h2>Ejercicio 1: Bucles anidados</h2>
    <?php
    echo "<h5>Primera figura</h5>";

    $row = 3 % 8 + 4;   //7
    $columns = 19 % 6 + 5;    //6

    /*Primera figura (rectángulo completo) */
    for ($i=1; $i <= $row; $i++){
        for ($j = 1; $j <= $columns; $j++){
            echo "*";
        }
        echo "<br>";
    }


    /*Segunda figura (triángulo izquierdo)*/
    /*Explicación:En este caso creamos una variable para que cuando llegue al máximo
     de nuestras colunmas imprima las filas con el mismo numero de columnas y no que siga aumentando.
        - Declaramos variable
        - Recorremos nuestras filas
        - cuando toca recorrer las columnas le indicamos que lo haga mientras sea < que el máximo de columnas
        - imprime *
        - Si el maximo de columnas es menor que el numero incial de columnas añadimos otro maximoColumns  */
    echo "<h5>Segunda figura</h5>";
    $maximoColumns = 1;

    for ($i=1; $i <= $row ; $i++){
        for($j=1; $j <= $maximoColumns; $j++){  
            echo "* ";
        }
        if($maximoColumns < $columns){
            $maximoColumns++;
        }
        echo "<br>"; 
    }

    //Tercera figura (marco)

    echo "<h5>Tercera figura</h5>";
    for ($i=1; $i <= $row; $i++){
        for ($j = 1; $j <= $columns; $j++){
            //Pimera fila || ultima fila ||primera columna || ultima columna
            if($i == 1 || $i == $row || $j== 1 || $j==$columns){
                echo " * ";
            }else{
                echo "&nbsp;&nbsp;&nbsp;";
            }
        }
        echo "<br>";
    }

    //Cuarta figura (tablero de ajegrez)
    echo "<h5>Cuarta figura (tablerod e ajedrez)</h5>";
    for ($i=1; $i <= $row; $i++){
        for ($j = 1; $j <= $columns; $j++){
            if(($i+$j) %2==0 ){
                echo " * ";
            }else{
                echo "&nbsp;";
            }
        }
        echo "<br>";
    }
    ?>

    <h2>Ejercicio 2</h2>
    <?php
    $temperaturas = [];
    $ciudades = 6;
    $dias = 7;


    for($i = 0; $i < $ciudades; $i++ ){
        for($j = 0; $j < $dias; $j++){
            //Generamos en el array de forma aleatoria las temperaturas
            $temperaturas[$i][$j] = rand(-10, 45);
        }
    }

    //La temperatura más baja y la más alta
    // de todos los dias y de todas las ciudades
    $tempMax = 0;
    $tempMin = 0;

    foreach($temperaturas as $ciudades => $dias){
        foreach($dias as $temperatura){   //temperatura son los valores CIUDADO CON PONERLO CON S que es el nombnre del array
            if($temperatura < $tempMin){
                $tempMin = $temperatura;
            }
            if ($temperatura > $tempMax){
                $tempMax = $temperatura;
            }
        }
    }

    echo "Temperatura mínima " . $tempMin . "<br>" . "Temperatura máxima " . $tempMax;
    echo "<br>";

    //El día con mayor variación (la resta entre las dos temperaturas)
    //Aqui tengo que calcular el máximo y el mínimo de cada ciudad y  mostras la ciudad 
    //con mayor variación

    $variacion = 0;

    foreach($temperaturas as $ciudades => $dia){
        $min = 0;
        $max = 0;
        foreach($dias as $temperatura){
            //sacar la temperatura minima
            if($temperatura < $min){
                $min = $temperatura;
            }

            //sacar la temperatura máxima
            if($temperatura > $max){
                $max = $temperatura;
            }
            
            $resta = $max - $min;
        }
        if ($resta > $variacion){
            $variacion = $resta;
        }
       
    }
    echo "La variación es de: " .  $variacion . "º.";
    echo "<br>";

    //Temperatura media por ciudad

    foreach ($temperaturas as $numeroCiudad => $temperaturaCiudad) {
        $suma = 0;
        foreach ($temperaturaCiudad as $temperatura) {
            $suma += $temperatura;
        }

        $media = $suma / 7; // número de días que ya se ha definido arriba (que son 7)
        echo "Ciudad " . ($numeroCiudad + 1) . ": " . round($media, 2) . "º<br>";
                            // numero de la ciudad que va aumentando uno para que se muestren diferentes ciudades
                            //round($media, 2) lo que hace es que el resultado al tener decimales me lo redondea con 2 decimales
    }


    ?>

    <h2>Ejercicio 3</h2>
    <?php
    //Ejemplo de uso de las funciones

    echo "<h4>Función filterByType</h4>";
    $type = filterByType([19, 6, -25, 4, 10, 9], "negativo");
    var_dump($type);
    $type = filterByType([19, 6, -25, 4, 10, 9], "positivo");
    var_dump($type);
    $type = filterByType([19, 6, -25, 4, 10, 9], "par");
    var_dump($type);
    $type = filterByType([19, 6, -25, 4, 10, 9], "impar");
    var_dump($type);
    $type = filterByType([19, 6, -25, 4, 10, 9], "primo");
    var_dump($type);
    

    echo "<h4>Función calculateStatistics</h4>";
    $statistics = calculateStatistics([19, 6, -25, 4, 10, 9]);
    var_dump($statistics);
    echo "<br>";

    echo "<h4>Función analizarPalabras</h4>";
    $words = analizarPalabras("Esto es una frase para probar la funcion");
    var_dump($words);
    echo "<br>";

    echo "<h4>Función convertTemperature</h4>";
    $temp = convertTemperature(25, "clesius", "kelvin");
    var_dump($temp);
    $temp = convertTemperature(25, "celsius", "kelvin");
    var_dump($temp);
    echo "<br>";
    ?>

    <h2>Ejercicio 4</h2>
    <?php

    echo "<table class=\"shop\">";
        echo "<tr>
            <th>Nombre del producto</th>
            <th>Precio con IVA</th>
            <th>Stock disponible</th>
        </tr>";
        foreach ($productos as $producto => $valor) {
            echo "<tr>";
            echo "<td>" . ucwords($valor["nombre"]) . "</td>";  // con la funcion de ucwords ponemos en mayúscula la primera palabra
            echo "<td>" . formatPrice(calculateIVA($valor["precio"])) . "</td>"; // con formarPrice ponemos el símbolo de €
            if ($valor["stock"] == 0) {
                echo "<td class=\"rojo2\">" . $valor["stock"] . "</td>";
            } elseif ($valor["stock"] > 10) {
                echo "<td class=\"verde\">" . $valor["stock"] . "</td>";
            } else {
                echo "<td class=\"amarillo\">" . $valor["stock"] . "</td>";
            }
        echo "</tr>";
    }
    echo "</table>";
    ?>


    <h2>Ejercicio 4.1</h2>
    <?php
    echo "<table class=\"shop\">";
    echo "<tr>
            <th>Nombre del producto</th>
            <th>Precio con IVA</th>
            <th>Descuento sobre el producto</th>
            <th>Stock disponible</th>
        </tr>";
    foreach ($productosConDescuento as $producto => $valor) {
        echo "<tr>";
        echo "<td>" . ucwords($valor["nombre"]) . "</td>";
        if (isset($valor["descuento"])) {  //con isset vemos si tiene descuento ese producto
            echo "<td class=\"precioTachado\">" . formatPrice(calculateIVA($valor["precio"])) . "</td>";
            echo "<td>" . formatPrice($valor["descuento"]) . "</td>";
        } else {
            echo "<td>" . formatPrice(calculateIVA($valor["precio"])) . "</td>";
            echo "<td>Sin descuento</td>";
        }
        if ($valor["stock"] == 0) {
            echo "<td class=\"rojo2\">" . $valor["stock"] . "</td>";
        } elseif ($valor["stock"] > 10) {
            echo "<td class=\"verde\">" . $valor["stock"] . "</td>";
        } else {
            echo "<td class=\"amarillo\">" . $valor["stock"] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>

    <h2>Ejercicio 5</h2>
    <p>Esta aplicación analiza las notas de 6 alumnos en distintas asignaturas. Los datos están 
        organizados en un array asociativo que almacena, para cada asignatura, los nombres de los alumnos
        y sus respectivas notas.Atraves de funciones se calcula la media de cada asignatura y se 
        identifica al alumno con mejor nota.</p>
    <?php
    $asignaturas = [
        "Matematicas" => [
            "Ana" => 8,
            "Luis" => 6,
            "Carlos" => 9,
            "Carolina" => 5,
            "Yolanda" => 10,
            "Ares" => 8
        ],
        "Lengua" => [
            "Ana" => 7,
            "Luis" => 8,
            "Carlos" => 6,
            "Carolina" => 7,
            "Yolanda" => 5,
            "Ares" => 4
        ],
        "Historia" => [
            "Ana" => 5,
            "Luis" => 7,
            "Carlos" => 8,
            "Carolina" => 7,
            "Yolanda" => 6,
            "Ares" => 10
        ]
    ];

    foreach ($asignaturas as $asignatura => $notas) {
        $media = calcularMedia($notas);
        $mejorAlumno = alumnoTop($notas);
        $peorAlumno = peorNota($notas);

        $clase = strtolower($asignatura); // para que en la hoja de estilo css las clases al llevar el nombre de la asignatura aparezca en minuscula y no en mayuscula

        echo "<div class='$clase'>";
        echo "<h1>$asignatura</h1>";
        echo "<ul>";
        foreach ($notas as $alumno => $nota) {
            echo "<li><strong>$alumno</strong>: $nota</li>";
        }
        echo "</ul>";
        echo "<p><strong>MEDIA:</strong> $media</p>";
        echo "<p><strong>MEJOR ALUMNO:</strong> $mejorAlumno</p>";
        echo "<p><strong>PEOR ALUMNO:</strong> $peorAlumno</p>";
        echo "</div>";
    }
    ?>  
</body>
</html>