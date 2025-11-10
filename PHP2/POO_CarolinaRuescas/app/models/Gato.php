<?php
final class Gato extends Mascota{
    private String $raza;
    private bool $independiente;
    private const TARIFA_BASE_DIA =  35;


    public function __construct($raza, $independiente, $name, $age, $numberDays, $servicios){
        $this->raza;
        $this->independiente;
        $this->type = "Gato";
        parent:: __construct($name, $age, $numberDays, $servicios);
    }

    public function __toString(){
        $ret = "Raza de gato: {$this->raza}\n";
        $ret .= "¿Es independiente? " . ($this->independiente ? "Sí" : "No") . "\n";
        $ret .= parent::__toString();

        return $ret;
    }
}
?>