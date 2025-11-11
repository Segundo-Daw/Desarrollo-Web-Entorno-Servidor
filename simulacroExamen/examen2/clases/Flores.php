<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Planta.php";
class Flores extends Planta{
    
    private String $mesFloracion;

    public function __construct($especie, $altura, $mesFloracion){
        parent::__construct($especie, $altura);
        $this->mesFloracion = $mesFloracion;


    }


    public function getMesFloracion()
    {
        return $this->mesFloracion;
    }


    public function __toString(){
        $ret = parent:: __toString();
        $ret .= "Su mes de floración es " .  $this->mesFloracion . "." ;
    
        return $ret;
    }

    



    
   
}


?>