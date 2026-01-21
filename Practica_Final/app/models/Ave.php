<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Mascota.php";


final class Ave extends Mascota{
    private String $especie;
    private bool $habla;
    public const TARIFA_BASE_DIA = 30;

    public function __construct($especie, $habla, $name, $age, $numberDays, $servicios){
        $this->especie = $especie;
        $this->habla = $habla;
        $this->type = "Ave";
        parent::__construct($name, $age, $numberDays, $servicios);
    }

    public function __toString(){
        $ret = "Especie de ave: {$this->especie}\n";
        $ret .= "¿Puede hablar? " . ($this->habla ? "Sí" : "No") . "\n";
        $ret .= parent::__toString();

        return $ret;
    }
    public static function getTarifaBaseDia() {
        return self::TARIFA_BASE_DIA;
    }


    //Plus si habla
    public function calcularPlus(): float {
        return $this->habla ? 10 : 0; 
    }



}

?>