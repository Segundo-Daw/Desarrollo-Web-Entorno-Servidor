<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Vehiculo.php";

class Coche extends Vehiculo{
    private int $numPuertas;

    public function __construct($matricula,$modelo,$capacidadMaxima,$kmRecorridos, $numPuertas){
        parent::__construct($matricula,$modelo,$capacidadMaxima,$kmRecorridos);
        $this->numPuertas = $numPuertas;
    }

    public function __toString(){
        $ret = parent::__toString();
        $ret .= "Numero de puertas: " . $this->numPuertas;
        return $ret;
    }


    public function calcularCosteMantenimiento(){
        $ret = $this->getKmRecorridos() * 0.05;

        return $ret;
    }


}


?>