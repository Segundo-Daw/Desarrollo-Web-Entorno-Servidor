<?php

    include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Figura.php";

class Circulo extends Figura{
    private float $radio;
    
    public function __construct($color, $radio){
        parent::__construct($color);
        $this->radio = $radio;
    }

 
    public function getRadio()
    {
        return $this->radio;
    }

    
    public function setRadio($radio)
    {
        $this->radio = $radio;

        return $this;
    }

    public function __toString(){
        $ret = "La figura es un circulo, de color " . parent::__toString() . " y on un radio de " . $this->radio . "cm.";

        return $ret;
    }

    //Método para calcular el area
    public function area(){
        return pow($this->radio, 2) * pi();
    }

    //Metodo para calcular el perimetro
    public function perimetro(){
        return $this->radio * pi() * 2;
    }

}


?>