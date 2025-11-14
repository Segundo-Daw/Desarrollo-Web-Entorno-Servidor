<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Vehiculo.php";


class Camion extends Vehiculo{
    private float $cargaMaxima;

    public function __construct($matricula,$modelo,$capacidadMaxima,$kmRecorridos, $cargaMaxima){
        parent::__construct($matricula,$modelo,$capacidadMaxima,$kmRecorridos);
        $this->cargaMaxima = $cargaMaxima;
    }

    public function __toString(){
        $ret = parent::__toString();
        $ret .= "Carga máxima que puede tener: " . $this->cargaMaxima;
        return $ret;
    }


    public function calcularCosteMantenimiento(){
        $ret = ($this->getKmRecorridos() * 0.1) + ($this->cargaMaxima * 2);

        return $ret;
    }


}


?>