<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 1</title>
    <link rel="stylesheet" href="style/styleCR.css">
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


    <?php
    include("./functions/functionsCR.php");
    ?>

    <h2>Ejercicio 3</h2>
    <?php
    //Ejemplo de uso de las funciones

    echo "<h4>Función filterByType</h4>";

    $numeros = [-5, -2, 0, 1, 2, 3, 4, 5, 11, 13];

    echo "Números pares: ";
    echo filterByType($numeros, "par");
    echo "Números impares: ";
    echo filterByType($numeros, "impar");
    echo "Números positivos: ";
    echo filterByType($numeros, "positivo");
    echo "Números negativos: ";
    echo filterByType($numeros, "negativo");
    echo "<br>";


    echo "<h4>Función convertTemperature</h4>";
    echo convertTemperature(100); 
    echo "<br>";
    echo convertTemperature(32, 'fahrenheit', 'celsius'); 
    echo "<br>";
    echo convertTemperature(0, 'celsius', 'kelvin'); 
    echo "<br>";
    echo convertTemperature(100, 'unknown', 'celsius'); 
    echo "<br>";





    ?>













    
</body>
</html>