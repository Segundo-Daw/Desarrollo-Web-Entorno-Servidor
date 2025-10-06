<?php
//Include(equivalente al Improt de Java, para añadir otros ficheros)
include("./functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones PHP</title>
</head>
<body>
    <h1>Funciones</h1>

    <?php
    //llamo a la función showName;
    showName();

    // Se pueden usar la varibles declarradas en el fichero del include
    var_dump($variable);

    echo "<br>";
    printAddition(7,9);
    $num1 = 3;
    $num2 = 9;
    echo"<br>";
    printAddition($num1, $num2);
    echo"<br>";

    $resultado = addition(6,9);
    echo $resultado;
    echo "<br>";
    echo " La suma de 6 y de 9 es " . addition(6,9);
    echo "<br>";

    echo salute("juan");  // hola juan
    echo "<br>";
    echo salute("juan", "Buenos dias");  // Buenos dias juan
    echo "<br>";

   
    echo intoHtml("prueba", "book ");
    echo "<br>";
    echo intoHtml( "prueba ");
    echo "<br>";

    echo matricula("Juan", "Tierno", "DAM", 2023);
    echo matricula("Alberto", "Brasil");
    echo matricula("Kelvis", "ciudad de Jaen", "ASIR");

    ?>

    <h3>Parámetros por valor o por referencia</h3>
    <?php
    function increment($n){
        $n++;
        return $n;
    }

    $number = 8;
    increment($number);
    echo "<p>$number</p>";  //sale 8 porque por defecto en las funciones se hace una copia del valor y no trabaja
                            // con la propia variable. Son los PARAMETROD POR VALOR (lo típico)

    //PARÁMETROS POR REFERENCIA
    function incrementReference(&$n){   //con & se le indica que no haga una copia sino que se utiliza la misma variable en memoria
        $n++;
        return $n;
    }
    $number = 8;
    incrementReference($number);
    echo "<p>$number</p>";

    

    ?>
    
</body>
</html>