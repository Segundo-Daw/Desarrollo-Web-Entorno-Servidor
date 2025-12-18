<?php
/*
Función que recibe dos parámetros, el número de filas y el número de columnas, y devuelve un array bidimensional de filasxcolumnas con números impares

ej
creaArray(3,5) devuelve:
1   3   5   7   9
11  13  15  17  19
21  23  25  27  29

*/

function creaArray($col, $fil)
{
    $contenido = 1;
    for ($i = 0; $i < $col; $i++) {
        for ($j = 0; $j < $fil; $j++) {
            $resultado[$i][$j] = $contenido;
            $contenido += 2;  //le sumo 2, así voy teniendo los números impares: 3, 5, 7, 9...
        }
    }
    return $resultado;
}

var_dump(creaArray(3, 5));



/*
1.2. (0,6 puntos) Crea el fichero funcionesOrd.php en la subcarpeta “funciones”. Crea la función factorial. Recibe un entero como parámetro, y devuelve su factorial. El factorial es el producto de 1x2x3x… hasta el número). Si recibe un número negativo, devuelve -1.
Desde exOrd1eval.php llama a la función factorial e imprime los resultados de factorial(4), que da 24; de factorial(5), que da 120; y de factorial(-3), que da -1.

*/
include("./funciones/funcionesOrd.php");

echo "<h3>Ejercicio 2</h3>";

$factorial = factorial(4);
echo "<p>El factorial de 4 es $factorial</p>";

$factorial = factorial(5);
echo "<p>El factorial de 5 es $factorial</p>";

$factorial = factorial(-3);
echo "<p>El factorial de 120 es $factorial</p>";


/*
1.3. (0,7 puntos) En el mismo fichero funcionesOrd.php, crea la función sumaNumeros. Recibe un entero como parámetro, y devuelve la suma desde el 1 hasta dicho número (es decir, 1+2+3+… hasta dicho número). Si el número recibido es negativo, devolverá -1. Si es 0, devuelve 0. Si no tiene parámetros, devuelve -2.
Desde exOrd1eval.php llama a la función e imprime los resultados de sumaNumeros(5), da 15; de sumaNumeros(-3), da -1; sumaNumeros(0), da 1; y sumaNumeros(), da -2.

*/

echo "<h3>Ejercicio 3</h3>";

$suma1 = suma(5);
echo "<p>La suma de los número que compone el 5 es de $suma1</p>";

$suma2 = suma(-3);
echo "<p>La suma de -3 da como reeultado $suma2</p>";

$suma3 = suma(0);
echo "<p>La suma de 0 da como resultado $suma3</p>";



/*
1.5. crea una función pares() que reciba un número indefinido de parámetros, entre 0 y n, y que devuelva un array con los números pares. Por ejemplo, pares(5, 9, -2, 4, 7) devuelve [-2, 4]; pares() devuelve [] (array vacío) 
*/

echo "<h3>Ejercicio 4</h3>";

$par = pares(2,5,6,8,7,9,0);
echo "<p>El array de pares esta compuesto por: " . implode(", ", $par) . "</p>";


/*
crea la funcion calculos que recibe como primer parámetro un número, y como segundo parámetro (opcional) una operación "factorial" o "sumaNumeros". Si no hay segundo parámetro, calcula el factorial.
Por ejemplo, calculos(5,"factorial") devuelve 120; calculos(5) también devuelve 120, y calculos(5, "sumaNumeros") devuelve 15. Debes utilizar las funciones anteriores para hacerlo
*/

echo "<h3>Ejercicio 5</h3>";

$cal1 = calculos(5, "factorial");
echo "<p>$cal1</p>";


$cal2 = calculos(5, "suma");
echo "<p>$cal2</p>";

$cal1 = calculos(5);
echo "<p>$cal1</p>";




/*
Ejercicio 6
1.1. (0,7 puntos) Crea un array bidimensional de dimensiones 4 filas por 4 columnas. Itera sobre estos valores (debes utilizar bucles) para rellenar el array bidimensional con:
-1 a la derecha de la diagonal principal (consideramos diagonal principal esta: \).
1 a la izquierda de la diagonal principal.
El producto de la fila por la columna en la diagonal principal.
1 -1 -1 -1
1 4 -1 -1
1 1 9 -1
1 1 1 16

Después, itera sobre el array bidimensional e imprime sus valores en un table de html.

*/

for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 4; $j++) {
        if ($j > $i) { //a la derecha de la diagonal principal
            $bid[$i][$j] = -1;
        } else if ($i > $j) { //izquierda de la diagonal \
            $bid[$i][$j] = 1;
        } else {
            $bid[$i][$j] = ($i + 1) * ($j + 1); //sumo uno porque en los resultados no empieza en 0,0, sino en 1,1
            //otra opción habría sido hacer los bucles desde 1: for ($i = 1; $i <= 4; $i++), y lo mismo con $j
        }
    }
}

echo "<table>";
for ($i = 0; $i < count($bid); $i++) {
    echo "<tr>";
    for ($j = 0; $j < count($bid[$i]); $j++) {
        echo "<td>{$bid[$i][$j]}</td>";
    }
    echo "</tr>";
}

echo "</table>";


/*Ejercicio 5*/ 

$ciudades = [
    'España' => [
        'Madrid' => [
            'poblacion' => 3280000,
            'comunidad' => 'Comunidad de Madrid',
            'monumentos' => ['Palacio Real', 'Puerta del Sol', 'Museo del Prado'],
            'clima' => 'Mediterráneo continental'
        ],
        'Barcelona' => [
            'poblacion' => 1620000,
            'comunidad' => 'Cataluña',
            'monumentos' => ['Sagrada Familia', 'Parque Güell', 'Casa Batlló'],
            'clima' => 'Mediterráneo'
        ],
        'Sevilla' => [
            'poblacion' => 688000,
            'comunidad' => 'Andalucía',
            'monumentos' => ['Catedral', 'Real Alcázar', 'Plaza de España'],
            'clima' => 'Mediterráneo'
        ]
    ],
    
    'México' => [
        'Ciudad de México' => [
            'poblacion' => 9200000,
            'estado' => 'Distrito Federal',
            'monumentos' => ['Zócalo', 'Palacio de Bellas Artes', 'Museo Nacional de Antropología'],
            'altitud' => 2240 // metros sobre el nivel del mar
        ],
        'Guadalajara' => [
            'poblacion' => 1495000,
            'estado' => 'Jalisco',
            'monumentos' => ['Catedral', 'Teatro Degollado', 'Mercado San Juan de Dios'],
            'altitud' => 1566
        ],
        'Monterrey' => [
            'poblacion' => 1135000,
            'estado' => 'Nuevo León',
            'monumentos' => ['Macroplaza', 'Museo de Historia Mexicana', 'Cerro de la Silla'],
            'altitud' => 540
        ]
    ],
    
    'Argentina' => [
        'Buenos Aires' => [
            'poblacion' => 2890000,
            'provincia' => 'Ciudad Autónoma de Buenos Aires',
            'barrios' => ['Palermo', 'Recoleta', 'San Telmo', 'La Boca'],
            'monumentos' => ['Obelisco', 'Casa Rosada', 'Teatro Colón']
        ],
        'Córdoba' => [
            'poblacion' => 1320000,
            'provincia' => 'Córdoba',
            'monumentos' => ['Manzana Jesuítica', 'Catedral', 'Cabildo'],
            'barrios' => ['Palermo', 'Recoleta', 'San Telmo', 'La Boca'],
            'universidades' => ['UNC', 'UTN', 'Universidad Católica']
        ],
        'Mendoza' => [
            'poblacion' => 115000,
            'provincia' => 'Mendoza',
            'atractivos' => ['Bodegas', 'Aconcagua', 'Parque General San Martín'],
            'actividad' => 'Vitivinicultura'
        ]
    ]
];


/* 
a) usando bucles, muestra las ciudades de cada país. 
*/
echo "<h3>Ejeercicio 6 </h3>";
echo "<h5>A) </h5>";
foreach($ciudades as $pais => $ciudadPais){
    echo "<p>Ciudades de $pais : </p>";
    foreach($ciudadPais as $ciudad => $datos){
        echo "<ul><li>$ciudad</li></ul>";
    }
}

/*
b) usando bucles, muestra los nombres de las ciudades que tienen barrios (y sus barrios),
si no tienen, que no aparezcan
*/
echo "<h5>B) </h5>";
foreach ($ciudades as $pais => $ciudadPais){
    foreach($ciudadPais as $ciudad => $datos){
        if(isset($datos["barrios"])){
            echo "<p> $ciudad : " . implode( ", " , $datos["barrios"]) . "</p>";
        }
    }
}

/*
c) usando bucles, muestra la suma de las poblaciones de las ciudades de Argentina 
*/

echo "<p> C) </p>";
$sumaPoblacion = 0;
foreach ($ciudades['Argentina'] as $ciudad => $datos) {
    $sumaPoblacion += $datos['poblacion'];
}

echo "Población total de las ciudades de Argentina: $sumaPoblacion";




?>