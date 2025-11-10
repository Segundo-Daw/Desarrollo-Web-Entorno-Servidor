<?php

final class Perro extends Mascota{
    private String $raza;
    private bool $muerde;
    private const TARIFA_BASE_DIA = 40;

    public function __construct($raza, $muerde, $name, $age, $numberDays, $servicios){
        $this->raza = $raza;
        $this->muerde = $muerde;
        $this->type = "Perro";
        parent::__construct($name, $age, $numberDays,$servicios);
    }

    public function __toString(){
        $ret = "Raza de perro: {$this->raza}\n";
        $ret .= "¿Muerde? " . ($this->independiente ? "Sí" : "No") . "\n";     
        $ret .= parent:: __toString();

        return $ret;
    }

    



}



?>