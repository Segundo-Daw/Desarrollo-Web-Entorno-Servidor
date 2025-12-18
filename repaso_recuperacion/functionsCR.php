<?php
// crea la funcion  de numberAnalysis. Recibe entres 0 y n parámetros. Devuelve un array asociativo con las siguientes claves: total(la cantidad de números) , sum(la suma), max (el maximo), avg(la media), pos(la cantidad de números positivos), squares(un array con el cuadrado de cada número)
function numberAnalysis(...$number){
    $total = count($number);
    $sum = array_sum($number);
    $max = max($number);
    $avg = $sum / $total;
    $pos = 0;
    $squares = [];

    foreach ($number as $num) {
        if ($num > 0) {
            $pos++;
        }
        $squares[] = $num * $num;
    }

    return [
        'total' => $total,
        'sum' => $sum,
        'max' => $max,
        'avg' => $avg,
        'pos' => $pos,
        'squares' => $squares
    ];

}

function calculate($numbers, $operation = "sum", $round = false){
 
        if ($operation === "order") {
            arsort($numbers);
            return $numbers;
        } elseif ($operation === "sum") {
            $sum = 0;
            for ($i = 0; $i < count($numbers); $i++) {
                $sum += $numbers[$i];
            }
            if ($round == true) {
                $sum = round($sum, 0);
                return $sum;
            } else {
                return $sum;
            }
        } elseif ($operation === "product") {
            $prod = 1;
            for ($i = 0; $i < count($numbers); $i++) {
                $prod *= $numbers[$i];
            }
            if ($round == true) {
                $prod = round($prod, 0);
                return $prod;
            } else {
                return $prod;
            }
        }
    
}




?>