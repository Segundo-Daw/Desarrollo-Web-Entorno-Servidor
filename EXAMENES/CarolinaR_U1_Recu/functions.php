<?php



function orderArray($num, $order = "asc"){
        
    if ($order == "asc"){
        sort($num);
    }
    if ($order == "desc"){
        rsort($num);
    }
    return $num;
}


function calculator($operacion, ...$num){

    $total = count($num);
    $suma = array_sum($num);
    $media = $suma / $total;

    if ($operacion == "+"){
        return $suma;

    }else if($operacion == "avg"){
        return $media;
    }

  

}



?>