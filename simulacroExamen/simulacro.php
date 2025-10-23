<?php
include("./funcionesXY.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulacro</title>
</head>
<body>
    <h3>Ejercicio 1</h3>
    <p>Crea un array bidimensional de 5 filas por 3 columnas. En cada posición,
    guarda el producto del número de fila por el de columna. Para ello, debes utilizar bucles. Es
    decir</p>
    <?php


    $array = [];
    echo "<table border = 1>";
    echo "<tr>";
    for ($i = 1; $i < 4; $i++) {
        echo "<tr>";
        for ($j = 1; $j < 6; $j++) {
            
            echo "<td>";
            echo $mult = $j * $i ." ";
            $array[$j][$i] = $mult;
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</tr>";
    echo "</table>";
    var_dump($array);
    ?>

    <h3>Ejercicio 2</h3>
    <p>Crea un array bidimensional de 4 filas por 4 columnas. En cada posición, 
    pon el string “sí” si fila y columna coinciden, y “no” en caso contrario.
    Debes utilizar bucles.</p>
    <?php
    
    $array =[];
    $num = 4;  // número de filas y de columnas

    for ($i = 0; $i < $num; $i++) {  //filas
        for ($j = 0; $j < $num; $j++){    //columnas
            if ($i == $j){
                echo $array[$i][$j] = "si";
            }else{
               echo $array[$i][$j] = "no";
            }  
        }
    }



    ?>

    <h3>Ejercicio 3</h3>
    <p>En funcionesXY.php crea la función promedio que recibe un número variable
    de parámetros. La función calcula el promedio de dichos valores (es decir, 
    la suma de dichos valores, dividido entre la cantidad de valores). Si no se
    recibe ningún parámetro, la
    función devuelve el boolean false.

    Desde ex1evalXY.php llama a la función e imprime los resultados de 
    promedio(1, 2, 4, 3), que devuelve 2.5; promedio(), que devuelve false; y promedio(-2, 3, -7), que 
    devuelve -2</p>
    <?php

    // Llamamos a la función con diferentes parámetros y mostramos los resultados
    $resultado1 = promedio(1, 2, 4, 3);
    $resultado2 = promedio();
    $resultado3 = promedio(-2, 3, -7);

    // Imprimimos los resultados
    echo "El promedio de (1, 2, 4, 3): " . $resultado1 . " <br> ";  // Debería ser 2.5

    echo "El promedio(): ";
    echo ($resultado2 === false) ? "false" : $resultado2;
    echo "<br>";

    echo "El promedio de (-2, 3, -7): " . $resultado3 . "<br>";  // Debería ser -2
    ?>


    <h3>Ejercicio 4</h3>
    <p>En funcionesXY.php crea la función potencia. Tiene dos parámetros: base y
    exponente (exponente es opcional, si no se incluye tomará el valor de 2). La función
    devuelve la potencia baseexpontente, es decir: 43 es 4x4x4 (se multiplica la base 3 veces). Para
    hacer el cálculo tienes que utilizar bucles (no puedes utilizar pow() ni el operador **).
    
    Desde ex1evalXY.php llama a la función e imprime los resultados de potencia(4, 3), que da
    64; potencia(4), que da 16; y potencia(2,8), que da 256</p>
    <?php

    var_dump(potencia(4, 3));
    var_dump(potencia(4));
    var_dump(potencia(2, 8));

    ?>

    <h3>Ejercicio 5</h3>
    <p>Crea en ex1evalXY.php un array asociativo que tenga 3 elementos que
    representan a 3 personas: los ids (int) son las claves, y los nombres (string) son 
    los valores.Ordena el array alfabéticamente por nombres. Utiliza funciones de la 
    librería de PHP para ello. Muestra el contenido en una lista desordenada, 
    siguiendo el modelo del ejemplo:
        · Ahmed tiene el id 21
        · Blanca tiene el id 14
        · Juan tiene el id 41</p>
    <?php
    $array = [
        1 => "Maria",
        2 => "Pepe",
        3 => "Lucia"
    ];

    asort($array);
    foreach ($array as $key => $value) {
        echo "<ul><li> $value tiene el id $key </li></ul>";
    }
    ?>

    <h3>Ejercicio 6</h3>
    <p>Para este ejercicio, utiliza el array asociativo $alumnado que encontrarás en el
    aula virtual en alumnado.php. Con él, realiza las operaciones que se piden a 
    continuación.  Es importante que todas ellas las deberás hacer con bucles y 
    accediendo a los datos de $alumnado, no dará ningún punto imprimir por pantalla los 
    resultados esperados sin más.</p>
    <?php
    $alumnado = [
        "1234W" => [
            "name" => "Amir",
            "edad" => 21,
            "matricula" => true
        ],
        "2345X" => [
            "name" => "Laura",
            "edad" => 17,
            "matricula" => false
        ],
        "3456Y" => [
            "name" => "Juan",
            "edad" => 23,
            "matricula" => true
        ],
        "4567Z" => [
            "name" => "Martin",
            "edad" => 12,
            "matricula" => false
        ]
    ];

    echo "<h4>6.a)</h4>";
    //Imprime por pantalla en un párrafo (p) la edad de la alumna que tiene DNI 2345X.
    echo "<p>" . $alumnado["2345X"]["edad"] . "</p>";

    echo "<h4>6.b)</h4>";
    echo "<ol>";
    foreach ($alumnado as $dni => $alumno) {
        echo "<li>" . $alumno["name"];
        if ($alumno["matricula"]) {
            echo " sí";
        } else {
            echo " no";
        }
        //echo $alumno["matricula"] ? " sí" : " no";
        echo " tiene matrícula.</li>";
    }
    echo "</ol>";

    echo "<h4>6.c)</h4>";
    echo "<ul>";
    foreach ($alumnado as $dni => $alumno) {
        if ($alumno["edad"] >= 18) {
            echo "<li>" . $alumno["name"]
                . " tiene " . $alumno["edad"] . " años"
                . " y su DNI es " . $dni . "</li>";
        }
    }
    echo "</ul>";

    echo "<code>";
    echo ord('S') - ord('A') + 1; //ord('S') devuelve el código ASCII del carácter 'S' (que es 83). ord('A') devuelve el código ASCII de 'A' (que es 65).
    echo "</code>";

    ?>









    
</body>
</html>