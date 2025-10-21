<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios 2 y 3</title>
    <link rel="stylesheet" href="tablasMultiplicarEstilos.css">

</head>
<body>
    <h2>Ejercicio 1</h2>
    <?php
    /*
    Declara una variable de cada tipo (int, double, string y boolean) e imprime por pantalla sus valores y sus tipos (utiliza la función gettype para ello).
    Que salga en un formato HTML correcto y legible por personas, algo como "La variable es de tipo integer y tiene valor 5".
    */
    $a = 5;
    $b = 4.5;
    $c = "carol";
    $d = true;

    echo "<p>La varible a es de tipo " . gettype($a) . " y su valor es de $a</p>";
    echo "<p>La varible a es de tipo " . gettype($b) . " y su valor es de $b</p>";
    echo "<p>La varible a es de tipo " . gettype($c) . " y su valor es de $c</p>";
    echo "<p>La varible a es de tipo " . gettype($d) . " y su valor es de $d</p>";
    ?>
    
    <h2>Ejercicio 2</h2>
    <?php
    /*
    Declara dos variables numéricas (a y b), imprime por pantalla el módulo (a mod b) y la potencia (a elevado a b, ab).
    */
    $a = 6;
    $b = 8;
    $modulo = $a % $b;
    $potencia = $a**$b;  //tambien se pued ehacer con pow

    echo "<p>El módulo es de $modulo y la potencia es de $potencia . </p>";
    ?>

    <h2>Ejercicio 3</h2>
    <?php
    /*
    Declara tres variables: nombre, apellidos y nacimiento. Asígnales tus datos e imprímelas por pantalla dentro de una tabla, con bordes, de manera que el resultado sea parecido a esto:
    */
    $nombre = "Carolina";
    $apellidos = "Ruescas Cruz";
    $nacimiento = "1996";

    echo "<table border =1>
            <tr>
                <td>Nombre</td>
                <td>$nombre</td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td>$apellidos</td>
            </tr>
            <tr>
                <td>Año de nacimiento</td>
                <td>$nacimiento</td>
            </tr>
    </table>";
    ?>

    <h2>Ejercicio 4</h2>
    <?php
    /*
    Define una variable llamada edad. Mostrar la edad actual, mostrar la edad que tendrá dentro de 10 años y los años que le quedan para jubilarse (suponiendo que la edad de jubilación es 60). Por ejemplo, si edad=39, muestra un mensaje “Actualmente tienes 39 años, dentro de diez tendrás 49. Te quedan 21 para jubilarte”.
    */

    $edad = 29;
    $despues = $edad + 10;
    $Jubilacion = 60 - $edad;

    echo "<p>Actualmente tienes $edad , dentro de 10 años tendrás $despues. Te quedan $Jubilacion años para jubilarte</p>";
    ?>

    <h2>Ejercicio 5</h2>
    <?php
    /*
    A partir de un precio contenido en la variable precio, muestra el mensaje “caro” si es mayor o igual a 1000, “medio” si el precio está entre 100 y 1000, “barato” si es menor o igual a 100, y “precio negativo” si es negativo.
    */
    $precio = -9;
    if ($precio >= 1000){
        echo "<p>caro</p>";
    }else if($precio < 1000 && $precio >= 100){
        echo "<p>medio</p>";
    }else if($precio <= 100 && $precio >=0){    // para que depsues me salga negativo es necesario poner el limite de cero
        echo "<p>barato</p>";
    }else{
        echo "<p>negativo</p>";
    }
    ?>

    <h2>Ejercicio 6</h2>
    <?php
    /*
    Escribe un programa que funcione similar a un reloj, de manera que a partir de los valores de las variables hora, minuto y segundo muestre la hora dentro de un segundo. Ten en cuenta que tras las 23:59:59 serán las 0:0:0.
    */
    $hora = 12;
    $minuto = 59;
    $segundo = 50;

    echo "<p>La hora actual es $hora:$minuto:$segundo</p>";
    // si quisieramos indicar que tras un segundo la hora seria 13:00:00
    $segundo++;
    // al llegar a los 60 segundos -> Reinicializar los segundos e incrementar 1 min
    if ($segundo >=60){
        $minuto++;
        $segundo =0;
        if($minuto >=60){
            $hora++;
            $minuto = 0;
            if ($hora >=24){
                $hora= 0;
                echo "<p>Un segundo después la hora será" .  $hora . ":" . $minuto . "0:" .  $segundo . "0 </p>";
            }
        }
    }

    echo "<p>Un segundo después la hora será $hora:$minuto:$segundo</p>";
    ?>

    <h2>Ejercicio 7</h2>
    <?php
    /*
    Realiza el código que imprima desde el 1 hasta el número que pongas en la variable maximo.
    */
    $numero = 0;
    $maximo = 10;

    while ($numero < $maximo){
        $numero++;
        echo "$numero, ";
        
    }

    //otra forma de hacerlo
    echo "<br>";
    $max = 10;
    for ($i= 1; $i <= $max; $i++){
        echo "$i, ";
    }
    ?>

    <h2>Ejercicio 8</h2>
    <?php
    /*
    Muestra los números del 9 al 15 en una lista desordenada (<ul>). Utiliza un bucle for.
    */
    echo "<ul>";
    for($i=9; $i <=15; $i++){
        echo "<li>$i</li>";
    }
    echo "</ul>";
    ?>

    <h2>Ejercicio 9</h2>
    <?php 
    /*
    Realiza un bucle que imprima por pantalla los números pares entre 0 y 10 (incluidos), dentro de un solo párrafo, separados por comas: “0, 2, 4, 6, 8, 10”.
    */
    echo "<p>";
    for ($i = 0; $i <= 10; $i++){
        if ($i % 2 == 0){
            echo "$i, ";

        }
    }
    echo "</p>";
    ?>

    <h2>Ejercicio 10</h2>
    <?php
    /*  
    Muestra los números del 50 al 20, salvo los múltiplos de 3 y de 7, en una lista ordenada.
    */
    echo"<ol>";
    for ($i = 50; $i >=20; $i--){   // -- porque va de forma descendente 
        if ($i % 3 != 0  && $i % 7 != 0){
            echo "<li>$i</li>";
        }
    }
    echo "</ol>";

    ?>

    <h2>Ejercicio 11</h2>
    <?php
    /*
    Escribe un programa que sume los números desde el 1 hasta el 10. Muestra por pantalla el resultado. Es decir, 1+2+3+4+5+6+7+8+9+10=55. (Con que muestre el resultado, 55, es suficiente).
    */
    $suma = 0;
    for ($i = 1; $i <= 10; $i++){
        $suma += $i;
    }

    echo "<p>La suma del 1 al 10 es: $suma</p>"
    ?>

    <h2>Ejercicio 12</h2>
    <?php
    /*
    Escribe un programa que dado un número contenido en la variable numero, muestre el factorial del mismo. El factorial es el producto de los números positivos desde 1 hasta dicho número. Es decir, el factorial de 5 es 1x2x3x4x5 = 120.
    */
    $numero = 5;
    $factorial =1;
    for ($i = 1; $i < $numero; $i++){   //para que salga el resultado hay que poner <= , si ponemos solo < recorre hasta 4 y da 24
        $factorial *= $i;
    }

    echo "<p>El factorial es $factorial.</p>"
    ?>

    <h2>Ejercicio 13</h2>
    <?php
    /*
    Dadas un par de variables base y exponente, muestra por pantalla el resultado de elevar la base al exponente. Tienes que utilizar un bucle for para ello. No puedes usar el operador ** ni el método pow().
    */
    $base = 4;
    $exponente = 3;
    $potencia = 1;  //importante que inicie n 1 porque s donde se van a ir guardando las iteraciones

    for($i = 0; $i < $exponente ; $i++ ){
        $potencia *= $base;
        
    }
    echo "<p>El resultado de tener como base $base y de exponente $exponente es $potencia .<p>";

    ?>

    <h2>Ejercicio 14</h2>
    <?php
    /*
    Reescribe el ejercicio anterior utilizando un bucle while.
    */
    $base = 4;
    $exponente = 3;
    $potencia = 1;  //acumulador
    $num =0;   // contador bucle

    while($num < $exponente){
        $potencia *= $base;
        $num++; //incrementa el numero en uno para que se cuente una vuelta del bucle
    }
    echo "<p>Si elevamos $base a $exponente el resultado es $potencia. </p>"
    ?>

    <h2>Ejercicio 15</h2>
    <?php
    /*
    Declara una variable llamada numero. Muestra en una tabla (con bordes) la tabla de multiplicar de dicho número. La primera fila de la tabla es de títulos. Por ejemplo, si numero=7:
    */
    $numero = 2;

    echo "<table border =1>
            <tr>
                <td>a</td>
                <td>b</td>
                <td>resultado</td>
            </tr>";

    for($i = 0; $i <= 10; $i++){
        echo "<tr>
                <td>$numero </td>
                <td>$i </td>
                <td>" . $numero * $i . "</td>
            </tr>";
    }

    echo "</table>";


    ?>

    <h2>Ejercicio 16</h2>
    <?php
    /*
    Crea un programa que imprima 20 cifras de la secuencia Fibonacci, separados por comas, en un mismo párrafo todos ellos.
    Fibonacci es una secuencia de números donde cada termino es la suma de los dos anteriores
    */
    $valorAnterior = 0;  //numero actual que se va a imprimir
    $valorSiguiente = 1;  //numero siguiente de la secuencia 

    echo "<p>";
    for($i = 0; $i < 20 ; $i++){
        echo "$valorAnterior, ";
        $aux = $valorSiguiente;  // se declara una nueva variable temporal para que se guarde el nuevo valor del numero 
        $valorSiguiente += $valorAnterior;
        $valorAnterior = $aux;
    }
    echo "</p>";
    ?>

    <h2>Ejercicio 17</h2>
    <?php
    /*
    Crea un programa que dados los valores de dos variables, filas y columnas, imprima una matriz con tantas filas y columnas como digan dichas variables con el símbolo *. Por ejemplo, si filas=3 y columnas=5, la salida debería ser:

    * * * * *
    * * * * *
    * * * * *

    */

    $filas = 3;
    $columnas = 5;

    for ($i = 0; $i < $filas; $i++){
        for ($j = 0; $j < $columnas; $j++){
            echo "* ";
        }
        echo "<br>";    //poner este br bien para que se bajen las filas en cada vuelta del bucle for
    }
    ?>

    <h2>Ejercicio 18</h2>
    <?php
    /*
    Crea un programa parecido al anterior, pero que haga una pirámide. En este caso solo tenemos la variable filas. Si filas=5, la salida será:

    *
    *  *
    *  *  *
    *  *  *  *
    *  *  *  *  *

    */
    $filas = 5;
    $columnas = 1;

    for ($i = 0; $i < $filas; $i++){
        for ($j = 0; $j < $columnas; $j++){
            echo "* ";
        }
        $columnas++;
        echo "<br>";    
    }

    ?>

    <h2>Ejercicio 19</h2>
    <?php
    /*
    Dado un valor en la variable numero, imprime una pirámide como en el ejemplo. Si numero=5, la salida será:
    1
    1  2
    1  2  3
    1  2  3  4
    1  2  3  4  5
    */

    $filas = 5;
    $columnas = 1;

    for ($i = 0; $i < $filas; $i++){
        for ( $j = 0; $j < $columnas; $j++){
            echo $j + 1  . " ";
        }
        $columnas++;
        echo "<br>";
    }

    ?>

    <h2>Ejercicio 20</h2>
    <!-- Crea un programa en PHP en un fichero nuevo llamado tablasMultiplicar.php, que llevará asociado una hoja de estilos css llamada tablasMultiplicarEstilos.css. Genera, a través de bucles anidados, una tabla lo más parecida a esta (colores, separaciones entre celdas, etc).-->

    <table>
        <?php
        for ( $i = 0; $i <= 10; $i++){
            echo "<tr>";
            for ($j = 0; $j <= 10; $j++){
                if ($i == 0){
                    if ( $j== 0){
                        echo "<th class='thx'>X</th>";
                    }else{
                        echo "<th class = 'thnumber'>". $j - 1 . "</th>";
                    }
                }else{
                    if ($j == 0){
                        echo "<td class = 'tdnumber'>" . $i - 1 . "</td>";
                    }else{
                        $multiplicacion = ($i - 1) * ($j - 1 );
                        echo "<td class ='normal'>$multiplicacion</td>";
                    }
                }

            }
            echo "</tr>";
        }

        ?>
    </table>

    <h2>Ejercicio 21</h2>
    <?php
    /*
    Dada una variable llamada cadena, imprime por pantalla la longitud de dicha cadena.
    A continuaicón, súmale 1 a esa cadena (utilizando ++), ¿qué ocurre?
    Pon espacios delante y detrás e investiga un método que elimine estos espacios (esto será muy útil en la validación de formularios web, pues es común que la gente meta un espacio después de su email, por ejemplo).
    */

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