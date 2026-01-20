<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Mascota.php";


final class Perro extends Mascota{
    private String $raza;
    private bool $muerde;
    public const TARIFA_BASE_DIA = 40;

    public function __construct($raza, $muerde, $name, $age, $numberDays, $type, $servicios=[], $id=-1){
        $this->raza = $raza;
        $this->muerde = $muerde;
        $this->type = "Perro";
        parent::__construct($name, $age, $numberDays,$type, $servicios, $id);
    }

    public function __toString(){
        $ret = "Raza de perro: {$this->raza}\n";
        $ret .= "¿Muerde? " . ($this->muerde ? "Sí" : "No") . "\n";     
        $ret .= parent:: __toString();

        return $ret;
    }

    public static function getTarifaBaseDia() {
        return self::TARIFA_BASE_DIA;
    }


    //Plus si el perro muerde
    public function calcularPlus(): float {
        return $this->muerde ? 20 : 0;
    }





    /**
     * Get the value of raza
     */ 
    public function getRaza()
    {
        return $this->raza;
    }

    /**
     * Get the value of muerde
     */ 
    public function getMuerde()
    {
        return $this->muerde;
    }
}



?>