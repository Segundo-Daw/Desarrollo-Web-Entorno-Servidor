<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/clases/Figura.php";

class Rectangulo extends Figura{
    private float $ancho;
    private float $alto;

    public function __construct($color, $ancho, $alto){
        parent::__construct($color);
        $this->ancho = $ancho;
        $this->alto = $alto;

    }

    public function getAncho()
    {
        return $this->ancho;
    }

    public function getAlto()
    {
        return $this->alto;
    }
    
    public function setAncho($ancho)
    {
        $this->ancho = $ancho;

        return $this;
    }

 
    public function setAlto($alto)
    {
        $this->alto = $alto;

        return $this;
    }

    //Metodo para clacular el area
    public function area(){
        return $this->ancho * $this->alto;
    }

    //Metodo para calcular el perimeto
    public function perimetro(){
        return $this->area() * 2;
    }

    public function __toString(): string {
        return "Rectángulo. " . parent::__toString() . "Ancho: " . $this->ancho . ". Alto: " . $this->alto . ". ";
    }
}


?>