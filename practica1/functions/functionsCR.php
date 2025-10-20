<?php
/**
 * Función que filtra por tipo
 * @param mixed $array recibe array
 * @param mixed $type  recibe (par, impar, primo ç, positivo o negativo)
 * @return array  devuelve todos los elementos que cumplen la condición anterior
 */
function filterByType($array, $type){
    $result = [];
    foreach ($array as $value) {
        if ($type == "par") {
            if ($value % 2 == 0) {
                $result[] = $value;
            }
        } elseif ($type == "impar") {
            if ($value % 2 != 0) {
                $result[] = $value;
            }
        } elseif ($type == "primo") {
            if (isPrime($value)) {
                $result[] = $value;
            }
        } elseif ($type == "positivo") {
            if ($value > 0) {
                $result[] = $value;
            }
        } elseif ($type == "negativo") {
            if ($value < 0) {
                $result[] = $value;
            }
        }
    }
    return $result;

}

/**
 * Función para saber si es primo
 * @param mixed $num
 * @return bool devulve true || false
 */
function isPrime($num){
    if($num <= 1) return false;
    for($i = 2; $i <= sqrt($num); $i++){  /*sqrt es una función que devuelve la raíz cuadrada del número  */
        if ($num %i == 0) return false;
    }
    return true;
}

/**
 * Función calcular estadísticas
 * @param mixed $array
 * @param mixed $statistics 
 * @return array  devulve un array asociativo con claves
 */
function calculateStatistics($array){
    $statistics = [];
    $count = count($array);

    sort($array);  /*ordenar elementos de menor a mayor   */

    $statistics['media'] = array_sum($array) / $count;   //se suman los elementos del array y se dividen entre el count 

    $statistics['mediana'] = ($count % 2 == 0) ? // usamos operadores ternarios para comprobar si el elemento es par
        ($array[$count / 2 - 1] + $array[$count / 2]) / 2 : // count/2-1 es el indice del primer elemento del medio y count/2 del segundo elemento del medio 
        $array[floor($count / 2)]; // con floor para redondear hacia abajo y obtener el índice central

    $valuesCount = array_count_values($array); // Devuelve un array asociativo con la cantidad de veces que aparece cada número 
    $maxCount = max($valuesCount); // cuantas veces aparece el número que más se repite

    $modes = array_keys($valuesCount, $maxCount); // números que se repiten máximo número de veces(moda) 

    $statistics['moda'] = (count($modes) == $count) ? null : $modes;   //  si se repiten todos los núemros las mismas veces devuelve null porque no hay moda 

    return $statistics;
}


/**
 * Función para analizar palabras
 * @param mixed $text
 * @return array{longest_word: string, number_of_words: int, shortest_word: string}
 */
function analizarPalabras($text) {

    // Dividimos el texto en palabras usando espacios
    $words = explode(' ', trim($text));
    
    // Contamos cuántas palabras hay en el
    $number_of_words = count($words);
    
    // Inicializamos variables para la palabra más larga y la más corta
    $longest_word = '';
    $shortest_word = $words[0] ?? '';
    
    // Recorremos todas las palabras
    foreach ($words as $word) {
        //strlen significa a “string length”, devuelve el número de caractéres
        if (strlen($word) > strlen($longest_word)) {  
            $longest_word = $word;
        }

        if (strlen($word) < strlen($shortest_word)) {
            $shortest_word = $word;
        }
    }
    
    // Devolvemos el resultado en un array asociativo
    return [
        'number_of_words' => $number_of_words,
        'longest_word' => $longest_word,
        'shortest_word' => $shortest_word
    ];
}


function convertTemperature($temperature, $origin = 'celsius', $to = 'fahrenheit') {

    // Lista de unidades válidas
    $unidades = ['celsius', 'fahrenheit', 'kelvin'];

    // Validar unidades
    if (!in_array($origin, $unidades) || !in_array($to, $unidades)) {
        return false;
    }

    // Si las unidades son iguales, devolver la temperatura sin cambios
    if ($origin === $to) {
        return $temperature;
    }

    // Convertir primero a Celsius como unidad intermedia
    switch ($origin) {
        case 'celsius':
            $tempC = $temperature;
            break;
        case 'fahrenheit':
            $tempC = ($temperature - 32) * 5 / 9;
            break;
        case 'kelvin':
            $tempC = $temperature - 273.15;
            break;
    }

    // Convertir de Celsius a la unidad deseada
    switch ($to) {
        case 'celsius':
            return $tempC;
        case 'fahrenheit':
            return ($tempC * 9 / 5) + 32;
        case 'kelvin':
            return $tempC + 273.15;
    }
}


















