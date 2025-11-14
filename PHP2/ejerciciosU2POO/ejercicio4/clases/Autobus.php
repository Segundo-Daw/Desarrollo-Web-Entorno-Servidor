<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Vehiculo.php";

class Autobus extends Vehiculo{
    private float $numPlazas;

    public function __construct($matricula,$modelo,$capacidadMaxima,$kmRecorridos, $numPlazas){
        parent::__construct($matricula,$modelo,$capacidadMaxima,$kmRecorridos);
        $this->numPlazas = $numPlazas;
    }

    public function __toString(){
        $ret = parent::__toString();
        $ret .= "Nº de plazas total: " . $this->numPlazas;
        return $ret;
    }

    public function calcularCosteMantenimiento(){
        $ret = ($this->getKmRecorridos() * 0.7) + ($this->numPlazas * 1.5);
        
        return $ret;
    }


}


?>