<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables de PHP</title>
</head>
<body>

    <?php
        // Variable Bool (boleana)
        $underAge = true;
        $type = gettype ($underAge); // Devuelve un string con el tipo de la variable
        echo $type;
        echo "<br>";

        // Variable int
        $number = 14;
        echo gettype($number);
        echo "<br>";


        //Variable float
        $decimal = 14.1;
        var_dump($decimal); // imprime por pantalla el tipo y el valor
        echo "<br>";

        //string
        $text = "esto es una cadena de texto";
        // Concatenar es el operador .
        $text = $text . " - fin";
        var_dump($text);
        echo "<br>";

        $a; //variable no inicializada
        var_dump($a);
        echo "<br>";

        //CONSTANTES
        const GROUP = "2DAW";
            // echo "El grupo es GROUP";  de esta forma sale la palabra GROUP y no el valor
            // echo "El grupo es $GROUP";  esto tampoco funciona porque es una constante y no una variable
        echo "El grupo es " . GROUP; 
        echo "<br>";

        $mod = 5 % 2;  // mod significa el resto de la división de esos numeros que en este caso el resto es 1
        var_dump($mod);
        echo "<br>";
        $pow = 4 ** 3; // aqui lo que se indica es multiplicar tres veces el 4 
        var_dump($pow);
        echo "<br>";

        $a = 4;
        $a++; // incremnte en uno, es decir se le suma 1 al cuatro, por eso imprime 5
        var_dump($a);
        echo "<br>";
        ++$a; // incrementa en 1
        var_dump($a);


        echo "<br>";
        echo "<br>";
        echo "<br>";



        // Si el ++$x esta a la izquiera lo que indica es que primero se increnta y luego se le da valoer a la i
        // es decir, al tener el ++ primero la x pasaria a valer 6 porque se le suma y después se le daria el vvalor
        // de x a la y , por eso en este caso la y también vale 6.
        $x = 5;
        $y = ++$x;
        echo "y=$y";
        echo "<br>";
        echo "x=$x";
        echo "<br>";

        $age = 9;
        echo "La edad de esa persona es " . $age++ . "<br>"; // sale 9, porque primero se imprime y luego se suma
        echo " y ahora, la edad de esa persona es " . $age . "<br>"; // sale 10, porque en la linea anterior imçncremente en 1 su valor

        $a = 4;
        $a += 9; // equivale a $a = $a +9;
        $a /= 24; // equivale a $a = $a / 24;
        $text = "hola";
        $text .= " y adios";
        var_dump($text); // imprime "hola y adios"
        echo"<br>";


        //OPERADORES DE COMPARACIÓN
        $a = 4;
        $b = 4;
        $comp = $a == $b;
        var_dump($comp); // true
        echo "<br>";


        $comp = $a > $b;
        var_dump($comp); // false
        echo "<br>";

        $comp = $a >= $b;
        var_dump($comp); // true
        echo "<br>";

        $comp = $a != $b;  // para poner que los valores son distintos
        var_dump($comp); // false
        echo "<br>";

        $comp = $a <> $b; // es otra forma de poner que son distintos los valores
        var_dump($comp); // false
        echo "<br>";

        echo "<p>Nave espacial: </p>";
        $comp = $a <=> $b;
        var_dump($comp); 
        echo "<br>";
    ?>

</body>
</html>