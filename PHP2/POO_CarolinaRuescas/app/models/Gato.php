<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/models/Mascota.php";

final class Gato extends Mascota{
    private String $raza;
    private bool $independiente;
    public const TARIFA_BASE_DIA =  35;


    public function __construct($raza, $independiente, $name, $age, $numberDays, $servicios){
        $this->raza = $raza;
        $this->independiente = $independiente;
        $this->type = "Gato";
        parent:: __construct($name, $age, $numberDays, $servicios);
    }

    public function __toString(){
        $ret = "Raza de gato: {$this->raza}\n";
        $ret .= "¿Es independiente? " . ($this->independiente ? "Sí" : "No") . "\n";
        $ret .= parent::__toString();

        return $ret;
    }
    public static function getTarifaBaseDia() {
        return self::TARIFA_BASE_DIA;
    }

    
    // Por si habla un plus por entrenamiento
    public function calcularPlus(): float {
        return $this->independiente ? 15 : 0; // +15€ si no es independiente
    }
}
?>