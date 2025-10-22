<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios Unidad 3 Arrays</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Crea el array aleatorios, que contenga 20 números aleatorios entre 10 y 50. 
    Muestra por pantalla el contenido de dicho array dentro de un párrrafo y con los 
    números separados por comas.
    Pista: investiga una función de PHP que devuelve números aleatorios.</p>
    <?php
    $aleatorios = [12,13,14,15,16,17,18,19,20,30,35,36,37,40,43,44,45,46,48,49];
    echo"<p>";
    for($i = 0; $i < 21; $i++) {
        $numAleatorio = random_int(10, 50);
        echo $numAleatorio . " , ";
    }
    echo "</p>";

    //Otra forma
    /* for($i = 0; $i < 21; $i++){
        $numAleatorio2[] = random_int(10, 50);
    }
    echo "<p>" .implode("," ,$aleatorios). "</p>";
    */
    ?>

    <h2>Ejercicio 2</h2>
    <p>Utilizando el array aletorios generado antes, imprime</p>    
        <ol>
            <li>La suma de todos los elementos.</li>
            <li>La media aritmética.</li>
            <li>El máximo y el mínimo.</li>
        </ol>
    <?php
    $sum = 0;
    for($i = 0; $i < count($aleatorios); $i++){
        $sum += $aleatorios[$i];
    }
    echo "<p> La suma del array es : " . $sum . "</p>";

    $media = $sum /count($aleatorios);
    echo "<p> La media del array es : " . $media . "</p>";

    $valorMinimo = min($aleatorios);
    echo "<p> El valor mínimo del array es : " . $valorMinimo . "</p>";

    $valorMaximo = max($aleatorios);
    echo "<p>El valor máximo del array es : " . $valorMaximo . "</p>";
    ?>

    <h2>Ejercicio 3</h2>
    <p>Mediante un array asociativo, almacena el nombre y la altura de 5 personas 
    (nombre => altura). Posteriormente, recorre el array y muéstralo en una tabla 
    HTML donde la primera columna tiene los nombres y la segunda las alturas 
    correspondientes. Finalmente añade una última fila a la tabla con la altura media.</p>
    <?php
    $arrayAsociativo = [            //preguntar a sete si en los asociativos vale poner () o [].
        "Carolina" => "168",
        "Ares" => "189",
        "Yolanda" => "166",
        "Juan" => "172",
        "Ruben" => "175"
    ];

    echo "<table border =1>";
    echo "<tr>
            <td>Persona</td>
            <td>Altura</td>
        </tr>";

    $sumAlturas = 0;
    foreach($arrayAsociativo as $personas => $altura){
        $sumAlturas += $altura;

      echo "<tr>";  
        echo "<td>$personas</td>";
        echo "<td>$altura</td>";
      echo "</tr>";
    
    }

    $mediaAlturas = $sumAlturas / count($arrayAsociativo);
    echo "<tr>";
        echo "<td>Media de alturas</td>";
        echo "<td>$mediaAlturas</td>";
     echo "</tr>";

    echo "</table>";
   
    ?>



    <h2>Ejercicio 4</h2>
    <p>Define tres arrays de 10 números enteros cada uno, 
    con nombres numeros, cuadrados y cubos. Inicializa el array numeros con valores 
    aleatorios entre 0 y 100. En el array cuadrados se deben almacenar los cuadrados 
    de los valores que hay en el array numeros; y en el array cubos se deben almacenar 
    los cubos. A continuación, muestra el contenido de los tres arrays dispuestos en 
    tres columnas (con los headers "valor", "cuadrado" y "cubo").</p>
    <?php


    for ($i= 1; $i <= 10; $i++){
        $numero[] = random_int(0,100);
    }
    echo "<p>" .implode(" , " , $numero)."</p>";

    for ($i = 0; $i < count($numero); $i++){
       $a = $numero[$i]**2;
       $cuadrado [] = $a;
    }
    echo "<p>" .implode(" , " , $cuadrado)."</p>";  

    for ($i = 0; $i < count ($numero);$i++){
        $b = $numero[$i]**3;
        $cubo[] = $b;
    }
    echo "<p>" . implode(" , " , $cubo). "</p>";
    ?>


    <h2>Ejercicio 5</h2>
    <p>Crea tres arrays indexados, uno de strings llamado alumnado, otro de doubles llamado notas, 
    y otro de booleans llamado matriculas (es muy recomendable no utilizar tildes, ñ, ni otros 
    caracteres no ASCII en los nombres de variables). Cada array contiene 4 elementos. 
    A continuación muestra en una lista no ordenada toda la información, de manera 
    que se vea, por ejemplo (los valores subrayados se sacan de la información contenida 
    en los arrays):</p>
    <ol>
        <li>Fátima tiene un 7.8 y sí está matriculade.</li>
        <li>Alberto tiene un 4.1 y sí está matriculade.</li>
        <li>Amir tiene un 6.8 y no está matriculade</li>
        <li>...</li>
    </ol>
    <?php
    $alumnado = array("Carolina", "Yolanda", "Ares", "Ruben", "Juan");
    $notas = array(4.5 , 5.9, 8.7 , 9.2, 6.8);
    $bolean = array (true, true, false, true, false);

    echo "<ul>";

    for ($i = 0; $i < 5; $i++){
        $matricula = $bolean[$i] ? "si" : "no";   //esto es para convertir un booleano en String
        echo "<li>" . $alumnado[$i] . " tiene un " . $notas[$i] . " y " . $matricula . " está matriculado</li>";
        }
    
    echo "</ul>";
    ?>

    <h2>Ejercicio 6</h2>
    <p>Genera un array asociativo en el que las claves serán los meses del año, y los valores las
    temperaturas máximas de dicho mes en Madrid en 2023 (para ver los valores, puedes verlo
    en la web del Ayuntamiento). A continuación, muestra la información en una tabla como 
    la siguiente, con los meses en la primera fila y las temperaturas correspondientes en 
    la siguiente:</p>
    <?php
    $madrid = [
        "Enero" => 14.8,
        "Febrero"=> 19,
        "Marzo"=> 25.2,
        "Abril"=> 30.9,
        "Mayo"=> 29.1,
        "Junio"=> 37,
        "Julio"=> 38.7,
        "Agosto"=> 40,
        "Septiembre"=> 31.6,
        "Octubre"=> 30.1,
        "Noviembre"=> 18.6,
        "Diciembre" => 13.1
    ];

    echo "<table border = 1>";
    
    echo "<tr>";
    foreach ($madrid as $mes => $temperatura){
        echo "<td>$mes</td>";
    }
    echo "</tr>";

    echo "<tr>";
    foreach ($madrid as $mes => $temperatura){
        echo "<td>$temperatura</td>";
    }
    echo "</tr>";
    echo "</table>";

    ?>

    <h2>Ejercicio 9</h2>
    <p>Realiza un programa que escoja al azar 10 cartas de la baraja y que diga 
    cuántos puntos suman según el juego de la brisca (los ases valen 11, 
    los treses 10, las sotas 2, los caballos 3, los reyes 4, todas las demás 0). 
    Emplea un array asociativo para obtener los puntos a partir del nombre de la 
    figura de la carta.
    Pista: utiliza todos los arrays que necesites (uno de palos, otro de numeros,
    otro de puntos, otro en el que vayas guardando las cartas que han salido... 
    ¡todos los que necesites!)</p>
    <?php

    $palos = array (
        "oro",
        "bastos",
        "espadas",
        "copas"
    );

    $cartas = [
        "As" => 11,
        "2"=> 0,
        "3"=> 10,
        "4"=> 0,    
        "5"=> 0,
        "6"=> 0,
        "7" => 0,
        "sota" => 2,
        "caballo" => 3,
        "rey" => 4
    ];

    $puntos = 0;

    $keys = array_keys($cartas);

    for ($i = 0; $i < 10; $i++){
        $p = random_int(0, count ($palos) -1);    // se le pone -1 para que el random no me genere otro número más sino que vaya del 0 al 3 que son las 4 opciones de palos que tengo
        $c = random_int(0, count ($cartas) -1); 

        $nombreCarta = $keys[$c];   // Ej: "As" Muestra el nombre de la carta conviertiendose en otro array con sus valores
        
        $valorCarta = $cartas[$nombreCarta]; // Ej: "11" Muestra el valor del array que hemos creado anteiormente, es decir, nos da el numero del array cartas
        
        $palo = $palos[$p]; //  Ej: "copas" muestra los palos (1º array creado)
        
        $puntos += $valorCarta; // pues te suma los puntos de las 10 cartas que salen al azar

        echo "<ul><li>";
        echo $nombreCarta . " tiene un valor de " . $valorCarta . " puntos, del palo " . $palo . ". ";
        echo "</li></ul>";

    }

    echo "El total de puntos es " . $puntos . " .";

    // OPCIÓN DE KELVIS
    // Una vez creados los arrays lo que hace es crear un último array para que los valores guarden la posición, es decir, justo antes de $puntos += valorCarta;
    //  $cartaFinal = [$valorCarta, $palo, $puntos];
    // y una vez que tenemos ese array fuera del for se haria un foreach para recorrer dicho array y mostras los valores
    // foreach ($cartaFinal as $k){
    //      echo "$k";
    // }
    // echo "<p>$k[0] tiene $k[2] y es del palo $k[1]</p>;
    ?>

    <h3>Ejercicio 10</h3>
    <p>Modifica el juego anterior para asegurarte de que no se repite ninguna carta, igual que
    si las hubieras cogido de una baraja de verdad.</p>
    <?php

    $palos = array (
        "oro",
        "bastos",
        "espadas",
        "copas"
    );

    $cartas = [
        "As" => 11,
        "2"=> 0,
        "3"=> 10,
        "4"=> 0,    
        "5"=> 0,
        "6"=> 0,
        "7" => 0,
        "sota" => 2,
        "caballo" => 3,
        "rey" => 4
    ];

    $puntos = 0;
    $jugada = [];
    $cartasUsadas = [];
    $keys = array_keys($cartas);

    for ($i = 0; $i < 10; $i++){
        $p = random_int(0, count ($palos) -1); 
        $c = random_int(0, count ($cartas) -1); 
        $nombreCarta = $keys[$c];   
        $palo = $palos[$p]; 
        $cartaUnica = $nombreCarta;

        if (in_array($cartaUnica, $cartasUsadas) ){
            $i--;   //esto se utiliza por si se repite la iteracion no valdria y voleria a hacerlo ¡Truquito!
        }else{
        $cartasUsadas[] = $cartaUnica;
        $valorCarta = $cartas[$nombreCarta];
        $puntos += $valorCarta;

        echo "<ul><li>";
        echo $cartaUnica . " de " . $palo .  " tiene un valor de " . $valorCarta . ". ";
        echo "</li></ul>";
        }

    }
    echo "El total de puntos es " . $puntos . " .";
    ?>

    <h3>Ejercicio 11</h3>
    <p>Crea un minidiccionario castellano-inglés que contenga, al menos, 10 palabras (con su traducción). 
    Utiliza un array asociativo para guardar las parejas de palabras. A continuación, muestra aleatoriamente 
    (rand()) una palabra en castellano y su traducción al inglés.</p>
    <?php
        $diccionario = [
            "coche" => "car",
            "flor" => "flower",
            "hola" => "hello",
            "raton" => "mouse",
            "cama" => "bed",
            "silla" => "chair",
            "amor" => "love",
            "ordenador" => "computer",
            "portatil" => "laptop",
            "ventana" => "window"
        ];

        $palabras = array_keys($diccionario);

        //para elegir una palabra aleatoria
        $aleatorio = rand(0, count ($palabras) -1);
        $palabraEspañol = $palabras[$aleatorio];
        $palabraIngles = $diccionario[$palabraEspañol];
    
        echo "<p>La palabra $palabraEspañol  en ingles es $palabraIngles </p>";
    ?>

    <h3>Ejericicio 12</h3>
    <p>Crea un array bidimensional de 10 filas y 10 columnas y rellénalos con números aleatorios entre 0 y 500. 
    Asegúrate de que ningún número se repite. Imprime el contenido del array bidimensional en una "<"table>"</p>
    <?php

    //Creamos el array con todos los número del 0 al 500 y despues usamos el suffle para que no vayan en orden
    $numerosDisponibles = range(0,500);
    shuffle($numerosDisponibles);

    //Como van a ser 10 filas con 10 columnas vamos a coger de sas 500 opciones solo 100 (10x10)
    //array_slice hace que no se repitan lo números
    $numerosSeleccionados = array_slice($numerosDisponibles, 0, 100);

    // Crear array bidimensional 10x10 y rellenar con esos números
    $matriz = [];
    $contador = 0;
    for ($i= 0; $i < 10; $i++) {            //mi $i son las filas
        for ($j = 0; $j < 10; $j++) {       // mi $j son las columnas
            $matriz[$i][$j] = $numerosSeleccionados[$contador];
            $contador++;
        }
    }

    echo "<table border='1' cellpadding='5' cellspacing=''>";
    for ($i = 0; $i < 10; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 10; $j++) {
            echo "<td>" . $matriz[$i][$j] . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
    ?>

    <h3>Ejercicio 13</h3>
    <p>
    Dado el array que hay a continuación, haz e imprime los resultados de las siguientes operaciones:
    $estudiantes = [
        ["nombre" => "Ana García", "matematicas" => 8.5, "historia" => 7.0, "programacion" => 9.0],
        ["nombre" => "Luis Martínez", "matematicas" => 6.0, "historia" => 8.5, "programacion" => 7.5],
        ["nombre" => "Marta Rodríguez", "matematicas" => 9.0, "historia" => 6.5, "programacion" => 8.0],
        ["nombre" => "Carlos López", "matematicas" => 7.5, "historia" => 9.0, "programacion" => 6.5],
        ["nombre" => "Elena Torres", "matematicas" => 8.0, "historia" => 7.5, "programacion" => 9.5]
    ]; 

    1. Calcular el promedio de cada estudiante y agregarlo al array.
    2. Encontrar a le estudiante con el promedio más alto
    3. Contar cuántes estudiantes aprobaron cada materia (nota >= 7)
    4. Crear un array con la nota máxima por materia
    5. Ordenar estudiantes por promedio de forma descendente
    </p>

    <?php
    $estudiantes = [
        ["nombre" => "Ana García", "matematicas" => 8.5, "historia" => 7.0, "programacion" => 9.0],
        ["nombre" => "Luis Martínez", "matematicas" => 6.0, "historia" => 8.5, "programacion" => 7.5],
        ["nombre" => "Marta Rodríguez", "matematicas" => 9.0, "historia" => 6.5, "programacion" => 8.0],
        ["nombre" => "Carlos López", "matematicas" => 7.5, "historia" => 9.0, "programacion" => 6.5],
        ["nombre" => "Elena Torres", "matematicas" => 8.0, "historia" => 7.5, "programacion" => 9.5]
    ];

    /*1. Calcular el promedio de cada estudiante y agragarlo al array */
    //En el foreach ponemos en esta caso el & porque es una forma de agregarlo en el array el nuevo elemento de forma permanente
    foreach ($estudiantes as &$estudiante) {
        $promedio = ($estudiante["matematicas"] + $estudiante["historia"] + $estudiante["programacion"]) /3;
        /*Agregamos un nuevo elemento al array aosciativo con la clave "promedio" */
        $estudiante["promedio"] = round($promedio, 2); /*el round redondea el valor y al poner el 1 hace que lo redondee a un decimal)   */
    }
    //Imprimir los resultados 
    foreach($estudiantes as $estudiante) {
        echo "Nombre: " . $estudiante["nombre"] . "<br>";
        echo "Matemáticas: " . $estudiante["matematicas"] . "<br>";
        echo "Historia: " . $estudiante["historia"] . "<br>";
        echo "Programación: " . $estudiante["programacion"] . "<br>";
        echo "Promedio: " . $estudiante["promedio"] . "<br>";
        echo "<br><br>";
    }


    /*2.Encontrar a le estudiante con el promedio más alto */
    //Vamos a asumir que el primero es el mejor para empezar a comparar
    $mejorEstudiante = $estudiantes[0];

    foreach($estudiantes as &$estudiante) {
        if ($estudiante["promedio"] > $mejorEstudiante ["promedio"] ){
            $mejorEstudiante = $estudiante;
        } 
    }
    //Mostramos el resultado
    echo "EL estudiante con el promedio más alto es " . $mejorEstudiante["nombre"] . "<br>";
    echo "Su promedio es: " . $mejorEstudiante["promedio"] . "<br>";



    /*3. Contar cuántes estudiantes aprobaron cada materia (nota >= 7)*/
    $count = 0;
    
    // Recorremos con un for tradicional
    for ($i = 0; $i < count($estudiantes); $i++) {
        if ($estudiantes[$i]["matematicas"] >= 7) {
            if ($estudiantes[$i]["historia"] >= 7){
                if ($estudiantes[$i]["programacion"] >= 7){
                    $count++;
                    
                }
            }
        }
    }
    

    echo "El número de estudiantes que han aprobado todas las asignaturas con un 7 o más son:" . $count . "<br>";

    /*4. Crear un array con la nota máxima por materia   */
    $notaMaxima = [];
    $maxH = 0;
    $maxM = 0;
    $maxP = 0;

    for ($i = 0; $i < count($estudiantes); $i++) {
        if ($estudiantes[$i]["matematicas"] > $maxM){
            $maxM = $estudiantes[$i]["matematicas"];
        }
        if ($estudiantes[$i]["historia"] > $maxH){
            $maxH = $estudiantes[$i]["historia"];
        }
        if ($estudiantes[$i]["programacion"] > $maxP){
            $maxP = $estudiantes[$i]["programacion"];
        }

        $notaMaxima ["matematicas"] = round($maxM);
        $notaMaxima["historia"] = round($maxH);
        $notaMaxima["programacion"] = round($maxP);
    }

    echo "La nota máxima de matemáticas es un " . $notaMaxima["matematicas"] . " ,la de historia es un " .  $notaMaxima["historia"] . " , y la de programación es un  " . $notaMaxima["programacion"] . "<br>";
    echo "<br>";

    /*5. Ordenar estudiantes por promedio de forma descendente   */

    // Usamos usort con una función de comparación
    usort($estudiantes, function($a, $b) {
        return $b["promedio"] <=> $a["promedio"]; // Descendente
    });

    // Mostrar resultados
    echo "Estudiantes ordenados por promedio (descendente):<br>";
    foreach ($estudiantes as $estudiante) {
        echo $estudiante["nombre"] . " - Promedio: " . $estudiante["promedio"] . "<br>";
    }
    ?>

    <h3>Ejercicio 14</h3>
    <p>Dado el siguiente array, haz:
    $hotel = [
        "habitaciones" => [
            101 => ["tipo" => "individual", "precio" => 50, "ocupada" => false, "dias_ocupada" => 0],
            102 => ["tipo" => "doble", "precio" => 80, "ocupada" => true, "dias_ocupada" => 3],
            103 => ["tipo" => "suite", "precio" => 150, "ocupada" => false, "dias_ocupada" => 0],
            201 => ["tipo" => "individual", "precio" => 50, "ocupada" => true, "dias_ocupada" => 5],
            202 => ["tipo" => "doble", "precio" => 80, "ocupada" => false, "dias_ocupada" => 0],
            203 => ["tipo" => "suite", "precio" => 150, "ocupada" => true, "dias_ocupada" => 2]
            ],
        "reservas" => [
            ["habitacion" => 102, "cliente" => "Juan Pérez", "dias" => 3],
            ["habitacion" => 201, "cliente" => "María López", "dias" => 5],
            ["habitacion" => 203, "cliente" => "Carlos Ruiz", "dias" => 2]
        ]
    ];

    1. Mostrar habitaciones disponibles de un tipo específico ($tipo = "individual", por ejemplo).
    2. Calcular ingresos totales del hotel
    3. Reservar una habitación
    4. Liberar una habitación y calcular el costo
    5. Encontrar la habitación más rentable (que más ingresos genera)
    </p>

    <?php
    $hotel = [
        "habitaciones" => [
            101 => ["tipo" => "individual", "precio" => 50, "ocupada" => false, "dias_ocupada" => 0],
            102 => ["tipo" => "doble", "precio" => 80, "ocupada" => true, "dias_ocupada" => 3],
            103 => ["tipo" => "suite", "precio" => 150, "ocupada" => false, "dias_ocupada" => 0],
            201 => ["tipo" => "individual", "precio" => 50, "ocupada" => true, "dias_ocupada" => 5],
            202 => ["tipo" => "doble", "precio" => 80, "ocupada" => false, "dias_ocupada" => 0],
            203 => ["tipo" => "suite", "precio" => 150, "ocupada" => true, "dias_ocupada" => 2]
            ],
        "reservas" => [
            ["habitacion" => 102, "cliente" => "Juan Pérez", "dias" => 3],
            ["habitacion" => 201, "cliente" => "María López", "dias" => 5],
            ["habitacion" => 203, "cliente" => "Carlos Ruiz", "dias" => 2]
        ]
    ];

    /*1. Mostrar habitaciones disponibles de un tipo específico*/
    foreach($hotel["habitaciones"] as $numHabitacion => $habitacion){
        if($habitacion ["tipo"] == "individual" && $habitacion["ocupada"] == false){
            echo "<br>La habitación $numHabitacion está disponible";
        }
    }

    /* 2. Calcular ingresos totales del hotel  */
    $ingresos = 0;

    foreach($hotel["habitaciones"] as $numHabitacion => $habitacion){
        $ingresos += $habitacion ["precio"];
    }
    echo "<br> Los ingresos totales son : $ingresos €.";



    ?>
    
</body>
</html>