
<?php

// Declaramos la función promedio
function promedio(...$numeros) {   // al poner los ... indicamos que son infinitos números

    // Verificamos si se han introducido números
    if (count($numeros) === 0) {
        return false;
    }
    // Calculamos la suma de todos los valores
    $suma = array_sum($numeros);

    // Calculamos el promedio
    return $suma / count($numeros);
}

function potencia($base, $exponente=2) {
    foreach($exponente as $mult => $cantidad){
        
    }



}





?>