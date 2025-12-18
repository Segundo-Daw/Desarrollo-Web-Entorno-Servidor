<?php
function factorial($num){
    if($num < 0){
        return -1;
    }

    $resultado = 1;
    for ( $i = 1; $i <= $num ; $i++){    
        $resultado *= $i;
    }
    return $resultado;
}


function suma($num){
    if($num < 0){
        return -1;
    }else if($num == 0){
        return 0;
    }

    $sum = 0;
    for($i = 0; $i <= $num; $i++){
        $sum += $i;
    }

    return $sum;
}


function calculos($num, $operacion = "factorial"){
    if ($operacion == "factorial"){
        return factorial($num);
    }else if($operacion == "suma"){
        return suma($num);
    }else{
        return null;
    }

    

}



function pares(...$num){
    $arrayPares = [];
    for ($i = 0; $i < count($num); $i++){   //con count se recorren todos los numeros
        if($num[$i] % 2 == 0){
            array_push($arrayPares, $num[$i]);
        }
    }
    return $arrayPares;
}


?>