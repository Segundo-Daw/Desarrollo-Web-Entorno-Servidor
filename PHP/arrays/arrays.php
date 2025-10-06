
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3> Arrays Indexados</h3>
    <?php
        //DECLARACIÓN DE ARRAYS (2 opciones)
        //1. Con la función arrays(...$values)
        $ages = array(25,19,42);
        echo "<p>En la posición 0 está el número  $ages[0]</p>";
        echo "<p>En la posición 1 está el número  $ages[1]</p>";
        echo "<p>En la posición 2 está el número  $ages[2]</p>";
        // echo "<p>En la posición 0 está el número  $age[3]</p>"; esta Daria error porque solo tenemos tres edades en el a
        // y no habría otra edad en la posición 4.


        //2. Directamente metiendo los valores en posiciones
        $names[0] = "Juan";
        $names[1] = "Lucia";
        //Para añadir al final basta con poner []
        $names[] = "Luz";

        //3. Otra forma
        $courses = ["DWES", "DWEC", "DIW", "IPE"];



        //Para SABER LONGITUD del array: count($array)
        echo "<p>Número de elementos del array " . count($ages) . "</p>";


        //Para RECORRER ARRAY:
        //1. Con un for normal
        for ($i = 0; $i < count($names); $i++){
            echo "<p>$i. $names[$i]</p>";
        }

        //2. Con foreach: foreach($array as $value){...})
        foreach($names as $name){     // en java seria:  for(name:names)
            echo "<p>$name</p>";
        }

        $ages[5] = "50";  // esto se puede hacer pero hay que tener cuidado al recorrerlo (porque hay posiciones vacias en nuestro array)
        //En realidad lo que se ha hecho es convertirlo a un array asociado
        $size = count($ages);
        var_dump($size);  //nos indica que nuestro array es de 4
        for ($i = 0; $i < count($ages); $i++){
            echo "<p>$ages[$i]</p>";
        }
    ?>

    <h3>Arrays asociativos</h3>
    <?php
        $students = [
            "123W" => "Javier",
            "357S" => "Luz",
            "987Q" => "Alberto"
        ];
        //Quiero acceder al nombhre "Luz";
        var_dump($students['357S']);

        //Para añadir un nuevo elemento:
        $students["456"] = "Maria";
        var_dump($students);

        ///Modificar su valor, en este caso cambiamos a Javier por Juan
        $students["123W"] = "Juan";
        var_dump($students);

        $school = array(
            "DWES" => "Sete",
            "DWEC" => "Diego",
            "DIW" => "Marco",
            "IPE" => "Santi"
        );
        echo "<p>Estos son mis profes: </p>";   // Para imprimir lo 4 nombres  
        /* 
        Un array asociativo solo lo puedo recorrer con foreach, porque no tengo indices 0,1,2,3...
        for ($i = 0; $i < count($school); $i++){
            echo $school[$i];
        }
        */
        foreach($school as $teacher){
            echo "<p>$teacher</p>";
        }

        echo "<p>Profes y asignaturas: </p>";
        //foreach ($array as $key => $value);
        foreach($school as $subject => $teacher){
            echo "<p>$teacher imparte $subject</p>";
        }

        //EJEMPLO: Crea un array asociativo que os inventéis con al menos 4 claves y sus valores.
        //Luego recorrelo e imprímelo en una lista. 
        $concesionario = array(
            "NissanSkyLine" => "BrianOconner",
            "DodgeCharger" => "Toreto",
            "HondaS200" => "Suki",
            "MazdaRX-7" => "Han"
        );

        echo "<h4>Coches Fast and Furious con conductores:</h4>";
        foreach($concesionario as $conductor => $coche){
            echo "<p>$conductor lo conduce $coche</p>";
        }
    ?>

    <h3>Ordenar Arrays</h3>
    <?php
        $personajes = ["amador", "Vicente", "Maite", "Javier"];
        //Ordenar de menor a mayor (alfabeticamente)
        sort ($personajes);
        var_dump($personajes);
        echo "<br>";

        //Ordenar al revés (de mayor a menor): rsort
        rsort($personajes);
        var_dump($personajes);
        echo "<br>";

        //Si utilizo sort con un array asociativo me cargo las claves, hay que usar asort
        // sort = array indexado 
        // asort = array asociativo
        //Ordenar alfabeticmaente por valores
        $school = array(
            "DWES" => "Sete",
            "DWEC" => "Diego",
            "DIW" => "Marco",
            "IPE" => "Santi"
        );
        asort($school);
        var_dump($school);
        echo "<br>";

        //Para ordenar de menor a mayor pero esta vez por claves
        ksort($school);
        var_dump($school);
        echo "<br>";

        //Para ordenar de mayor a menor pero esta vez por claves
        krsort($school);
        var_dump($school);
        echo "<br>";

        //Para BUSCAR POR VALOR en el array (elemento, array):
        if (in_array("Diego", $school)){
            echo "SI";
        }else{
            echo "NO";
        }
        echo "<br>";

        //Para BUSCAR si existe CLAVE:
        //No hay un método específico, pero tengo atajos:
        if (in_array("DWES", array_keys($school))){
            echo "SI";
        }else{
            echo "NO";
        }

        $keys = array_keys($school);
        // if (in_array("DWES", $keys)){...}   Es lo mismo que el de arriba

        //Otra forma isset($var) -> true si existe esa variable o flase si no está declarada
        echo "<br><br><br>";
        if (isset($computer)){
            echo "SI";
        }else{
            echo "NO";   //Sale NO porque la variable 4computer no existe
        }
        echo "<br>";

        //EJEMPLO
        //Quiero ver si existe la clave "Inglés" del array asociativo $school utilizando isset

        if (isset($school["Ingles"])){
            echo "SI existe";
        }else{
            echo "NO existe";   //Sale NO: la variable $school["Ingles"] no existe 
        }
        
    ?>

    <h2>Repaso arrays asociativos</h2>
    <?php
    $asoc = [
        "w5" => 'a',
        "w9" => 'b',
        "s4" => 'c'
    ];
    var_dump($asoc[9]);
    ?>

    <h2>Arrays bidimensionales</h2>
    <?php
    $bid = array(
        array(5,6,7,8,),
        array(9,10,11,12),
        array(13,14,15,16)
    );
    //Otra forma de declararlo:
    $bid2 = [
        [5,6,7,8],
        [9,10,11,12],
        [13,14,15,16]  
    ];
    //Quiero acceder al valor 15        
    var_dump($bid[2][2]);
    //Quiero acceder al valor 14
    var_dump($bid[2][1]);
    echo"<br>";

    //RECORRER con FOR
    for ($i = 0; $i < count($bid); $i++){
        for($j = 0; $j < count ($bid[$i]); $j++){
            echo $bid[$i][$j] . " - ";
        }
        echo"<br>";


    }
    echo"<br>";

    //RECORRER con FOREACH  ($array as $key => $value)  // "$key =>" se puede quitar
    foreach($bid as $arrayInterno){
        foreach($arrayInterno as $number){
            echo "$number - ";
        }
        echo"<br>";
    }
    ?>

    <h2>Array tridimensional</h2>
    <?php
    $asignaturas = [
        [   
            [
                //1ºEvaluación
                ["Subtema 1.1", "Subtema 1.2","Subtema 1.3"],
                ["Subtema 2.1", "Subtema 2.2"],
                ["Subtema 3.1", "Subtema 3.2", "Subtema 3.3", "Subtema 3.4"],
            ],
            [
                //2ºEvaluación
                ["Subtema 4.1", "Subtema 4.2", "subtema 4.3"],
                ["Subtema 5.1", "Subtema 5.2"],
            ],
        ],
        [ 
            [
            //1ºEvaluación
                ["Subtema 1.1", "Subtema 1.2","Subtema 1.3"],
                ["Subtema 2.1", "Subtema 7.2"],
                ["Subtema 3.1", "Subtema 8.2", "Subtema 3.3", "Subtema 3.4"],
            ],
        ],
    ];
    //Quiero sacar Subtema 1.2
    var_dump($asignaturas[0][0][0][1]);
    //QUiero sacar subtema 8.2
    var_dump($asignaturas[1][0][2][1]);




    ?>


    
    
</body>
</html>
