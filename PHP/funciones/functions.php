<?php
//función sin argumentos ni valor de remoto
function showName(){
    echo "Carol";
}

$variable = "hola";

//Imrpime la suma de dos números
function printAddition($a, $b){
    echo $a + $b;
    
}

/**
 * Realiza la suma de dos números enteros o double
 * @param int|float $a  Primer operando
 * @param int|float $b  Segundo operando
 * @return int|float   El resultado de la suma de los dos operandos
 */
function addition ($a, $b):int|float   // al poner :int o :float o :double significa el tipo que te va a devolver
{   
    return $a + $b;
}

//Función para saludar que puede recibir solo el nombre (muestra "hola $nombre") 
// o el nombre y el tipo de saludo (muestra $saludo $nombre)
// en Java se haria con un:
// public static String saludar(String nombre){return saludar (nombre, "hola");}
// public static String saludar(String nomzbre, String saludo){return saludo + "" + nombre;}
// Esto en Java se conoce como la sobreescritura de funciones. Y en PHP no existe, pero existen otros métodos.

// En PHP: parámetors con valores por defecto
function salute($name, $salute = "hola") : string{
    return $salute . " " . $name;
}

/**
 * Devuelve lo que le digamos como parámetro dentro de las etiquetas que indiquemos (p si no indicamos nada)
 * @param string $tag etiquetas en las que envolver el elemento. si no se indica ninguna, que sea <p>por defecto</p>
 * @param string $element cadena de texto a envolver entre las tags htmls
 * @param string con el elemento rodeado de las tags indicadas
 */
function intoHtml($element, $tag ="p" )
{
    return "<$tag>$element</$tag>";

}

//intoHtml("br", "hola") devuelve "<br>hola</br>"
// intoHtml("p", "hola") devuelve "<p>hola</p>"
// intoHtml("hola") devuelve "<p>hola</p>"


//Ejemplo matricula($student, $course (por defecto "Daw"), $year(por defecto "2025"), $school)
/**
 * Summary of matricula
 * @param mixed $student
 * @param mixed $school
 * @param mixed $course
 * @param mixed $year
 * @return string
 */
function matricula($student, $school, $course = "DAW", $year = 2025)   //los opcionales simpre al final
{
    return "<p>$student matriculado en  $course en $year en el IES $school</p>";
}

function addOne ($num) 
{
    $num++;
    return $num;
}

function substract($firstNumber,...$numbers)      // los ... indica infinitos número
{
    $result  = $firstNumber;
    foreach($numbers as $n){
        $result -= $n;
    }
    return $result;
}

/**
 * Concatenar las cadenas de texto recibidas como parámetros.
 * Tiene que haber al menos 2, y si no devolver false. 
 * @param array $texts  cadenas de texto o concatenar.
 * @return string|boolean cadena concatenada o false su había menos de dos. 
 */
function concat(... $texts)
{
    if (count($texts) < 2){
        return false;
    }
    $result = "";
    foreach($texts as $n){
        $result .= $n;
    }
    return $result;
}



?>
