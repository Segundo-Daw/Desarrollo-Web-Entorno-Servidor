<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HolaMundo</title>
</head>
<body>
    <h2>PHP:</h2>
    <?php
        /* con esta etiqueta no lo manda como tal al cliente sino que lo interpreta
        */
        // para hacer comentarios de una sola linea
        
        echo ("Hola Mundo");

        //Variables:
        // En Java sería: String name = "Carol";
        // En PHP siempre que aparezca un simbolo del dolar es que es una varible $

        $name = "Carol";
        echo "<br>"; // para hacer un salto de linea
        echo $name;

        // No es necesario sacar las variables de las comillas DOBLES
        echo "<p> Hola, me llamo $name </p>";
        
        // Los tipos de las variables pueden cambiar
        $name = 3;
        echo "<p> Hola, me llamo $name </p>";

    ?>


    <h2> Más PHP:</h2>
    <?php
        echo "<p>La varible name tiene: $name</p>";
        echo "<h3> Otro título </h3>";
        
    ?>

    <?php
    // 16/9/25
        echo("Hola esto es una mensaje.<br><br>");
        echo "otra cosa generada con PH";

        // En java: double number = 12.7;
        $number = 12.7;
        echo "<p>La variable es : $number</p>";

        $number = "hola";
        echo "<p>La variable es: $number</p>";
    
        // ESTO DARIA ERROR (AUNQUE TODAVIA NO NOS SALTA)
        // $number = $number + 3;
        // echo "<p>La variable es: $number </p>"; 
        
        


    ?>

</body>
</html>