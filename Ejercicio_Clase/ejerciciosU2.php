<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios unidades 2 y 3</title>
    <link rel="stylesheet" href="tablacss.css">

</head>
<body>

    <?php
    /* 
    EJERCICIO 1
    Declara una variable de cada tipo (int, double, string y boolean) e 
    imprime por pantalla sus valores y sus tipos (utiliza la función gettype para ello).
    Que salga en un formato HTML correcto y legible por personas, algo como "La variable
    es de tipo integer y tiene valor 5".
    */

    echo "<h2>Ejercicio 1</h2>";
    //variable tipo int
    $number = 10;
    echo gettype($number), "La variable es de tipo integer y tiene valor $number";
    echo "<br>";


    //varible tipo double
    $number = 5.3;
    echo gettype($number) . "La variable es de tipo int y tiene valor $number";
    echo "<br>";

    //varible tipo string
    $text = "Hola";
    var_dump($text);
    echo gettype ( "La variable es de tipo int y tiene valor $text");
    echo "<br>";

    //Variable tipo boolean
    $underAge="true";
    $type = gettype($underAge);
    echo $type;
    echo "<br>";

    /* 
    EJERCICIO 2
    Declara dos variables numéricas (a y b), imprime por pantalla el módulo (a mod b) y 
    la potencia (a elevado a b, ab).
    */
    echo "<h2>Ejercicio 2</h2>";
    $number1 = 11;
    $number2 = 2;
    $mod = $number1 % $number2;
    echo "$number1 mod $number2 = $mod";
    echo "<br>";

    $number1 = 11;
    $number2 = 2;
    $pow = $number1 ** $number2;
    echo "$pow";
    echo "<br>";    

    /* 
    EJERCICIO 3
    Declara tres variables: nombre, apellidos y nacimiento. Asígnales tus datos e 
    imprímelas por pantalla dentro de una tabla, con bordes, de manera que el resultado
    sea parecido a esto:
    */

    echo "<h2>Ejercicio 3 </h2>";
    $nombre = "Carolina";
    $apellido = "Ruescas Cruz";
    $nacimiento = "1996";

    echo"<table border=1>
        <tr>
            <td>Nombre</td> 
            <td>$nombre</td>
        </tr>
        <tr>
            <td>Apellidos</td>
            <td>$apellido</td>
        </tr>
        <tr>
            <td>Año de Nacimiento</td>
            <td>$nacimiento</td>
        </tr>
    </table>";
    echo "<br>";


    /* 
    EJERCICIO 4
    Define una variable llamada edad. Mostrar la edad actual, mostrar la edad que tendrá 
    dentro de 10 años y los años que le quedan para jubilarse (suponiendo que la edad de 
    jubilación es 60). Por ejemplo, si edad=39, muestra un mensaje “Actualmente tienes 39 años, 
    dentro de diez tendrás 49. Te quedan 21 para jubilarte”.
    */ 
    echo "<h2>Ejercicio 4</h2>";
    $age = 29;
    if ($age < 60){
        $after = $age + 10;
        $jubilacion = 60 - $age;
        echo"Actualmente tiene $age , dentro de diez años tendrá $after . Te quedan $jubilacion para jubilarte";
    }
    echo "<br>";


    /* 
    EJERCICIO 5
    A partir de un precio contenido en la variable precio, muestra el mensaje “caro” si es mayor 
    o igual a 1000, “medio” si el precio está entre 100 y 1000, “barato” si es menor o igual a 100, 
    y “precio negativo” si es negativo.
    */
    echo "<h2>Ejercicio 5</h2>";
    $precio = 500;
    if ($precio >= 1000){
        echo "<p>El precio $precio es caro</p>";
    }else if ($precio >= 100 && $precio < 1000){
        echo "<p>El precio $precio es medio</p>";
    }else if($precio <= 100){
        echo "<p>El precio $precio es barato</p>";
    }else{
        echo "<p>Precio inválido</p>";
    }
    echo "<br>";    

    /* 
    EJERCICIO 6
    Escribe un programa que funcione similar a un reloj, de manera que a partir de los valores de 
    las variables hora, minuto y segundo muestre la hora dentro de un segundo. Ten en cuenta que 
    tras las 23:59:59 serán las 0:0:0.
    */
    echo "<h2>Ejercicio 6</h2>";
    $hour = 23;
    $minute = 59;
    $second = 59;
   
    echo "<p>La hora actuales: $hour:$minute:$second</p>";
    $second++;
    //Si ha llegado a 60 segundo -> Reinicializar los segundo e incrmeentar 1 minuto
    if($second >= 60){
        $minute++;
        $second = 0;
        // Si ha llegado a 60 min -> Reiniciañiozar los minutos e incrementar 1 hora
        if ($minute >= 60){
            $hour++;
            $minute = 0;
            // si ha llegado a 24 horas -> reinicilizar la horas
            if ($hour >= 24){
            $hour = 0;
            }
        }

    }
    echo "<p>Un segundo después es: $hour:$minute:$second</p>";

    /*
    EJERCICIO 7
    Realiza el código que imprima desde el 1 hasta el número que pongas en la variable maximo.
    */
    echo "<h2>Ejercicio 7</h2>";
    $i = 0;
    $max = 20;
    while ($i < $max){
        $i++;
        echo "$i, ";
    }

    /*
    EJERCICIO 8
    Muestra los números del 9 al 15 en una lista desordenada (<ul>). Utiliza un bucle for.
    */
    echo "<h2>Ejercicio 8</h2>";
    echo "<ul>";
    for ($i = 9; $i <= 15; $i++){
        echo"<li>";
        echo "$i";
        echo "</li>";
    }
    echo "</ul>";

    /*
    EJERCICIO 9 
    Realiza un bucle que imprima por pantalla los números pares entre 0 y 10 (incluidos), 
    dentro de un solo párrafo, separados por comas: “0, 2, 4, 6, 8, 10”.
    */
    echo "<h2>Ejercicio 9</h2>";
    echo "<p>";
    for ($i = 0; $i <= 10; $i++){
        if ($i%2 == 0){
            echo "$i, ";
        }
    }
    echo "</p>";

    /*  
    EJERCICIO 10
    Muestra los números del 50 al 20, salvo los múltiplos de 3 y de 7, en una lista ordenada.
    */
    echo "<h2>Ejercicio 10</h2>";
    echo "<ol>";
    for ($i = 50; $i > 20; $i--){
        if($i%3 != 0 && $i%7 !=0){
            echo"<li>";
            echo "$i";
            echo "</li>";
        }
    }
    echo "</ol>";

    /*
    EJERCICIO 11
    Escribe un programa que sume los números desde el 1 hasta el 10. Muestra por pantalla el 
    resultado. Es decir, 1+2+3+4+5+6+7+8+9+10=55. 
    (Con que muestre el resultado, 55, es suficiente).
    */
    echo "<h2>Ejercicio 11</h2>";
    $suma = 0;
    for ($i = 1; $i <= 10; $i++ ){
        $suma += $i;
    }
    echo "<p> La suma del 1 hasta el 10 es = $suma </p>";



    /*
    EJERCICIO 12
    Escribe un programa que dado un número contenido en la variable numero, muestre el 
    factorial del mismo. El factorial es el producto de los números positivos desde 1 
    hasta dicho número. Es decir, el factorial de 5 es 1x2x3x4x5 = 120.
    */
    echo "<h2>Ejercicio 12</h2>";
    $number = 5;
    for ($i = 1; $i < 5; $i++){
        $number *= $i;
    }
    echo "<p> El factorial es  $number </p>";


    /*
    EJERCICIO 13
    Dadas un par de variables base y exponente, muestra por pantalla el resultado de elevar
    la base al exponente. Tienes que utilizar un bucle for para ello. No puedes usar el 
    operador ** ni el método pow().
    */
    echo "<h2>Ejercicio 13</h2>";  // 5⁴ = 625
    $base = 5;
    $exponente = 4;
    



    /*
    EJERCICIO 14
    Reescribe el ejercicio anterior utilizando un bucle while.
    */
    echo "<h2>Ejercicio 14</h2>";




    /*
    EJERCICIO 15
    Declara una variable llamada número. Muestra en una tabla (con bordes) la tabla de 
    multiplicar de dicho número. La primera fila de la tabla es de títulos. Por ejemplo, si numero=7:
    */
    echo "<h2>Ejercicio 15</h2>";

    $number = 7;
    echo "<table border = 1 >
        <tr>
            <th>a</th>
            <th>b</b>
            <th>multiplicacion</th>
        </tr>
        <tr>
            <th> </th>
            <th></th>
            <th></th>
        </tr>
    </table>";


    /*
    EJERCICIO 18
    Crea un programa parecido al anterior, pero que haga una pirámide. 
    En este caso solo tenemos la variable filas. Si filas=5, la salida será:
        *
        *  *
        *  *  *
        *  *  *  *
        *  *  *  *  *
    */
    
    echo "<h2>Ejercicio 18</h2>";

    $files = 5;
    $columns = 1;
    for ($i = 0; $i < $files; $i++){
        for ($j = 0; $j < $columns; $j++){

            echo "* ";
        }
        $columns++;
        echo "<br>";
    }
    echo "<br>";


    /*
    EJERCICIO 19
    Dado un valor en la variable numero, imprime una pirámide como en el ejemplo. 
    Si numero=5, la salida será:
    */
    echo "<h2>Ejercicio 19</h2>";
    $files = 5;
    $columns = 1;
    for ($i = 0; $i < $files; $i++){
        for ($j = 0; $j < $columns; $j++){

            echo $j + 1 ." ";
        }
        $columns++;
        echo "<br>";
    }
    echo "<br>";

    ?>

    <!--
    EJERCICIO 20
    Crea un programa en PHP en un fichero nuevo llamado tablasMultiplicar.php, que llevará 
    asociado una hoja de estilos css llamada tablasMultiplicarEstilos.css. Genera, a través 
    de bucles anidados, una tabla lo más parecida a esta (colores, separaciones entre celdas, etc).
    -->

    <h2>Ejericio 20</h2>
    <table>
        <?php
        for ($i = 0; $i <=10; $i++){
            echo "<tr>";
            for ($j = 0; $j <= 10; $j++){
                //echo "<td></td>"
                if ($i == 0){  // estoy en la primera fila (la de titulo)
                    if ($j == 0) {  // La celda de la posicion 0,0
                        echo "<td class = 'thx'>X</td>";
                    }else{ //Primera fila con números
                        echo "<td class = 'thnumber'>" . $j-1 . "</td>";

                    }
                }else {
                    if ($i == 0){ //Primera columna con números
                        echo "<td class='tdNumber'>" . $i-1 . "</td>";
                    }else{ //Todas las demás celdas: la multiplicación
                        $mult = ($i-1)* ($j-1);
                        echo "<td class= 'normal'>a</td>";
                    }
                }
            }
            echo "</tr>";
        }
        ?>
    </table>




    <?php
    /*
    EJERCICIO 21
    Dada una variable llamada cadena, imprime por pantalla la longitud de dicha cadena.
    A continuaicón, súmale 1 a esa cadena (cadena = cadena +1; o cadena+=1), ¿qué ocurre?
    Pon espacios delante y detrás e investiga un método que elimine estos espacios (esto será
    muy útil en la validación de formularios web, pues es común que la gente meta un espacio
    después de su email, por ejemplo).

    */
    echo "<h2>Ejercicio 21</h2>";
    $cadena = "php";
    $cadena++;
    var_dump($cadena);  // sale phq, es decir, a la ultima letra "se le añade 1", pasa a la siguiente letra del abecedario


    $cadena = " hola ";
    var_dump($cadena);  // 6 porque son 4 letras mas dos espacios
    //Para quitar espacios delante y detrás, función:
    $cadena = trim($cadena);
    var_dump($cadena); // 4 sale esto porque quita los espacios

    ?>
    
</body>
</html>