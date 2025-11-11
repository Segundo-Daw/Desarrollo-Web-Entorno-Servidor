
<?php

// Declaramos la función promedio

function promedio(...$numeros)
{
    if (count($numeros) == 0) {
        return false;
    }
    
    $suma = 0;
    for ($i = 0; $i < count($numeros); $i++) {
        $suma += $numeros[$i];
    }
    return $suma / count($numeros);
}

function potencia($base, $exponente = 2)
{
    $resultado = 1;
    for ($i = 0; $i < $exponente; $i++) {
        $resultado *= $base;
    }
    return $resultado;
}



?>