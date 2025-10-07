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

    function testRV(&$a, $b, &$c, $d = 8)
    {
        $a++;
        $b++;
        $c++;
        $d++;
    }
    $a = 1;
    $b = 2;
    $c = 3;
    $d = 4;
    testRV($a, $b, $c, $d); 
    var_dump($a);  // sale 2  porque al tener el & delante se guarda el incremento
    var_dump($b);  // sale 2  no se incremente porque solo hace una copia
    var_dump($c);  // sale 4  porque al tener el & delante se guarda el incremento
    var_dump($d);  // sale 4  porque aunque tenga un valor predefinod de 8 al darle valor de 4 sale lo que se le indica
    

    echo"<br>";
    $edad = 17;
    $edad = addOne($edad);
    var_dump($edad);
    ?>

    <h3>Funciones con un número variable de parámetros</h3>
    <?php
    echo "uno ", " dos ", " tres ";   // para imprimir varios parámetros
    echo"<br>";
    max(4,8);//una cantidad variables de varios números
    max (4, 9, 11, -4);
    max(4, 9, 11, -4, 889, 10);

    // Aqui se hace 4 - 3 y sale 1
    $rest = substract (4,3);
    var_dump($rest);
    echo"<br>";

    // Sale 4 porque este numero es la varible que se pide, pero puede ser que no haya numero que restarle
    $rest = substract (4);
    var_dump($rest);
    echo"<br>";

    // Esto da ERROR porque le primera variable es obligatoria 
    //$rest = substract ();
    //var_dump($rest);

    






    ?>
    
</body>
</html>