<?php

function filterByType($array, $type)
{
    $array2 = [];

    for ($i = 0; $i < count($array); $i++) {
        $num = $array[$i];

        if ($type == "par" && $num % 2 == 0) {
            $array2[] = $num;
        } elseif ($type == "impar" && $num % 2 != 0) {
            $array2[] = $num;
        } elseif ($type == "primo") {
            $esPrimo = true;
            if ($num <= 1) {
                $esPrimo = false;
            } else {
                for ($j = 2; $j < $num; $j++) {
                    if ($num % $j == 0) {
                        $esPrimo = false;
                        break;
                    }
                }
            }
            if ($esPrimo) {
                $array2[] = $num;
            }
        } elseif ($type == "positivo" && $num >= 0) {
            $array2[] = $num;
        } elseif ($type == "negativo" && $num < 0) {
            $array2[] = $num;
        }
    }
    return $array2;
}




/**
 * Función calcular estadísticas
 * @param mixed $array
 * @param mixed $statistics 
 * @return array  devulve un array asociativo con claves
 */
function calculateStatistics($array)
{
    $array2 = [];
    $suma = 0;
    foreach ($array as $num) {
        $suma += $num;
    }
    $media = $suma / count($array);

    sort($array);
    $count = count($array);
    if ($count % 2 == 1) {
        $mediana = $array[($count / 2)];
    } else {
        $mediana = ($array[$count / 2 - 1] + $array[$count / 2]) / 2;
    }

    $frecuencias = array_count_values($array);
    $maxFreq = max($frecuencias);
    $moda = [];
    if ($maxFreq > 1) {
        foreach ($frecuencias as $valor => $freq) {
            if ($freq == $maxFreq) {
                $moda[] = $valor;
            }
        }
    }

    $array2["media"] = $media;
    $array2["mediana"] = $mediana;
    $array2["moda"] = $moda;

    return $array2;
}


/**
 * Función para analizar palabras
 * @param mixed $text
 * @return array{longest_word: string, number_of_words: int, shortest_word: string}
 */
function analizarPalabras($text) {

    // Dividimos el texto en palabras usando espacios
    $words = preg_split("/\s+/", $text);
    
    // Contamos cuántas palabras hay en el
    $number_of_words = count($words);
    
    // Inicializamos variables para la palabra más larga y la más corta
    $longest_word = '';
    $shortest_word = '';
    
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


function convertTemperature($temperatura, $unidadOrigen = "celsius", $unidadDestino = "fahrenheit")
{
    if (
        ($unidadOrigen != "celsius" && $unidadOrigen != "fahrenheit" && $unidadOrigen != "kelvin") ||
        ($unidadDestino != "celsius" && $unidadDestino != "fahrenheit" && $unidadDestino != "kelvin")
    ) {
        return false;
    } else {
        if ($unidadOrigen == "celsius" && $unidadDestino == "fahrenheit") {
            return ($temperatura * 9 / 5) + 32;
        } elseif ($unidadOrigen == "celsius" && $unidadDestino == "kelvin") {
            return $temperatura + 273.15;
        } elseif ($unidadOrigen == "fahrenheit" && $unidadDestino == "celsius") {
            return ($temperatura - 32) * 5 / 9;
        } elseif ($unidadOrigen == "fahrenheit" && $unidadDestino == "kelvin") {
            return ($temperatura - 32) * 5 / 9 + 273.15;
        } elseif ($unidadOrigen == "kelvin" && $unidadDestino == "celsius") {
            return $temperatura - 273.15;
        } elseif ($unidadOrigen == "kelvin" && $unidadDestino == "fahrenheit") {
            return ($temperatura - 273.15) * 9 / 5 + 32;
        } else {
            return $temperatura;
        }
    }
}


















