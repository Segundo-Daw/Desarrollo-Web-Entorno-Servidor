
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


