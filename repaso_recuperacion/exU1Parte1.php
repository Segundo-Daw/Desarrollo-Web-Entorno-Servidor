<?php
include("./modeloB.php");
include("./functionsCR.php");
//PARTE 1

//Ejercicio 1
//Recorre el array con un bucle e imprime en una lista no ordenada <ul> el nombbre y el nivel de picante (spicy_level) de los platos principales (maincourse);
echo "<ul>";
foreach ($menuItems as $menu => $valor){
    if($valor["category"] == "Main Course"){
        echo "<li>" .  $valor["name"]  . " tiene un novel de picante" .   $valor["spicy_level"] .  "</li>";
    }
}
echo "</ul>";

//Ejercicio 2
//Calcula el precio medio por categoria, e imprime cada uno en un parrafo <p></p>

$sumaD = 0;
$countD = 0;
$sumaM = 0;
$countM = 0;


foreach($menuItems as $name =>$valor){
    if($valor["category"] == "Dessert"){
        $sumaD += $valor["price"];
        $countD++;
    }else{
        $sumaM += $valor["price"];
        $countM ++;
    }
     
}
$mediaDessert = $sumaD/$countD;
$mediaMain = $sumaM/$countM;

echo "<p>El precio medio de Main Course es $mediaMain</p>";
echo "<p>El precio medio deDessert es $mediaDessert</p>";



//Ejercicio 3
//Recorre el array con un bucle e imprime en una lista ordenada los nombre de los postres (categoria "Dessert") ordenados alfabéticamente,
echo "<ul>" ;
$postres=[];
foreach($menuItems as $name => $valor){
    if($valor["category"] == "Dessert"){
        $postres[] = $valor["name"];
    }
}

asort($postres);

foreach ($postres as $postre) {
    echo "<li>$postre</li>";
}

echo "</ul>";



//PARTE 2
// Crea el array bidimensional de 5 filas y 4 columnas llamado $posiciones. en cada posición, por en string "multiplo" si el producto de fila x columna es múltiplo de 3, y "no" si no lo es. Consideramos que las filas y columnas empiezan por 0.

/*
multiplo, multiplo, multiplo, multiplo
multiplo, no, no, multiplo
multiplo, no, no, multiplo
multiplo, multiplo, multiplo, multiplo
multiplo, no, no, multiplo
*/
$filas = 5;
$columnas = 4;
$posiciones = [];
   
for ($i= 0; $i < $filas; $i++) {            //mi $i son las filas
    for ($j = 0; $j < $columnas; $j++) {      // mi $j son las columnas
        if(($i*$j) % 3 == 0){
            $posiciones[$i][$j] = "múltiplo";
        }else{
            $posiciones[$i][$j] = "no";
        }
    }
}

//para mostrarlo
 for ($i = 0; $i < $filas; $i++) {
    for ($j = 0; $j < $columnas; $j++) {
        echo $posiciones[$i][$j] . ", ";
    }
    echo "<br>";
}


//Ejercicio 2
// crea la funcion en el fichero functionCR.php de numberAnalysis. Recibe entres 0 y n parámetros. Devuelve un array asociativo con las siguientes claves:
//Llama  a la funcion e imprime los resultados en una lista no ordenada(<ul></ul>). Por ejemplo  para la llamada numberAnalysis(4,-2,7,0,-5,3), la salida en la siguiente:
    /*
    total: 6
    sum: 7
    max: 7
    avg: 1.1666666666667
    pos: 3
    squares: 16, 4, 49, 0, 25, 9
    */ 

$resultado = numberAnalysis(4, -2, 7, 0, -5,3);
 echo "<ul>";
    foreach ($resultado as $key => $value) {
        if ($key == "squares") { 
            echo "<li>$key: ";
            for ($i = 0; $i < count($value); $i++) {
                if ($i == count($value) -1) {
                    echo " " . $value[$i];
                } else {
                echo " " . $value[$i] .", ";
                }
            }
            echo "</li>";
        } else {
        echo "<li>$key: $value</li>";
        }
    }
    echo "</ul>";


    
//Ejercicio 3, en funcionesCR, crea la función calculate que recibe los siguientes parametros:
/*
1. $numbers(array, obligatorio): array con números con los que operar
2. $operation(string, opcional, por defecto "sum): indica la operacion, puede ser "sum(devuleve la suma de los números), "product" (devuelve el proucto), "order" (devuelve el array ordenado de mayor a menor).

3. $round(boolean, opcional, por defecto false): indica si se quiere redondear al entero más cercano. Si la operación es orderm este parámetro se ignora. Nota: PHP tiene un método round().

Desde el fichero principal (exU1Parte1.php) prueba la función que acabas de crear:
    calculate([1,6, 8.3, 9])  =>> 24.3
    calculate([1, 6, 8.3, 9]);
    calculate([1, 6, 8.3, 9], "product");
    calculate([1, 6, 8.3, 9], "product", true);
    calculate([1, 6, 8.3, 9], "sum");


*/

    echo "<h3>3</h3>";
    echo calculate([1, 6, 8.3, 9]);
    echo "<br>";
    echo calculate([1, 6, 8.3, 9], "product");
    echo "<br>";
    echo calculate([1, 6, 8.3, 9], "product", true);
    echo "<br>";

    $resultado = calculate([1, 6, 8.3, 9], "order");

    echo "[";
    
    foreach ($resultado as $num) {
        echo  $num . ", ";
    }

    echo "]";



?>



