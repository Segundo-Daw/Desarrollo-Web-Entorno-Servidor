<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Planta.php";

class Arboles extends Planta{
    private bool $perenne;

    public function __construct($especie, $altura, $perenne){
        parent::__construct($especie, $altura);
        $this->perenne = $perenne;
    }
    

     public function __toString(){
        $ret = parent:: __toString();
        $ret .=  $this->perenne ? "Sí es perenne" : "No es perenne";  
        return $ret;
    }

    



    



   
   
}


?>