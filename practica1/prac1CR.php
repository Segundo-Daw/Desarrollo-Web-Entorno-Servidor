<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 1</title>
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

    
</body>
</html>