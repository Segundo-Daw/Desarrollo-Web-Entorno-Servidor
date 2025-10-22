
<?php

//Para imprimir el contenido de un array bidimensional
function imprimeBid($array){
    for($i=0; $i < count($array); $i++){
        for($j=0; $j < count($array[$i]); $j++){
            echo $array[$i][$j]. "";
        }
        echo "<br>";
    }
}


$matriz = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

imprimeBid($matriz);


//verificar si un elemento específico está presente dentro de un array bidimensional.
function contiene($elemento, $bidimensional){
        if (!isset($bidimensional)) {
            return false;
        }
        for ($i = 0; $i < count($bidimensional); $i++) {
            for ($j = 0; $j < count($bidimensional[$i]); $j++) {
                if ($elemento == $bidimensional[$i][$j]) {
                    return true;
                }
            }
        }
        return false;

 }

    //EJEMPLO DE USO
    $matriz = [
        [10, 20, 30],
        [40, 50, 60],
        [70, 80, 90]
    ];

    // Buscar el número 50
    if (contiene(50, $matriz)) {
        echo "El número 50 SÍ se encuentra en la matriz.<br>";
    } else {
        echo "El número 50 NO se encuentra en la matriz.<br>";
    }

    // Buscar el número 100
    if (contiene(100, $matriz)) {
        echo "El número 100 SÍ se encuentra en la matriz.<br>";
    } else {
        echo "El número 100 NO se encuentra en la matriz.<br>";
    }

 ?>

<h2>1. Realiza la función imprimeMayor. Recibe dos parámetros (números) e imprime por pantalla (echo) el mayor de los dos. No devuelve nada.</h2>

<?php
    function imprimeMayor($x, $y){
        if ($x > $y){
            echo $x;
        } else {
            echo $y;
        }
    }

    imprimeMayor(5,10);
?>

<h2>2. Realiza la función mayor. Recibe dos parámetros (números) y devuelve el mayor de los dos (no lo imprime, lo devuelve).</h2>

<?php
    function mayor($x, $y) {
        if ($x > $y){
            return $x;
        } else {
            return $y;
        }
    }

    $result = mayor (5,10);
    echo $result;
?>

<h2>3. Realiza la función esMayor. Recibe dos parámetros, a y b. Si a>b devuelve true. En caso contrario (a<=b) devuelve false.</h2>

<?php
    function esMayor($a, $b) {
        if ($a > $b) {
            return true;
        } else {
            return false;
        }
    }

    var_dump(esMayor(10,5));
    echo "<br>";
    var_dump(esMayor(5,10));
?>

<h2>4. Realiza la función cuentaCaracteres. Recibe un solo parámetro, un string. Devuelve la longitud de dicho string.</h2>

<?php
    function cuentaCaracteres($string) {
        return strlen($string);
    }

    echo cuentaCaracteres ("Esternocleidomastoideo");
?>

<h2>5. Realiza la función cuentaVocales. Recibe un solo parámetro, un string. Devuelve la cantidad de vocales que tiene dicho string.</h2>

<?php
    function cuentaVocales($string) {
        $string = strtolower($string);
        $vowels = array("a","e","i","o","u");
        $count = 0;

        for($i = 0; $i < strlen($string,); $i++) {
            if (in_array($string[$i], $vowels)) {
                $count++;
            }
        }
        return $count;
    }

    echo cuentaVocales ("Cristiano Ronaldo");
?>

<h2>6. Realiza la función aumentaODisminuye. Recibe dos parámetros, un número y un boolean. Si el boolean es true, devuelve número+1. Si es false, devuelve número-1.</h2>

<?php
    function aumentaODisminuye($x, $a) {
        if ($a) {
            return $x+1;
        } else {
            return $x-1;
        }
    }

    echo aumentaODisminuye(10, true);
    echo "<br>";
    echo aumentaODisminuye(10, false);
?>

<h2>7. Realiza la función esPar. Recibe un solo parámetro y devuelve true o false dependiendo de si es par o no.</h2>

<?php
    function esPar($x) {
        return ($x % 2 == 0);
    }

    var_dump(esPar (35));
    echo "<br>";
    var_dump(esPar (20));
?>

<h2>8. Realiza la función arrayAletatorio. Recibe tres parámetros: tamaño, mínimo y máximo. Devolverá un array del tamaño indicado como primer parámetro, rellenado de valores aleatorios entre el mínimo y el máximo indicados.</h2>

<?php
    function arrayAletatorio($size, $min, $max) {
        $result = [];

        for ($i = 0; $i < $size; $i++) {
            $result[] = rand($min , $max);
        }

        return $result;
    }

    var_dump(arrayAletatorio(5, 23, 50));
    var_dump(arrayAletatorio(10, 10, 500));
?>

<h2>9. Realiza la función arrayPares. Recibe un único parámetro, un array con números. Devuelve un array que solamente contiene los valores pares del original.</h2>

<?php
    function arrayPares($array) {
        $result = [];

        foreach ($array as $value) {
            if ($value % 2 === 0) {
                $result[] = $value;
            }
        }
        return $result;
    }

    $numbers = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
    $pares = arrayPares($numbers);
    var_dump(arrayPares($pares));
?>

<h2>10. Realiza la función digitos. Recibe como parámetro un número entero. Devuelve la cantidad de dígitos que tiene.</h2>

<?php
    function digits($x){
        $x = abs($x);
        return strlen((string)$x);
    }

    echo digits(12345);
    echo "<br>";
    echo digits(12345678);
    echo "<br>";
    echo digits(123456789101112);
?>

<h2>Elige una moneda de algún lugar del mundo, que no sean euros (por ejemplo, coronas danesas). Realiza las funciones coronasAEuros y eurosACoronas. Ambas reciben una cantidad y devuelven un double con la conversión de divisas.
Nota: deberás declarar una variable constante con el tipo de cambio y utilizarla dentro de las funciones.</h2>

<?php
    //delcaramos la constante, he elegido esta mooneda al azar
    const TASA_CAMBIO_SEK_EUR = 11.50;

    // Convierte de coronas suecas a euros
    function coronasAEuros($cantidad) {
        return $cantidad / TASA_CAMBIO_SEK_EUR;
    }

    // Convierte de euros a coronas suecas
    function eurosACoronas($cantidad) {
        return $cantidad * TASA_CAMBIO_SEK_EUR;
    }

    // Ejemplo de uso
    $sek = 230; // coronas suecas
    $eur = 20;  // euros

    echo "$sek coronas suecas son " . coronasAEuros($sek) . " euros.<br>";
    echo "$eur euros son " . eurosACoronas($eur) . " coronas suecas.<br>";

?>

<h2>Realiza la función modifica que reciba el primer parámetro (numero) por referencia y el segundo (cantidad) por valor. Aumenta numero en la cantidad especificada como segundo parámetro. La función no devuleve nada.
En un comentario después de la función, indica si se modifica o no el valor de la variable que se pasaba como primer parámetro, y por qué.</h2>

<?php
    function modifica(&$numero, $cantidad) {  //indica que es por referencia y trabaja sobre la variable original
        $numero += $cantidad;
    }

    // Ejemplo de uso
    $miNumero = 10;
    modifica($miNumero, 5);
    echo "Valor final: $miNumero"; // Debería imprimir 15

?>

<h2>Haz una función que reciba dos números, y devuelva true si son múltiplos, o false si no lo son.
Y que devuelva null si uno de los dos es negativo.</h2>
<?php

    function sonMultiplos($a, $b) {
        // Si alguno de los dos es negativo, devuelve null
        if ($a < 0 || $b < 0) {
            return null;
        }

        // Verifica si $a es múltiplo de $b o viceversa
        if ($a % $b === 0 || $b % $a === 0) {
            return true;
        }

        return false;
    }

    // Ejemplos de uso:
    var_dump(sonMultiplos(10, 5));   // true
    var_dump(sonMultiplos(7, 3));    // false
    var_dump(sonMultiplos(-4, 2));   // null
    var_dump(sonMultiplos(6, -2));   // null

?>

<h2>Haz una función que reciba entre 1 y n argumentos:
  1. una cadena de texto
  2 a n. letras
Devuelve 1 si todas las letras están en la cadena, o 0 si está alguna de ellas, o -1 si no está ninguna.</h2>

<?php
    function contieneLetras() {
        $args = func_get_args(); // Obtener todos los argumentos

        if (count($args) < 2) {
            return null; // No hay letras a verificar
        }

        $cadena = $args[0];
        $letras = array_slice($args, 1); // Obtener solo las letras

        $total = count($letras);
        $encontradas = 0;

        foreach ($letras as $letra) {
            if (strpos($cadena, $letra) !== false) {
                $encontradas++;
            }
        }

        if ($encontradas === 0) {
            return -1; // Ninguna letra está
        } elseif ($encontradas === $total) {
            return 1; // Todas las letras están
        } else {
            return 0; // Solo algunas letras están
        }
    }

    // Ejemplos de uso:
    echo contieneLetras("murciélago", "m", "g", "o"); // 1 (todas están)
    echo "<br>";
    echo contieneLetras("murciélago", "m", "z", "o"); // 0 (solo algunas)
    echo "<br>";
    echo contieneLetras("murciélago", "x", "y", "z"); // -1 (ninguna)

?>

