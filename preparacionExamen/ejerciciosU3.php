<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios Arrays</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <?php
    /*
    Crea el array aleatorios, que contenga 20 números aleatorios entre 10 y 50. Muestra por pantalla el contenido de dicho array dentro de un párrrafo (<p>) y con los números separados por comas.
    Pista: investiga una función de PHP que devuelve números aleatorios.    
    */
    $aleatorio = [];
    for($i = 0; $i < 20; $i++) {
        $aleatorio[] = rand(10, 50);         //para indicar que el random va del 10 al 50
    }
    echo "<p>" . implode(", ", $aleatorio) . "</p>";   //utilizamos implode para convertir un array en una cadena de texto y pode rimprimirla.
    ?>
    
    <h2>Ejercicio 2</h2>
    <?php
    /*
    Utilizando el array aletorios generado antes, imprime:
    La suma de todos los elementos.
    La media aritmética.
    El máximo y el mínimo.
    */
    $suma = 0;

    for ($i = 0; $i < count ($aleatorio); $i++) {
        $suma += $aleatorio [$i];
    }

    echo "<p> La suma de todos los números es $suma .</p>";

    $media = $suma / count($aleatorio);
    echo "<p>La media de los 20 número aleatorio es de $media .</p>";

    $valorMaximo = max($aleatorio);
    echo "<p>El valor máximo del array aleatorio es $valorMaximo</p>";

    $valorMinimo = min($aleatorio);
    echo "<p>El valor mínimo del array aleatorio es $valorMinimo</p>";
    ?>

    <h2>Ejercicio 3</h2>
    <?php
    /*
    Mediante un array asociativo, almacena el nombre y la altura de 5 personas (nombre => altura). Posteriormente, recorre el array y muéstralo en una tabla HTML donde la primera columna tiene los nombres y la segunda las alturas correspondientes. Finalmente añade una última fila a la tabla con la altura media.
    */

    $informacion = [
        "carolina" => 1.68,
        "yolanda" => 1.56,
        "juan" => 1.72,
        "ares" => 1.92,
        "yoli" => 1.66
    ];

    $suma = 0;

    echo "<table border =1>
            <tr>
                <th>NOMBRE</th>
                <th>ALTURA</th>
            </tr>";
        foreach( $informacion as $nombre => $altura){
            $suma += $altura;
            echo "<tr>
                <td>$nombre</td>
                <td>$altura</td>
            </tr>";
        }
        $media = $suma /count($informacion);  //con el count hace refenrencia a todos los elementos dentro del array
        echo "<tr>
        <td colspan= '2'> La media es de  $media</td>
        </tr>";
    echo "</table>";

    ?>

    <h2>Ejercicio 4</h2>
    <?php
    /*
    Define tres arrays de 10 números enteros cada uno, con nombres numeros, cuadrados y cubos. Inicializa el array numeros con valores aleatorios entre 0 y 100. En el array cuadrados se deben almacenar los cuadrados de los valores que hay en el array numeros; y en el array cubos se deben almacenar los cubos. A continuación, muestra el contenido de los tres arrays dispuestos en tres columnas (con los headers "valor", "cuadrado" y "cubo").
    */

    $numeros = [];
    $cuadrados = [];
    $cubos = [];

    for ($i = 0; $i < 10 ; $i++){
        $numeros [] = rand (0,100);
        $cuadrados[] = $numeros[$i] ** 2;
        $cubos[] = $numeros[$i] ** 3;
    }
    echo "<table border =1>
        <tr>
            <th>Valor</th>
            <th>Cuadrado</th>
            <th>Cubo</th>
        </tr>";

        for($i = 0; $i < count($numeros); $i++){
            echo "<tr>
                <td>$numeros[$i]</td>
                <td>$cuadrados[$i]</td>
                <td>$cubos[$i]</td>
            </tr>";
        }
    echo "</table>";

    //Otra forma de hacerlo

    for($i = 0; $i < 10; $i++){
        $numeros[] = rand(0, 100);
    }

    for ($i = 0; $i < count($numeros); $i++){
        $a = $numeros[$i] ** 2;  //declaramos una variable temporal para hacer el elevador a cada elemento del array
        $cuadrados[] = $a;
    }

     for ($i = 0; $i < count($numeros); $i++){
        $b = $numeros [$i]** 3;
        $cubos[] = $b;
    }
    ?>

    <h2>Ejercicio 5</h2>
    <?php
    /*
    Crea tres arrays indexados, uno de strings llamado alumnado, otro de doubles llamado notas, y otro de booleans llamado matriculas (es muy recomendable no utilizar tildes, ñ, ni otros caracteres no ASCII en los nombres de variables). Cada array contiene 4 elementos. A continuación muestra en una lista no ordenada (<ul>) toda la información, de manera que se vea, por ejemplo (los valores subrayados se sacan de la información contenida en los arrays):
           · Fátima tiene un 7.8 y sí está matriculade.
           · Alberto tiene un 4.1 y sí está matriculade.
           · Amir tiene un 6.8 y no está matriculade.
    */

    $alumnos = array("Fatima", "Alberto", "Amir", "Carolina");
    $notas = array(7.8, 4.1, 6.8, 7.4);
    $matriculas = array(true, true, false, true);

    echo "<ul>";
    for ($i = 0; $i < count($alumnos); $i++){
        $matriculado = $matriculas[$i] ? "si" : "no";

        echo "<li>$alumnos[$i] tiene un $notas[$i] y $matriculado está matriculado.</li>";
    }
    echo "</ul>";
    ?>

    <h2>Ejercicio 6</h2>
    <?php
    /*
    Genera un array asociativo en el que las claves serán los meses del año, y los valores las temperaturas máximas de dicho mes en Madrid en 2023 (para ver los valores, puedes verlo en la web del Ayuntamiento). A continuación, muestra la información en una tabla como la siguiente, con los meses en la primera fila y las temperaturas correspondientes en la siguiente:
    */
    $calendario = [
        "Enero" => 14.8,
        "Febrero" => 19,
        "Marzo" => 25.2,
        "Abril" => 30.9,
        "Mayo" => 29.1,
        "Junio" => 37,
        "Julio" => 38.7,
        "Agosto" => 40,
        "Septiembre" => 31.6,
        "Octubre" => 30.1,
        "Novimebre" => 18.6,
        "Diciembre" => 13.1
    ];

    echo "<table border =1>";
    echo "<tr>";
        foreach($calendario as $mes => $temperatura){
            echo "<td>$mes</td>";
        }
    echo "</tr>";
    echo "<tr>";
        foreach($calendario as $mes => $temperatura){
            echo "<td>$temperatura</td>";
        }
    echo "</tr>";
    echo "</table>";

    echo "<br>";

    // Otra forma de hacerlo
    echo "<table border=1><tr>";
    foreach (array_keys($calendario) as $m) {
        echo "<td>$m</td>";
    }
    echo "</tr><tr>";
    foreach ($calendario as $t) {
        echo "<td>$t</td>";
    }
    echo "</tr></table>";
    ?>

    <h2>Ejercicio 7</h2>
    <?php
    /*
    Con los mismos valores que antes, realiza una tabla de manera que los meses se muestren en la primera columna, y después una simulación de gráfica en la que cada "-" representa 1ºC de la temperatura. Quedaría así:

    Enero	---------------
    Febrero	-------------------
    Marzo	--------------------------
    Abril	-------------------------------
    Mayo	------------------------------
    Junio	-------------------------------------
    Julio	---------------------------------------
    Agosto	----------------------------------------
    Septiembre	--------------------------------
    Octubre	-------------------------------
    Noviembre	-------------------
    Diciembre	--------------
    */

    $calendario = [
        "Enero" => 14.8,
        "Febrero" => 19,
        "Marzo" => 25.2,
        "Abril" => 30.9,
        "Mayo" => 29.1,
        "Junio" => 37,
        "Julio" => 38.7,
        "Agosto" => 40,
        "Septiembre" => 31.6,
        "Octubre" => 30.1,
        "Novimebre" => 18.6,
        "Diciembre" => 13.1
    ];

    echo "<table border=1>";
    foreach($calendario as $mes => $temperatura){
        echo "<tr>
                <td>$mes</td>";
                $temp = round($temperatura);
                $grafico = str_repeat('-' , $temp);
                echo "<td>$grafico</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";

    //Otra forma de hacerlo
    echo "<table border=1>";
    foreach ($calendario as $m => $t) {
        echo "<tr><td>$m</td><td>";
        for ($i = 0; $i < $t; $i++) {
            echo "-";
        }
        echo "</td></tr>";
    }

    echo "</table>";
    ?>
    
    <h2>Ejercicio 8</h2>
    <?php
    /*
    A continuación, siguiendo con la misma temática, tendrás que crear un array asociativo bidimensional. La estructura será la siguiente: las claves seguirán siendo los meses, y los valores serán un array indexado con la termperatura máxima en la posición 0, y la temperatura mínima en la posición 1. De nuevo, estos valores están en la web del Ayuntamiento. Muestra la información en una tabla como la siguiente:
    */
    $tempMaxMin = [
        "Enero" => [14.8 , -1.8],
        "Febrero" => [19, -1.8],
        "Marzo" => [25.2, -1.6],
        "Abril" => [30.9, 5.1],
        "Mayo" => [29.1, 8.3],
        "Junio" => [37, 13.4],
        "Julio" => [38.7, 17.4],
        "Agosto" => [40, 15.1],
        "Septiembre" => [31.6, 10.7],
        "Octubre" => [30.1, 7.5],
        "Novimebre" => [18.6, 3],
        "Diciembre" => [13.1, -0.2]
    ];

    echo "<table border = 1 >";
    foreach($tempMaxMin as $mes => $temperaturas){
        echo "<tr>
            <th>Mes</th>
            <th>Máx</th>
            <th>Min</th>
        </tr>";
        echo "<tr>
            <td>$mes</td>
            <td>$temperaturas[0]</td>
            <td>$temperaturas[1]</td>
        </tr>";
    }

    echo "</table>";

    ?>

    <h2>Ejercicio 9</h2>
    <?php
    /*
    Realiza un programa que escoja al azar 10 cartas de la baraja y que diga cuántos puntos suman según el juego de la brisca (los ases valen 11, los treses 10, las sotas 2, los caballos 3, los reyes 4, todas las demás 0). Emplea un array asociativo para obtener los puntos a partir del nombre de la figura de la carta.
    Pista: utiliza todos los arrays que necesites (uno de palos, otro de numeros, otro de puntos, otro en el que vayas guardando las cartas que han salido... ¡todos los que necesites!)
    */

    $palos = [
        "Oros",
        "Bastos",
        "Espadas",
        "Copas"
    ];

    $cartas = [
        "As" => 11,
        "Dos" => 0,
        "Tres" => 10,
        "Cuatro" => 0, 
        "Cinco" => 0,
        "Seis" => 0,
        "Siete" => 0,
        "Sota" => 2,
        "Caballo" => 3,
        "Rey" => 4
    ];

    $puntos = 0;
  
    $keys = array_keys($cartas);


    //generamos 10 cartas aleatorias
    for($i = 0; $i < 10; $i++){
        //indicamos menos uno para que no me genere uno más, sino que solo haga 4 porque empieza en la posición 0. 
        $p = random_int(0, count($palos) -1 );  
        $c = random_int(0, count($cartas) -1);

        $nombreCarta = $keys[$c];
        $valorCarta = $cartas[$nombreCarta];
        
    }



    



    ?>




</body>
</html>