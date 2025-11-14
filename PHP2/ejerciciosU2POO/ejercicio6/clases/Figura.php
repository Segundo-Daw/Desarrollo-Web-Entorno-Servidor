<?php
 abstract class Figura{
    private string $color;

    public function __construct($color){
        $this->color = $color;
    }
 
    public function getColor()
    {
        return $this->color;
    }
    
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }


    public function __toString(){
        return "Color: " . $this->color . ".";
    }


    //Método bastracto para el área
    abstract public function area();

    //Método abstrato perimetro
    abstract public function perimetro();

    
 }


?>