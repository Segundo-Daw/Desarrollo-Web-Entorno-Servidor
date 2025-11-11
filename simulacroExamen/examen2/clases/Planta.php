<?php


abstract class Planta{
    private String $especie;
    private float $altura;

    public function __construct($especie, $altura){
        $this->especie = $especie;
        $this->altura = $altura;
    }



    
    public function getAltura()
    {
        return $this->altura;
    }

    public function __toString(){
        $ret = $this->especie . ": altura " . $this->altura . " cm.";
        return $ret;
    }

    public function crecer(float $cm){
        $this->altura += $cm;
    }


    


}

?>