<?php
include("./films.php");
include("./functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Asociativo</title>
</head>
<body>
    <?php
    echo "<h3>Ejercicio 1</h3>";

    echo "<ul>";
    foreach($directors as $name => $value){
        echo "<li>$name</li>";
    }
    echo "</ul>";

    echo "<h3>Ejercicio 2</h3>";
    echo "<ul>";
    foreach($directors as $peli => $ano){
        if($ano["year"]> 2010){

                echo  "<li>" . $ano["film"] . "</li>" ;
            }
    }
    echo "</ul>";


    echo "<h3>Ejercicio 3</h3>";
    $suma = 0;
    foreach($directors as $p => $pelis){
        if(isset($pelis["genre"]) == "Drama"){
            $suma += $pelis["duration"];
        }
    }
    
    echo "La suma de la duración de las películas que tienen Drama es de $suma";

    echo "<h3>Ejericcio de Función 2 : orderArray</h3>";
    $resultado = orderArray([5,9,4,2], "asc");
    
    echo "[";
    foreach ($resultado as $num){
        echo $num . ", ";
    }
    echo "]";
    echo "<br>";

    $resultado2 = orderArray([5,9,4,2]);
    echo "[";
        foreach ($resultado2 as $num){
            echo $num . ", ";
        }
    echo "]";
    echo "<br>";


    $resultado3 = orderArray([5,9,4,2], "desc");
    echo "[";
        foreach ($resultado3 as $num){
            echo $num . ", ";
        }
    echo "]";

    echo "<h3>Ejericcio Array Bidimensional</h3>";

    for ($i = 0; $i < 5; $i++){
        for ($j = 0; $j < 5; $j++){
            if ($j > $i){
                $bid[$i][$j] = $i * $j;
            }else if ($i > $j){
                $bid[$i][$j] = $i-$j;
            }else{
               $bid[$i][$j] = ($i) * ($j); 
            }
        }
    }

    //Para mostrar el array bidimensional
    for ($i = 0; $i < count($bid); $i++) {
        echo "<p>";
        for ($j = 0; $j < count($bid[$i]); $j++) {
            echo "{$bid[$i][$j]}" . ", ";
        }
        echo "</p>";
    }


    echo "<h3>Ejercicio Función 1: Calculator</h3>";
    /*
    $operacion = calculator(7,2);
    echo $operacion;
    
    */





    ?>
    
</body>
</html>

