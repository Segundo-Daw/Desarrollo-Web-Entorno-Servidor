<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Mascota.php";


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
        $ret .= "¿Muerde? " . ($this->muerde ? "Sí" : "No") . "\n";     
        $ret .= parent:: __toString();

        return $ret;
    }


    //He hecho este get de forma manual para poder acceder a la tarifa base sin hacerla publica
    public static function getTarifaBaseDia(): int {
        return self::TARIFA_BASE_DIA;
    }

    //Plus si el perro muerde
    protected function calcularPlus(): float {
        return $this->muerde ? 20 : 0;
    }




}



?>