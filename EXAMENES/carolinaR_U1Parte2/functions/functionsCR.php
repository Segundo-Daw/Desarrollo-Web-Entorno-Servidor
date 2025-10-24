<?php
  function numberAnalysis(...$num){
    $array = [];
    $array2 = [];
    $suma = 0;
    $max = 0;
    $exponente = 2;

    foreach ($array as $num) {
        $suma += $num;
    }

    $media = $suma / count($array);

    for($i = 0; $i < count($num); $i++){
        $sum += $num[$i];
    }

    for($i = 0; $i < count($num); $i++){
        $max = max($num);
    }
    
    for ($i = 0; $i < $exponente; $i++) {
        $resultado *= $$num;
    }
    $array["suma"] = $sum;
    $array["maximo"] = $max;
    $array2["media"] = $media;
    $array2["squeare"] = $resultado;

    return $array2;

  }


  function calculate($array){
    
  }
?>


